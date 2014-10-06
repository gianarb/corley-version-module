<?php
namespace CorleyVersion\Service;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class BumpServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $config = $sl->get('Config');

        if ($this->notValidConfiguration($config)) {
            throw new \InvalidArgumentException("Missing corley-version configuration");
        }

        $versionConfig = $config['corley-version'];

        $service = new BumpService();
        $service->setConfigPath($versionConfig['config-path']);

        return $service;
    }

    private function notValidConfiguration($config)
    {
        if (array_key_exists("corley-version", $config)) {
            $innerConf = $config["corley-version"];

            if (array_key_exists("config-path", $innerConf)) {
                return false;
            }
        }

        return true;
    }
}
