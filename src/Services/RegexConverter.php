<?php

namespace Midnite81\Intercept\Services;

class RegexConverter
{

    /**
     * Convert IP4 string to regex
     * 
     * @param $ip
     * @return bool|string
     */
    public function ip4ToRegex($ip)
    {
        $ip = explode('.', $ip);

        $regex = [];

        if (count($ip) <> 4) {
            return false;
        }

        if (! empty($ip) && count($ip) == 4) {
            foreach($ip as $part) {
                if (is_numeric($part) or preg_match('/^\d{1,3}$/', $part)) {
                    $regex[] = $part;
                }
                if (is_string($part) and $part == "*") {
                    $regex[] = "\d{1,3}";
                }
            }
        }

        $ipPattern = implode('\.', $regex);

        return "/^" . $ipPattern . "$/";
    }
    
}