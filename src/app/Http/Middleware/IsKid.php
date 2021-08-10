<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsKid
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
        if(Auth::user()->type == 'admin' || Auth::user()->type == 'user' || Auth::user()->type == 'kid'){
            return $next($request);
        }
        return redirect()->route('dashboard.index');
    }
}
