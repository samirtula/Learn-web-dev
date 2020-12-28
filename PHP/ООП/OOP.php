<?php

class MyClass
{
    public $property = 0;
    private $property2= 0;
    protected $property3 =1;

    public function func() {

    }

}


$obj = new MyClass();


$value = $obj->property;
var_dump($value);