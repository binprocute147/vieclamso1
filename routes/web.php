<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvisionServer;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadCVController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\JobController;

// route logout 
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route hiển thị dữ liệu job và job_categories
Route::get('/', [JobController::class, 'index'])->name('jobs.index');

// route tìm kiếm công việc theo địa chỉ
Route::get('/search-job', [JobController::class, 'index'])->name('searchjob');

// route hiển thị job trong view account 
Route::get('/account', [AccountController::class, 'showJob'])->name('showJob');


// route hiển thị trang index khi chạy lên đầu tiên 
Route::get('/{index?}', [ProvisionServer::class, 'page'])->name('index');


Route::group(['middleware' => 'guest'], function () {

    // route login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    // route đăng ký 
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});


// route cập nhật thông tin tài khoản
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::put('/profile/picture/update', [ProfileController::class, 'updateProfilePicture'])
    ->name('profile.picture.update');

// route đổi mật khẩu
Route::post('/changepassword', [ProfileController::class, 'changePassword'])->name('change.password');

//route cv
Route::middleware(['auth'])->group(function () {
    Route::post('/upload-cv', [UploadCVController::class, 'store'])->name('cv.store');
    //Route::get('/account', [AccountController::class, 'showAccount'])->name('account');
    Route::post('/cv/update', [UploadCVController::class, 'update'])->name('cv.update');
    Route::delete('/cv/destroy', [UploadCVController::class, 'destroy'])->name('cv.destroy');
});
