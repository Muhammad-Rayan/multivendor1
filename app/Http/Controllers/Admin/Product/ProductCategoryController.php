<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Models\Admin\Product\ProductCategory;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function typeahead(Request $request)
    {
        $results = ProductCategory::where('deleted',0)->where('active','1')->get();
        return response()->json([ 'results' => $results ]);
    }

    public function index(Request $request)
    {
        if(request('per_page') == null){
            $request->per_page = 12;
        }
        $results = ProductCategory::when(request('q') ,function($q){
            $q->where('name','like', '%'.request('q').'%');
        })->where('deleted',0)->where('active','1')->paginate($request->per_page);
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
            'name' => null,
            'type' => null,
            'meta_title' => null
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
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'meta_title' => 'required',
        ]);
        $model = new ProductCategory;
        $model->fill($request->all());
        $model->active = 1;
        $model->deleted = 0;
        if($request->image != null){
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('product_category'), $imageName);
            $model->image = $imageName;
        }
        $model->save();
        return response()->json([
            'saved' => true,
            'id' => $model->id,
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
        return response()->json([
            'form' => ProductCategory::findOrFail($id)
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
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);
        $model = ProductCategory::find($id);
        $model->fill($request->all());
        $model->save();
        return response()->json([
            'saved' => true,
            'id' => $model->id,
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
        $model = ProductCategory::findorFail($id);
        $model->deleted = 1;
        $model->save();
        return response()->json([
            'deleted' => true
        ]);

    }
}
