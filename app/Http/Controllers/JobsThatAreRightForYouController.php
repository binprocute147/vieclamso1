<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Job;

class JobsThatAreRightForYouController extends Controller
{
    public function showJob(Request $request)
    {
        if ($request->ajax()) {
            if ($request->has('all')) {
                $jobs = Job::orderBy('created_at', 'desc')->get();
            } else {
                $jobs = Job::orderBy('created_at', 'desc')->take(5)->get();
            }
            return response()->json($jobs);
        } else {
            if ($request->has('all')) {
                $jobs = Job::orderBy('created_at', 'desc')->get();
            } else {
                $jobs = Job::orderBy('created_at', 'desc')->take(5)->get();
            }
            return view('jobsThatAreRightForYou', compact('jobs'));
        }
    }
}
