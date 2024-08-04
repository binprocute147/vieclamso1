<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Cv;
use Illuminate\Support\Facades\Auth;

class JobDetailsController extends Controller
{
    public function showViewJobDetail(Request $request)
    {
        $jobs = Job::orderBy('created_at', 'desc')->take(5)->get();
        return view('jobDetails', compact('jobs'));
    }

    public function showJobDetail($slug)
    {
        $job = Job::where('slug', $slug)->firstOrFail();
        $jobs = Job::orderBy('created_at', 'desc')->take(5)->get();
        $userCvs = CV::where('user_id', auth()->id())->get();
        return view('jobDetails', compact('job', 'jobs' , 'userCvs'));
    }

}
