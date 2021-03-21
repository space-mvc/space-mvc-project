<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BaseController;
use App\Model\User;

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
        $results = User::select()->get();
        dump($results, 1);

        //return view('frontend.index', ['key1' => 'value1']);
    }

}

