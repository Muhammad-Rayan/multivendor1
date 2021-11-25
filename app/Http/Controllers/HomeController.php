<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = auth()->user()->id;
        return response()->json([ 'users' => $users ]); 
    }

    public function vue()
    {
        $user = auth()->user();
        if($user == null){
            return redirect('/login');
        }
        else if(auth()->user()->is_admin == 1){
            return redirect('/admin');
        }
        else if(auth()->user()->is_seller == 1){
            return redirect('/seller');
        }
        else{
            return redirect('/login');
        }
        // Redirectafter login dashboards
    }
}
