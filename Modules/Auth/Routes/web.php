<?php

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

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;

Route::get('login', [AuthController::class, 'index'])->name('login');;
Route::post('login', [AuthController::class, 'login'])->name('appLogin')->middleware('throttle:login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/profile', [AuthController::class,'show'])->name('showProfile');
    Route::get('/admin/{admin}', [AuthController::class,'edit'])->name('edit-profile');
    Route::put('/admin/{admin}/update', [AuthController::class,'update'])->name('update-profile');
    Route::put('/admin/{admin}/updatePassword', [AuthController::class,'updatePassword'])->name('update-password');

    Route::get('/admin/{admin}/editProfileImage', [AuthController::class,'editProfileImage'])->name('editProfileImage');
    Route::put('/admin/{admin}/updateProfileImage', [AuthController::class,'updateProfileImage'])->name('updateProfileImage');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
