<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product\Productlist;
use DB;
use App\Models\Admin\Product\Tags;


class ProductlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Productlist::get();
        return response()->json([ 'results' => $results ]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = [
            'checkbox' => 1,
            'items' => [
                [
                    'price' => 0,
                    'discount' => 0,
                    'qty' => 0,
                ]
            ],
        ];
        return response()->json([
            'form' => $form
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $model = new Productlist;
        $model->fill($request->except('tags','items'));
        $model->active = 1;
        $model->deleted = 0;
        $model->slug = \Str::slug($request->name);
        $model = DB::transaction(function() use ($model, $request) {
            $model->save();
            if($request->tags != null){
                foreach($request->tags as $items){
                    $tags = new Tags;
                    $tags->name = $items;
                    $tags->product_id = $model->id;
                    $tags->save();
                }
            }
            if($request->items != null){
                foreach($request->items as $product_items){
                    $products = new Productlist;
                    $products->color_id = $product_items["color_id"];
                    $products->attribute_id = $product_items["attribute_id"];
                    $products->attribute_items_id = $product_items["attribute_items_id"];
                    $products->price = $product_items["price"];
                    $products->discount = $product_items["discount"];
                    $products->qty = $product_items["qty"];
                    $products->parent_id = $model["id"];
                    $products->save();
                }
            }
            
        });
        
        dd($request);
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
