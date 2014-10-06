<?php
return [
    "modules" => [
        "CorleyVersion",
    ],
    'module_listener_options' => [
        "module_paths" => [
            "CorleyVersion" => dirname(__DIR__),
        ],
        'config_glob_paths' => [],
    ],
];
