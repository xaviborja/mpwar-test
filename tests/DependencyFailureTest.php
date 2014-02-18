<?php

include_once __DIR__ . '/../src/Money.php';

class DependencyFailureTest extends \PHPUnit_Framework_TestCase
{
    public function testOne()
    {
        $this->assertTrue(FALSE);
    }

    /**
     * @depends testOne
     */
    public function testTwo()
    {

    }


}