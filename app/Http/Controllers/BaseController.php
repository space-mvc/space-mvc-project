<?php

namespace App\Http\Controllers;

use SpaceMvc\Framework\Space;

/**
 * Class BaseController
 * @package App\Http\Controllers
 */
class BaseController
{
    /** @var Space $app */
    protected Space $app;

    /** @var string $layout */
    protected string $layout = 'frontend';

    /**
     * BaseController constructor.
     * @param Space $app
     */
    public function __construct(Space $app)
    {
        $this->app = $app;
    }

    /**
     * getLayout
     * @return string
     */
    public function getLayout() : string
    {
        return $this->layout;
    }
}
