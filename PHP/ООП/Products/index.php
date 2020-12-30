<?php
require ('tasksOOP.php');
$productArr = [$obj1= new Product('Iphone', '1000$'), $obj2= new Product('Galaxy', '900$'),$obj3= new Product('Walkman', '800$'),$obj4= new Product('Iphone', '1000$')];

foreach ($productArr as $value) {
    echo $value-> getProduct().'<br>';
}

$obj0 = new Product('test', 'test');

$request = $_REQUEST;
$name = $request['name'];
$obj0->searchByName($productArr, "Iphone");

?>

<form action="index.php" method="post">
    <input type="text" name="name">
    <input type="submit">
</form>
