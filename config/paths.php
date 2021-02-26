<?php

$config = [
    'base' => realpath($_SERVER['DOCUMENT_ROOT'].'/../'),
];

return [
    'configs' => $config['base'].'/config',
    'logs' => $config['base'].'/storage/logs',
    'models' => $config['base'].'app/Model'
];