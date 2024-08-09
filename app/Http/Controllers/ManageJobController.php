<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobCategories;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class ManageJobController extends Controller
{
    public function manageJobs()
    {
        $this->authorize('viewAdmins', Admin::class);
        $jobs = Job::orderBy('created_at', 'desc')->paginate(5);
        return view('manageJob', compact('jobs'));
    }

    // Tìm kiếm công việc
    public function searchJobs(Request $request)
    {
        $searchTerm = $request->input('search');
        $jobs = Job::where('name_job', 'LIKE', '%' . $searchTerm . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        if ($jobs->isEmpty()) {
            return redirect()->route('admin.manageJobs')->with('error', "Không có tên công việc '$searchTerm'");
        }

        return view('manageJob', compact('jobs'));
    }

    // add job
    public function addJob()
    {
        $caterogiesJob = JobCategories::all();
        return view('addJob', compact('caterogiesJob'));
    }

    public function storeJob(Request $request)
    {
        if (Gate::denies('createAdmin', auth()->user())) {
            abort(403, 'Unauthorized');
        }

        $rules = [
            'name_job' => 'required|string|max:255',
            'description' => 'required|string',
            'company_name' => 'required|string|max:255',
            'job_category_id' => 'required|exists:job_categories,id',
            'requirements' => 'required|string',
            'min_salary' => 'required|numeric|min:0',
            'max_salary' => 'required|numeric|gt:min_salary',
            'location' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'experience' => 'nullable|string|max:255',
            'company_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'quantity' => 'required|integer|min:1',
            'gender' => 'nullable|in:Nam,Nữ,Khác,Không yêu cầu',
            'job_type' => 'required|string|max:255',
        ];

        $messages = [
            'max_salary.gt' => 'Mức lương tối đa phải lớn hơn mức lương tối thiểu.',
            'image.image' => 'Ảnh hồ sơ phải là một định dạng ảnh jpeg, png, jpg',
            'image.mimes' => 'Ảnh hồ sơ chỉ hỗ trợ định dạng jpeg, png, jpg.',
            'quantity.required' => 'Số lượng là bắt buộc.',
            'quantity.integer' => 'Số lượng phải là một số nguyên.',
            'quantity.min' => 'Số lượng phải lớn hơn 0.',
            'gender.in' => 'Giới tính phải là một trong các giá trị: Nam, Nữ, Giới tính khác hoặc không yêu cầu.',
            'job_type.required' => 'Hình thức làm việc là bắt buộc.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $job = new Job();
            $job->name_job = $request->input('name_job');
            $job->description = $request->input('description');
            $job->company_name = $request->input('company_name');
            $job->job_category_id = $request->input('job_category_id');
            $job->requirements = $request->input('requirements');
            $job->min_salary = $request->input('min_salary');
            $job->max_salary = $request->input('max_salary');
            $job->location = $request->input('location');
            $job->address = $request->input('address');
            $job->experience = $request->input('experience');
            $job->quantity = $request->input('quantity');
            $job->gender = $request->input('gender');
            $job->job_type = $request->input('job_type');

            if ($request->hasFile('company_image')) {
                $file = $request->file('company_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $job->company_image = $filename;
                $file->move('images/company_image/', $filename);
            }

            $job->save();

            return redirect()->back()->with(['success' => 'Thêm công việc thành công']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'Thêm công việc không thành công: ' . $e->getMessage()]);
        }
    }

    // Edit job
    public function edit($id)
    {
        if (Gate::denies('updateAdmin', auth()->user())) {
            abort(403, 'Unauthorized');
        }

        $job = Job::findOrFail($id);
        $categoriesJob = JobCategories::all();
        return view('editJob', compact('job', 'categoriesJob'));
    }

    // Update job
    public function update(Request $request, $id)
    {
        if (Gate::denies('updateAdmin', auth()->user())) {
            abort(403, 'Unauthorized');
        }

        $rules = [
            'name_job' => 'required|string|max:255',
            'description' => 'required|string',
            'company_name' => 'required|string|max:255',
            'job_category_id' => 'required|exists:job_categories,id',
            'requirements' => 'required|string',
            'min_salary' => 'nullable|numeric|min:0',
            'max_salary' => 'nullable|numeric|gt:min_salary',
            'location' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'experience' => 'nullable|string',
            'company_image' => 'nullable|image|mimes:jpeg,png,jpg|max:4120',
            'quantity' => 'required|integer|min:1',
            'gender' => 'nullable|string|max:255',
            'job_type' => 'required|string|max:255',
        ];

        $messages = [
            'name_job.required' => 'Tên công việc là bắt buộc.',
            'description.required' => 'Mô tả công việc là bắt buộc.',
            'company_name.required' => 'Tên công ty là bắt buộc.',
            'job_category_id.required' => 'Danh mục công việc là bắt buộc.',
            'job_category_id.exists' => 'Danh mục công việc không hợp lệ.',
            'requirements.required' => 'Yêu cầu công việc là bắt buộc.',
            'min_salary.numeric' => 'Mức lương tối thiểu phải là số.',
            'max_salary.numeric' => 'Mức lương tối đa phải là số.',
            'location.required' => 'Địa điểm là bắt buộc.',
            'address.required' => 'Địa chỉ là bắt buộc.',
            'company_image.image' => 'Ảnh công ty phải là một định dạng ảnh jpeg, png, jpg.',
            'company_image.mimes' => 'Ảnh công ty chỉ hỗ trợ định dạng jpeg, png, jpg.',
            'company_image.max' => 'Ảnh công ty không được lớn hơn 4MB.',
            'quantity.required' => 'Số lượng là bắt buộc.',
            'quantity.integer' => 'Số lượng phải là một số nguyên.',
            'quantity.min' => 'Số lượng phải lớn hơn 0.',
            'job_type.required' => 'Hình thức làm việc là bắt buộc.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $job = Job::findOrFail($id);
            $job->name_job = $request->input('name_job');
            $job->description = $request->input('description');
            $job->company_name = $request->input('company_name');
            $job->job_category_id = $request->input('job_category_id');
            $job->requirements = $request->input('requirements');
            $job->min_salary = $request->input('min_salary');
            $job->max_salary = $request->input('max_salary');
            $job->location = $request->input('location');
            $job->address = $request->input('address');
            $job->experience = $request->input('experience');
            $job->quantity = $request->input('quantity');
            $job->gender = $request->input('gender');
            $job->job_type = $request->input('job_type');

            if ($request->hasFile('company_image')) {
                // Xóa ảnh cũ
                if ($job->company_image) {
                    $oldImagePath = public_path('images/company_image/' . $job->company_image);
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }

                // Lưu ảnh mới
                $file = $request->file('company_image');
                $extension = $file->getClientOriginalExtension();
                $imageFilename = time() . '.' . $extension;
                $file->move(public_path('images/company_image/'), $imageFilename);
                $job->company_image = $imageFilename;
            }

            $job->save();
            return redirect()->back()->with(['success' => 'Cập nhật công việc thành công.']);
        } catch (\Exception $e) {
            Log::error('Cập nhật công việc không thành công: ' . $e->getMessage());
            return redirect()->back()->with(['error' => 'Cập nhật dữ liệu công việc không thành công: ' . $e->getMessage()]);
        }
    }

    // xóa job
    public function deleteJob($id)
    {
        if (Gate::denies('deleteAdmin', auth()->user())) {
            abort(403, 'Unauthorized');
        }
        
        try {
            $job = Job::findOrFail($id);

            // Xóa ảnh công ty nếu có
            if ($job->company_image) {
                $profilePicturePath = public_path('images/company_image/' . $job->company_image);
                if (File::exists($profilePicturePath)) {
                    File::delete($profilePicturePath);
                }
            }

            // Xóa user
            $job->delete();

            return redirect()->route('admin.manageJobs')->with('success', 'Công việc đã được xóa thành công');
        } catch (\Exception $e) {
            // Ghi lỗi vào log để dễ dàng theo dõi và gỡ lỗi
            Log::error('Xóa công việc thất bại: ' . $e->getMessage());

            return redirect()->route('admin.manageUsers')->with('error', 'Xóa công việc thất bại');
        }
    }
}
