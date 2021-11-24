<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Auth\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;


    public function redirectTo() {
        $user = auth()->user();
        if($user->is_admin == 1 && $user->is_admin != null){
            
            $this->redirectTo = '/admin';
            return $this->redirectTo;
        }
        else if($user->is_seller == 1){
            
            $this->redirectTo = '/seller';
            return $this->redirectTo;
        }
        else if($user->is_seller == 2){
            
            $this->redirectTo = '/seller/notify';
            return $this->redirectTo;
        }
        else if(auth()->user()->is_seller == 3){
            $this->redirectTo = '/seller/approve_form';
            return $this->redirectTo;
        }else{
            $this->redirectTo = '/login';
            return $this->redirectTo;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    
}
