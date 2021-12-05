<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Admin\Product\Productlist;
use App\Models\Admin\Product\ProductCategory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cate_menu = ProductCategory::inRandomOrder()->limit(10)->get();
        \View::share('cate_menu',$cate_menu); 
        //     $product = Productlist::findOrFail($id);
          
    //     $cart = session()->get('cart', []);
  
    //     if(isset($cart[$id])) {
    //         $cart[$id]['quantity']++;
    //     } else {
    //         $cart[$id] = [
    //             "name" => $product->name,
    //             "quantity" => 1,
    //             "price" => $product->price,
    //             "image" => $product->image
    //         ];
    //     }
          
    //     session()->put('cart', $cart);
    //     return redirect()->back()->with('success', 'Product added to cart successfully!');

     }
}
