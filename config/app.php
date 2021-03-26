<?php

use SpaceMvc\Framework\Library\Env;
$env = new Env;

return [
    'app' => [
        'name'=> $env->get('APP_NAME', 'SpaceMvc'),
        'url' => $env->get('APP_URL', 'http://localhost'),
    ],
    'cache' => [
        'redis' => [
            'hostname' => $env->get('REDIS_HOSTNAME', '127.0.0.1'),
            'port' => $env->get('REDIS_PORT', 6379),
            'database' => $env->get('REDIS_DATABASE', 1)
        ]
    ],
    'databases' => [
        'mysql' => [
            'hostname' => $env->get('DB_HOSTNAME', '127.0.0.1'),
            'port' => $env->get('DB_PORT', 3306),
            'username' => $env->get('DB_USERNAME', 'root'),
            'password' => $env->get('DB_PASSWORD', ''),
            'database' => $env->get('DB_DATABASE', 'space_mvc'),
        ]
    ],
];
