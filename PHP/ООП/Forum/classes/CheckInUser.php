<?php
namespace classes;

class CheckInUser
{
    public $name = '';
    public $password = '';
    public $dbAuthorisation = null;
    public $queryResult= null;
    public $fetch = null;

    public function __construct()
    {
        $this->dbAuthorisation = new \mysqli("localhost","mysql","mysql","forum");
        if (empty( $this->dbAuthorisation)) {
            echo '<span class="alert">authorization failed</span>';
        }
    }

    public function setName($name)
{
        $this->name = $name;
        if (empty( $this->name)) {
            echo '<span class="alert">data not filled</span>';
            exit;
        }
}
    public function setPassword($password)
    {
        $this->password = $password;
        if (empty( $this->password)) {
            echo '<span class="alert">data not filled</span>';
            exit;
        }
    }

    public function query($dbQuery)
    {
        $this->queryResult=$this->dbAuthorisation->query($dbQuery);
        if (empty( $this->queryResult)) {
            echo '<span class="alert">database request failed</span>';
            exit;
        }
        return $this->queryResult;
    }

    public function fetch_assoc()
    {
        $this->fetch = $this->queryResult->fetch_assoc();
        if (empty($this->fetch)) {
            echo '<span class="alert">data not registered</span>';
            exit;
        }
        return $this->fetch;
    }
    public function showMessages()
    {
        if ($this->queryResult) {
            $rows = mysqli_num_rows ($this->queryResult);
            for ($i = 0; $i < $rows; ++$i) {
                $row = mysqli_fetch_row($this->queryResult);
                echo '<div>' . ' USER: ' . "<span class='user-title'>$row[1]</span>" . '<br>' .
                    '<span class="message-title">MESSAGE: </span>' . '<span class="message">' . $row[2] .
                    '</span>' . '<br>' . ' DATE: ' .  mb_strimwidth($row[3],0,16) . '</div>' . '<br>';
            }
        }
        else
        {
            echo '<span class="alert">no messages<span>';
        }
    }
  /*public function showMessageInterval($seconds)
    {
        while (true)
        {
         $this->query("SELECT * FROM messages");
         $this->showMessages();
         sleep($seconds);
        }
    }*/
}
