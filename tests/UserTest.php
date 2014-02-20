<?php
namespace Development;

class UserTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $user_model = $this->getMock('UserModel', array('existsUserName','addNewUser'));

        $user_model->expects($this->any())
            ->method('existsUserName')
            ->will($this->returnValue(false));

        $user_model->expects($this->any())
            ->method('addNewUser')
            ->will($this->returnValue(true));

        $service_provider = ServiceProvider::getInstance();
        $service_provider->setService("UserModel",$user_model);
        $this->user = new User($service_provider);
    }

    /**
     * @expectedException     \UnexpectedValueException
     * @expectedExceptionCode 20
     */
    public function testNewUserInvalidOrigin()
    {
        $user_data = array('user_name' => 'Xavi', 'email' => 'test@test.com', 'password' => '14111567', 'origin' => 'wesite');

        $this->user->newUser( $user_data );
    }

    /**
     * @expectedException     \InvalidArgumentException
     * @expectedExceptionMessage User data is invalid
     */
    public function testNewUserException()
    {
        $user_data = array('user_name' => 'Xavi', 'email' => 'test@test.com', 'password' => '14567', 'origin' => 'website');

        $this->user->newUser( $user_data );

    }

}