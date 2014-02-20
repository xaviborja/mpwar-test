<?php

namespace Development;

class DatabaseTest extends \PHPUnit_Framework_TestCase
{
    public function testDatabaseWorking()
    {
        new \PDO( 'mysql:host=127.0.0.1; dbname=my_test', 'user_test', 'passtest' );
        $this->assertTrue( true, 'La conexión ha fallado.' );
    }

    /**
     * @expectedException     \PDOException
     */
    public function testDatabaseNotWorking()
    {
        new \PDO( 'mysql:host=127.0.0.1; dbname=my_test', 'user_testa', 'passtest' );
    }
}