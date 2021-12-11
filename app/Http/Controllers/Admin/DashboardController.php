<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Product\Productlist;
use App\Models\Admin\Order\Order;
use App\Models\Admin\Refund\Refund;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app');
    }

    public function frontend()
    {
        return view('frontend_app');
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
    public function show()
    {
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

    public function dashboard()
    {
        $admin = User::with(['user_info','products','orders.items'])
        ->where('is_admin',auth()->user()->is_admin)->get();
        

        if(auth()->user()->is_admin == 1){
            $data = [
                'total_products' => Productlist::where('parent_id',null)->count(),
                'total_sellers' => User::where('is_seller',1)->count(),
                'total_users' => User::where('is_user',1)->count(),
                'total_orders' => Order::count(),
                'pending_refund' => Refund::where('status',1)->count(),
                'approve_refund' => Refund::where('status',2)->count(),
                'cancel_refund' => Refund::where('status',0)->count(),
                'paid_order' => Order::where('payment_status','Paid')->sum('amount'),
                'unpaid_order' => Order::where('payment_status','Unpaid')->sum('amount'),
                'is_admin' => 1,
                
            ];
            
            $results["data"] = $data;
        }
    
        else{
            $data = [
                'total_products' => Productlist::with('user')
                ->whereHas('user', function($q){
                    $q->where('is_seller',1)->where('id',auth()->user()->id);
                })
                ->where('parent_id',null)->count(),
                'total_orders' => Order::with('customer')
                ->whereHas('customer', function($q){
                    $q->where('is_seller',1)->where('id',auth()->user()->id);
                })
                ->count(),
                'pending_refund' => Refund::with('customer')
                ->whereHas('customer', function($q){
                    $q->where('is_seller',1)->where('id',auth()->user()->id);
                })
                ->where('status',1)->count(),
                'approve_refund' => Refund::with('customer')
                ->whereHas('customer', function($q){
                    $q->where('is_seller',1)->where('id',auth()->user()->id);
                })
                ->where('status',2)->count(),
                'cancel_refund' => Refund::with('customer')
                ->whereHas('customer', function($q){
                    $q->where('is_seller',1)->where('id',auth()->user()->id);
                })
                ->where('status',0)->count(),
                'paid_order' => Order::with('customer')
                ->whereHas('customer', function($q){
                    $q->where('is_seller',1)->where('id',auth()->user()->id);
                })
                ->where('payment_status','Paid')->sum('amount'),
                'unpaid_order' => Order::with('customer')
                ->whereHas('customer', function($q){
                    $q->where('is_seller',1)->where('id',auth()->user()->id);
                })
                ->where('payment_status','Unpaid')->sum('amount'),
                'is_seller' => 1,
                
            ];
            $results["data"] = $data;
        }
        
        //     dd($results);
            return response()->json([ 'results' => $results ]);
    }
}
