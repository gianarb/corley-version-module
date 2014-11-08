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
        $configWriter = $sl->get($config['corley-version']['config-writer']);

        $service = new BumpService();
        $service->setConfigPath($versionConfig['config-path']);
        $service->setConfigWriter($configWriter->getWriter());

        return $service;
    }

    private function notValidConfiguration($config)
    {
        if (array_key_exists("corley-version", $config)) {
            $innerConf = $config["corley-version"];
            if (array_key_exists("config-path", $innerConf)) {
                return false;
            }
            if (array_key_exists("config-writer", $innerConf)) {
                return false;
            }
        }

        return true;
    }
}
