<?php
require ('vendor/autoload.php');

$user = 1;
try {
    $obj = new \Eshop\Cart($user);
    //$obj->createCart();
    $obj->add(5, 1);
    //$obj->getCartData();
}
catch (Exception $e) {
    var_dump($e->getMessage());
}

//$res = $obj->getUserCart();
//echo "<pre>"; print_r($res); echo "</pre>";
