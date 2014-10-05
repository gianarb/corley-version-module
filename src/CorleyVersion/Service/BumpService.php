<?php 
namespace CorleyVersion\Service;
use Zend\Config\Writer\PhpArray;
class BumpService 
{
    private $path;
    private $configPath;

    public function setVersionFilePath($path)
    {
        $this->path = $path;
        return $this;
    }

    public function setConfigPath($path)
    {
        $this->configPath = $path;
        return $this;
    }

    public function bump($version)
    {
        file_put_contents($this->path.'/VERSION', $version);

        $configFile = new \Zend\Config\Config(include $this->configPath, true);
        $configFile->version = $version;
        $configWriter = new PhpArray();
        $configWriter->toFile($this->configPath, $configFile);
    } 
}
