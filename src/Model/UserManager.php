<?php


namespace App\Model;


use \PDO;

class UserManager extends DbManager
{
    private $db;
    public function __construct()
    {
        $this->db=self::dbConnection();
    }

    public function getUserByName($login)
    {
        $req = $this->db->prepare('SELECT * FROM user WHERE login = :login');
        $user = new User();
        $req->bindValue(':login',$login);
        $req->execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        $user->setLogin($data['login']);
        $user->setPassword($data['password']);
        return $user;



    }

    public function userAdded(User $user)
    {
        $req = $this->db->prepare('INSERT INTO user(username, login, password) VALUES (:username,:login,:password)');
        $req->bindValue(':username', $user->getUsername());
        $req->bindValue(':login', $user->getLogin());
        $req->bindValue(':password',  $user->getPassword());
        $req->execute();

    }
}