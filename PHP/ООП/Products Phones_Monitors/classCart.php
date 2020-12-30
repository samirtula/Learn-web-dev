<?php
class Cart
{
    public $productList=[];
    public function GetCart()
    {
        return print_r($this->productList);
    }

    public function AddToCart($objProduct)
    {
        $this->productList[] = $objProduct;

    }
}