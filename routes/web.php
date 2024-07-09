<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvisionServer;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadCVController;

// route logout 
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// route hiển thị trang index khi chạy lên đầu tiên 
Route::get('/{index?}', [ProvisionServer::class, 'page'])->name('index');

// route login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// route đăng ký 
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// route cập nhật thông tin tài khoản
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::put('/profile/picture/update', [ProfileController::class, 'updateProfilePicture'])
    ->name('profile.picture.update');

//upload cv
Route::middleware(['auth'])->group(function () {
    Route::post('/upload-cv', [UploadCVController::class, 'store'])->name('cv.store');
});

