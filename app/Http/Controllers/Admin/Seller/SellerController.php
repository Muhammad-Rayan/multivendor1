<?php

namespace App\Http\Controllers\Admin\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Seller\Seller;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if($user != null && $user->is_seller == 3){
            return view('seller.index');
        }else{
            return redirect('/login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $model = new Seller;
        $model->fill($request->all());
        $model->save();
        $user = User::findOrFail($model->id);
        $user->is_seller=2;
        $user->save();
        return redirect('/seller/notify');
    	
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
    public function message()
    {
        $user = auth()->user();
        if($user != null && $user->is_seller == 2){
            return view('seller.message');
        }else{
            return redirect('/login');
        }
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

    public function allseller(Request $request)
    {
        
        if(request('per_page') == null){
            $request->per_page = 12;
        }
        $results = Seller::when(request('q') ,function($q){
            $q->where('name','like', '%'.request('q').'%');
        })->paginate($request->per_page);
        return response()->json([ 'results' => $results ]);
    
    }
    public function show(Request $request)
    {
        
        if(request('per_page') == null){
            $request->per_page = 12;
        }
        $results = Seller::when(request('q') ,function($q){
            $q->where('name','like', '%'.request('q').'%');
        })->paginate($request->per_page);
        return response()->json([ 'results' => $results ]);
    
    }
}
