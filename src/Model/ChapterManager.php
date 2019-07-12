<?php


namespace App\Model;

use \PDO;

class ChapterManager extends DbManager
{
    private $db;
    public function __construct()
    {
        $this->db=self::dbConnection();
    }
    public function getChapters(){
        $req = $this->db->query('SELECT * FROM chapter');
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getLastChapter() {
        $req=$this->db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creationDate FROM chapter ORDER BY creation_date DESC LIMIT 0, 1');
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $lastChapters = new Chapter($result);
        return $lastChapters;
    }

    public function getFirstChapter()
    {
        $req = $this->db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creationDate FROM chapter ORDER BY creation_date LIMIT 0, 1');
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $firstChapter = new Chapter($result);
        return $firstChapter;
    }

    public function getAllChapters() {
        $req=$this->db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %H:%i\') AS creationDate, chapter_number FROM chapter ORDER BY creation_date');
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $chapters = [];
        foreach($result as $data){
            $chapter = new Chapter($data);
            $chapters[] = $chapter;
        }
        return $chapters;
    }

    public function getLastThreeChapters() {
        $req=$this->db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creationDate FROM chapter ORDER BY creation_date DESC LIMIT 0, 3');
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $threeChapters = [];
        foreach($result as $data){
            $chapter = new Chapter($data);
            $threeChapters[] = $chapter;
        }
        return $threeChapters;
    }

    public function getChapter(Chapter $chapter)
    {
        $req = $this->db->prepare('SELECT ch.id, ch.title, ch.content, ch.chapter_number, DATE_FORMAT(ch.creation_date, \'%d/%m/%Y\') AS creationDate,co.id AS comment_id, co.content AS comment_content, co.username, DATE_FORMAT(co.comment_date, \'%d/%m/%Y\') AS commentDate, co.reported, co.moderated  FROM chapter as ch LEFT JOIN comment as co ON ch.id = co.chapter_id WHERE ch.id = ?');
        $req->execute([$chapter->getId()]);
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $comments = [];

        foreach ($result as $data) {
            $chapter->setChapterNumber($data['chapter_number']);
            $chapter->setTitle($data['title']);
            $chapter->setContent($data['content']);
            $chapter->setCreationDate($data['creationDate']);

        if ($data['comment_id']){
            $comment = new Comment();
            $comment->setChapterId($data['id']);
            $comment->setId($data['comment_id']);
            $comment->setUsername($data['username']);
            $comment->setContent($data['comment_content']);
            $comment->setCommentDate($data['commentDate']);
            $comment->setReported($data['reported']);

            $comments[] = $comment;
             }
        }
        $chapter->setComments($comments);
        return $chapter;
    }
}
