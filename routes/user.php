<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\JobController;
use App\Http\Controllers\User\AdsController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\User\DepositController;
use App\Http\Controllers\User\WithDrawController;
use App\Http\Controllers\User\MyWorkController;

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
    Route::get('/', [JobController::class, 'find_job'])->name('find-job');
    Route::get('verify-user', [UserController::class, 'verify'])->name('verify-user');
    Route::post('verify-user', [UserController::class, 'verified'])->name('verify.user');

    Route::get('post-job', [JobController::class, 'index'])->name('post-job');
    Route::get('get-sub-location/{id}', [JobController::class, 'get_sub_location'])->name('get-sub-location');
    Route::get('get-sub-category/{id}', [JobController::class, 'get_sub_category'])->name('get-sub-category');
    Route::post('save-post-job', [JobController::class, 'save_job'])->name('save-post-job');
    Route::get('my-job', [JobController::class, 'my_job'])->name('my-job');
    Route::get('my-job-details/{id}', [JobController::class, 'my_job_details'])->name('my-job-details');
    Route::get('pause-user-job/{id}', [JobController::class, 'pause_user_job'])->name('pause-user-job');
    Route::get('resume-user-job/{id}', [JobController::class, 'resume_user_job'])->name('resume-user-job');
    
    Route::get('job/{id}', [JobController::class, 'job'])->name('job');
    Route::get('job-proves/{id}', [JobController::class, 'job_proves'])->name('job-proves');

    Route::get('ads', [AdsController::class, 'index'])->name('ads');
    Route::post('save-ads', [AdsController::class, 'save'])->name('save-ads');

    Route::get('notice', [NoticeController::class, 'show'])->name('notice');

    Route::get('change-my-password', [UserController::class, 'change_my_password'])->name('change-my-password');
    Route::post('update-my-password', [UserController::class, 'update_my_password'])->name('update-my-password');

    Route::get('manual-deposit', [DepositController::class, 'manual_deposit'])->name('manual-deposit');
    Route::post('save-deposit', [DepositController::class, 'save_deposit'])->name('save-deposit');

    Route::get('wallet', [WithDrawController::class, 'wallet'])->name('wallet');
    Route::get('get-user-amount', [WithDrawController::class, 'get_user_amount'])->name('get-user-amount');
    Route::post('save-withdraw', [WithDrawController::class, 'save_withdraw'])->name('save-withdraw');
    Route::get('withdraw-history', [WithDrawController::class, 'withdraw_history'])->name('withdraw-history');
    Route::get('deposit-history', [WithDrawController::class, 'deposit_history'])->name('deposit-history');
    
    Route::post('save-work/{id}', [MyWorkController::class, 'save'])->name('save-work');
    Route::get('work', [MyWorkController::class, 'work'])->name('work');
    Route::get('work-accepted', [MyWorkController::class, 'work_accepted'])->name('work-accepted');
    Route::get('satisfy-all/{id}', [MyWorkController::class, 'satisfy_all'])->name('satisfy-all');
    Route::get('job-proves/get-my-work-by-id/{id}', [MyWorkController::class, 'get_my_work'])->name('get-my-work-by-id');
    Route::post('save-satisfy', [MyWorkController::class, 'save_satisfy'])->name('save-satisfy');
});
