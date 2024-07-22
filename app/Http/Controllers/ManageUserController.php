<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    public function manageUsers()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        // dd($users); 
        return view('manageUser', compact('users'));
    }

    // tìm kiếm user
    public function searchUsers(Request $request)
    {
        $searchTerm = $request->input('search');
        $users = User::where('fullname', 'LIKE', '%' . $searchTerm . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        if ($users->isEmpty()) {
            return redirect()->route('admin.manageUsers')->with('error', "Không có tên user '$searchTerm'");
        }

        return view('manageUser', compact('users'));
    }

    // Xử lý thêm người dùng
    public function store(Request $request)
    {
        // Định nghĩa quy tắc xác thực
        $rules = [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|ends_with:@gmail.com|unique:users,email',
            'pass' => 'required|min:8',
            'phone' => 'required|regex:/^0[0-9]{9}$/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4120',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ];

        // Thông báo lỗi
        $messages = [
            'fullname.required' => 'Họ tên là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'email.ends_with' => 'Email phải có đuôi @gmail.com.',
            'email.unique' => 'Email đã tồn tại.',
            'pass.required' => 'Mật khẩu là bắt buộc.',
            'pass.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.regex' => 'Số điện thoại không hợp lệ. Phải bắt đầu bằng số 0 và có 10 số.',
            'image.image' => 'Ảnh hồ sơ phải là một định dạng ảnh jpeg, png, jpg',
            'image.mimes' => 'Ảnh hồ sơ chỉ hỗ trợ định dạng jpeg, png, jpg.',
            'image.max' => 'Ảnh hồ sơ không được lớn hơn 4MB.',
            'cv.mimes' => 'CV phải là file PDF, DOC, hoặc DOCX.',
            'cv.max' => 'CV không được lớn hơn 5MB.',
        ];

        // Xác thực dữ liệu
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Tạo đối tượng user mới
        $user = new User();
        $user->fullname = $request->input('fullname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('pass'));
        $user->phone = $request->input('phone');

        // Biến lưu tên tệp tin
        $imageFilename = null;
        $cvFilename = null;

        try {
            // Xử lý ảnh hồ sơ
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $imageFilename = time() . '.' . $extension;

                if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
                    return redirect()->back()->with(['error' => 'Chỉ được phép tải lên các file hình ảnh']);
                }

                $file->move(public_path('images/profile-picture/'), $imageFilename);
                $user->profile_picture = $imageFilename;
            }

            // Xử lý CV
            if ($request->hasFile('cv')) {
                $file = $request->file('cv');
                $extension = $file->getClientOriginalExtension();
                $cvFilename = time() . '.' . $extension;

                if (!in_array($extension, ['pdf', 'doc', 'docx'])) {
                    return redirect()->back()->with(['error' => 'CV phải là file PDF, DOC, hoặc DOCX']);
                }

                $file->move(public_path('images/cv/'), $cvFilename);
                $user->cv = $cvFilename;
            }

            // Lưu user vào cơ sở dữ liệu
            $user->save();

            return redirect()->back()->with(['success' => 'User đã được thêm thành công.']);
        } catch (\Exception $e) {
            // Xóa tệp tin nếu có lỗi xảy ra
            if ($imageFilename) {
                $imagePath = public_path('images/profile-picture/' . $imageFilename);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
            if ($cvFilename) {
                $cvPath = public_path('images/cv/' . $cvFilename);
                if (File::exists($cvPath)) {
                    File::delete($cvPath);
                }
            }

            // Ghi lỗi vào log và thông báo lỗi
            Log::error('Thêm user không thành công: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Thêm dữ liệu user không thành công: ' . $e->getMessage()]);
        }
    }

    // edit user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('editUser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Định nghĩa quy tắc xác thực
        $rules = [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|ends_with:@gmail.com|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            'phone' => 'nullable|regex:/^0[0-9]{9}$/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4120',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ];

        // Thông báo lỗi
        $messages = [
            'fullname.required' => 'Họ tên là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'email.ends_with' => 'Email phải có đuôi @gmail.com.',
            'email.unique' => 'Email đã tồn tại.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'phone.regex' => 'Số điện thoại không hợp lệ. Phải bắt đầu bằng số 0 và có 10 số.',
            'image.image' => 'Ảnh hồ sơ phải là một định dạng ảnh jpeg, png, jpg',
            'image.mimes' => 'Ảnh hồ sơ chỉ hỗ trợ định dạng jpeg, png, jpg.',
            'image.max' => 'Ảnh hồ sơ không được lớn hơn 4MB.',
            'cv.mimes' => 'CV phải là file PDF, DOC, hoặc DOCX.',
            'cv.max' => 'CV không được lớn hơn 5MB.',
        ];

        // Xác thực dữ liệu
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $user = User::findOrFail($id);
            $user->fullname = $request->input('fullname');
            $user->email = $request->input('email');

            // Chỉ cập nhật mật khẩu nếu có giá trị mới
            if ($request->input('password')) {
                $user->password = Hash::make($request->input('password'));
            }

            $user->phone = $request->input('phone');

            // Xử lý ảnh hồ sơ
            if ($request->hasFile('image')) {
                // Xóa ảnh cũ
                if ($user->profile_picture) {
                    $oldImagePath = public_path('images/profile-picture/' . $user->profile_picture);
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }

                // Lưu ảnh mới
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $imageFilename = time() . '.' . $extension;
                $file->move(public_path('images/profile-picture/'), $imageFilename);
                $user->profile_picture = $imageFilename;
            }

            // Xử lý CV
            if ($request->hasFile('cv')) {
                // Xóa CV cũ
                if ($user->cv) {
                    $oldCvPath = public_path('images/cv/' . $user->cv);
                    if (File::exists($oldCvPath)) {
                        File::delete($oldCvPath);
                    }
                }

                // Lưu CV mới
                $file = $request->file('cv');
                $extension = $file->getClientOriginalExtension();
                $cvFilename = time() . '.' . $extension;
                $file->move(public_path('images/cv/'), $cvFilename);
                $user->cv = $cvFilename;
            }

            $user->save();
            return redirect()->back()->with(['success' => 'Cập nhật User thành công.']);
        } catch (\Exception $e) {
            Log::error('Cập nhật user không thành công: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Cập nhật dữ liệu user không thành công: ' . $e->getMessage()]);
        }
    }

    // xóa user
    public function deleteUser($id)
    {
        try {
            $user = User::findOrFail($id);

            // Xóa ảnh profile nếu có
            if ($user->profile_picture) {
                $profilePicturePath = public_path('images/profile-picture/' . $user->profile_picture);
                if (File::exists($profilePicturePath)) {
                    File::delete($profilePicturePath);
                }
            }

            // Xóa CV nếu có
            if ($user->cv) {
                $cvPath = public_path('images/cv/' . $user->cv);
                if (File::exists($cvPath)) {
                    File::delete($cvPath);
                }
            }

            // Xóa user
            $user->delete();

            return redirect()->route('admin.manageUsers')->with('success', 'User đã được xóa thành công');
        } catch (\Exception $e) {
            // Ghi lỗi vào log để dễ dàng theo dõi và gỡ lỗi
            Log::error('Xóa user thất bại: ' . $e->getMessage());

            return redirect()->route('admin.manageUsers')->with('error', 'Xóa user thất bại');
        }
    }
}
