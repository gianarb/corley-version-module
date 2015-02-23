<?php
namespace CorleyVersion\Controller;

use Zend\Test\PHPUnit\Controller\AbstractConsoleControllerTestCase;
use org\bovigo\vfs\vfsStream;

class BumpControllerTest extends AbstractConsoleControllerTestCase
{
    /**
     * @group functional
     * @group console
     * @group show
     */
    public function testShowErrorOnMissingConfiguration()
    {
        $this->setApplicationConfig(include __DIR__ . '/../app.conf.php');

        $this->dispatch('version-show');

        $this->assertConsoleOutputContains("Version param not found");
    }

    /**
     * @group functional
     * @group console
     * @group show
     */
    public function testShowValidVersionFile()
    {
        $this->setApplicationConfig(include __DIR__ . '/../app.complete.php');

        $this->dispatch('version-show');

        $this->assertConsoleOutputContains("1.0.1");
    }

    /**
     * @group functional
     * @group console
     * @group bump
     */
    public function testBumpValidVersionFile()
    {
        vfsStream::setup("config/autoload");
        file_put_contents(vfsStream::url("config/autoload/version.local.php"), "<?php return ['version' => ''];");

        $this->setApplicationConfig(include __DIR__ . '/../app.bump.php');

        $this->dispatch('version-bump 1.0.2');
        $this->assertConsoleOutputContains("Bumped version '1.0.2'");
    }

    /**
     * @group functional
     * @group console
     * @group bump
     */
    public function testBumpTriggerEvent()
    {
        $this->setApplicationConfig(include __DIR__ . '/../app.bump.php');
        $em = $this->getMock('Zend\\EventManager\\EventManagerInterface');

        $sm = $this->getApplication()->getServiceManager();
        $sm->setAllowOverride(true);
        $sm->setService('EventManager', $em);

        $em->expects($this->once())->method('trigger');
        $this->dispatch('version-bump 1.0.1');
    }    
}
