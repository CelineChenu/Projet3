<?php


namespace App\Model;

use \PDO;

class ContactManager extends DbManager
{
    private $db;
    public function __construct()
    {
        $this->db=self::dbConnection();
    }

}