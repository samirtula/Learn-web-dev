<?php
namespace classes;

class Registration
{
    public $name = '';
    public $password = '';
    public $confirmPassword = '';
    public $email = '';
    public $dbAuthorisation = null;
    public $queryResult= null;
    public $fetch = null;

    public function __construct()
    {
        $this->dbAuthorisation = new \mysqli("localhost","mysql","mysql","forum");
        if (empty( $this->dbAuthorisation)) {
            echo '<span class="alert">authorization failed</span>';
            exit;
        }
    }
    public function setName($name)
    {
        $this->name = $name;
        if (empty( $this->name)) {
            echo '<span class="alert">data not filled</span><br>';
            exit;
        }
    }
    public function setPassword($password)
    {
        $this->password = $password;
        if (empty( $this->password)) {
            echo '<span class="alert">data not filled</span><br>';
            exit;
        }
    }
    public function setConfirmPassword($passConfirm)
    {
        $this->confirmPassword = $passConfirm;
        if (empty( $this->confirmPassword)) {
            echo '<span class="alert">data not filled</span>';
            exit;
        }
        if ($this->password !== $this->confirmPassword){
            echo '<span class="alert">confirm Password data do not match Password</span><br>';
            exit;
        }
    }
    public function setEmail($email)
    {
        $this->email = $email;
        if (empty( $this->email)) {
            echo '<span class="alert">data not filled</span><br>';
            exit;
        }
    }
    public function query($dbQuery)
    {
        $this->queryResult=$this->dbAuthorisation->query($dbQuery);
        if (empty( $this->queryResult)) {
            echo '<span class="alert">database request failed</span><br>';
            exit;
        }
        return $this->queryResult;

    }
    public function fetch_assoc()
    {
        $this->fetch = $this->queryResult->fetch_assoc();
        if (!empty($this->fetch['name'])) {
            echo '<span class="alert">the data was previously used. Try another username</span><br>';
            exit;
        }
       echo '<span class="alert">You are registered</span>';
    }



}

