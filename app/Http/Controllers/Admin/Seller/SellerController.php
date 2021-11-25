<?php

namespace App\Http\Controllers\Admin\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Seller\Seller;
use App\Models\User;
use DB;

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
        if(auth()->user()->is_admin == 1){
            if(request('per_page') == null){
                $request->per_page = 12;
            }
            $results = User::with('user_info')->when(request('q') ,function($q){
                $q->where('name','like', '%'.request('q').'%');
            })->where('is_seller','!=',null)->paginate($request->per_page);
            return response()->json([ 'results' => $results ]);
        }else{
            return redirect()->back();
        }
        
    
    }
    public function show(Request $request , $id)
    {
        
        if(auth()->user()->is_admin == 1){
            $results = User::with(['user_info','products','orders.items'])->findOrFail($id);
            $data = [
                'total_products' => $results->products->count(),
                'total_orders' => $results->orders->count(),
                'successful_order' =>  User::with(['orders'])->whereHas('orders',function($q){
                    $q->where('delivery_status','Approved');
                })->count(),
                'total_earning' => 0,
            ];
            $results["data"] = $data;
            // dd($results);
            return response()->json([ 'results' => $results ]);
        }else{
            return redirect()->back();
        }
    
    }
    public function approve(Request $request)
    {
        $id = request('id');
        $update_seller = User::findOrFail($id);
        $update_seller->is_seller = 1;
        $update_seller->save();
        
        if(request('per_page') == null){
            $request->per_page = 12;
        }
        $results = User::with('user_info')->when(request('q') ,function($q){
            $q->where('name','like', '%'.request('q').'%');
        })->where('is_seller','!=',null)->paginate($request->per_page);
        return response()->json([ 'results' => $results ]);
    }
}
