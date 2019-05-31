<?php


namespace App\Model;

use \PDO;

class DbManager
{
    protected function dbConnection(){
        try {
            $db= new PDO('mysql:host=localhost;dbname=projet3;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        }
        catch (\Exception $e){
            die($e->getMessage());
        }
        return $db;
    }
}