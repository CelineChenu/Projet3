<?php


namespace App\Model;


class Contact
{
    private $id;
    private $name;
    private $email;
    private $message;
    private $messageDate;
    private $consent;



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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @return \DateTime
     */
    public function getMessageDate()
    {
        return $this->messageDate;
    }

    /**
     * @param \DateTime $messageDate
     */
    public function setMessageDate($messageDate): void
    {
        $this->messageDate = $messageDate;
    }

    /**
     * @return bool
     */
    public function getConsent()
    {
        return $this->consent;
    }

    /**
     * @param bool $consent
     */
    public function setConsent($consent): void
    {
        $this->consent = $consent;
    }

}