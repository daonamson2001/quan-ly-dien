<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // var_dump('1');die;
        if(Auth::check()){
            // var_dump(Auth::check());die;
            return $next($request);
        }else{
            // var_dump(Auth::check());die;
            return redirect(route('login'));
        }
    }
}
