<?php 

printf ("Hello world");
echo "Hello world";

echo "<h1>Hello</h1> <h3>World</h3> <b>I</b> <i>am</i> <u>a new PHP developer</u> <br>";


$input = 5;
printf($output=(0- $input) . "<br>");



$firstNum = 3;
$secondNum = 4;

printf("firstNum =" . $firstNum  . "  " . "secondNum = " . $secondNum . "<br>");

echo ($firstNum * $secondNum . "<br>");

$firstNum+=+$secondNum-$secondNum=$firstNum;

printf("firstNum =" . $firstNum  . "  " . "secondNum = " . $secondNum. "<br>");




$username = "user1";
$password = "password";

?>

<input type="text" placeholder = "<?= $username ?>">
<input type="text" placeholder = "<?= $password ?>">
<?php




$font_family = "font-family: Arial;";
$font_size = "font-size: 30px;";
$font_style = "font-style: italic;";
?>

<p style = "<?= $font_family . $font_size . $font_style?>">Abracadabra</#php> </p>
<br>

<?php



#########################Условия
$num = 22;
if ($num%2 == 0){
    echo "число четное";
} 
else
{
    echo "число нечетное";
}
echo "<br>";



function bigger ($arg, $arg2)
{
    if ($arg > $arg2){
        printf($arg);
    } 
    else
    {
        printf ($arg2);    
    }
}
bigger(3,5);
echo "<br>";





function positive($arg)
{
    if ($arg < 0){
        $arg = $arg * -1;
        printf($arg);
    };
};
positive(-12);
echo "<br>";





$one = -2;
$two = 5;
$three = -7;

function inSide ($arg,$arg2,$arg3)
{
    if ($arg3 >= $arg and $arg3 <= $arg2){
        $arg3 *= $arg3; 
        printf($arg3);
    } elseif ($arg3>$arg2)
    {
        $more = $arg3-$arg2;
        echo("Число больше максимального на " . $more ); 
    }
     elseif ($arg3<$arg)
    {
        $less = $arg3-$arg;
        echo("Число меньше начального на " . $less );
    }
}

inSide($one,$two,$three);
echo "<br>";






$hnum=0;

function isHeader($arg){
    if ($arg>=1 and $arg<=6) {
        return "<h$arg" . ">" . "Abracadabra";
    }
    else 
    {
        echo "Ошибка. <br> Заголовок должен быть в пределах от 1 до 6.";
    }
    
}

echo isHeader($hnum);
echo "<br>";





$day = 1;
$month = 8;

$months = [1=>'January',2=>'February',3=>'March',4=>'Aprel',5=>'May',6=>'June',7=>'July',8=>'August',9=>'September',10=>'October',11=>'November',12=>'December'];

function monthsNum($arg,$arg2){
    $month =  $arg2[$arg];
   
    if ($arg>0 and $arg<3 or $arg==12){
        return "Время года зима," . $month;
    }
    elseif($arg>2 and $arg<6) 
    {
        return "Время года весна," . $month;
    }
    elseif($arg>5 and $arg<9) 
    {
        return "Время года лето," . $month;
    }
    elseif($arg>8 and $arg<12) 
    {
        return "Время года осень," . $month;
    }
}

function season($arg,$arg2,$arg3){
    $month = monthsNum($arg2,$arg3);
    $monthHalf = ($arg<14) ? "Первая половина месяца.": "Вторая половина месяца.";
    return $month . ". " . $monthHalf; 
}

echo (season($day,$month,$months));
echo "<br>";





$number=10222;
$types = ['B','KB','MB','GB','TB'];
$from = "MB";
$to="GB";

function converter ($arg1, $arg2, $arg3, $arg4){
    $fromNum = array_search($arg2,$arg4);
    $toNum = array_search($arg3,$arg4);
    $pow = $fromNum>$toNum ? $fromNum-$toNum : $toNum - $fromNum;
    $result = ($fromNum>$toNum)? $arg1 * pow(1024,$pow) : $arg1 / pow(1024,$pow);
    return $result . $arg2;
    
}
echo(converter($number,$from,$to,$types));
echo "<br>";

#############################Циклы


function nums ()
{
    $sum = 0;
 
    for($j=1, $i=1;$j<=10;$i++)
    {
        if ($i%2 == 0){
            $x= $j*5;
            echo "<span style=font-size:$x;color:green> $i</span>";
            $j++;
            $sum+=$i;
        }
    }
    $midSum=$sum/10;
    echo "<br>";
    echo $sum;
    echo "<br>";
    echo $midSum;
}

nums();
echo "<br>";







function simple($arg)
{
    for($i=2;$i<$arg;$i++){
        if(is_int($arg/$i)){
            return printf("число не целое");
        }
    
    }
    printf("число целое");
};
simple(14);
echo "<br>";



