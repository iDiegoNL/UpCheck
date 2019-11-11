<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Debugbar;

class DebugBarMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->id() == 1) {
            \Debugbar::enable();
        } else {
            \Debugbar::disable();
        }

        return $next($request);
    }
}
