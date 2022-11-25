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
use \Modules\Admin\Http\Controllers\AdminController;
use \Modules\Auth\Http\Controllers\AuthController;


Route::group(['middleware' => ['auth']], function () {
    Route::Resource('roles', 'RoleController');
    Route::resource('admins','AdminController');
    Route::put('/admin/{admin}/changePassword', [AdminController::class, 'changePassword'])->name('changePassword');
});

