<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product\Attribute;

use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function typeahead(Request $request)
    {
        
        $results = Attribute::where('deleted',0)->where('active','1')->get();
        return response()->json([ 'results' => $results ]);   
    
    }

    public function index(Request $request)
    {
        if(request('per_page') == null){
            $request->per_page = 12;
        }
        $results = Attribute::when(request('q') ,function($q){
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
          
        ]);
        $model = new attribute;
        $model->fill($request->all());
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
            'form' => attribute::findOrFail($id)
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
           
        ]);
        $model = attribute::find($id);
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
        $model = Attribute::findorFail($id);
        $model->deleted = 1;
        $model->save();
        return response()->json([
            'deleted' => true
        ]);
    }
}
