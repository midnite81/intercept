<?php

namespace Midnite81\Intercept\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class NoCache
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
         return $next($request)->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
                               ->header('Cache-Control', 'post-check=0, pre-check=0', false)
                               ->header('Pragma', 'no-cache');
    }
    
    
}
