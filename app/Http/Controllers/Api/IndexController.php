<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;

/**
 * Class IndexController
 * @package App\Http\Controllers\Api
 */
class IndexController extends BaseController
{
    /**
     * index
     */
    public function index()
    {
        echo __CLASS__.':'.__METHOD__;
    }

}
