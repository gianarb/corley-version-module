<?php
namespace CorleyVersion\Service;
use Zend\Config\Writer\PhpArray;
class BumpService
{
    private $configPath;

    public function setConfigPath($path)
    {
        $this->configPath = $path;
        return $this;
    }

    public function bump($version)
    {
        $configFile = new \Zend\Config\Config(include $this->configPath, true);
        $configFile->version = $version;
        $configWriter = new PhpArray();
        $configWriter->toFile($this->configPath, $configFile, false);
    }
}
