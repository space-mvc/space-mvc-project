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
    public function index()
    {
        $this->app->getCache()->set('custom-key', '123');

        dump($this->app->getCache()->get('custom-key'), 1);
    }




//    /**
//     * index
//     */
//    public function index()
//    {
//        $results = User::select()->get();
//        dump($results, 1);
//
//        //return view('frontend.index', ['key1' => 'value1']);
//    }

}

