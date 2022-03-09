<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessControlList
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
        if (!$request->user() || !$request->user()->email_verified_at || $request->user()->role != 'Admin' || $request->user()->status == 'Blocked' || $request->user()->status == 'Deactivated') {
            return redirect()->route('admin.authentications.index');
        }

        $permission = $request->route()->action['permission'];

        if (gettype($permission) == 'array') {
            if ($request->user()->hasPermission($permission[0]) || $request->user()->hasPermission($permission[1]) || $request->user()->hasPermission($permission[2]) || $request->user()->hasPermission($permission[3])) {
                return $next($request);
            }
        } else {
            if ($request->user()->hasPermission($permission)) {
                return $next($request);
            }
        }

        return redirect()->route('admin.dashboards.index');
    }
}
