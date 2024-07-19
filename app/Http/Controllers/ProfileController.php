<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => [
                'nullable',
                'regex:/^0\d{9}$/',
            ],
            'email' => [
                'required',
                'email',
                'regex:/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/',
                Rule::unique('users')->ignore(auth()->id()),
            ],
        ], [
            'phone.regex' => 'Số điện thoại phải có 10 số và bắt đầu bằng số 0.',
            'email.required' => 'Email là bắt buộc.',
            'email.regex' => 'Email không đúng định dạng.',
            'email.unique' => 'Email đã được sử dụng.',
        ]);

        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::find($userId);
        }

        if ($user) {
            // Cập nhật thông tin người dùng
            $user->fullname = $request->fullname;
            $user->phone = $request->phone;
            $user->email = $request->email;
            // Cập nhật các trường khác
            $user->save();

            return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
        } else {
            // Người dùng chưa đăng nhập hoặc không tồn tại
            return redirect()->back()->with('error', 'Vui lòng đăng nhập để cập nhật thông tin.');
        }
    }


    // update picture user
    public function updateProfilePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:4048',
        ]);

        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::find($userId);

            if ($request->hasFile('profile_picture')) {
                // Kiểm tra nếu file tải lên không phải là ảnh
                if (!$request->file('profile_picture')->isValid()) {
                    return redirect()->back()->with('error', 'File tải lên không phải là ảnh.');
                }

                // Xử lý lưu ảnh và cập nhật vào user
                $image = $request->file('profile_picture');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/profile-picture'), $imageName);

                // Xóa ảnh cũ nếu có
                if ($user->profile_picture) {
                    $oldImagePath = 'images/profile-picture/' . $user->profile_picture;
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }

                // Lưu tên ảnh mới vào user
                $user->profile_picture = $imageName;
                $user->save();

                return redirect()->back()->with('success', 'Cập nhật ảnh đại diện thành công!');
            }
        }

        return redirect()->back()->with('error', 'Đã xảy ra lỗi khi cập nhật ảnh đại diện.');
    }

    // change password
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|different:current_password',
            'confirm_password' => 'required|same:new_password',
        ], [
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại.',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới.',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự.',
            'new_password.different' => 'Mật khẩu mới phải khác mật khẩu hiện tại.',
            'confirm_password.required' => 'Vui lòng xác nhận mật khẩu mới.',
            'confirm_password.same' => 'Xác nhận mật khẩu không khớp với mật khẩu mới.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Đổi mật khẩu thành công!');
    }

}
