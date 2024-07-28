<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use File;

class ProfileAdminController extends Controller
{
    public function profile()
    {
        $admin = Auth::user();
        return view('profileAdmin', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|regex:/^.+@gmail\.com$/i|unique:admins,email,' . Auth::id(),
            'phone' => 'nullable|regex:/^0[0-9]{9}$/',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ], [
            'fullname.required' => 'Họ và tên không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không đúng định dạng.',
            'email.regex' => 'Email phải là địa chỉ Gmail.',
            'email.unique' => 'Email đã được sử dụng.',
            'phone.regex' => 'Số điện thoại không đúng định dạng.',
            'picture.image' => 'File phải là ảnh.',
            'picture.mimes' => 'Ảnh phải có định dạng jpeg, png, jpg hoặc gif.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $admin = Auth::user();
        $admin->fullname = $request->input('fullname');
        $admin->email = $request->input('email');
        $admin->phone = $request->input('phone');

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/picture-admin/'), $filename);

            // Delete old picture
            if ($admin->picture) {
                $oldImagePath = public_path('images/picture-admin/' . $admin->picture);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            // Update new picture
            $admin->picture = $filename;
        }

        $admin->save();
        return redirect()->back()->with('success', 'Cập nhật thông tin tài khoản thành công');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|string|different:current_password',
            'new_password_confirmation' => 'required|same:new_password'
        ], [
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại.',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới.',
            'new_password.different' => 'Mật khẩu mới phải khác mật khẩu hiện tại.',
            'new_password_confirmation.required' => 'Vui lòng xác nhận mật khẩu mới.',
            'new_password_confirmation.same' => 'Xác nhận mật khẩu không khớp.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('password_errors', true);
        }

        $admin = Auth::user();

        if (!Hash::check($request->input('current_password'), $admin->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng'])->withInput()->with('password_errors', true);
        }

        $admin->password = Hash::make($request->input('new_password'));
        $admin->save();

        return redirect()->back()->with('success', 'Thay đổi mật khẩu thành công');
    }
}
