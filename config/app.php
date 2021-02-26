<?php

return [
    'app' => [
        'name'=> env('APP_NAME', 'SpaceMvc'),
        'url' => env('APP_URL', 'http://localhost'),
    ],
    'cache' => [
        'redis' => [
            'hostname' => env('REDIS_HOSTNAME', '127.0.0.1'),
            'port' => env('REDIS_PORT', 11211),
        ]
    ],
    'databases' => [
        'mysql' => [
            'hostname' => env('DB_HOSTNAME', '127.0.0.1'),
            'port' => env('DB_PORT', 3306),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'database' => env('DB_DATABASE', 'space_mvc'),
        ]
    ],
];
