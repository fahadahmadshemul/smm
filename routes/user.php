<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\JobController;
use App\Http\Controllers\User\AdsController;
use App\Http\Controllers\Admin\NoticeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth'])->prefix('dashboard')->group(function(){
    Route::get('verify-user', [UserController::class, 'verify'])->name('verify-user');
    Route::post('verify-user', [UserController::class, 'verified'])->name('verify.user');

    Route::get('post-job', [JobController::class, 'index'])->name('post-job');
    Route::get('get-sub-location/{id}', [JobController::class, 'get_sub_location'])->name('get-sub-location');
    Route::get('get-sub-category/{id}', [JobController::class, 'get_sub_category'])->name('get-sub-category');
    Route::post('save-post-job', [JobController::class, 'save_job'])->name('save-post-job');

    Route::get('ads', [AdsController::class, 'index'])->name('ads');
    Route::post('save-ads', [AdsController::class, 'save'])->name('save-ads');

    Route::get('notice', [NoticeController::class, 'show'])->name('notice');

    Route::get('change-my-password', [UserController::class, 'change_my_password'])->name('change-my-password');
    Route::post('update-my-password', [UserController::class, 'update_my_password'])->name('update-my-password');
});
