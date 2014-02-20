<?php
namespace Development;

class ServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->sp = ServiceProvider::getInstance();
    }

    public function testGetInstance()
    {
        $this->assertInstanceOf('\Development\ServiceProvider', $this->sp);
    }

    public function testGetService( )
    {
        $this->sp->setService( '\Development\FacebookAdapter' );
        $obj = $this->sp->getService( '\Development\FacebookAdapter' );

        $this->assertInstanceOf('\Development\FacebookAdapter', $obj);
    }

    /**
     * @expectedException     \RuntimeException
     * @expectedExceptionCode 10
     * @expectedExceptionMessage Invalid Service Request
     */
    public function testGetServiceFailure()
    {
        $this->sp->setService( '\Development\FacebookAdapter' );
        $this->sp->getService( '\Development\FacebookAdapter2' );
    }
}