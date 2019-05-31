<?php


namespace App\Model;


class Comment
{
    private $id;
    private $content;
    private $username;
    private $commentDate;
    private $chapterId;
    private $reported;
    private $moderated;


    public function __construct(array $data = null)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $values)
    {
        foreach ($values as $key => $value) {
            $elements = explode('_', $key);
            $newKey = '';
            foreach ($elements as $el) {
                $newKey .= ucfirst($el);
            }

            $method = 'set' . ucfirst($newKey);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * @param mixed $commentDate
     */
    public function setCommentDate($commentDate): void
    {
        $this->commentDate = $commentDate;
    }

    /**
     * @return mixed
     */
    public function getChapterId()
    {
        return $this->chapterId;
    }

    /**
     * @param mixed $chapterId
     */
    public function setChapterId($chapterId): void
    {
        $this->chapterId = $chapterId;
    }

    /**
     * @return mixed
     */
    public function getReported()
    {
        return $this->reported;
    }

    /**
     * @param mixed $reported
     */
    public function setReported($reported): void
    {
        $this->reported = $reported;
    }

    /**
     * @return mixed
     */
    public function getModerated()
    {
        return $this->moderated;
    }

    /**
     * @param mixed $moderated
     */
    public function setModerated($moderated): void
    {
        $this->moderated = $moderated;
    }

    public function getContent(){
        return $this->content;
    }
    public function getUserId(){
        return $this->userId;
    }

    public function getArticleId(){
        return $this->articleId;
    }




    public function setContent($content){
        if (is_string($content)) {
            $this->content = $content;
        }
        return $this;
    }
    public function setUserId($userId){
        $userId = (int)$userId;
        if ($userId > 0) {
            $this->userId = $userId;
        }
        return $this;
    }

    public function setArticleId($articleId){
        $articleId=(int)$articleId;
        if ($articleId > 0) {
            $this->articleId=$articleId;
        }
        return $this;
    }


}