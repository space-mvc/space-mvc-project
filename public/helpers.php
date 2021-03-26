<?php

use SpaceMvc\Framework\Library\Path;

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

/**
 * pathBase
 * @return string
 */
function pathBase() : string
{
    return realpath(__DIR__.'/../');
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
