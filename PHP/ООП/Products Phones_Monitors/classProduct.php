<?php
class Product
{
    protected $name ='';
    protected $price = 0;
    protected $description = '';
    protected $brand = '';

    public function __construct($name,$price,$description,$brand)
    {
        $this->name=$name;
        $this->price=$price;
        $this->description=$description;
        $this->brand=$brand;
    }
    public function getProduct() {
        return "<h2>Name: $this->name, Price: $this->price, Description: $this->description, Brand: $this->brand";

    }
    public function getAttrforPhone(){
        return " CPU: $this->cpu, RAM: $this->ram, Count SIM: $this->countSim, HDD: $this->hdd, OS: $this->os <input type=\"submit\" name=\"addProduct\" value=\"AddToCart\"> <input type=\"submit\" name=\"cartProduct\" value=\"GoToCart\"></h2>";
    }
    public function getAttrforMonitor() {
        return " Diagonal: $this->diagonal, Frequency: $this->frequency, Ports: $this->ports <input type=\"submit\" name=\"addProduct\" value=\"AddToCart\"> <input type=\"submit\" name=\"cartProduct\" value=\"GoToCart\"></h2>";
    }
}