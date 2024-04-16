<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AuthenticateMiddleware;

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

Route::get('/', [HomeController::class, 'returnViewHome'])->name('home');

/* BACKEND ROUTES */
Route::get('shop', [HomeController::class,'returnViewShop'])->name('shop.index');
Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard.index')->middleware('admin');//chi dc truy cap khi check dc da dang nhap qua mdw
/* USER */
Route::prefix('user')->group(function () {
    Route::get('logout',[AuthController::class,'logout'])->name('auth.logout');
    Route::post('login',[AuthController::class,'login'])->name('auth.login');//su dung phuong thuc login trong AuthController
    Route::get('signup-form', [AuthController::class,'returnViewSignup'])->name('signup.form');//duong dan toi chuc nang dang ky
    Route::post('signup', [AuthController::class,'signup'])->name('auth.signup');//duong dan toi chuc nang dang ky
    Route::get('login-form',[AuthController::class,'index'])->name('signin.form');//duong dan toi login form

    Route::get('reset-password',[AuthController::class,'reset_password_view'])->name('reset_password_view');
    Route::get('change-password',[AuthController::class,'returnResetPasswordView'])->name('make_new_password_view');
    Route::post('send-email-reset',[AuthController::class,'send_email_reset'])->name('send_email_reset');

    Route::get('make-new-password',[AuthController::class,'make_new_password'])->name('makeNewPass');
    Route::get('profile',[AuthController::class,'showProfile'])->name('profile');
    Route::get('confirm-email',[AuthController::class,'confirm_email'])->name('confirm_email');
});
/* ADMIN */
Route::prefix('admin')->group(function () {
    Route::get('user', [UserController::class,'index'])->name('user.index')->middleware('admin');
    /* PRODUCT */
    Route::prefix('product')->group(function () {
    Route::get('home', [ProductController::class,'index'])->name('product.crud')->middleware('admin');
    });
});
