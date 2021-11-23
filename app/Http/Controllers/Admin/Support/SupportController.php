<?php

namespace App\Http\Controllers\Admin\Support;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Support\Support;
use App\Models\Admin\Support\Item;


class SupportController extends Controller
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
        $results = Support::with(['customer'])
        ->when(request('q') ,function($q){
            $q->where('name','like', '%'.request('q').'%');
        })->paginate($request->per_page);
        return response()->json([ 'results' => $results ]);
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
        $results = Support::with(['customer','items'])->findOrFail($id);
        return response()->json([ 'results' => $results ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $results = new Item;
        $support = new Support;
        $results->description = $request->description;
        $results->reply_by = auth()->user()->id;
        $support->status = $request->status;
        $results->support_id = $id;
        $results->customer_id = $request->customer_id;

        if($request->image != null){
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('productgallery'), $imageName);
            $model->image = $imageName;
        }

        $results->save();
        $support->save();

        $supportData = Support::with(['customer','items'])->findOrFail($id);

        return response()->json([ 'results' => $supportData, 'saved' => true ]);
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
