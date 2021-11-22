<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Product\ProductCategoryController;
use App\Http\Controllers\Admin\Product\AttributeController;
use App\Http\Controllers\Admin\Product\AttributeItemsController;
use App\Http\Controllers\Admin\Product\BrandController;
use App\Http\Controllers\Admin\Product\ColorController;
use App\Http\Controllers\Admin\Product\InhouseproductController;
use App\Http\Controllers\Admin\Product\ProductlistController;
use App\Http\Controllers\Admin\Product\ReviewController;
use App\Http\Controllers\Admin\Product\SellerproductController;
use App\Http\Controllers\Frontend\Auth\AuthController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Refund\RefundController;
use App\Http\Controllers\Admin\Support\SupportController;

use App\Http\Controllers\Admin\Seller\SellerController;

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

Route::get('/admin', function () {
    return view('app');
});
Route::group(['prefix' => 'api'], function() {
    Route::group(['prefix' => 'product'], function() {
        
        Route::resource('/', ProductlistController::class);
        Route::get('/{id}/edit', [ProductlistController::class,'edit']);
        Route::post('/{id}/update', [ProductlistController::class,'update']);
        Route::post('/{id}/delete', [ProductlistController::class,'destroy']);
        Route::resource('categories', ProductCategoryController::class);
        Route::post('categories/{id}/delete', [ProductCategoryController::class,'destroy']);
        Route::resource('attribute', AttributeController::class);
        Route::post('attribute/{id}/delete', [AttributeController::class,'destroy']);
        Route::resource('brand', BrandController::class);
        Route::post('brand/{id}/delete', [BrandController::class,'destroy']);
        Route::resource('color', ColorController::class);
        Route::post('color/{id}/delete', [ColorController::class,'destroy']);
        Route::resource('inhouseproduct', InhouseproductController::class);
        Route::resource('review', ReviewController::class);
        Route::resource('sellerproduct', SellerproductController::class);
        Route::resource('attributeitem', AttributeItemsController::class);
    });
    Route::group(['prefix' => 'order'], function() {
        Route::get('/inhouseorder',[OrderController::class,'inhouse']);
        Route::get('/sellerorder',[OrderController::class,'seller']);
        Route::get('/pickuporder',[OrderController::class,'pickup']);
     
        Route::get('/{id}', [OrderController::class,'show']);
        Route::post('/{id}/update', [OrderController::class,'update']);
        Route::resource('/', OrderController::class);
      
    });
    Route::group(['prefix' => 'refund'], function() {
        Route::get('/{id}', [RefundController::class,'show']);
        Route::resource('/', RefundController::class);
        
      
    });
    Route::group(['prefix' => 'seller'], function() {
        Route::resource('/',SellerController::class);
        
      
    });
    Route::group(['prefix' => 'support'], function() {
        Route::get('/{id}', [SupportController::class,'show']);
        Route::resource('/', SupportController::class);
        
      
    });
});

Route::group(['prefix' => '/'], function() {
        Route::resource('login', AuthController::class);	
    	Route::post('/login-data', [AuthController::class, 'show'])->name('login-data');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('{vue?}', [App\Http\Controllers\HomeController::class, 'vue'])->where('vue', '[\/\w\.-]*');