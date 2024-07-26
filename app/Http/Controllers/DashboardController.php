<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobCategories;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Log;

class DashboardController extends Controller
{

    public function showDashboard()
    {
        return view('dashboard');
    }

    public function index(Request $request)
    {
        // Lấy năm và tháng từ request hoặc sử dụng giá trị mặc định
        $year = $request->input('year', Carbon::now()->year);
        $month = $request->input('month', Carbon::now()->month);

        // Lấy số lượng công việc theo ngày trong tháng hiện tại hoặc tháng được chọn
        $jobsByDate = Job::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->groupBy(DB::raw('DATE(created_at)'))
            ->pluck('count', 'date');

        // Lấy số lượng công việc theo danh mục
        $jobsByCategory = Job::select('job_category_id', DB::raw('count(*) as count'))
            ->groupBy('job_category_id')
            ->pluck('count', 'job_category_id');

        // Lấy số lượng công việc theo loại công việc
        $categories = JobCategories::pluck('name', 'id');
        $jobsByCategoryNames = $jobsByCategory->mapWithKeys(function ($count, $categoryId) use ($categories) {
            return [$categories[$categoryId] => $count];
        });

        // Lấy số lượng người dùng
        $usersCount = User::count();

        // Lấy số lượng người dùng online
        $onlineUsersCount = User::where('is_online', true)->count();

        return view('dashboard', [
            'jobsByDate' => $jobsByDate,
            'jobsByCategoryNames' => $jobsByCategoryNames,
            'usersCount' => $usersCount,
            'onlineUsersCount' => $onlineUsersCount,
            'year' => $year,
            'month' => $month
        ]);
    }
}
