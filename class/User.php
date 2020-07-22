<?php


class User
{
    private $name;
    private $password;

    /**
     * User constructor.
     * @param $name
     * @param $password
     */
    public function __construct($name, $password)
    {
        $this->name = $name;
        $this->password = $password;
    }
}
