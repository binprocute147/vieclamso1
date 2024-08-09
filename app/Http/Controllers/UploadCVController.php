<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UploadCVController extends Controller
{
    // uploadcv and edit cv 
    public function store(Request $request)
    {
        $request->validate([
            'fileInput' => 'required|mimes:doc,docx,pdf|max:5120',
        ], [
            'fileInput.required' => 'Vui lòng chọn một file CV để tải lên.',
            'fileInput.mimes' => 'Định dạng file không hợp lệ. Chỉ chấp nhận file định dạng .doc, .docx, .pdf.',
            'fileInput.max' => 'Kích thước file không được vượt quá 5MB.',
        ]);

        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::find($userId);

            if ($request->hasFile('fileInput')) {
                $file = $request->file('fileInput');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $destinationPath = public_path('images/cv');

                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }

                $file->move($destinationPath, $fileName);

                if ($user->cv) {
                    $oldFilePath = public_path('images/cv/') . $user->cv;
                    if (File::exists($oldFilePath)) {
                        File::delete($oldFilePath);
                    }
                }

                $user->cv = $fileName;
                $user->save();

                return response()->json(['success' => true]);
            }
        }

        return response()->json(['success' => false, 'message' => 'Đã xảy ra lỗi khi tải lên CV.'], 500);
    }

    // edit cv
    public function update(Request $request)
    {
        $request->validate([
            'fileInputEdit' => 'nullable|mimes:doc,docx,pdf|max:5120',
        ], [
            'fileInputEdit.mimes' => 'Định dạng file không hợp lệ. Chỉ chấp nhận file định dạng .doc, .docx, .pdf.',
            'fileInputEdit.max' => 'Kích thước file không được vượt quá 5MB.',
        ]);

        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::find($userId);

            if ($request->hasFile('fileInputEdit')) {
                $file = $request->file('fileInputEdit');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $destinationPath = public_path('images/cv');

                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }

                $file->move($destinationPath, $fileName);

                if ($user->cv) {
                    $oldFilePath = public_path('images/cv/') . $user->cv;
                    if (File::exists($oldFilePath)) {
                        File::delete($oldFilePath);
                    }
                }

                $user->cv = $fileName;
                $user->save();

                return response()->json(['success' => true, 'message' => 'Cập nhật CV thành công.']);
            }
        }

        return response()->json(['error' => false, 'message' => 'Đã xảy ra lỗi khi cập nhật CV.'], 500);
    }


    // delete cv
    public function destroy(Request $request)
    {
        try {
            if (Auth::check()) {
                $userId = Auth::id();
                $user = User::find($userId);

                if ($user->cv) {
                    $filePath = public_path('images/cv/') . $user->cv;
                    if (File::exists($filePath)) {
                        File::delete($filePath);
                    }

                    $user->cv = null;
                    $user->save();

                    return response()->json(['success' => true, 'message' => 'Xóa CV thành công.']);
                } else {
                    return response()->json(['error' => false, 'message' => 'CV không tồn tại.'], 404);
                }
            }

            return response()->json(['error' => false, 'message' => 'Người dùng chưa đăng nhập.'], 401);
        } catch (\Exception $e) {
            Log::error('Xóa CV thất bại: ' . $e->getMessage()); 
            return response()->json(['error' => true, 'message' => 'Đã xảy ra lỗi khi xóa CV.'], 500);
        }
    }
}
