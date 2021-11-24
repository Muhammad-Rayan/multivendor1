<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuth
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
            return redirect('/login');
        }
        else if (auth()->user()->is_admin == 1) {
            return $next($request);
        }else{
            return redirect('/login');
        }
        
    }
}
