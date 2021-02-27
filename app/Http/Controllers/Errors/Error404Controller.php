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
    public function index() : void
    {
        echo '<span style="font-family:arial;">error 404 - page not found</span>';
        exit;
    }

}