<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use App\Transaction;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        // if(Auth::user()->roles == 'ADMIN')
        // {
        //     return $next($request);
        // }
        // else
        // {
        //     return redirect('/users');
        // }

        if(Auth::check()){
            if(Auth::user()->roles == 'ADMIN'){
                return $next($request);
            }else{
                return redirect('/');
            }
        }else{
            abort(403,'error action');
        }
    }
}
