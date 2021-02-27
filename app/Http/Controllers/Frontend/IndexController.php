<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BaseController;

/**
 * Class IndexController
 * @package App\Http\Controllers\Frontend
 */
class IndexController extends BaseController
{
    /**
     * index
     */
    public function index()
    {
        return view('frontend.index', ['key1' => 'value1']);
    }

}

