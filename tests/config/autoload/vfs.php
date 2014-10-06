<?php

use org\bovigo\vfs\vfsStream;
return [
    "corley-version" => [
        "config-path" => vfsStream::url("config/autoload/version.local.php"),
        "version-file-path" => ".",
    ]
];
