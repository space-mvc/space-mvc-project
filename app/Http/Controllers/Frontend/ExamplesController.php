<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BaseController;

/**
 * Class ExamplesController
 * @package App\Http\Controllers\Frontend
 */
class ExamplesController extends BaseController
{
    /**
     * assets
     */
    public function assets()
    {
        // asset add
        $this->app->getAsset()->add('css', '/assets/css/file.css');
        $this->app->getAsset()->add('js', '/assets/js/file.js');

        // asset get
        dump($this->app->getAsset()->get());

        // assets render
        dump(htmlentities($this->app->getAsset()->render('css')));
        dump(htmlentities($this->app->getAsset()->render('js')));
    }

    /**
     * cache
     */
    public function cache()
    {
        // cache set
        $this->app->getCache()->set('custom-key-1', 'value 1');
        $this->app->getCache()->set('custom-key-2', ['key1' => 'value1']);

        // cache get
        dump($this->app->getCache()->get('custom-key-1'));
        dump($this->app->getCache()->get('custom-key-2'));

        // delete,
        $this->app->getCache()->delete('custom-key-1');

        // clear
        $this->app->getCache()->clear();
    }

    /**
     * config
     */
    public function config()
    {
        dump($this->app->getConfig()->get('app')['databases']);
        dump($this->app->getConfig()->get('paths'));
    }

    /**
     * env
     */
    public function env()
    {
        dump($this->app->getEnv()->get('DB_HOSTNAME'));
        dump($this->app->getEnv()->get('DB_USERNAME'));
    }

    /**
     * exceptions
     * @throws \Exception
     */
    public function exceptions()
    {
        $this->app->getException()->throwJson('page not found', 404);
        $this->app->getException()->throw('page not found', 404);
    }

    /**
     * session
     * @throws \Exception
     */
    public function session()
    {
        $this->app->getSession()->set('test', 'value');
        dump($this->app->getSession()->get('test'));
        dump($this->app->getSession()->get());
    }
}

