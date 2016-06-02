<?php

return [


    /**
     * The view to display if ip is not a local ip
     */
    'not-local' => 'errors.not-local',

    /**
     * A list of local approved IPs
     */
    'local_ips' => [
        '192.168.*.*'
    ],

    /**
     * The view to display if IP is not in the list
     * of approved IPs
     */
    'not-ip-authorised' => 'errors.no-ip',

    /**
     * Array of authorised IPs
     */
    'authorised_ips' => [
        '192.168.*.*'
    ],

    /**
     * The view you wish to display if facebook is trying to access
     * the page
     */
    'no-facebook' => 'errors.facebook',
];
