<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product\ProductCategory;
use App\Models\Admin\Product\Productlist;
use App\Models\Admin\Product\Color;
use App\Models\Admin\Product\Brand;
use App\Models\Admin\Product\AttributeItems;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(request('per_page') == null){
            $request->per_page = 12;
        }
        $results = Productlist::with(['items','brand','cat','items.color','items.attribute_items','gallery'])
        ->when(request('order_by') == 'default',function($q){
            $q->inRandomOrder();
        })
        ->when(request('order_by') == 'popularity',function($q){
            $q->inRandomOrder();
        })
        ->when(request('order_by') == 'latest',function($q){
            $q->OrderBy('id','desc');
        })
        ->when(request('order_by') == 'price-low',function($q){
            $q->OrderBy('price','asc');
        })
        ->when(request('order_by') == 'price-high',function($q){
            $q->OrderBy('price','desc');
        })
        ->when(request('cat'),function($q){
            $q->where('cat_id',request('cat'));
        })
        ->when(request('size'),function($q){
            $q->whereHas('items',function($query){
                $query->where('attribute_items_id',request('size'));
            });
        })
        ->when(request('color'),function($q){
            $q->whereHas('items',function($query){
                $query->where('color_id',request('color'));
            });
        })
        ->when(request('brand'),function($q){
            $q->where('brand_id',request('brand'));
        })
        ->where('parent_id',null)
        ->where('deleted',0)->where('active','1')
        ->paginate($request->per_page);

        $categories = ProductCategory::where('deleted',0)->where('active','1')->orderBy('id','desc')->limit(6)->get();
        $size = AttributeItems::orderBy('id','desc')->limit(6)->get();
        $brand = Brand::where('deleted',0)->where('active','1')->orderBy('id','desc')->limit(6)->get();
        $color = Color::where('deleted',0)->orderBy('id','desc')->limit(6)->get();

        return response()->json([ 
            'results' => $results,
            'categories' => $categories,
            'size' => $size,
            'brand' => $brand,
            'color' => $color
         ]);  
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
        $results = Productlist::with(['items','brand','cat','items.color','items.attribute_items','gallery'])
        ->where('parent_id',null)
        ->findOrFail($id);

        $product_items = Productlist::with('color','attribute_items')->where('parent_id',$id)->get();

        $colors = $product_items->pluck('color');
        $colors_code = $colors->pluck('code')->toArray();
        $colors_unique = array_unique($colors_code);

        $attribute_items = $product_items->pluck('attribute_items');
        $attribute_items_code = $attribute_items->pluck('value')->toArray();
        $attribute_items_unique = array_unique($attribute_items_code);


        return response()->json([ 
            'results' => $results,
            'colors' => $colors_unique,
            'attribute_items' => $attribute_items_unique
         ]);   
    }
    public function variation($id){

        $results = Productlist::with('color','attribute_items','brand','cat','gallery')
        ->whereHas('color',function($query){
            $query->where('code',request('color'));
        })
        ->whereHas('attribute_items',function($query){
            $query->where('value',request('attribute'));
        })
        ->where('parent_id',$id)
        ->first();

        $product_items = Productlist::with('color','attribute_items')->where('parent_id',$id)->get();

        // dd($product_items);

        $colors = $product_items->pluck('color');
        $colors_code = $colors->pluck('code')->toArray();
        $colors_unique = array_unique($colors_code);

        $attribute_items = $product_items->pluck('attribute_items');
        $attribute_items_code = $attribute_items->pluck('value')->toArray();
        $attribute_items_unique = array_unique($attribute_items_code);


        return response()->json([ 
            'results' => $results,
            'colors' => $colors_unique,
            'attribute_items' => $attribute_items_unique
         ]);   
    }
    public function attribute($id){
        if(request('color') == null || request('color') == 'null'){
            $results = Productlist::with(['items','brand','cat','items.color','items.attribute_items','gallery'])
            ->where('parent_id',null)
            ->findOrFail($id);
        }else{
            
            
            $results = Productlist::with('color','attribute_items','brand','cat','gallery')
            ->whereHas('color',function($query){
                $query->where('code',request('color'));
            })
            ->whereHas('attribute_items',function($query){
                $query->where('value',request('attribute'));
            })
            ->where('parent_id',$id)
            ->first();
        }
        

        $product_items = Productlist::with('color','attribute_items')->where('parent_id',$id)->get();

        $product_colors_filter = Productlist::with('color','attribute_items')
        ->whereHas('attribute_items',function($query){
            $query->where('value',request('attribute'));
        })
        ->where('parent_id',$id)->get();

        // dd($product_items);

        $colors = $product_colors_filter->pluck('color');
        $colors_code = $colors->pluck('code')->toArray();
        $colors_unique = array_unique($colors_code);

        $attribute_items = $product_items->pluck('attribute_items');
        $attribute_items_code = $attribute_items->pluck('value')->toArray();
        $attribute_items_unique = array_unique($attribute_items_code);


        return response()->json([ 
            'results' => $results,
            'colors' => $colors_unique,
            'attribute_items' => $attribute_items_unique
         ]);   
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
