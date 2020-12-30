<?php
class Phone extends Product
{
    protected $cpu = '';
    protected $ram = '';
    protected $countSim = 1;
    protected $hdd = '';
    protected $os = '';
    public function __construct($name, $price, $description, $brand,$cpu,$ram,$countSim,$hdd,$os)
    {
        parent::__construct($name, $price, $description, $brand);
        $this->cpu=$cpu;
        $this->ram=$ram;
        $this->countSim=$countSim;
        $this->hdd=$hdd;
        $this->os=$os;
    }
    public function getProduct()
    {
        $product = parent::getProduct();
        $productAttr = parent::getAttrforPhone();
        return $product . $productAttr;
    }
    public function publish(){
        echo $this->getProduct();
    }
}


