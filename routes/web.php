<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\ReviewController;
// use App\Http\Controllers\HomeController;


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

Route::get('/', [FrontendController::class,'index'])->name('frontend');
Route::get('category/{slug}',[FrontendController::class,'viewcate']); 
Route::get('brand-list', [FrontendController::class,'brand']);
Route::get('brand/{slug}', [FrontendController::class,'viewprods']);
Route::get('product-list', [FrontendController::class,'product']);
Route::get('product-detail/{prod_slug}', [FrontendController::class,'viewdetail']);
Route::get('search', [FrontendController::class,'search']);


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('count-cart', [CartController::class,'countItems']);
Route::post('add-to-cart', [CartController::class,'addProd']);
Route::post('del-cart-item', [CartController::class,'delCartItem']);
Route::post('update-cart', [CartController::class,'updateCart']);

Route::middleware(['auth'])->group(function(){

    Route::get('cart', [CartController::class,'viewcart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('order',[CheckoutController::class, 'order']);
    Route::get('my-orders', [UserController::class,'index']);
    Route::post('cancel-order/{id}', [UserController::class,'cancel']);
    Route::get('view-order-detail/{id}', [UserController::class,'view']);
    Route::get('write-review/{prod_slug}', [ReviewController::class,'index']);
    Route::post('add-review','Frontend\ReviewController@addrw');
    Route::get('edit-review/{prod_slug}', [ReviewController::class,'edit']);
    Route::put('update-review',[ReviewController::class,'update']);
});


Route::middleware(['auth','isAdmin'])->group(function () {
    
    // Route::get('/dashboard', 'Admin\FrontendController@index');
    
    Route::get('members', 'Admin\FrontendController@members');
    Route::get('del-member/{id}', 'Admin\FrontendController@delmember');

    
    Route::get('categories', 'Admin\CategoryController@index');
    Route::get('add-category', 'Admin\CategoryController@add');
    Route::post('insert-category', 'Admin\CategoryController@insert');
    Route::get('edit-category/{id}', [CategoryController::class,'edit']);
    Route::post('update-category/{id}', [CategoryController::class,'update']);
    Route::get('del-category/{id}', 'Admin\CategoryController@destroy');

    Route::get('products', 'Admin\ProductController@index');
    Route::get('add-product', 'Admin\ProductController@add');
    Route::post('insert-product', 'Admin\ProductController@insert');
    Route::get('edit-product/{id}', [ProductController::class,'edit']);
    Route::put('update-product/{id}', [ProductController::class,'update']);
    Route::get('del-product/{id}', 'Admin\ProductController@destroy');

    Route::get('brands', 'Admin\BrandController@index');
    Route::get('add-brand', 'Admin\BrandController@add');
    Route::post('insert-brand', 'Admin\BrandController@insert');
    Route::get('edit-brand/{id}', [BrandController::class,'edit']);
    Route::post('update-brand/{id}', [BrandController::class,'update']);
    Route::get('del-brand/{id}', 'Admin\BrandController@destroy');

    Route::get('orders', 'Admin\OrderController@index');
    Route::get('order-detail/{id}', 'Admin\OrderController@detail');
    Route::put('update-order/{id}','Admin\OrderController@update');
    Route::get('orders-history', 'Admin\OrderController@history');
    Route::get('canceled-orders','Admin\OrderController@cancel');

    Route::get('review','Admin\FrontendController@review' );
    Route::get('del-review/{id}', 'Admin\FrontendController@delreview');

});



