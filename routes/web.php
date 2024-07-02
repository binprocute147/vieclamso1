<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvisionServer;


// route hiển thị trang index khi chạy lên đầu tiên 
Route::get('/{index?}', [ProvisionServer::class, 'page'])->name('index');
