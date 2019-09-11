<?php


namespace App\Model;


class User
{
    private $id;
    private $username;
    private $login;
    private $password;


    public function __construct(array $values = null)
    {
        if ($values != null) {
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
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login): void
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }


}