?>
<style>
.circle{
    position: absolute;
    top:200px;
    left:400px;
    
    border:1px solid red;
    border-radius: 50%;
}
</style>
<?php
function elips($arg)
{   $class = "class='circle'";
    $style = "style=";
    $width = 20;
    $height = 20;
    for($i=1; $i<$arg;$i++){
        printf("<div $class $style width:$width;height:$height></div>");
        $width +=15;
        $height +=15;
        
    };
};
elips(10);



function fromTentoTwo($arg){
 $num = decbin($arg);
 echo "<p>Number:$arg <br> converted: $num</p>";
}
fromTentoTwo(54);
echo"<br>";





function chessDesk(){
    echo "<style>td{width:50px; height:50px;}</style>";
    echo"<table>";
    for($i=1;$i<9;$i++){
        if ($i%2 != 0){
            echo"<tr>";
            for($j=1;$j<9;$j++){
                if($j%2 != 0){
                    echo"<td style = 'background-color:white;'></td>";
                }
                else
                {
                    echo"<td style = 'background-color:black;'></td>";
                }
            }
            echo"</tr>";
        }
        else
        {
            echo"<tr>";
            for($k=1;$k<9;$k++){ 
                if($k%2 != 0){
                    echo"<td style = 'background-color:black;'></td>";
                }
                else
                {
                    echo"<td style = 'background-color:white;'></td>";
                }    
            }
            echo"</tr>";
        }
    }
    echo"</table>";
}

chessDesk();

############################# МАССИВЫ
$arr = [];
for($i=1;$i<11;$i++){
    $arr[]=$i;
}
$even=[];
foreach($arr as $value){
    if ($value%2 == 0){
        $even[]=$value;
    }
}

echo"<pre>";
print_r ($even);
echo"</pre>";





echo "max" . max($arr);
echo "<br>";
echo "min" . min($arr);
echo "<br>";




$array= array(3,2,1,2,3);
sort($array);
echo "<br>";
echo"<pre>";
print_r ($array);
echo"</pre>";







$arrTen=[];
$arrTentwo=[];
for($i=1;$i<11;$i++){
    $arrTen[] = rand(0,30);
    $arrTentwo[] =rand(0,30);
}
echo"<pre>";
print_r ($arrTen);
echo"</pre>";
echo"<pre>";
print_r ($arrTentwo);
echo"</pre>";

$union = array_merge($arrTen, $arrTentwo);

$unic = array_unique($union);

echo"<pre>";
print_r ($unic);
echo"</pre>";





$arrOne = [];
for($i=1;$i<11;$i++){
    $arrOne[] = rand(1,10);
}
echo "New";
echo"<pre>";
print_r ($arrOne);
echo"</pre>";

$result = array_count_values($arrOne);

echo"<pre>";
print_r ($result);
echo"</pre>
";



?>
<style> .colored-red {
    font-size:20px;
    color: red;
    }
    .colored-blue{
    font-size:20px;
    color: blue;
    }
}</style>

<?php

function colored($arg){
   foreach ($arg as $k=>$value) {
       if($k === 1){
        echo "<p class=colored-red> $value - <b>$k</b> </p>";
       }
       else 
       {
       echo "<p class=colored-blue> $value - <b>$k</b> </p>";
       }
   }
}

colored($result); 


$fruitsArr = [['Название'=>'Апельсин', 'Тип'=>'Цитрусовые', 'Цена'=>3 , 'Количество'=>8],['Название'=>'Черника', 'Тип'=>'Ягоды', 'Цена'=>5,'Количество'=>3],['Название'=>'Яблоко', 'Тип'=>'Многосемянные', 'Цена'=>5,'Количество'=>16],['Название'=>'Лимон', 'Тип'=>'Цитрусовые', 'Цена'=>9,'Количество'=>33],['Название'=>'Груша', 'Тип'=>'Многосемянные', 'Цена'=>12,'Количество'=>28]];


echo"<pre>";
print_r ($fruitsArr);
echo"</pre>";

function dislayFruits($arg){
        foreach($arg as $k=> $item) { 
            ?>
            <h2>Название <?= $item['Название'] ?></h2>
            <h5>Тип <?= $item['Тип'] ?></h5>
            <h3>Цена <?= $item['Цена'] ?></h3>
            <h6>Количество <?= $item['Количество'] ?></h6>
            <style>
            h2,h5,h3,h6 {
                
            }
            </style>
            
            <?php 
            
        }
        $priceAll=0;
        $sumFruits=0;
            
        foreach($arg as $k=> $item){
            if($item['Тип']=='Цитрусовые'){
                echo 'Название '.$item['Название'];
                echo "<br>";
                echo 'Цена '.$item['Цена'];
                echo "<br>";
                echo 'Количество '.$item['Количество'];
                echo "<br>";
            }
      
            $priceAll+=$item['Цена'];
            $sumFruits+=$item['Количество'];
                
            
        }
        echo 'Цена всех фруктов без учета единиц ' . $priceAll;
        echo "<br>";
        echo 'Общее количество всех фруктов ' . $sumFruits;
        echo "<br>";
        echo 'Общее стоимость всех фруктов ' . $priceAll*$sumFruits;
        }
    

