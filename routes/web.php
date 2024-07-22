<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvisionServer;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadCVController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageUserController;

// route logout 
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route hiển thị dữ liệu job và job_categories
Route::get('/', [JobController::class, 'index'])->name('jobs.index');

// route tìm kiếm công việc theo địa chỉ
Route::get('/search-job', [JobController::class, 'index'])->name('searchjob');

// route hiển thị job trong view account 
Route::get('/account', [AccountController::class, 'showJob'])->name('showJob');

// Routes cho admin đã đăng nhập
Route::middleware(['auth:admin', 'admin'])->group(function () {
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // route hiển thị dữ liệu user cho trang manageUser
    Route::get('/manageUser', [ManageUserController::class, 'manageUsers'])->name('admin.manageUsers');

    // Route cho tìm kiếm user
    Route::get('/search-users', [ManageUserController::class, 'searchUsers'])->name('users.search');

    // route thêm user
    Route::post('/add-user', [ManageUserController::class, 'store'])->name('user.store');
    // Hiển thị trang chỉnh sửa người dùng
    Route::get('editUser/{id}', [ManageUserController::class, 'edit'])->name('user.edit');
    // Xử lý cập nhật người dùng
    Route::post('updateUser/{id}', [ManageUserController::class, 'update'])->name('user.update');

    // Route cho xóa user
    Route::delete('/delete-user/{id}', [ManageUserController::class, 'deleteUser'])->name('users.delete');
});

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
