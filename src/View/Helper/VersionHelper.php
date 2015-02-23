<?php
namespace CorleyVersion\View\Helper;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\View\Helper\AbstractHelper;

class VersionHelper extends AbstractHelper implements ServiceLocatorAwareInterface
{
    use \Zend\ServiceManager\ServiceLocatorAwareTrait;

    public function __invoke()
    {
        return $this->getServiceLocator()->getServiceLocator()
            ->get('Config')['version'];
    }
}
