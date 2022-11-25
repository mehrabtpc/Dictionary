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
use Modules\Dictionary\Http\Controllers\Admin\DictionaryController;
use Modules\Dictionary\Http\Controllers\Blade\DictionaryController as BladeDictionaryController;

Route::group(['middleware' => 'auth'], function()
{
    Route::delete('panel-dictionaries/multipleDelete', [DictionaryController::class,'multipleDelete'])
        ->name('panel-dictionaries.multipleDelete');

    Route::resource('panel-dictionaries', DictionaryController::class);
});


Route::get('dictionaries/',[BladeDictionaryController::class,'index'])
    ->name('dictionaries.index');


Route::get('asdf',[BladeDictionaryController::class,'show'])
    ->name('asdf.index');
