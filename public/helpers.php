<?php

use \SpaceMvc\Framework\Config;
use \SpaceMvc\Framework\Database;
use \SpaceMvc\Framework\Env;
use \SpaceMvc\Framework\Path;
use \SpaceMvc\Framework\Request;
use \SpaceMvc\Framework\Router;

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
    return new Router;
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
