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
    [
        'name' => 'admin.users.edit',
        'uri' => '/admin/users/{id}/edit',
        'controller' => \App\Http\Controllers\Admin\UsersController::class,
        'action' => 'edit',
    ],
    [
        'name' => 'admin.users.update',
        'uri' => '/admin/users/{id}/update',
        'method' => 'PUT',
        'controller' => \App\Http\Controllers\Admin\UsersController::class,
        'action' => 'update',
    ],
    [
        'name' => 'admin.users.delete',
        'uri' => '/admin/users/{id}/delete',
        'controller' => \App\Http\Controllers\Admin\UsersController::class,
        'action' => 'delete',
    ],
    [
        'name' => 'admin.users.destroy',
        'uri' => '/admin/users/{id}/destroy',
        'method' => 'DELETE',
        'controller' => \App\Http\Controllers\Admin\UsersController::class,
        'action' => 'destroy',
    ],
];
