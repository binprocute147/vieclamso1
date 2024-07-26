<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Http\Request;

class RecruiterViewProfileController extends Controller
{
    public function showRecruiterViewProfile()
    {
        $jobs = Job::orderBy('created_at', 'desc')->take(5)->get();
        return view('recruiterViewProfile', compact('jobs'));
    }
}
