<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Product\ProductCategoryController;
use App\Http\Controllers\Admin\Product\AttributeController;
use App\Http\Controllers\Admin\Product\BrandController;
use App\Http\Controllers\Admin\Product\ColorController;
use App\Http\Controllers\Admin\Product\InhouseproductController;
use App\Http\Controllers\Admin\Product\ProductlistController;
use App\Http\Controllers\Admin\Product\ReviewController;
use App\Http\Controllers\Admin\Product\SellerproductController;

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

Route::get('/', function () {
    return view('app');
});
Route::group(['prefix' => 'api'], function() {
    Route::group(['prefix' => 'product'], function() {
        Route::resource('/', ProductlistController::class);
        Route::resource('categories', ProductCategoryController::class);
        Route::resource('attribute', AttributeController::class);
        Route::resource('brand', BrandController::class);
        Route::resource('color', ColorController::class);
        Route::resource('inhouseproduct', InhouseproductController::class);
        Route::resource('review', ReviewController::class);
        Route::resource('sellerproduct', SellerproductController::class);
    });
});

