<?php

$config = [
    'base' => realpath(__DIR__.'/../'),
];

return [
    'configs' => $config['base'].'/config',
    'layouts' => $config['base'].'/resources/layouts',
    'logs' => $config['base'].'/storage/logs',
    'models' => $config['base'].'/app/Model',
    'public' => $config['base'].'/public',
    'routes' => $config['base'].'/routes',
    'views' => $config['base'].'/resources/views',
];