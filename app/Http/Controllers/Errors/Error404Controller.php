<?php

namespace App\Http\Controllers\Errors;

use App\Http\Controllers\BaseController;

/**
 * Class Error404Controller
 * @package App\Http\Controllers\Errors
 */
class Error404Controller extends BaseController
{
    /**
     * index
     */
    public function index()
    {
        echo __CLASS__.':'.__METHOD__;
    }

}