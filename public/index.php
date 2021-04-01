<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
require_once 'helpers.php';
require_once '../app/Http/Middleware/Bootstrap.php';

new \App\Http\Middleware\Bootstrap();

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

try {
    new \SpaceMvc\Framework\Space();
} catch (\Exception $e) {
    $html = $whoops->handleException($e);
    echo $html;
    exit;
}


