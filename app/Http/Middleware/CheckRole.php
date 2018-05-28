<?php

namespace Tonic\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (auth()->check() && ! $request->user()->hasRole($role)) {
            abort(404);
        }

        return $next($request);
    }
}
