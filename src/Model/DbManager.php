<?php


namespace App\Model;

use \PDO;

abstract class DbManager
{

    protected $db;

    public function __construct() {
        try
        {
            $db= new PDO('mysql:host='.HOST_BDD.';dbname='.DB_NAME.';charset=utf8', LOGIN_BDD, PWD_BDD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }
        catch (\Exception $e)
        {
            die($e->getMessage());
        }
        return $this->db = $db;
    }

    /*
    protected function dbConnection()
    {
        try
        {
            $db= new PDO('mysql:host=localhost;dbname=projet3;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }
        catch (\Exception $e)
        {
            die($e->getMessage());
        }
        return $db;
    }*/
}