dislayFruits($fruitsArr); 
echo "<br>";




$min=1000;
$max = 1100;

function different($arg, $arg2)
{
    $countNonSame=0;
    $countSame=0;
    for($i=$arg;$i<=$arg2;$i++){
        $str = strval($i);
          for($j=0;$j<4;$j++)
        {
            echo mb_substr_count ($str, $str{$j}); 

        }     
    }
}

different($min,$max); 
echo "<br>";





$countries = [['name' => 'Albania' ,'value' => 'AB'],['name' => 'Azerbaijan','value' => 'AZ'],['name' => 'Argentina','value' => 'AG'],['name' => 'Belarus','value' => 'BE']];
?>

<select name="country" id="x">
<?php
foreach($countries as $k => $item){
    echo '<option value =' . $item['value'].'>' . $item['name'] . '</option>';
}
?>
</select>
<?php





$social=[['name'=>'Youtube','link' =>'https://www.youtube.com/', 'imgLink' =>'url(images/img14.webp)'],['name'=> 'Facebook','link' =>'https://www.facebook.com ','imgLink' =>'url(/images/img13.webp'],['name'=> 'Google','link' => 'https://www.google.com/','imgLink' =>'url(images/img13.webp'],['name'=> 'Gmail','link' => 'https://www.google.com/intl/ru/gmail/about/', 'imgLink' =>'url(/images/img13.webp']];

function socialLinkBuilder($arg){
    foreach($arg as $k => $item) {?>
    <div style = float:left;width:50px;height:50px;background-size:cover;background-image:<?=$item['imgLink']?>> <a href=<?= $item['link']?> style= display:block;width:100%;height:100%> </a> </div>
     <?php
}
}

socialLinkBuilder($social); 
echo "<br>";





$arrNums=[];
for($i=0;$i<10;$i++){
    $arrNums[] = rand(10,100);
    
}
echo"<pre>";
print_r ($arrNums);
echo"</pre>";

$arrNums = array_reverse($arrNums);
echo"<pre>";
print_r ($arrNums);
echo"</pre>";





$serchNum = 95;
$arrNumsSearch=[];
for($i=0;$i<10;$i++){
    $arrNumsSearch[] = rand(90,100);
}
echo"<pre>";
print_r ($arrNumsSearch);
echo"</pre>";
function search($elem, $array){
    $result = 0;
    if (array_search($elem, $array) == true){
        $result = array_search($elem, $array);
    } 
    else
    {
         $result = "Такого числа как $elem нет";
    }
    
    echo $result;
}

search($serchNum,$arrNumsSearch); 





$arrbanner = [['name'=>'зеленый', 'url'=>'url(images/234.jpg)'],['name'=>'красный','url'=>'url(images/2.jpg)'],['name'=>'голубой', 'url'=>'url(images/1.jpg)']];

function randBanner($arr) {
    $randomBan = rand(0,(count($arr)-1));
    echo $randomBan;
    $elem = $arr[$randomBan]; ?>
    
    <div style = width:200px;height:200px;background-size:cover;background-position:center;background-image:<?=$elem['url']?>></div>
    <?php
}
 randBanner($arrbanner);
 
 

$unSort=[];

for($i=0;$i<5;$i++){
    $unSort[] = rand(10,100);
}
function displaySort($arr){
    $str = "";
    for ($i=0;$i < count($arr);$i++){
    $str .= strval($arr[$i]).'-';
}
    echo "<p>$str</p>";
    echo "<br>";
    

    $strSort = "";
    sort($arr);


    for ($i=0;$i < count($arr);$i++){
        $strSort .= strval($arr[$i]).'-';
    }
    echo "<p>$strSort</p>";
}
 displaySort($unSort); 


 
 
$position=[["x"=>rand(100,500),"y"=>rand(100,500)],["x"=>rand(100,500),"y"=>rand(100,500)],["x"=>rand(100,500),"y"=>rand(100,500)],["x"=>rand(100,500),"y"=>rand(100,500)],["x"=>rand(100,500),"y"=>rand(100,500)],["x"=>rand(100,500),"y"=>rand(100,500)],["x"=>rand(100,500),"y"=>rand(100,500)],["x"=>rand(100,500),"y"=>rand(100,500)],["x"=>rand(100,500),"y"=>rand(100,500)],["x"=>rand(100,500),"y"=>rand(100,500)]];
$colors=['red','yellow','blue','green'];

?>
<style>
.color-div {
    position:absolute;
    width:20px;
    height:20px; 
  border-radius:50%;
    animation: blink 2s infinite;
} @keyframes blink {
    from { opacity: 1; }
    to { opacity: 0;  }
   }
}
</style>
<?php
function disco($array,$color){
   foreach($array as $k=> $item){ ?>
   <div class = "color-div" style = "top:<?=$item["x"]?>;left:<?=$item["y"]?>;background:<?=$color[rand(0,count($color))]?>"></div>
   <?php   
       
   }
}

disco($position,$colors);
