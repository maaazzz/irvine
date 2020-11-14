<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class WarehouseMiddleware
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
        if (Auth::user()->role == 1 || Auth::user()->role == 2) {
            return $next($request);
        } else {
            return redirect('/')
                ->with('status', 'you are not allowed to admin area');
        }
    }
}