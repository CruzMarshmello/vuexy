<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Account
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
        if (!$request->user()) {
            return redirect()->route('guest.homes.index');
        } elseif (Auth::user()->role == 'Admin') {
            Auth::logout();
            return redirect()->route('guest.homes.index');
        }

        return $next($request);
    }
}
