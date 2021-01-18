<?php
namespace classes;

class MessageCreator
{
    public $name = '';
    public $message = '';
    public $date = '';
    public $dbAuthorisation = null;
    public $queryResult = null;

    public function __construct()
    {
        $this->dbAuthorisation = new \mysqli("localhost","mysql","mysql","forum");
        if (empty( $this->dbAuthorisation)) {
            echo '<span class="alert">authorization failed</span>';
        }
    }
    public function setName($name)
    {
        $this->name = "'" . $name . "'";
        if (empty( $this->name)) {
            echo '<span class="alert">data not filled</span>';
        }
    }
    public function setMessage($message)
    {
        $this->message = "'" . $message . "'";
        if (empty( $this->message)) {
            echo '<span class="alert">data not filled</span>';
        }
    }
    public function setDate()
    {
        $this->date="'" . date('Y-m-d H:i:s') . "'";
        if (empty( $this->date)) {
            echo '<span class="alert">data not filled</span>';
        }
    }
    public function setMsgToDataBaseQuery($dbQuery)
    {
        {
            $this->queryResult=$this->dbAuthorisation->query($dbQuery);
            if (empty( $this->queryResult)) {
                echo '<span class="alert">database request failed</span><br>';
            }
            return $this->queryResult;

        }
    }
}