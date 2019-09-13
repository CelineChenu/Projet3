<?php


namespace App\Model;

use \PDO;

class CommentManager extends DbManager
{

    protected $db;

    /*public function __construct()
    {
        $this->db=self::dbConnection();
    }*/

    public function numberComment()
    {
        $number = $this->db->query('SELECT COUNT(*) AS nb FROM comment');
        return $number->fetch();
    }

    public function lastComments()
    {
        $req = $this->db->query('SELECT chapter_id, username, content, DATE_FORMAT(comment_date, \'le %d/%m/%Y à %H:%i\')
        AS commentDate FROM comment ORDER BY comment_date DESC LIMIT 0, 5');
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $comments = [];
        foreach($result as $data)
        {
            $comment = new Comment($data);
            $comments[] = $comment;
        }
        return $comments;
    }

    public function postReported(Int $commentId)
    {
        $req = $this->db->prepare('UPDATE comment SET reported = 1 WHERE id = ?');
        $result = $req->execute([$commentId]);
        return $result;
    }

    public function validateComment(Int $commentId)
    {
        $req = $this->db->prepare('UPDATE comment SET reported = 0, moderated = 0 WHERE id = ?');
        $result = $req->execute([$commentId]);
        return $result;
    }

    public function moderateComment(Int $commentId)
    {
        $req = $this->db->prepare('UPDATE comment SET reported = 0, moderated = 1 WHERE id = ?');
        $result = $req->execute([$commentId]);
        return $result;
    }

    public function numberReports()
    {
        $number = $this->db->query('SELECT COUNT(*) AS nb FROM comment WHERE reported = 1');
        return $number->fetch();
    }

    public function getCommentsReported()
    {
        $req = $this->db->query('SELECT * FROM comment WHERE reported = 1 AND moderated = 0');
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        $comments = array();

        foreach ($result as $data)
        {
            $comment = new Comment();
            $comment->setId($data['id']);
            $comment->setUsername($data['username']);
            $comment->setContent($data['content']);
            $comment->setCommentDate($data['comment_date']);
            $comments[] = $comment;
        }

        return $comments;
    }

    public function getCommentsModerated()
    {
        $req = $this->db->query('SELECT * FROM comment WHERE moderated = 1');
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        $commentsModerated = array();

        foreach ($result as $data)
            {
                $comment = new Comment();
                $comment->setId($data['id']);
                $comment->setUsername($data['username']);
                $comment->setContent($data['content']);
                $comment->setCommentDate($data['comment_date']);
                $commentsModerated[] = $comment;
            }

        return $commentsModerated;
    }

    public function postAdded(Comment $comment)
    {
        $req = $this->db->prepare('INSERT INTO comment(content, username, comment_date, chapter_id, reported, moderated) VALUES (:content,:username,NOW(),:chapter_id,0,0)');
        $req->bindValue(':content', $comment->getContent());
        $req->bindValue(':username', $comment->getUsername());
        $req->bindValue(':chapter_id', $comment->getChapterId());
        $result = $req->execute();
        return $result;
    }
}