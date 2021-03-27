<?php

return [
    [
        'name' => 'admin.users.index',
        'uri' => '/admin/users',
        'controller' => \App\Http\Controllers\Admin\UsersController::class,
        'action' => 'index',
    ],
    [
        'name' => 'admin.users.create',
        'uri' => '/admin/users/create',
        'controller' => \App\Http\Controllers\Admin\UsersController::class,
        'action' => 'create',
    ],
    [
        'name' => 'admin.users.store',
        'uri' => '/admin/users/create',
        'method' => 'POST',
        'controller' => \App\Http\Controllers\Admin\UsersController::class,
        'action' => 'store',
    ],
];
