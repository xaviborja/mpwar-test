<?php
//include_once __DIR__ . '/../src/User.php';
namespace Development;

class UserTest extends \PHPUnit_Framework_TestCase
{

    public static function setUpBeforeClass()
    {
        self::$db = new \mysqli('127.0.0.1', 'travis', '', 'my_test');

    }

    protected function setUp()
    {
        $this->user = new User();
    }

    protected function tearDown()
    {

    }

    /*public function testConnectDb()
    {

        $db = $this->user->connectDb();
        $this->assertInstanceOf('mysqli', $db);

        return $db;
    }

    /**
     * @depends testConnectDb
     */
    public function testInsertUser( )
    {

        $id_user = $this->user->insertUser("Xavi","12345");
        if ($resultado = self::$db->query("SELECT user_name FROM user WHERE user_name='Xavi'")) {
            $obj = $resultado->fetch_object();
        }
        $this->assertEquals("Xavi", $obj->user_name);

        return $id_user;
    }

    /**
     * @depends testInsertUser
     */
    public function testGetUserData($id_user)
    {
        $user = $this->user->getUserData( $id_user );
        $this->assertArrayHasKey('user_name', $user);
        $this->assertArrayHasKey('password', $user);
        $this->assertArrayHasKey('num_actions', $user);
    }
}