<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class isVendor
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
        if (Auth::user()) {
            if(Auth::user()->user_type == "V" || Auth::user()->user_type == "R" || Auth::user()->user_type == "CH"){
               return $next($request);
            }else{
               Auth::logout();
               return Redirect::to('admin/login'); 
            }
        }else{
            Auth::logout();
            return Redirect::to('admin/login');
        }  
    }
}
