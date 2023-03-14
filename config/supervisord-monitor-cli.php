<?php

return [
    'protocol' => 'https',
    'host' => env('SUPERVISORD_MONITOR_HOST', ''),
    'path' => env('SUPERVISORD_MONITOR_PATH', ''),
    'basic_auth' => [
        'username' => env('SUPERVISORD_MONITOR_BASIC_AUTH_USERNAME', ''),
        'password' => env('SUPERVISORD_MONITOR_BASIC_AUTH_PASSWORD', ''),
    ],
    'daemon_names' => env('SUPERVISORD_MONITOR_DAEMON_NAMES', ''),
];
