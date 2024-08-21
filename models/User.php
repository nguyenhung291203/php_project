<?php

class User extends BaseEntity
{
    private $id;
    private $username;
    private $email;
    private $password;

    public function __construct($id, $username, $email, $password, $created_at, $updated_at)
    {
        parent::__construct($created_at, $updated_at);
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function save()
    {
        // Lưu thông tin người dùng vào database
        parent::save();
    }
}