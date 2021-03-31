<?php

namespace App\Http\Controllers\Admin;

/**
 * Class UsersController
 * @package App\Http\Controllers\Admin
 */
class UsersController extends CrudController
{
    /** @var string $layout */
    protected string $layout = 'backend';

    /** @var string $modelName */
    protected string $modelName = 'App\Model\User';

    /** @var string $uriBase */
    protected string $uriBase = '/admin/users';
}
