<?php
namespace Development;

class User
{
    private $errors = array();

    public function newUser()
    {
        if ( !empty( $_GET['user_name'] ) && !empty( $_GET['password'] ) )
        {
            $this->insertUser( $_GET['user_name'], $_GET['password'] );
        }
        else
        {
            if ( empty( $_GET['user_name'] ) )
            {
                $this->errors[] = 'Invalid User name';
            }

            if ( empty( $_GET['password'] ) )
            {
                $this->errors[] = 'Invalid Password';
            }
        }
    }


    /**
     * Retorna la información de un usuario guardado en la base de datos. Si no existe lanza una excepción.
     * @param $id_user
     */
    public function getUserData( $id_user )
    {
        $db = $this->connectDb();
        $rs = $db->query("SELECT user_name, password, num_actions FROM user WHERE id = $id_user");
        return $rs->fetch_assoc();
    }

    /**
     * Inserta un usuario en la base de datos.
     * @param $name
     * @param $password
     */
    public function insertUser( $name, $password )
    {
        $db = $this->connectDb();
        $db->query("INSERT INTO user(user_name, password, num_actions) VALUES ('$name', '$password', '0')");
        return $db->insert_id;
    }

    /**
     * Inserta una acción en base de datos.
     * @param $action
     */
    public function insertUserAction( $action )
    {
        $db = $this->connectDb();
        $db->query("INSERT INTO user(user_name, password, num_actions) VALUES ('$name', '$password', '0')");
    }

    /**
     * Retorna un array de acciones. Si el usuario no tiene acciones retorna vacío.
     * @param $action
     */
    public function getUserActions( $action )
    {

    }

    /**
     * Nos devuelve el karma del usuario en función del número de acciones realizadas.
     * - Entre 0 y 10 -> devuelve 1
     * - Mayor que 10 y menor 100 -> devuelve 2
     * - Mayor de 100 y menor de 500 -> devuelve 3
     * - Mayor de 500 -> devuelve número de acciones entre 100
     * @param $id_user
     */
    public function getUserKarma( $id_user )
    {

    }

    public function connectDb()
    {
        $mysqli = new \mysqli('localhost', 'root', '', 'test');
        return $mysqli;
    }
}