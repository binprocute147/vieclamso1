<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobCategories;
use App\Models\Job;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobsPerPage = 6;
        $locationsPerPage = 5;
        $companiesPerPage = 4;
        $categoriesPerPage = 4;

        // Lấy các thông số từ request và khởi tạo giá trị ban đầu cho phân trang
        $categoryId = $request->input('category_id');
        $location = $request->input('location');
        $locationPage = $request->input('location_page', 1);
        $companyPage = $request->input('company_page', 1);
        $categoryPage = $request->input('category_page', 1);

        // Query các công việc và thêm điều kiện lọc nếu có
        $jobsQuery = Job::query()->orderBy('created_at', 'desc');
        if ($categoryId) {
            $jobsQuery->where('job_category_id', $categoryId);
        }
        if ($location) {
            $jobsQuery->where('location', $location);
        }

        // Lấy danh sách công việc với phân trang
        $jobs = $jobsQuery->paginate($jobsPerPage);
        $currentPage = $request->input('page', 1);
        $totalPages = ceil($jobsQuery->count() / $jobsPerPage);

        // Lấy danh sách các địa điểm duy nhất và phân trang chúng
        $locations = Job::select('location')
            ->distinct()
            ->orderBy('location')
            ->paginate($locationsPerPage, ['*'], 'location_page', $locationPage);

        // Lấy danh sách các công ty duy nhất và phân trang chúng
        $companies = Job::select('company_name', 'company_image')
            ->distinct()
            ->paginate($companiesPerPage, ['*'], 'company_page', $companyPage);

        // Lấy danh sách các danh mục công việc và phân trang chúng
        $jobCategories = JobCategories::paginate($categoriesPerPage, ['*'], 'category_page', $categoryPage);
        $allLocations = Job::select('location')->distinct()->orderBy('location')->get();

        if ($request->ajax() && $request->has('search')) {
            $query = Job::query()->orderBy('created_at', 'desc');

            if ($request->filled('job_name')) {
                $query->where('name_job', 'like', '%' . $request->input('job_name') . '%');
            }

            if ($request->filled('location') && $request->input('location') !== 'Tất cả địa điểm') {
                $query->where('location', $request->input('location'));
            }

            $searchResults = $query->get();

            return response()->json([
                'jobs' => $searchResults,
                'message' => $searchResults->isEmpty() ? 'Không tìm thấy công việc phù hợp.' : ''
            ]);
        }

        if ($request->ajax()) {
            return response()->json([
                'jobs' => $jobs,
                'currentPage' => $currentPage,
                'totalPages' => $totalPages,
                'locations' => $locations,
                'companies' => $companies,
                'categories' => $jobCategories,
                'lastJobPage' => $jobs->lastPage(),
                'lastLocationPage' => $locations->lastPage(),
                'lastCompanyPage' => $companies->lastPage(),
                'lastCategoryPage' => $jobCategories->lastPage(),
            ]);
        }

        // Trả về view index với các biến dữ liệu cần thiết
        return view('index', compact('jobs', 'currentPage', 'totalPages', 'jobCategories', 'locations', 'companies', 'allLocations'));
    }
}
