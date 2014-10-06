<?php
namespace CorleyVersion\Service;

class BumpServiceFactoryTest extends \PHPUnit_Framework_TestCase
{
    private $object;
    private $serviceManager;

    public function setUp()
    {
        $this->serviceManager = $this->getMockBuilder('Zend\\ServiceManager\\ServiceManager')
                     ->disableOriginalConstructor()
                     ->getMock();
        $this->object = new BumpServiceFactory;
    }

    /**
     * @group configuration
     * @group factory
     *
     * @dataProvider wrongConfigurations
     *
     * @expectedException InvalidArgumentException
     */
    public function testMissingConfiguration($configuration)
    {
        $this->serviceManager->method('get')
            ->with('Config')
            ->willReturn($configuration);

        $service = $this->object->createService($this->serviceManager);
    }

    /**
     * @group configuration
     * @group factory
     */
    public function testCommonConfiguration()
    {
        $this->serviceManager->method('get')
            ->with('Config')
            ->willReturn(["corley-version" => [
                "config-path" => "somewhere",
            ]]);

        $service = $this->object->createService($this->serviceManager);

        $this->assertInstanceOf("CorleyVersion\\Service\\BumpService", $service);
    }

    /**
     * Data provider for wrong configurations
     */
    public function wrongConfigurations()
    {
        return [
            [[]],
            [["something" => []]],
            [["corley-version" => []]],
        ];
    }
}
