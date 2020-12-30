<?php

class Session extends Cart
{
    public $sessionId = 0;
    protected $sessionDateTime = '';
    protected $datem5 ='';
    public function __construct()
    {
        $this->sessionId=$this->GetSessNum();
        $this->sessionDateTime=date('d.m.Y H:i');
    }

    public function getTime5MLess() {
        $this->datem5=date('d.m.Y H:i', strtotime('-5 minutes'));
    }

    public function isSessionLive($date)
    {
        if ($date>$this->getTime5MLess()){
            return false;
        }
        else
        {
            return true;
        }
    }

    public function GetSessNum()
    {
        return rand(0,1000);
    }




}
