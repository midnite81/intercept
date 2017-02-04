<?php

if (! function_exists('isLocal')) {

    function isLocal() {
        $ips = config('intercept.local_ips');
        $regex = app('Midnite81\Intercept\Services\RegexConverter');

        $continue = false;

        if (! empty($ips)) {
            foreach($ips as $ip) {

                if (preg_match($regex->ip4ToRegex($ip),request()->ip())) {
                    $continue = true;
                    break;
                }
            }
        }

        return $continue;
    }

}