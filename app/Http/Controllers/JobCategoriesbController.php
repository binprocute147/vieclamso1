<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobCategories;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class JobCategoriesbController extends Controller
{
    public function manageJobCategories()
    {
        $jobCategories = JobCategories::orderBy('created_at', 'desc')->paginate(5);
        // dd($jobs);
        return view('manageCategoriesjob', compact('jobCategories'));
    }

    // Tìm kiếm JobCategories
    public function searchJobCategories(Request $request)
    {
        $searchTerm = $request->input('search');
        $jobCategories = JobCategories::where('name', 'LIKE', '%' . $searchTerm . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        if ($jobCategories->isEmpty()) {
            return redirect()->route('admin.manageJobCategories')->with('error', "Không có tên danh mục công việc '$searchTerm'");
        }

        return view('manageCategoriesjob', compact('jobCategories'));
    }

    // add JobCategories
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jobcategories_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Thông báo lỗi
        $messages = [
            'jobcategories_image.image' => 'Ảnh hồ sơ phải là một định dạng ảnh jpeg, png, jpg , gif',
            'jobcategories_image.mimes' => 'Ảnh hồ sơ chỉ hỗ trợ định dạng jpeg, png, jpg , gif',
        ];

        $jobCategory = new JobCategories;
        $jobCategory->name = $request->input('name');

        if ($request->hasFile('jobcategories_image')) {
            $imageName = time() . '.' . $request->file('jobcategories_image')->extension();
            $request->file('jobcategories_image')->move(public_path('images/jobcategories_image'), $imageName);
            $jobCategory->jobcategories_image = $imageName;
        }

        $jobCategory->save();

        return redirect()->back()->with(['success' => 'đã thêm danh mục công việc thành công.']);
    }

    // xóa danh mục công việc
    public function deleteJobCategories($id)
    {

        try {
            $jobCategories = JobCategories::findOrFail($id);
            // Kiểm tra xem jobCategories có chứa job nào không
            if ($jobCategories->jobs()->count() > 0) {
                return redirect()->back()->with(['error' => 'Không thể xóa danh mục công việc này vì nó có chứa ' . $jobCategories->jobs()->count() . ' công việc']);
            }
            // Xóa ảnh danh mục công việc nếu có
            if ($jobCategories->jobcategories_image) {
                $profilePicturePath = public_path('images/jobcategories_image/' . $jobCategories->jobcategories_image);
                if (File::exists($profilePicturePath)) {
                    File::delete($profilePicturePath);
                }
            }

            // Xóa danh mục công việc
            $jobCategories->delete();

            return redirect()->route('admin.manageJobCategories')->with('success', 'Danh mục công việc đã được xóa thành công');
        } catch (\Exception $e) {
            // Ghi lỗi vào log để dễ dàng theo dõi và gỡ lỗi
            Log::error('Xóa danh mục công việc thất bại: ' . $e->getMessage());
            return redirect()->route('admin.manageJobCategories')->with('error', 'Xóa danh mục công việc thất bại');
        }
    }

    // edit JobCategories
    public function edit($id)
    {
        $jobCategory = JobCategories::findOrFail($id);
        return view('editCategoriesjob', compact('jobCategory'));
    }

    public function update(Request $request, $id)
    {
        // Định nghĩa quy tắc xác thực
        $rules = [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ];

        // Thông báo lỗi
        $messages = [
            'name.required' => 'Tên danh mục công việc là bắt buộc.',
            'name.string' => 'Tên danh mục công việc phải là chuỗi ký tự.',
            'name.max' => 'Tên danh mục công việc không được vượt quá 255 ký tự.',
            'image.image' => 'Ảnh phải là định dạng hình ảnh.',
            'image.mimes' => 'Ảnh chỉ hỗ trợ các định dạng jpeg, png, jpg.',
        ];

        // Xác thực dữ liệu
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $jobCategory = JobCategories::findOrFail($id);
            $jobCategory->name = $request->input('name');

            // Xử lý ảnh
            if ($request->hasFile('image')) {
                // Xóa ảnh cũ
                if ($jobCategory->jobcategories_image) {
                    $oldImagePath = public_path('images/jobcategories_image/' . $jobCategory->jobcategories_image);
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }

                // Lưu ảnh mới
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $imageFilename = time() . '.' . $extension;
                $file->move(public_path('images/jobcategories_image/'), $imageFilename);
                $jobCategory->jobcategories_image = $imageFilename;
            }

            $jobCategory->save();
            return redirect()->back()->with(['success' => 'Cập nhật danh mục công việc thành công.']);
        } catch (\Exception $e) {
            Log::error('Cập nhật danh mục công việc không thành công: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Cập nhật danh mục công việc không thành công: ' . $e->getMessage()]);
        }
    }
}
