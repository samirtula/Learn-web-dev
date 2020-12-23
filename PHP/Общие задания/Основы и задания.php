<?php

$name = "Ivan";

echo $name;
$num = 1;
$double = 1.2;
$array1 = [1, 'test', 'test2'];
print_r($array1);

echo "<pre>";
print_r($array1);
echo "</pre>";


$fakeNumber = "1";
var_dump($fakeNumber);

$bool = true;

$sumString = "3" . "vs";
$sumStr .= "32";

var_dump((bool) $fakeNumber);


class MyClass
{
};
$obj = new MyClass();
var_dump($obj);


 if () {
    elseif(){

    } else{}
}
 
 $test2 = ($number > 3) ? 1 : 3;


foreach ($array1 as $k => $val) {
    echo $k;
    echo "-";
    echo $val;
    echo "<br>";
};

for ($i; $i > 3; $i++) {
};

while ($i < 5) {
    $i++;
};


$first = 2;
$second = 2;

$result = $second % $first;


if ($result === 0) {
    echo "верно";
}
$y = 2019;
$m = 3;
$date= date('t', strtotime($y."-".$m));
var_dump($date);



for ($i = 2; $i <= 10; $i++) {

    for ($j = 2; $j <= 10; $j++) {
        $num = $i * $j;
        echo ($i . '*' . $j . "=" . $num . "<br>");
    }
};



$percent = 0.2;
$sum = 300;
$years = 20;
$arr = [];
$percentSum = $sum * $percent;
$sumWidthPercentSum = $sum + $percentSum;

for ($i = 0; $i < $years; $i++) {

    $percentSum = $sum * $percent;
    $sumWithPercent = $sum + $percentSum;
    $arr[] = [
        'sum' => round($sum, 2),
        'sumWithPercent' => round($sumWithPercent, 2),
        'percentSum' => round($percentSum, 2)
    ];
    $sum = $sum + $percentSum;
}

?>


<table>
    <tbody>
        <?php foreach ($arr as $k => $item) : ?>
            <tr>
                <td><?= $k + 1 ?></td>
                <td><?= $item['sum'] ?></td>
                <td><?= $item['sumWithPercent'] ?></td>
                <td><?= $item['percentSum'] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>

</table>



<?php
function getLeft()
{
    return "left";
};

$k2 = 2;
function myfunc()
{
    global $k;
    $res = 1+$k;
}
return $res;

?> 



<form action="">
    <input type="text" name = "name">
    <input type="text" name = "sname">
    <input type="text" name = "age">
    <input type="password" name = "pass">
    <input type="submit" value = "Отправить">
</form>    