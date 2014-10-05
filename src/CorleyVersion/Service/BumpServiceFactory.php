<?php
namespace CorleyVersion\Service;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class BumpServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $config = $sl->get('Config');
        $versionConfig = $config['corley-version'];
    
        $service = new BumpService(); 
        $service->setConfigPath($versionConfig['config-path']);
        $service->setVersionFilePath($versionConfig['version-file-path']);

        return $service;
    }
}
