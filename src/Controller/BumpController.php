<?php
namespace CorleyVersion\Controller;

use Zend\Mvc\Controller\AbstractConsoleController;

class BumpController extends AbstractConsoleController
{
    public function showAction()
    {
        $config = $this->getServiceLocator()->get("Config");
        if(!array_key_exists("version", $config)){
            return "Version param not found";
        }

        return $config['version'];
    }

    public function bumpAction()
    {
        $version = $this->params('version');
        $bumpService = $this->getServiceLocator()->get('CorleyVersion\Service\Bump');
        $em = $this->getServiceLocator()->get('EventManager');
        $em->addIdentifiers(array(__CLASS__, 'version'));
        $em->trigger('version.bump', $bumpService, array('version' => $version));
        return "Bumped version '{$version}'";
    }
}
