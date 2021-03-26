<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BaseController;
use SpaceMvc\Framework\Mvc\View;

/**
 * Class IndexController
 * @package App\Http\Controllers\Frontend
 */
class IndexController extends BaseController
{
    /**
     * @return View
     * @throws \Exception
     */
    public function index()
    {
        return $this->app->getView('frontend.index', []);
    }
}

