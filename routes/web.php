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
        Route::resource('categories', ProductCategoryController::class);
        Route::resource('attribute', AttributeController::class);
        Route::resource('brand', BrandController::class);
        Route::resource('color', ColorController::class);
        Route::resource('inhouseproduct', InhouseproductController::class);
        Route::resource('review', ReviewController::class);
        Route::resource('sellerproduct', SellerproductController::class);
        Route::resource('attributeitem', AttributeItemsController::class);
    });
});

Route::group(['prefix' => '/test'], function() {
        Route::resource('login', AuthController::class);	
    	Route::post('/login-data', [AuthController::class, 'show'])->name('login-data');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
