<?php


namespace App\Model;


class Chapter
{
    private $id;
    private $creationDate;
    private $editionDate;
    private $chapterNumber;
    private $title;
    private $content;



    public function __construct(array $data = null){
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


    public function getId(): ?int {
        return $this->id;
    }
    public function getTitle(): ?string {
        return $this->title;
    }
    public function getContent(): ?string {
        return $this->content;
    }
    public function getCreationDate()
    {
        return $this->creationDate;
    }


    /**
     * @return mixed
     */
    public function getEditionDate()
    {
        return $this->editionDate;
    }

    /**
     * @param mixed $editionDate
     */
    public function setEditionDate($editionDate)
    {
        $this->editionDate = $editionDate;
    }

    /**
     * @return mixed
     */
    public function getChapterNumber()
    {
        return $this->chapterNumber;
    }

    /**
     * @param mixed $chapterNumber
     */
    public function setChapterNumber(int $chapterNumber)
    {
        $this->chapterNumber = $chapterNumber;
    }

    public function setTitle(string $title){
            $this->title = $title;
        return $this;

    }
    public function setContent(string $content){
            $this->content = $content;
        return $this;

    }
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
        return $this;
    }
}