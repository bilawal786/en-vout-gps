<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\Profile\ProfileController;
use App\Http\Controllers\Backend\Profile\ChangePasswordController;
use App\Http\Controllers\Backend\Users\UserController;
use App\Http\Controllers\Backend\Roles\RoleController;
use App\Http\Controllers\Backend\Setting\SettingController;
use App\Http\Controllers\Backend\Dashboard\DashboardController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', [FrontendController::class, 'index']);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('dashboard', DashboardController::class);
    Route::post('/change/password', [ChangePasswordController::class, 'store'])->name('password.change');
});
