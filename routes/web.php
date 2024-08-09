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
use App\Http\Controllers\JobDetailsController;
use App\Http\Controllers\CvTemplateController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\AdminController;

// route logout 
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route hiển thị dữ liệu job và job_categories
Route::get('/', [JobController::class, 'index'])->name('jobs.index');

// route tìm kiếm công việc theo địa chỉ
Route::get('/search-job', [JobController::class, 'index'])->name('searchjob');

// route hiển thị job trong view account 
Route::get('/account', [AccountController::class, 'showAccount'])->name('showAccount');

// route hiển thị job trong view recruiterViewProfile 
Route::get('/recruiterViewProfile', [RecruiterViewProfileController::class, 'showRecruiterViewProfile'])->name('showRecruiterViewProfile');

// route hiển thị job trong view jobsThatAreRightForYou 
Route::get('/jobsThatAreRightForYou', [JobsThatAreRightForYouController::class, 'showJob'])->name('showJob');

// route hiển thị chi tiết công việc khi click vào tên các công việc phù hợp
Route::get('/jobDetails/{slug}', [JobsThatAreRightForYouController::class, 'showJobDetail']);

// route hiển thị chi tiết công việc 
Route::get('/jobDetails/{slug}', [JobDetailsController::class, 'showJobDetail']);

// route hiển thị job trong view JobDetailsController 
Route::get('/jobDetails', [JobDetailsController::class, 'showViewJobDetail'])->name('showJobDetail');

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

    // route crub, tìm kiếm , phân quyền manageAdmin
    Route::get('/manageAdmin', [AdminController::class, 'manageAdmins'])->name('admin.manageAdmins');
    Route::get('/search-admins', [AdminController::class, 'searchAdmins'])->name('admins.search');
    Route::post('/add-admin', [AdminController::class, 'store'])->name('admin.store');
    Route::get('editAdmin/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('updateAdmin/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/delete-admin/{id}', [AdminController::class, 'delete'])->name('admin.delete');
    Route::post('updateAdminPermissions/{admin}', [AdminController::class, 'updateAdminPermissions'])->name('admin.updatePermissions');
});

// route cv 
Route::get('/templatesCv', [CvTemplateController::class, 'showTemplates'])->name('cv.templates');
Route::get('/create-from-template/{templateName}', [CvTemplateController::class, 'createCvFromTemplate'])->name('cv.createFromTemplate');

// route lưu cv
Route::post('/cv/store', [CvController::class, 'store'])->name('cv.stores');

// route sửa cv
Route::post('/cv/updateCv', [CvController::class, 'updateCv'])->name('cv.updates');
// route lấy dữ liệu hiển thị vào modal cv
Route::get('/cv/{id}', [CVController::class, 'getCvById']);
// route xóa cv 
Route::delete('/cv/destroy/{id}', [CvController::class, 'destroy'])->name('cv.destroy');

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
    Route::get('/account', [AccountController::class, 'showAccount'])->name('account');
    Route::post('/cv/update', [UploadCVController::class, 'update'])->name('cv.update');
    Route::delete('/cv/destroy', [UploadCVController::class, 'destroy'])->name('cv.delete');
});
