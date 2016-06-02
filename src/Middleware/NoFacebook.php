<?php

namespace Midnite81\Intercept\Middleware;

use Closure;

class NoFacebook
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

        if (preg_match('/facebookexternalhit/si',$request->header('User-Agent'))) {
            return response('No preview available');
        }

        return $next($request);
    }
}
