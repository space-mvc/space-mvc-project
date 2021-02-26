<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
require_once 'helpers.php';

$space = new \SpaceMvc\Framework\Space();
$space->getException()->throwJson('test', 400);

//dump($response, 1);
