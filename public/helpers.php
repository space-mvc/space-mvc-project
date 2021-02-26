<?php

use \SpaceMvc\Framework\Config;
use \SpaceMvc\Framework\Database;
use \SpaceMvc\Framework\Env;
use \SpaceMvc\Framework\Exception;
use \SpaceMvc\Framework\Path;
use \SpaceMvc\Framework\Request;
use \SpaceMvc\Framework\Router;
use \SpaceMvc\Framework\Session;

/**
 * pathBase
 * @return string
 */
function pathBase() : string
{
    return realpath(__DIR__.'/../');
}

/**
 * config
 * @param string $filename
 * @return Config|array
 */
function config($filename = null)
{
    $config = new Config;

    if(!empty($filename)) {
        return $config->getFile($filename);
    }

    return $config;
}

/**
 * db
 * @return Database
 */
function db() : Database
{
    return new Database;
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
 * @return Exception
 */
function exception() : Exception
{
    return new Exception();
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
    return new Request;
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
    $session = new Session;

    if(!empty($value)) {
        $session->set($key, $value);
    }

    if(!empty($key)) {
        return $session->get($key);
    }

    return new Session;
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
