<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Hiển thị dữ liệu của admin
    public function manageAdmins()
    {
        $this->authorize('viewAdmins', Admin::class);
        $admins = Admin::orderBy('created_at', 'desc')->paginate(5);
        return view('manageAdmin', compact('admins'));
    }

    // Tìm kiếm admin
    public function searchAdmins(Request $request)
    {
        $this->authorize('viewAdmins', Admin::class);
        $searchTerm = $request->input('search');
        $admins = Admin::where('fullname', 'LIKE', '%' . $searchTerm . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        if ($admins->isEmpty()) {
            return redirect()->route('admin.manageAdmins')->with('error', "Không có tên admin '$searchTerm'");
        }

        return view('manageAdmin', compact('admins'));
    }

    // Thêm admin
    public function store(Request $request)
    {
        $this->authorize('createAdmin', Admin::class);

        $rules = [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'phone' => 'nullable|regex:/^0[0-9]{9}$/',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:4120',
            'role' => 'required|in:editor,viewer,admin',
            'password' => 'required|string|min:8',
        ];

        $messages = [
            'fullname.required' => 'Họ tên là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'phone.regex' => 'Số điện thoại không hợp lệ. Phải bắt đầu bằng số 0 và có 10 số.',
            'picture.image' => 'Ảnh hồ sơ phải là một định dạng ảnh jpeg, png, jpg.',
            'picture.mimes' => 'Ảnh hồ sơ chỉ hỗ trợ định dạng jpeg, png, jpg.',
            'picture.max' => 'Ảnh hồ sơ không được lớn hơn 4MB.',
            'role.required' => 'Vai trò là bắt buộc.',
            'role.in' => 'Vai trò không hợp lệ.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $admin = new Admin();
        $admin->fullname = $request->input('fullname');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->phone = $request->input('phone');
        $admin->role = $request->input('role');

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            $pictureFilename = time() . '.' . $extension;
            $file->move(public_path('images/picture-admin/'), $pictureFilename);
            $admin->picture = $pictureFilename;
        }

        $admin->save();

        return redirect()->back()->with(['success' => 'Admin đã được thêm thành công.']);
    }

    // Chỉnh sửa admin
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('editAdmin', compact('admin'));
    }

    // Cập nhật admin
    public function update(Request $request, $id)
    {
        $this->authorize('updateAdmin', Admin::findOrFail($id));

        $rules = [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $id,
            'phone' => 'nullable|regex:/^0[0-9]{9}$/',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg|max:4120',
            'role' => 'required|in:editor,viewer,admin',
            'password' => 'nullable|string|min:8',
        ];

        $messages = [
            'fullname.required' => 'Họ tên là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại.',
            'phone.regex' => 'Số điện thoại không hợp lệ. Phải bắt đầu bằng số 0 và có 10 số.',
            'picture.image' => 'Ảnh hồ sơ phải là một định dạng ảnh jpeg, png, jpg.',
            'picture.mimes' => 'Ảnh hồ sơ chỉ hỗ trợ định dạng jpeg, png, jpg.',
            'picture.max' => 'Ảnh hồ sơ không được lớn hơn 4MB.',
            'role.required' => 'Vai trò là bắt buộc.',
            'role.in' => 'Vai trò không hợp lệ.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $admin = Admin::findOrFail($id);
            $admin->fullname = $request->input('fullname');
            $admin->email = $request->input('email');

            if ($request->input('password')) {
                $admin->password = Hash::make($request->input('password'));
            }

            $admin->phone = $request->input('phone');
            $admin->role = $request->input('role');

            if ($request->hasFile('picture')) {
                if ($admin->picture) {
                    $oldPicturePath = public_path('images/picture-admin/' . $admin->picture);
                    if (File::exists($oldPicturePath)) {
                        File::delete($oldPicturePath);
                    }
                }

                $file = $request->file('picture');
                $extension = $file->getClientOriginalExtension();
                $pictureFilename = time() . '.' . $extension;
                $file->move(public_path('images/picture-admin/'), $pictureFilename);
                $admin->picture = $pictureFilename;
            }

            $admin->save();
            return redirect()->back()->with(['success' => 'Cập nhật Admin thành công.']);
        } catch (\Exception $e) {
            Log::error('Cập nhật admin không thành công: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Cập nhật dữ liệu admin không thành công: ' . $e->getMessage()]);
        }
    }

    // Xóa admin
    public function delete($id)
    {
        $this->authorize('deleteAdmin', Admin::findOrFail($id));

        try {
            $admin = Admin::findOrFail($id);

            if ($admin->picture) {
                $picturePath = public_path('images/picture-admin/' . $admin->picture);
                if (File::exists($picturePath)) {
                    File::delete($picturePath);
                }
            }

            $admin->delete();

            return redirect()->route('admin.manageAdmins')->with('success', 'Admin đã được xóa thành công');
        } catch (\Exception $e) {
            Log::error('Xóa admin thất bại: ' . $e->getMessage());
            return redirect()->route('admin.manageAdmins')->with('error', 'Xóa admin thất bại');
        }
    }

    // Cập nhật quyền của admin
    public function updateAdminPermissions(Request $request, $id)
    {
        $this->authorize('changeAdminPermissions', Admin::findOrFail($id));

        $rules = [
            'permissions' => 'required|in:full_access,edit_delete_except_admin,view_only',
        ];

        $messages = [
            'permissions.required' => 'Quyền truy cập là bắt buộc.',
            'permissions.in' => 'Quyền truy cập không hợp lệ.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $admin = Admin::findOrFail($id);
            $admin->permissions = $request->input('permissions');
            $admin->save();

            return redirect()->back()->with('success', 'Quyền của admin đã được cập nhật thành công.');
        } catch (\Exception $e) {
            Log::error('Cập nhật quyền admin không thành công: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Cập nhật quyền admin không thành công: ' . $e->getMessage());
        }
    }
}
