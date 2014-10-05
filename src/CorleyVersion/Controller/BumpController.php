<?php
namespace CorleyVersion\Controller;

use Zend\Mvc\Controller\AbstractConsoleController;

class BumpController extends AbstractConsoleController
{
    public function showAction()
    {
        $config = $this->getServiceLocator()->get("Config");
        if(!array_key_exists("version", $config)){
            return $this->console->writeLine("Version param not found", 10);
        }
        return $this->console->writeLine($config['version']);    
    }

    public function bumpAction()
    {
        $version = $this->params('version');
        $bumpService = $this->getServiceLocator()->get('CorleyVersion\Service\Bump');
        $bumpService->bump($version);
        return $this->console->writeLine("Bump completed", 3);
    }
}
