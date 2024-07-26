<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Job;

class AccountController extends Controller
{
    public function showAccount(Request $request)
    {
        $jobs = Job::orderBy('created_at', 'desc')->take(5)->get();
        return view('account', compact('jobs'));
    }

}
