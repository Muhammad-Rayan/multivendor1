<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product\Productlist;
use DB;
use App\Models\Admin\Product\Tags;
use App\Models\Admin\Product\GalleryImage;


class ProductlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // dd(request());
        if(request('per_page') == null){
            $request->per_page = 12;
        }
        if(auth()->user()->is_admin == 1){
            $results = Productlist::with(['items.color'])
            ->when(request('q') ,function($q){
                $q->where('name','like', '%'.request('q').'%');
            })->where('deleted',0)->where('active','1')->paginate($request->per_page);
        }else{
            $results = Productlist::when(request('q') ,function($q){
                $q->where('name','like', '%'.request('q').'%');
            })->where('deleted',0)->where('active','1')->where('user_id',auth()->user()->id)->paginate($request->per_page);
        }
        
        
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
        // if($request->items != null){
        //     foreach($request->items as $product_items){
        //         $color_id[] = $product_items["color_id"];
        //         $attribute_items_id[] = $product_items["attribute_items_id"];
        //         $attribute_id[] = $product_items["attribute_id"];
        //     }
        //     $color_result = array_unique($color_id);
        //     $attr_item_result = array_unique($attribute_items_id);
        //     $attr_result = array_unique($attribute_id);
        //     dd($color_result);
        // }
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'cat_id' => 'required',
            'brand_id' => 'required',
            'barcode' => 'required',
            
        ]);
        $model = new Productlist;
        $model->fill($request->except('tags','items'));
        $model->active = 1;
        $model->deleted = 0;
        $model->user_id = auth()->user()->id;
        $model->slug = \Str::slug($request->name);
        if($request->capture_image != null){
            $imageName = uniqid().'.'.$request->capture_image->getClientOriginalExtension();
            $request->capture_image->move(public_path('productgallery'), $imageName);
            $model->capture_image = $imageName;
        }
        if($request->meta_image != null){
            $imageName = uniqid().'.'.$request->meta_image->getClientOriginalExtension();
            $request->meta_image->move(public_path('meta_gallery'), $imageName);
            $model->meta_image = $imageName;
        }
        $model = DB::transaction(function() use ($model, $request) {
            $model->save();
            if($request->gallery_image != null){
                foreach($request->gallery_image as $gallery_img){
                    $gallery_image = new GalleryImage;
                    $imageName = uniqid().'.'.$gallery_img->getClientOriginalExtension();
                    $gallery_img->move(public_path('meta_gallery'), $imageName);
                    $gallery_image->image = $imageName;
                    $gallery_image->product_id = $model->id;
                    $gallery_image->save();
                }
            }
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
                    $imageName = uniqid().'.'.$product_items["capture_image"]->getClientOriginalExtension();
                    $product_items["capture_image"]->move(public_path('productgallery'), $imageName);
                    $products->capture_image = $imageName;

                    $products->name = $model["name"];
                    $products->cat_id = $model["cat_id"];
                    $products->brand_id = $model["brand_id"];
                    $products->gallery_id = $model["gallery_id"];
                    $products->description = $model["description"];
                    $products->user_id = $model["user_id"];
                    $products->short_description = $model["short_description"];

                    $products->save();
                }
            }
            
        });
        
        return response()->json([
            'saved' => true,
        ]);
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
        ->where('parent_id',$id)
        ->get();


        $product = Productlist::
        where('parent_id',null)
        ->findOrFail($id);

        $colors = $results->pluck('color');
        $colors_code = $colors->pluck('code')->toArray();
        $colors_unique = array_unique($colors_code);

        $attribute_items = $results->pluck('attribute_items');
        $attribute_items_code = $attribute_items->pluck('value')->toArray();
        $attribute_items_unique = array_unique($attribute_items_code);

        return response()->json([ 
            'results' => $results,
            'colors' => $colors_unique,
            'attribute_items' => $attribute_items_unique,
            'product' => $product
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
        if(auth()->user()->is_admin == 1){
            $form = Productlist::with(['items.color','items.attribute','items.attribute_items','tags','cat','brand','color'])->findorFail($id);
        }else{
            $form = Productlist::with(['items.color','items.attribute','items.attribute_items','tags','cat','brand','color'])
            ->where('user_id',auth()->user()->id)
            ->findorFail($id);
        }
        return response()->json([
            'form' => $form
        ]);
        
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
        $model = Productlist::findorFail($id);
        $model->fill($request->except('tags','items'));
        $model->active = 1;
        $model->deleted = 0;
        $model->slug = \Str::slug($request->name);
        if($request->capture_image != null){
            if($request->capture_image != $model->capture_image){
                $imageName = uniqid().'.'.$request->capture_image->getClientOriginalExtension();
                $request->capture_image->move(public_path('productgallery'), $imageName);
                $model->capture_image = $imageName;
            }
            
        }
        if($request->meta_image != null){
            if($request->meta_image != $model->meta_image){
                $imageName = uniqid().'.'.$request->meta_image->getClientOriginalExtension();
                $request->meta_image->move(public_path('meta_gallery'), $imageName);
                $model->meta_image = $imageName;
            }
        }
        $model = DB::transaction(function() use ($model, $request,$id) {
            $model->save();
            if($request->gallery_image != null){
                
                    
                    $delete_gallery_image = GalleryImage::where('product_id',$id)->delete();
                    
                foreach($request->gallery_image as $gallery_img){
                    $gallery_image = new GalleryImage;
                    
                    $imageName = uniqid().'.'.$gallery_img->getClientOriginalExtension();
                    $gallery_img->move(public_path('meta_gallery'), $imageName);
                    $gallery_image->image = $imageName;
                    $gallery_image->product_id = $model->id;
                    $gallery_image->save();
                   
                }
            }
            $model->updateHasMany([
                'tags' => $request->tags,
                'items' => $request->items
            ]);
            // if($request->tags != null){
            //     foreach($request->tags as $items){
            //         $tags = Tags::findorFail($id);
            //         $tags->name = $items;
            //         $tags->product_id = $model->id;
            //         $tags->save();
            //     }
            // }
            // if($request->items != null){
            //     foreach($request->items as $product_items){
            //         $products = Productlist::findorFail($id);
            //         $products->color_id = $product_items["color_id"];
            //         $products->attribute_id = $product_items["attribute_id"];
            //         $products->attribute_items_id = $product_items["attribute_items_id"];
            //         $products->price = $product_items["price"];
            //         $products->discount = $product_items["discount"];
            //         $products->qty = $product_items["qty"];
            //         $products->parent_id = $model["id"];
            //         $imageName = uniqid().'.'.$product_items["capture_image"]->getClientOriginalExtension();
            //         $product_items["capture_image"]->move(public_path('productgallery'), $imageName);
            //         $products->capture_image = $imageName;
            //         $products->save();
            //     }
            // }
            
        });
        
        return response()->json([
            'saved' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->is_admin == 1){
            $model = Productlist::where('user_id',auth()->user()->id)->findorFail($id);
        }else{

        }
        $model->deleted = 1;
        $model->save();

        return response()->json([
            'deleted' => true
        ]);
    }
}
