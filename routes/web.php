<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AdminJobController;
use App\Http\Controllers\User\AdsController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\AdminDepositController;
use App\Http\Controllers\Admin\AdminWithDrawController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::prefix('users')->group(function(){
    Route::get('login', [SiteController::class, 'login'])->name('user.login');
    Route::get('register', [SiteController::class, 'register'])->name('user.register');
    Route::post('save-register', [SiteController::class, 'save_register'])->name('save-register');
});

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('page/{slug}', [SiteController::class, 'page'])->name('page');

Route::get('dashboard/', [AdminController::class, 'index'])->name('admin');
Route::middleware(['auth', 'admin'])->prefix('dashboard')->group(function(){
    
    Route::get('location', [LocationController::class, 'index'])->name('location');
    Route::post('save-location', [LocationController::class, 'save_location'])->name('save-location');
    Route::get('edit-location/{id}', [LocationController::class, 'edit_location'])->name('edit-location');
    Route::post('update-location', [LocationController::class, 'update_location'])->name('update-location');
    Route::get('delete-location/{id}', [LocationController::class, 'delete_location'])->name('delete-location');
    Route::post('save-sub-location', [LocationController::class, 'save_sub_location'])->name('save-sub-location');
    Route::get('edit-sub-location/{id}', [LocationController::class, 'edit_sub_location'])->name('edit-sub-location');
    Route::post('update-sub-location', [LocationController::class, 'update_sub_location'])->name('update-sub-location');
    Route::get('delete-sub-location/{id}', [LocationController::class, 'delete_sub_location'])->name('delete-sub-location');

    Route::get('category', [CategoryController::class, 'index'])->name('category');
    Route::post('save-category', [CategoryController::class, 'save_category'])->name('save-category');
    Route::get('edit-category/{id}', [CategoryController::class, 'edit_category'])->name('edit-category');
    Route::post('update-category', [CategoryController::class, 'update_category'])->name('update-category');
    Route::get('delete-category/{id}', [CategoryController::class, 'delete_category'])->name('delete-category');
    Route::post('save-sub-category', [CategoryController::class, 'save_sub_category'])->name('save-sub-category');
    Route::get('edit-sub-category/{id}', [CategoryController::class, 'edit_sub_category'])->name('edit-sub-category');
    Route::post('update-sub-category', [CategoryController::class, 'update_sub_category'])->name('update-sub-category');
    Route::get('delete-sub-category/{id}', [CategoryController::class, 'delete_sub_category'])->name('delete-sub-category');

    Route::get('all-user', [UserController::class, 'index'])->name('all-user');
    Route::get('change-user-password/{id}', [UserController::class, 'change_password'])->name('change-user-password');
    Route::post('update-user-password/{id}', [UserController::class, 'update_password'])->name('update-user-password');
    Route::get('active-user/{id}', [UserController::class, 'active'])->name('active-user');
    Route::get('block-user/{id}', [UserController::class, 'block'])->name('block-user');

    Route::get('setting', [SettingController::class, 'setting'])->name('setting');
    Route::post('setting/update', [SettingController::class, 'setting_update'])->name('setting.update');

    Route::get('all-job', [AdminJobController::class, 'all_job'])->name('all-job');
    Route::get('change-password', [AdminController::class, 'change_password'])->name('change-password');
    Route::post('update-password', [AdminController::class, 'update_password'])->name('update-password');
    Route::get('pending-job', [AdminJobController::class, 'pending_job'])->name('pending-job');
    Route::get('approved-job', [AdminJobController::class, 'approved_job'])->name('approved-job');
    Route::get('paused-job', [AdminJobController::class, 'paused_job'])->name('paused-job');
    Route::get('completed-job', [AdminJobController::class, 'completed_job'])->name('completed-job');


    Route::get('approve-job/{id}', [AdminJobController::class, 'approve_job'])->name('approve-job');
    Route::get('pause-job/{id}', [AdminJobController::class, 'pause_job'])->name('pause-job');

    Route::get('pending-advertisement', [AdsController::class, 'pending'])->name('pending-advertisement');
    Route::get('all-advertisement', [AdsController::class, 'all'])->name('all-advertisement');
    Route::get('approve-ads/{id}', [AdsController::class, 'approve'])->name('approve-ads');

    Route::get('notices', [NoticeController::class, 'index'])->name('notices');
    Route::post('update-notice', [NoticeController::class, 'update'])->name('update-notice');

    Route::get('add-page', [PageController::class, 'add'])->name('add-page');
    Route::post('save-page', [PageController::class, 'save'])->name('save-page');
    Route::get('all-page', [PageController::class, 'show'])->name('all-page');
    Route::get('edit-page/{id}', [PageController::class, 'edit'])->name('edit-page');
    Route::post('update-page/{id}', [PageController::class, 'update'])->name('update-page');
    Route::get('delete-page/{id}', [PageController::class, 'delete'])->name('delete-page');

    Route::get('payment-method', [PaymentMethodController::class, 'index'])->name('payment-method');
    Route::get('add-payment-method', [PaymentMethodController::class, 'add'])->name('add-payment-method');
    Route::post('save-payment-method', [PaymentMethodController::class, 'save'])->name('save-payment-method');
    Route::get('edit-payment-method/{id}', [PaymentMethodController::class, 'edit'])->name('edit-payment-method');
    Route::post('update-payment-method/{id}', [PaymentMethodController::class, 'update'])->name('update-payment-method');
    Route::get('delete-payment-method/{id}', [PaymentMethodController::class, 'delete'])->name('delete-payment-method');

    Route::get('pending-deposit', [AdminDepositController::class, 'pending_deposit'])->name('pending-deposit');
    Route::get('approve-deposit', [AdminDepositController::class, 'approve_deposit'])->name('approve-deposit');
    Route::get('all-deposit', [AdminDepositController::class, 'all_deposit'])->name('all-deposit');
    Route::get('make-apporve-deposit/{id}', [AdminDepositController::class, 'make_approve_deposit'])->name('make-apporve-deposit');
    Route::get('deline-deposit/{id}', [AdminDepositController::class, 'decline_deposit'])->name('deline-deposit');

    Route::get('all-withdraw', [AdminWithDrawController::class, 'all_withdraw'])->name('all-withdraw');
    Route::get('pending-withdraw', [AdminWithDrawController::class, 'pending_withdraw'])->name('pending-withdraw');
    Route::get('completed-withdraw', [AdminWithDrawController::class, 'completed_withdraw'])->name('completed-withdraw');
    Route::get('complete-withdraw/{id}', [AdminWithDrawController::class, 'complete_withdraw'])->name('complete-withdraw');
    
});