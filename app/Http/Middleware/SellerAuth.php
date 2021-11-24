<?php

namespace App\Http\Middleware;

use Closure;

class SellerAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        if($user == null){
            return redirect('/seller/register');
        }
        else if (auth()->user()->is_seller == 1) {
            return $next($request);
        }
        else if (auth()->user()->is_seller == 2) {
            return redirect('/seller/notify');
        }
        else if (auth()->user()->is_seller == 3) {
            return redirect('/seller/approve_form');
        }
        else{
            return redirect('/login');
        }
        
    }
}
