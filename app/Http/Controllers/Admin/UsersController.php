<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Model\User;
use SpaceMvc\Framework\Library\Request;
use SpaceMvc\Framework\Mvc\View;

/**
 * Class UsersController
 * @package App\Http\Controllers\Admin
 */
class UsersController extends BaseController
{
    /** @var string $layout */
    protected string $layout = 'backend';

    /**
     * index
     * @return View
     */
    public function index() : View
    {
        $users = User::select()->get();

        return $this->app->getView('backend.users.index', [
            'users' => $users
        ]);
    }

    /**
     * create
     * @return View
     */
    public function create() : View
    {
        return $this->app->getView('backend.users.create');
    }

    /**
     * store
     * @return View
     */
    public function store() : View
    {
        /** @var Request $post */
        $request = $this->app->getRequest();

        /** @var User $user */
        $user = User::create($request->post());

        // redirect to /admin/users
        header('Location: /admin/users', 0);
    }
}
