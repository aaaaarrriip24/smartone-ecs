<?php

namespace App\Http\Middleware;

use Closure;
use Alert;
use Auth;

class IsStaff {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->roleuser == 'Staff') {
            return $next($request);
        }

        Alert::error('error', "You don't have access.");
        return redirect()->back();
    }
}
