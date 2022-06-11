<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            
            if (Auth::user()->active== '1') {
                
                return $next($request);
                
            }
            else{
                Auth::logout();
                return redirect('/login')->with('primary','اکانت شما غیر فعال شده است، لطفا با پشتیبانی تماس بگیرید');
            }
        
    }
    else{
        return redirect('/login');
    }
        return $next($request);
    }
}
