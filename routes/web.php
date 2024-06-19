<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController; 
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
Route::get('/', [FrontendController::class, 'getHome']);

Route::get('detail/{id}/{slug}.html', [FrontendController::class, 'getDetail']);
Route::post('detail/{id}/{slug}.html', [FrontendController::class, 'postComment']);

Route::get('category/{id}/{slug}.html', [FrontendController::class, 'getCategory']);

Route::get('search', [FrontendController::class, 'getSearch']);

Route::group(['prefix'=>'cart'], function() {
    Route::get('add/{id}', [CartController::class, 'getAddCart']);
    Route::get('show', [CartController::class, 'getShowCart']);
    Route::post('show', [CartController::class, 'postComplete']);

    Route::get('delete/{id}', [CartController::class, 'getDeleteCart']);
    Route::get('update', [CartController::class, 'getUpdateCart']);
});

Route::get('complete', [CartController::class, 'getComplete']);


// Route backend
Route::group(['namespace'=>'Admin'], function() {
    Route::group(['prefix'=>'login', 'middleware'=>'CheckLogedIn'], function() {
        Route::get('/', [LoginController::class, 'getLogin']);
        Route::post('/', [LoginController::class, 'postLogin']);
    });
    Route::group(['prefix'=>'admin', 'middleware'=>'CheckLogedOut'], function() {
        Route::get('home', [HomeController::class, 'getHome']);

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
    Route::get('logout', [HomeController::class, 'getLogout']);
});

