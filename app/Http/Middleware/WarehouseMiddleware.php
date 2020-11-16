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
<<<<<<< HEAD
        if (Auth::user()->role == 1 || Auth::user()->role == 2) {
            return $next($request);
        } else {
            return redirect('/')
                ->with('status', 'you are not allowed to admin area');
=======
        if (Auth::user()->role == 1) {
            return $next($request);
        } else {
            return back()
                ->with('danger', 'You are not authorized');
>>>>>>> 3d106469a9d1b0f4a5d7b8cb313feae21b767bc5
        }
    }
}