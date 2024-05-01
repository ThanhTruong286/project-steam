<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Middleware\LibraryMiddleware;
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
Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard.index')->middleware('admin');//chi dc truy cap khi check dc da dang nhap qua mdw
Route::get('search', [HomeController::class,'search'])->name('search');
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
    // USER PROFILE
    Route::get('profile',[AuthController::class,'showProfile'])->name('profile');
    Route::get('confirm-email',[AuthController::class,'confirm_email'])->name('confirm_email');
    // SHOW LIBRARY
    Route::get('library',[AuthController::class,'user_library'])->name('game.library')->middleware('user');
    Route::get('library/game',[AuthController::class,'library_game'])->name('library.game')->middleware(LibraryMiddleware::class);
});
Route::get('product-detail', [ProductController::class,'product_detail'])->name('product.detail');

/* ADMIN */
Route::prefix('admin')->group(function () {
    Route::get('user', [UserController::class,'index'])->name('user.index')->middleware('admin');
    /* PRODUCT */

    Route::prefix('product')->group(function () {
    Route::get('home', [ProductController::class,'index'])->name('product.index')->middleware('admin');
    /* CRUD PRODUCT */
    Route::get('add-form', [ProductController::class,'add_form'])->name('product.add.form')->middleware('admin');
    Route::post('add', [ProductController::class,'add'])->name('product.add')->middleware('admin');
    Route::get('edit-form', [ProductController::class,'edit_form'])->name('product.edit.form')->middleware('admin');
    Route::post('edit', [ProductController::class,'edit'])->name('product.edit')->middleware('admin');
    Route::get('delete', [ProductController::class,'delete'])->name('product.delete')->middleware('admin');
});
    // CRUD CATEGORIES
    Route::prefix('category')->group(function () {
        Route::get('home', [CategoryController::class,'home'])->name('category.crud')->middleware('admin');
        Route::get('add-form', [CategoryController::class,'add_form'])->name('category.add.form')->middleware('admin');
        Route::post('add', [CategoryController::class,'add'])->name('category.add')->middleware('admin');
        Route::get('edit-form', [CategoryController::class,'edit_form'])->name('category.edit.form')->middleware('admin');
        Route::post('edit', [CategoryController::class,'edit'])->name('category.edit')->middleware('admin');
        Route::get('delete', [CategoryController::class,'delete'])->name('category.delete')->middleware('admin');
        });
/* WEB CONTENT*/
    Route::get('web-banner', [ProductController::class,'banner'])->name('web.banner')->middleware('admin');

});
/* CART */

Route::get('add-to-cart/{product_id}', [CartController::class,'add'])->name('add.to.cart')->middleware('cart');
Route::get('cart', [CartController::class,'show_cart'])->name('show.cart')->middleware('cart');
Route::get('update-cart', [CartController::class,'updateCart'])->name('update.cart')->middleware('cart');
Route::get('delete-cart/{product_id}',[CartController::class,'delete'])->name('delete.cart')->middleware('cart');
Route::get('add-to-library', [CartController::class,'add_to_library'])->name('add.to.library')->middleware('cart');
/* CATEGORY */
Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class,'index'])->name('category.home');
});
// ORTHER
Route::get('trending', [CategoryController::class,'trending'])->name('category.trending');
Route::get('most-played', [CategoryController::class,'most_play'])->name('category.most.play');
Route::get('session', [HomeController::class,'session'])->name('session');
Route::post('online-checkout', [CartController::class,'online_checkout'])->name('payment');
Route::get('thanks', [CartController::class,'thanks'])->name('thanks');
Route::get('contact', [HomeController::class,'contact'])->name('contact');


