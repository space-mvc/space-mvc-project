<?php

return [
    [
        'name' => 'error.404',
        'uri' => '/error-404',
        'controller' => \App\Http\Controllers\Errors\Error404Controller::class,
        'action' => 'index',
    ]
];
