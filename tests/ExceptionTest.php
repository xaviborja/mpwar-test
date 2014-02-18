<?php
class ExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Right Message
     */
    public function testException()
    {
        throw new InvalidArgumentException("Right Message", 10);
    }

}