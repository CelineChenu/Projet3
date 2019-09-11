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


    public function __construct(array $values = null)
    {
        if ($values != null)
        {
            $this->hydrate($values);
        }
    }

    public function hydrate(array $values)
    {
        foreach ($values as $key => $value)
        {
            $elements = explode('_', $key);
            $newKey = '';
            foreach ($elements as $el)
            {
                $newKey .= ucfirst($el);
            }

            $method = 'set' . ucfirst($newKey);
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }
    /**
     * @param string $content
     * @return $this
     */
    public function setContent(string $content)
    {
        if (is_string($content))
        {
            $this->content = $content;
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return \DateTime
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * @param \DateTime $commentDate
     */
    public function setCommentDate($commentDate): void
    {
        $this->commentDate = $commentDate;
    }

    /**
     * @return int
     */
    public function getChapterId(): ?int
    {
        return $this->chapterId;
    }

    /**
     * @param int $chapterId
     */
    public function setChapterId(int $chapterId): void
    {
        $this->chapterId = $chapterId;
    }

    /**
     * @return bool
     */
    public function getReported()
    {
        return $this->reported;
    }

    /**
     * @param bool $reported
     */
    public function setReported(bool $reported): void
    {
        $this->reported = $reported;
    }

    /**
     * @return bool
     */
    public function getModerated()
    {
        return $this->moderated;
    }

    /**
     * @param bool $moderated
     */
    public function setModerated(bool $moderated): void
    {
        $this->moderated = $moderated;
    }
}