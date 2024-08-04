<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cv;
use Validator;
use Auth;
use Illuminate\Support\Facades\File;

class CvController extends Controller
{
    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $validator = Validator::make($request->all(), [
            'name_cv' => 'required|string|max:100',
            'full_name' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:cvs,email',
            'phone_number' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'position_applied' => 'required|string|max:255',
            'skills' => 'nullable|string',
            'interests' => 'nullable|string',
            'referrals' => 'nullable|string',
            'awards' => 'nullable|string',
            'activities' => 'nullable|string',
            'certifications' => 'nullable|string',
            'career_goals' => 'nullable|string',
            'work_experience' => 'nullable|string',
            'education' => 'nullable|string',
            'projects' => 'nullable|string',
            'cv_image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        // Nếu dữ liệu không hợp lệ
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Xử lý file ảnh CV
        $cvImagePath = null;
        if ($request->hasFile('image_cv')) {
            $file = $request->file('image_cv');
            if (!$file->isValid()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'File tải lên không hợp lệ.'
                ], 422);
            }

            // Lưu ảnh vào thư mục public/images/image_cv
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/image_cv'), $imageName);
            $cvImagePath = $imageName; // Lưu tên ảnh vào biến
        }

        // Lưu thông tin CV vào cơ sở dữ liệu
        Cv::create([
            'user_id' => Auth::id(),
            'name_cv' => $request->input('name_cv'),
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'position_applied' => $request->input('position_applied'),
            'skills' => $request->input('skills'),
            'interests' => $request->input('interests'),
            'referrals' => $request->input('referrals'),
            'awards' => $request->input('awards'),
            'activities' => $request->input('activities'),
            'certifications' => $request->input('certifications'),
            'career_goals' => $request->input('career_goals'),
            'work_experience' => $request->input('work_experience'),
            'education' => $request->input('education'),
            'projects' => $request->input('projects'),
            'image_cv' => $cvImagePath,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'CV đã được lưu thành công!'
        ]);
    }

    // update cv
    public function updateCv(Request $request)
    {
        // Xác thực dữ liệu
        $validator = Validator::make($request->all(), [
            'name_cv' => 'required|string|max:100',
            'full_name' => 'required|string|max:50',
            'email' => 'required|email|max:100',
            'phone_number' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'position_applied' => 'required|string|max:255',
            'skills' => 'nullable|string',
            'interests' => 'nullable|string',
            'referrals' => 'nullable|string',
            'awards' => 'nullable|string',
            'activities' => 'nullable|string',
            'certifications' => 'nullable|string',
            'career_goals' => 'nullable|string',
            'work_experience' => 'nullable|string',
            'education' => 'nullable|string',
            'projects' => 'nullable|string',
            'image_cv' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        // Nếu dữ liệu không hợp lệ
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Tìm CV hiện tại
        $cv = Cv::find($request->input('cv_id'));

        if (!$cv) {
            return response()->json([
                'status' => 'error',
                'message' => 'CV không tìm thấy.'
            ], 404);
        }

        // Xử lý file ảnh CV
        $cvImagePath = $cv->image_cv;
        if ($request->hasFile('image_cv')) {
            $file = $request->file('image_cv');
            if (!$file->isValid()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'File tải lên không hợp lệ.'
                ], 422);
            }

            // Xóa ảnh cũ nếu có
            if ($cvImagePath && File::exists(public_path('images/image_cv/' . $cvImagePath))) {
                File::delete(public_path('images/image_cv/' . $cvImagePath));
            }

            // Lưu ảnh mới vào thư mục
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/image_cv'), $imageName);
            $cvImagePath = $imageName; // Cập nhật tên ảnh
        }

        // Cập nhật thông tin CV
        $cv->update([
            'name_cv' => $request->input('name_cv'),
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'position_applied' => $request->input('position_applied'),
            'skills' => $request->input('skills'),
            'interests' => $request->input('interests'),
            'referrals' => $request->input('referrals'),
            'awards' => $request->input('awards'),
            'activities' => $request->input('activities'),
            'certifications' => $request->input('certifications'),
            'career_goals' => $request->input('career_goals'),
            'work_experience' => $request->input('work_experience'),
            'education' => $request->input('education'),
            'projects' => $request->input('projects'),
            'image_cv' => $cvImagePath,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'CV đã được cập nhật thành công!'
        ]);
    }

    // lấy thông tin cv theo id
    public function getCvById($id)
    {
        $cv = CV::find($id);

        if ($cv) {
            return response()->json([
                'status' => 'success',
                'cv' => $cv
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'CV không tồn tại'
            ]);
        }
    }

    // xoa cv
    public function destroy($id)
    {
        // Tìm CV theo ID
        $cv = Cv::find($id);

        if (!$cv) {
            return response()->json([
                'status' => 'error',
                'message' => 'CV không tồn tại.'
            ], 404);
        }

        // Xóa ảnh CV nếu có
        if ($cv->image_cv && File::exists(public_path('images/image_cv/' . $cv->image_cv))) {
            File::delete(public_path('images/image_cv/' . $cv->image_cv));
        }

        // Xóa CV khỏi cơ sở dữ liệu
        $cv->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'CV đã được xóa thành công!'
        ]);
    }
}
