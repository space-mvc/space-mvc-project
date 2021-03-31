<?php

require_once 'public/helpers.php';

$config = require_once 'config/app.php';
$mysql = $config['databases']['mysql'];

return
    [
        'paths' => [
            'migrations' => './database/migrations',
            'seeds' => './database/seeds'
        ],
        'environments' => [
            'default_migration_table' => 'migrations',
            'default_environment' => 'development',
            'production' => [
                'adapter' => 'mysql',
                'host' => 'localhost',
                'name' => 'database',
                'user' => 'root',
                'pass' => '',
                'port' => '3306',
                'charset' => 'utf8',
            ],
            'development' => [
                'adapter' => 'mysql',
                'host' => $mysql['hostname'],
                'name' => $mysql['database'],
                'user' => $mysql['username'],
                'pass' => $mysql['password'],
                'port' => '3306',
                'charset' => 'utf8',
            ],
            'testing' => [
                'adapter' => 'mysql',
                'host' => 'localhost',
                'name' => 'testing_db',
                'user' => 'root',
                'pass' => '',
                'port' => '3306',
                'charset' => 'utf8',
            ]
        ],
        'version_order' => 'creation'
    ];
