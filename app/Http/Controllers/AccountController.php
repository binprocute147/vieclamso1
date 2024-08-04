<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\CV;

class AccountController extends Controller
{
    public function showAccount(Request $request)
    {
        // Lấy danh sách công việc mới nhất
        $jobs = Job::orderBy('created_at', 'desc')->take(5)->get();
        
        // Lấy CV của người dùng hiện tại
        $user = Auth::user();
        $cv = CV::where('user_id', $user->id)->get();
        
        return view('account', compact('jobs', 'cv'));
    }
}
