<?php
namespace CorleyVersion\Service;
use Zend\Config\Writer\WriterInterface;
class BumpService
{
    private $configPath;
    private $configWriter;

    public function setConfigPath($path)
    {
        $this->configPath = $path;
        return $this;
    }

    public function setConfigWriter(WriterInterface $writer)
    {
        $this->configWriter = $writer;
    }

    public function bump($version)
    {
        $configFile = new \Zend\Config\Config(include $this->configPath, true);
        $configFile->version = $version;
        $configWriter = $this->configWriter;
        $configWriter->toFile($this->configPath, $configFile, false);
    }
}
