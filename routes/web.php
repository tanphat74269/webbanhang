<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\Admin\HomeController; 
use App\Http\Controllers\Admin\CategoryController; 
use App\Http\Controllers\Admin\ProductController; 
use App\Http\Controllers\FrontendController; 
use App\Http\Controllers\CartController; 

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

// Route frontend
// FronendController để hiển thị view
Route::get('/', [FrontendController::class, 'getHome']);
Route::get('detail/{id}/{slug}.html', [FrontendController::class, 'getDetail']);
Route::post('detail/{id}/{slug}.html', [FrontendController::class, 'postComment']);
Route::get('category/{id}/{slug}.html', [FrontendController::class, 'getCategory']);
Route::get('search', [FrontendController::class, 'getSearch']);
Route::get('muangay/{id}', [FrontendController::class, 'getMuaNgay']);
Route::post('muangay/{id}', [FrontendController::class, 'postMuaNgay']);

// Những gì liên quan tới CartController
Route::group(['prefix'=>'cart'], function() {
    Route::post('add/{id}', [CartController::class, 'postAddCart']);
    Route::get('show', [CartController::class, 'getShowCart']);
    Route::get('delete/{id}', [CartController::class, 'getDeleteCart']);
    Route::get('update', [CartController::class, 'getUpdateCart']);
    Route::post('show', [CartController::class, 'postComplete']);
    Route::get('complete', [CartController::class, 'getComplete']);
});

// LoginController
Route::group(['prefix'=>'login', 'middleware'=>'CheckLogedIn'], function() {
    Route::get('/', [LoginController::class, 'getLogin']);
    Route::post('/', [LoginController::class, 'postLogin']);
});
Route::get('signup', [LoginController::class, 'getSignup']);
Route::post('signup', [LoginController::class, 'postSignup']);
Route::get('changename', [LoginController::class, 'getChangeName']);
Route::post('changename', [LoginController::class, 'postChangeName']);
Route::get('changepassword', [LoginController::class, 'getChangePass']);
Route::post('changepassword', [LoginController::class, 'postChangePass']);
Route::get('forgotpassword', [LoginController::class, 'getForgotPass']);
Route::post('forgotpassword', [LoginController::class, 'postForgotPass']);
// Nhớ mở xác minh 2 bước trên google của người gửi để ko bị lỗi, nếu lỗi hãy mở và thêm mật khẩu ứng dụng vào
Route::get('newpassword/{id}', [LoginController::class, 'getNewPassword']);
Route::post('newpassword/{id}', [LoginController::class, 'postNewPassword']);
Route::get('orderinfo', [LoginController::class, 'getOrderInfo']);

// ===========================================================================

// Route backend
Route::group(['namespace'=>'Admin'], function() {
    Route::group(['prefix'=>'admin', 'middleware'=>'CheckLogedOut'], function() {
        Route::get('home', [HomeController::class, 'getHome']);
        Route::post('home', [HomeController::class, 'postDoanhThu']);
        Route::get('changepassword', [HomeController::class, 'getChangePass']);
        Route::post('changepassword', [HomeController::class, 'postChangePass']);
        Route::group(['prefix'=>'category'], function() {
            Route::get('/', [CategoryController::class, 'getCate']);
            Route::post('/', [CategoryController::class, 'postCate']);
            Route::get('edit/{id}', [CategoryController::class, 'getEditCate']);
            Route::post('edit/{id}', [CategoryController::class, 'postEditCate']);
            Route::get('delete/{id}', [CategoryController::class, 'getDeleteCate']);
        });
        Route::group(['prefix'=>'product'], function() {
            Route::get('/', [ProductController::class, 'getProduct']);
            Route::get('add', [ProductController::class, 'getAddProduct']);
            Route::post('add', [ProductController::class, 'postAddProduct']);
            Route::get('edit/{id}', [ProductController::class, 'getEditProduct']);
            Route::post('edit/{id}', [ProductController::class, 'postEditProduct']);
            Route::get('delete/{id}', [ProductController::class, 'getDeleteProduct']);
        });
    });
    Route::get('logout', [HomeController::class, 'getLogout']); // Xài chung cho cả frontend và backend
});

