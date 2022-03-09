<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LocaleMiddleware
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
        $availLocale=['en'=>'en', 'th'=>'th'];

        if (session()->has('locale') && array_key_exists(session()->get('locale'), $availLocale)) {
            app()->setLocale(session()->get('locale'));
        } else {
            session()->put('locale', 'en');
        }

        return $next($request);
    }
}
