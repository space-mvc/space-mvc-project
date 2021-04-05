<?php

return [
    [
        'name' => 'frontend.home',
        'uri' => '/',
        'controller' => \App\Http\Controllers\Frontend\IndexController::class,
        'action' => 'index',
    ],
    [
        'name' => 'frontend.examples.assets',
        'uri' => '/examples/assets',
        'controller' => \App\Http\Controllers\Frontend\ExamplesController::class,
        'action' => 'assets',
    ],
    [
        'name' => 'frontend.examples.cache',
        'uri' => '/examples/cache',
        'controller' => \App\Http\Controllers\Frontend\ExamplesController::class,
        'action' => 'cache',
    ],
    [
        'name' => 'frontend.examples.config',
        'uri' => '/examples/config',
        'controller' => \App\Http\Controllers\Frontend\ExamplesController::class,
        'action' => 'config',
    ],
    [
        'name' => 'frontend.examples.env',
        'uri' => '/examples/env',
        'controller' => \App\Http\Controllers\Frontend\ExamplesController::class,
        'action' => 'env',
    ],
    [
        'name' => 'frontend.examples.exceptions',
        'uri' => '/examples/exceptions',
        'controller' => \App\Http\Controllers\Frontend\ExamplesController::class,
        'action' => 'exceptions',
    ],
    [
        'name' => 'frontend.examples.session',
        'uri' => '/examples/session',
        'controller' => \App\Http\Controllers\Frontend\ExamplesController::class,
        'action' => 'session',
    ]
];
