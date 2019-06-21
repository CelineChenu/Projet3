<?php


namespace App\Model;

use PDO;

class CommentManager
{
    public function getComments()
    {
        $req = $this->db->query('SELECT c.id, c.title, c.content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creationDate, t.content, t.username, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS commentDate FROM chapter as c LEFT JOIN comment as t ON c.id = t.chapter_id');
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $comment = new Comment($result);
        return $comment;
    }
}