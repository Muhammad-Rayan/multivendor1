<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product\ProductCategory;
use App\Models\Admin\Product\Productlist;
use App\Models\Admin\Product\Brand;
use App\Models\Admin\Seller\Seller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $top_category = ProductCategory::where('top_category',1)->limit(8)->orderby('updated_at','desc')->get();
        $new_seller = Productlist::limit(10)->orderby('id','desc')->get();
        $best_seller = Productlist::limit(10)->orderby('id','asc')->get();
        $most_popular = Productlist::limit(10)->orderby('updated_at','desc')->get();
        $featured = Productlist::where('featured',1)->limit(10)->orderby('updated_at','desc')->get();
        $categwise1 = Productlist::where('cat_id',25)->limit(8)->orderby('updated_at','desc')->get();
        $categwise2= Productlist::where('cat_id',24)->limit(8)->orderby('updated_at','desc')->get();
        $categwise3= Productlist::where('cat_id',23)->limit(8)->orderby('updated_at','desc')->get();
        $seller = Seller::limit(10)->orderby('id','desc')->get();
        $brand = Brand::limit(10)->orderby('id','desc')->get();
        
        return view('frontend.pages.index',compact('top_category','new_seller','best_seller',
        'most_popular','featured','categwise1','categwise2','categwise3','seller','brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    public function userdashboard()
    {
        return view('frontend.pages.dashboard');
    }
    public function order()
    {
        return view('frontend.pages.order');
    }
    public function accountdetail()
    {
        return view('frontend.pages.accountdetail');
    }

    public function cart()
    {
        return view('cart');
    }
    public function userlogin()
    {
      
        return view('frontend.pages.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Productlist::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
