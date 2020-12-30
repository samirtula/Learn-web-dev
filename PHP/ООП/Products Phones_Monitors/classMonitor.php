<?php
class Monitor extends Product{
    protected $diagonal = '';
    protected $frequency = '';
    protected $ports = '';
    public function __construct($name, $price, $description, $brand,$diagonal,$frequency,$ports)
    {
        parent::__construct($name, $price, $description, $brand);
        $this->diagonal=$diagonal;
        $this->frequency=$frequency;
        $this->ports=$ports;

    }
    public function getProduct()
    {
        $product = parent::getProduct();
        $productAttr = parent::getAttrforMonitor();
        return $product . $productAttr;
    }
    public function publish(){
        echo $this->getProduct();
    }
}
