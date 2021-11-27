<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
        // if(auth()->user()->is_admin == 1){
            $results = User::with(['user_info','products','orders.items'])->findOrFail(auth()->user()["id"]);
        //     $data = [
        //         'total_products' => $results->products->count(),
        //         'total_seller' => $results->is_seller->count(),
        //         'total_orders' => $results->orders->count(),
        //         'total_Category' => $results->category->count(),
                
        //     ];
        //     $results["data"] = $data;
        // }
        // else{
        //     $results = User::with(['user_info','products','orders.items'])->findOrFail(auth()->user()->id);
        //     $data = [
        //         'total_products' => count($results->products),
        //         'total_seller' => $results->is_seller->count(),
        //         'total_orders' => $results->orders->count(),
        //         'total_Category' => $results->category->count(),
                
        //     ];
        //     $results["data"] = $data;
        // }
        
        //     dd($results);
            return response()->json([ 'results' => $results ]);
    }
}
