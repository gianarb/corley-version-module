<?php
namespace CorleyVersion;

use Zend\Mvc\MvcEvent;

class Module
{

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function onBootstrap($mvcEvent)
    {
        $em = $mvcEvent->getApplication()->getEventManager();
        $em->getSharedManager()->attach('version' ,'version.bump', function($e){
            $e->getTarget()->bump($e->getParams()['version']);
        }, 100);
    }

    public function getConsoleUsage($console)
    {
        return array(
            array('version-show', 'Show version'),
            array('version-bump <version>', 'Bump new version'),
        );
    }
}
