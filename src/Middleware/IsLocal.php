<?php

namespace Midnite81\Intercept\Middleware;

use Closure;
use Midnite81\Intercept\Services\RegexConverter;

class IsLocal
{
    public function __construct(RegexConverter $regexConverter)
    {
        $this->regex = $regexConverter;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ips = config('intercept.local_ips');
        
        $continue = false; 

        if (! empty($ips)) {
            foreach($ips as $ip) {
                
                if (preg_match($this->regex->ip4ToRegex($ip),$request->ip())) {
                    $continue = true; 
                    break; 
                }
            }
        }
        
        if (! $continue) {
            return response()->view(config('intercept.not-local'), ['ip' => $request->ip()]);
        }

        return $next($request);
    }
}
