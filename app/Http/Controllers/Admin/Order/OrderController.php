<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Order\Order;


class OrderController extends Controller
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
        $results = Order::with(['items','customer'])
        ->when(request('q') ,function($q){
            $q->where('name','like', '%'.request('q').'%');
        })->paginate($request->per_page);
        return response()->json([ 'results' => $results ]);
    }
    public function inhouse(Request $request)
    {
        if(request('per_page') == null){
            $request->per_page = 12;
        }
        $results = Order::with(['items','customer'])
        ->when(request('q') ,function($q){
            $q->where('name','like', '%'.request('q').'%');
        })->where('order_type',1)->paginate($request->per_page);
        return response()->json([ 'results' => $results ]);
    }
    public function seller(Request $request)
    {
        if(request('per_page') == null){
            $request->per_page = 12;
        }
        $results = Order::with(['items','customer'])
        ->when(request('q') ,function($q){
            $q->where('name','like', '%'.request('q').'%');
        })->where('order_type',3)->paginate($request->per_page);
        return response()->json([ 'results' => $results ]);
    }
    public function pickup(Request $request)
    {
        if(request('per_page') == null){
            $request->per_page = 12;
        }
        $results = Order::with(['items','customer'])
        ->when(request('q') ,function($q){
            $q->where('name','like', '%'.request('q').'%');
        })->where('order_type',2)->paginate($request->per_page);
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
        $results = Order::with(['items.product','customer'])->findOrFail($id);
        // dd($results);
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
        $update = Order::where('id',$id)->first();
        $update->delivery_status = $request->delivery_status;
        $update->payment_status = $request->payment_status;
        $update->save();

        $results = Order::with(['items.product','customer'])->findOrFail($id);

        return response()->json([
            'saved' => true,
            'results' => $results 
        ]);
    }
    public function delivery_status(Request $request, $id)
    {
        
        
    }
    public function payment_status(Request $request, $id)
    {
        $results = Order::where('id',$id)->first();
        $results->payment_status = $request->delivery_status;
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
        //
    }
}
