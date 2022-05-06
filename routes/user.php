<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\JobController;

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
});
