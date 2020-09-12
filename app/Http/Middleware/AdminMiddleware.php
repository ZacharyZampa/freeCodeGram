<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if ($request->user() && $request->user()->role != 'admin') {
            // user is not admin, do not allow entry
            abort(404);  // return 404 to even hide that page exists
        }

        // user is admin -- allow entry
        return $next($request);
    }
}
