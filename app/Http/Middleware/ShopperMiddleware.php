<?php

namespace App\Http\Middleware;

use Closure;

class ShopperMiddleware
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
        if (auth()->user()->role == 3) {
            return $next($request);
        } else {
            return back()
                ->with('danger', 'You are not authorized');
        }
    }
}