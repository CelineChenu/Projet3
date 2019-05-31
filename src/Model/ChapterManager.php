<?php


namespace App\Model;


class ChapterManager extends DbManager
{
    private $db;
    public function __construct()
    {
        $this->db=self::dbConnection();
    }
    public function getChapters(){
        $req=$this->db->query('SELECT * FROM chapter');
        $result=$req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}