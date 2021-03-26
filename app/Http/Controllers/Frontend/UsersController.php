<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BaseController;
use SpaceMvc\Framework\Mvc\View;

/**
 * Class UsersController
 * @package App\Http\Controllers\Frontend
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
        return $this->app->getView('frontend.index', []);
    }
}

