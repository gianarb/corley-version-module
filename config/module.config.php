<?php
return array(
   'controllers' => array(
        'invokables' => array(
            'CorleyVersion\Controller\Bump' => 'CorleyVersion\Controller\BumpController'
        )
   ),
   'console' => array(
        'router' => array(
            'routes' => array(
                'version-bump' => array(
                    'options' => array(
                        'route'    => 'version-bump <version>',
                        'defaults' => array(
                            'controller' => 'CorleyVersion\Controller\Bump',
                            'action'     => 'bump'
                        )
                    )
                ),
                'version-show' => array(
                    'options' => array(
                        'route'    => 'version-show',
                        'defaults' => array(
                            'controller' => 'CorleyVersion\Controller\Bump',
                            'action'     => 'show'
                        )
                    )
                )
            )
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'CorleyVersion\Service\Bump' => 'CorleyVersion\Service\BumpServiceFactory',
        ),
        'invokables' => array(
            'CorleyVersion\Service\PhpArrayConfigWriter' => 'CorleyVersion\Service\PhpArrayConfigWriter',
        ),
    ),
    'view_helpers' => array(
        'invokables' => array(
            'version' => 'CorleyVersion\View\Helper\VersionHelper',
        ),
    ),
    'corley-version' => array(
        'version-file-path' => ".",
        'config-path' => "./config/autoload/global.php",
        'config-writer' => 'CorleyVersion\Service\PhpArrayConfigWriter',
    )
);
