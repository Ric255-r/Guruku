<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsMentor
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
        if(Auth::check()){
            if(Auth::user()->roles == 'MENTOR' && Auth::user()->status == 'SUCCESS'){
                return $next($request);
            }else{
                //return redirect('/');
                echo '<script>alert("Sedang Menunggu Konfirmasi Admin")</script>';
                echo '<script>window.location.href = "http://localhost:8000/";</script>';
            }
        }else{
            abort(403,'error action');
        }
        //return $next($request);
    }
}
