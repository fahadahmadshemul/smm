<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;

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

Route::middleware(['auth'])->prefix('dashboard')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin');
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
});