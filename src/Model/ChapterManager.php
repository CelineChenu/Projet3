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

    public function getChapters()
    {
        $req = $this->db->query('SELECT * FROM chapter');
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAdminChapters()
    {
        $req = $this->db->query('SELECT id, chapter_number, title, content, DATE_FORMAT(creation_date,\'le %d/%m/%Y à %H:%i\') 
        AS creationDate FROM chapter ORDER BY creation_date DESC LIMIT 0, 3');
        return $req->fetchAll();
    }

    public function getLastChapter()
    {
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

    public function getAllChapters()
    {
        $req=$this->db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %H:%i\') AS creationDate, chapter_number FROM chapter ORDER BY creation_date');
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $chapters = [];
        foreach($result as $data)
        {
            $chapter = new Chapter($data);
            $chapters[] = $chapter;
        }
        return $chapters;
    }

    public function getLastThreeChapters()
    {
        $req=$this->db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creationDate FROM chapter ORDER BY creation_date DESC LIMIT 0, 3');
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $threeChapters = [];
        foreach($result as $data)
        {
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

        foreach ($result as $data)
        {
            $chapter->setChapterNumber($data['chapter_number']);
            $chapter->setTitle($data['title']);
            $chapter->setContent($data['content']);
            $chapter->setCreationDate($data['creationDate']);

            if ($data['comment_id'])
                {
                    $comment = new Comment();
                    $comment->setChapterId($data['id']);
                    $comment->setId($data['comment_id']);
                    $comment->setUsername($data['username']);
                    $comment->setContent($data['comment_content']);
                    $comment->setCommentDate($data['commentDate']);
                    $comment->setReported($data['reported']);
                    $comment->setModerated($data['moderated']);
                    $comments[] = $comment;
                }
        }
        $chapter->setComments($comments);
        return $chapter;
    }

    public function numberChapter()
    {
        $number = $this->db->query('SELECT COUNT(*) AS nb FROM chapter');
        return $number->fetch();
    }

    public function chapterAdded(Chapter $chapter)
    {
        $req = $this->db->prepare('INSERT INTO chapter(title, chapter_number, content, creation_date) VALUES (:title,:chapter_number,:content,NOW())');
        $req->bindValue(':title', $chapter->getTitle());
        $req->bindValue(':chapter_number', $chapter->getChapterNumber());
        $req->bindValue(':content', $chapter->getContent());
        $req->execute();
    }

    public function chapterEdited(Chapter $chapter)
    {

        $req = $this->db->prepare('UPDATE chapter SET chapter_number = :chapter_number, title = :title, content = :content, edition_date = NOW()  WHERE id = :id');
        $req->bindValue(':chapter_number', $chapter->getChapterNumber());
        $req->bindValue(':title', $chapter->getTitle());
        $req->bindValue(':content', $chapter->getContent());
        $req->bindValue(':id', $chapter->getId());
        $result = $req->execute();
        return $result;
    }

    public function editionChapter($id)
    {
        $req = $this->db->prepare('SELECT id, chapter_number, title, content FROM chapter WHERE id = ?');
        $req->execute([$id]);
        $results = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $data)
        {
            $chapter = new Chapter();
            $chapter->setId($data['id']);
            $chapter->setChapterNumber($data['chapter_number']);
            $chapter->setTitle($data['title']);
            $chapter->setContent($data['content']);
            return $chapter;
        }
    }

    public function deleteChapter($id)
    {
        $chapter = $this->db->prepare('DELETE FROM chapter WHERE id = ?');
        $deleteChapter = $chapter->execute(array($id));
        return $deleteChapter;
    }

}
