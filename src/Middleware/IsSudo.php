<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SudoUser
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
        $isSudo = false;
        if (Auth::check()) {
            if (Auth::user()->is_sudo) {
                $isSudo = true;
            }
        } else {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('account/login');
            }
        }

        if (! $isSudo) {
            return view('errors.not-sudo');
        }

        return $next($request);
    }
}
