<?php

use org\bovigo\vfs\vfsStream;
return [
    "modules" => [
        "CorleyVersion",
    ],
    'module_listener_options' => [
        "module_paths" => [
            "CorleyVersion" => dirname(__DIR__),
        ],
        'config_glob_paths' => array(
            vfsStream::url("config/autoload/version.local.php"),
            __DIR__ . '/config/autoload/vfs.php'
        ),
    ],
];
