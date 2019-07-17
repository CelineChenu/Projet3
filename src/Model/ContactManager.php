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

    public function mailAdded(Contact $contact)
    {
        $req = $this->db->prepare('INSERT INTO message(name, email, message, message_date,consent) VALUES (:name,:email,:message,NOW(),:consent)');
        $req->bindValue(':name', $contact->getName());
        $req->bindValue(':email', $contact->getEmail());
        $req->bindValue(':message', $contact->getMessage());
        $req->bindValue(':consent',$contact->getConsent());

        $result = $req->execute();
        return $result;
    }
}