<?php

$config = [
    'base' => realpath($_SERVER['DOCUMENT_ROOT'].'/../'),
];

return [
    'configs' => $config['base'].'/config',
    'layouts' => $config['base'].'/resources/layouts',
    'logs' => $config['base'].'/storage/logs',
    'models' => $config['base'].'/app/Model',
    'routes' => $config['base'].'/routes',
    'views' => $config['base'].'/resources/views',
];