<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product\ProductCategory;
use App\Models\Admin\Product\Productlist;

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
        $categwise1 = Productlist::where('cat_id',1)->limit(8)->orderby('updated_at','desc')->get();
        $categwise2= Productlist::where('cat_id',2)->limit(8)->orderby('updated_at','desc')->get();
        $categwise3= Productlist::where('cat_id',3)->limit(8)->orderby('updated_at','desc')->get();
        $seller = Seller::limit(10)->orderby('id','desc')->get();
        
        return view('frontend.pages.index',compact('top_category','new_seller','best_seller',
        'most_popular','featured','categwise1','categwise2','categwise3','seller'));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
