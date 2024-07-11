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
        $jobs = Job::paginate($jobsPerPage);
        $currentPage = $request->input('page', 1);
        $totalPages = ceil(Job::count() / $jobsPerPage);
        $jobCategories = JobCategories::all();
        
        return view('index', compact('jobs', 'currentPage', 'totalPages', 'jobCategories'));
    }

}
