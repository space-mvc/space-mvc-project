<?php

use \SpaceMvc\Framework\Cache;
use \SpaceMvc\Framework\Config;
use \SpaceMvc\Framework\Database;
use \SpaceMvc\Framework\Env;
use \SpaceMvc\Framework\Exception;
use \SpaceMvc\Framework\Layout;
use \SpaceMvc\Framework\Mail;
use \SpaceMvc\Framework\Path;
use \SpaceMvc\Framework\Request;
use \SpaceMvc\Framework\Router;
use \SpaceMvc\Framework\Session;
use \SpaceMvc\Framework\View;

/**
 * pathBase
 * @return string
 */
function pathBase() : string
{
    return realpath(__DIR__.'/../');
}

/**
 * cache
 * @param string|null $key
 * @param mixed $value
 */
function cache(string $key = null, $value = null)
{
    $cache = new Cache();

    if(!empty($value)) {
        $cache->set($key, $value);
    }

    if(!empty($key)) {
        return $cache->get($key);
    }

    return $cache;
}

/**
 * config
 * @param string $filename
 * @return Config|array
 */
function config($filename = null)
{
    $config = new Config();
    $config->loadData($filename);
    return $config->get();
}

/**
 * db
 * @return Database
 */
function db() : Database
{
    return new Database();
}

/**
 * env
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function env($key = null, $default = null)
{
    $env = new Env();

    if(!empty($key)) {
        return $env->get($key, $default);
    }

    return $env;
}

/**
 * exception
 * @param null $message
 * @param null $code
 * @param string $type
 * @throws \Exception
 */
function exception($message = null, $code = null, $type = 'html') : void
{
    $exception = new Exception();

    if($type == 'html') {
        $exception->throw($message, $code);
    } else {
        $exception->throwJson($message, $code);
    }
}

/**
 * layout
 * @param string $layoutName
 * @param View $view
 * @param array $params
 * @return Layout
 */
function layout(string $layoutName, View $view, array $params = []) : Layout
{
    return new Layout($layoutName, $view, $params);
}

/**
 * mailer
 * @return Mail
 */
function mailer() : Mail
{
    return new Mail();
}

/**
 * path
 * @param string $key
 * @return Path|string
 */
function path($key = '')
{
    $path = new Path();

    if(!empty($key)) {
        return $path->get($key);
    }

    return new Path();
}

/**
 * request
 * @return Request
 */
function request() : Request
{
    return new Request();
}

/**
 * router
 * @return Router
 */
function router() : Router
{
    return new Router(new Request());
}

/**
 * session
 * @param string $key
 * @param mixed $value
 * @return Session
 */
function session($key = null, $value = null)
{
    $session = new Session();

    if(!empty($value)) {
        $session->set($key, $value);
    }

    if(!empty($key)) {
        return $session->get($key);
    }

    return new Session();
}

/**
 * view
 * @param string $viewName
 * @param array $params
 * @return View
 * @throws \Exception
 */
function view(string $viewName, array $params = []) : View
{
    return new View($viewName, $params);
}

/**
 * dump
 * @param array $data
 * @param false $exit
 */
function dump($data = [], $exit = false)
{
    print '<pre>';
    print_r($data);
    print '</pre>';

    if($exit) {
        exit;
    }
}
