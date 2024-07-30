<?php

namespace App\Http\Middleware;

use Closure;
use Alert;
use Auth;

class IsSuperAdmin {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->roleuser == 'SuperAdmin') {
            return $next($request);
        }

        Alert::error('error', "You don't have super admin access.");
        return redirect()->back();
    }
}
