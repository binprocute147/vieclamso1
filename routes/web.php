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
use App\Http\Controllers\ManageJobController;
use App\Http\Controllers\JobCategoriesbController;
use App\Http\Controllers\JobsThatAreRightForYouController;
use App\Http\Controllers\RecruiterViewProfileController;
use App\Http\Controllers\ProfileAdminController;

// route logout 
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route hiển thị dữ liệu job và job_categories
Route::get('/', [JobController::class, 'index'])->name('jobs.index');

// route tìm kiếm công việc theo địa chỉ
Route::get('/search-job', [JobController::class, 'index'])->name('searchjob');

// route hiển thị job trong view account 
Route::get('/account', [AccountController::class, 'showAccount'])->name('showAccount');
Route::get('/recruiterViewProfile', [RecruiterViewProfileController::class, 'showRecruiterViewProfile'])->name('showRecruiterViewProfile');
Route::get('/jobsThatAreRightForYou', [JobsThatAreRightForYouController::class, 'showJob'])->name('showJob');

// Routes cho admin đã đăng nhập
Route::middleware(['auth:admin', 'admin'])->group(function () {
    // route dashboard
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('showdashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // route crub , tìm kiếm user
    Route::get('/manageUser', [ManageUserController::class, 'manageUsers'])->name('admin.manageUsers');
    Route::get('/search-users', [ManageUserController::class, 'searchUsers'])->name('users.search');
    Route::post('/add-user', [ManageUserController::class, 'store'])->name('user.store');
    Route::get('editUser/{id}', [ManageUserController::class, 'edit'])->name('user.edit');
    Route::post('updateUser/{id}', [ManageUserController::class, 'update'])->name('user.update');
    Route::delete('/delete-user/{id}', [ManageUserController::class, 'deleteUser'])->name('users.delete');


    // route crub , tìm kiếm job
    Route::get('/manageJob', [ManageJobController::class, 'manageJobs'])->name('admin.manageJobs');
    Route::get('/search-jobs', [ManageJobController::class, 'searchJobs'])->name('jobs.search');
    Route::get('/addJob', [ManageJobController::class, 'addJob'])->name('addJob');
    Route::post('/addJob', [ManageJobController::class, 'storeJob'])->name('storeJob');
    Route::delete('/delete-job/{id}', [ManageJobController::class, 'deleteJob'])->name('jobs.delete');
    Route::get('editJob/{id}', [ManageJobController::class, 'edit'])->name('job.edit');
    Route::post('updateJob/{id}', [ManageJobController::class, 'update'])->name('job.update');


    // route crub , tìm kiếm categoriesjob
    Route::get('/manageCategoriesjob', [JobCategoriesbController::class, 'manageJobCategories'])->name('admin.manageJobCategories');
    Route::get('/search-jobCategories', [JobCategoriesbController::class, 'searchJobCategories'])->name('jobCategories.search');
    Route::post('/add-jobCategories', [JobCategoriesbController::class, 'store'])->name('jobCategories.store');
    Route::delete('/delete-jobCategories/{id}', [JobCategoriesbController::class, 'deleteJobCategories'])->name('jobCategories.delete');
    Route::get('editjobCategories/{id}', [JobCategoriesbController::class, 'edit'])->name('jobCategories.edit');
    Route::put('updatejobCategories/{id}', [JobCategoriesbController::class, 'update'])->name('jobCategories.update');

    // route profileAdmin
    Route::get('/profileAdmin', [ProfileAdminController::class, 'profile'])->name('admin.profile');
    Route::post('/profileAdmin/update', [ProfileAdminController::class, 'updateProfile'])->name('admin.updateProfile');
    Route::post('/profileAdmin/update-password', [ProfileAdminController::class, 'updatePassword'])->name('admin.updatePassword');
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
