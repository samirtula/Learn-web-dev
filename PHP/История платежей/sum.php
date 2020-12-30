<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Задание 13</title>
  </head>

  <form class="center">
    <select name="inc_cons" id="in">
       <option value="INCOME">Доход</option>
       <option value="CONSUMPTION">Расход</option>
    </select>
    <input placeholder="Источник дохода" name="incTarget" type="text">
    <input placeholder="Цель расхода" name="consumptionTarget" type="text">
    <input placeholder="Сумма" name="sum" type="text">
    <select name="currency" id="curr">
       <option value="$">$</option>
       <option value="€">€</option>
   </select>
    <input type="submit" value="Отправить" name="submit">
</form>

<form  class ="months"><p class="table_footer" >Укажите месяц отчета</p>

    <select name="months" id="in">
       <option value="01">Январь</option>
       <option value="02">Февраль</option>
       <option value="03">Март</option>
       <option value="04">Апрель</option>
       <option value="05">Май</option>
       <option value="06">Июнь</option>
       <option value="07">Июль</option>
       <option value="08">Август</option>
       <option value="09">Сентябрь</option>
       <option value="10">Октябрь</option>
       <option value="11">Ноябрь</option>
       <option value="12">Декабрь</option>
    </select>
    <input type="submit" value="Отправить" name="submit">
<form>

<style>
    .none {
        display:none;
    }
    form.center {
        display: flex;
        flex-direction: column;
        width:350px;
        position :absolute;
        top:30%;
        left:45%;
    }
    input,select {
        height:30px;
        margin-bottom:15px;
        font-size: 16px;
    }
    table,tr,td {
        border: 1px solid black;
        border-collapse: collapse
    }
    td {
        width:130px;
        height:30px;
        text-align:center;
    }
    .table_footer {
        width: 50%;
        font-size: 18px;
        font-weight: 600;
    }
    li {
        margin-left:280px;
        font-size: 18px;
    }
</style>

<script>
    let regex = /[^0-9]/g
    let sum = document.querySelector('[name = sum]');
    
    sum.oninput = function(){
    this.value = this.value.replace(regex, '');
  }
    let type = document.querySelector("[name = inc_cons]");
    let optOut = document.querySelector("[name = consumptionTarget]");
    let optIn = document.querySelector("[name = incTarget]");
    
    type.addEventListener("change", function(){
        
        if (type.value === "INCOME"){
            optOut.classList.add("none")
            optIn.classList.remove("none")
            optOut.value = "";
        }
        if (type.value === "CONSUMPTION")
        {
            optIn.classList.add("none")
            optOut.classList.remove("none")
            optIn.value = "";
        }
        });
        
        if (type.value === "INCOME"){
            optOut.classList.add("none")
            optIn.classList.remove("none")
            optOut.value = "";
        }
        if (type.value === "CONSUMPTION")
        {
            optIn.classList.add("none")
            optOut.classList.remove("none")
            optIn.value = "";
        }
        
</script>


<script>


const list = document.getElementById("content");


const months = document.querySelector('.months');

const ajaxFilter = (formData) => {
fetch('filter.php', {
    method: 'POST',
    headers: {
        'Content-Type':'application/json',
    },
    body: JSON.stringify(formData)
    })
     .then(response => console.log(response))
     .catch(error => console.error(error))
};


months.addEventListener('submit', function(e){
        e.preventDefault();
        let formData = new FormData(this);
        formData = Object.fromEntries(formData);

        ajaxFilter(formData)
        }
        );


const ajaxSend = (formData) => {
fetch('sum.php', {
    method: 'POST',
    headers: {
        'Content-Type':'application/json',
    },
    body: JSON.stringify(formData)
    })
     .then(response => console.log(response))
     .catch(error => console.error(error))
};


const forms = document.querySelector('form');

    forms.addEventListener('submit', function(e){
        e.preventDefault();
        if (optIn.value == "" && optOut.value == "" || sum.value == "") {
            alert('Вы заполнили не все поля');
        } 
        else 
        {
        let formData = new FormData(this);
        formData = Object.fromEntries(formData);
        
        ajaxSend(formData)    
        }
        });

</script>

<?php


$decodedData = json_decode(file_get_contents('php://input'),true);

$errors = [];
if(!empty($decodedData)){
    foreach($decodedData as $k => $value) {
        $value = trim(strip_tags($value));
    }
}

function saveResult($Data)
{
    $string = '';
    $string .= 'Дата' . ':' . date('d.m.Y').PHP_EOL;
    foreach($Data as $k => $value){
        if (!empty($value)){
        $string .= $k . ':' . $value . PHP_EOL;
    }
    }
    if (strpos($string, 'INCOME') !== false){
        $save = file_put_contents('income.txt',$string, FILE_APPEND);
        return $save;
    } 
    else 
    {
        $save = file_put_contents('consumption.txt',$string, FILE_APPEND);
        return $save;
    }
}

if(!empty($decodedData)) saveResult($decodedData);


$file = file_get_contents('./income.txt');
$filed = trim(json_encode($file,JSON_UNESCAPED_UNICODE+JSON_NUMERIC_CHECK),'"');
$arrFromfileIncome=explode('\n', $filed);
$arrEditedIncome=(array_diff($arrFromfileIncome, array('')));
$arrEditedIncome = array_chunk($arrEditedIncome,5);



$sumMoneyIn= [];

foreach ($arrEditedIncome as $k => $value) {
    foreach ($value as $k => $item) {
        if ($k === 3) $sumMoneyIn[] = substr($item,(strpos($item, ':')+1),-2) . substr($value[4],(strpos($value[4], ':')+1),-2);
    }
} 

$USAIn = [];
$EUROIn = [];

foreach($sumMoneyIn as $k => $value) {
    if(stripos($value, '$')) $USAIn[] = substr($value,0,-1);
    if(stripos($value, '€')) $EUROIn[] = substr($value,0,-3);

}

$USAIn = array_sum($USAIn);
$EUROIn = array_sum($EUROIn);




$fileCons=file_get_contents('./consumption.txt');
$filedCons = trim(json_encode($fileCons,JSON_UNESCAPED_UNICODE+JSON_NUMERIC_CHECK),'"');
$arrFromfileCons=explode('\n',$filedCons);
$arrEditedCons=(array_diff($arrFromfileCons, array('')));
$arrEditedCons = array_chunk($arrEditedCons,5);



$coommonCons = [];
$sumMoney= [];

foreach ($arrEditedCons as $k => $value) {
    foreach ($value as $k => $item) {
        if ($k === 2) $coommonCons[] = substr($item,(strpos($item, ':')+1),-2);
        if ($k === 3) $sumMoney[] = substr($item,(strpos($item, ':')+1),-2) . substr($value[4],(strpos($value[4], ':')+1),-2);
    }
} 



$USA = [];
$EURO = [];

foreach($sumMoney as $k => $value) {
    if(stripos($value, '$')) $USA[] = substr($value,0,-1);
    if(stripos($value, '€')) $EURO[] = substr($value,0,-3);

}

$USA = array_sum($USA);
$EURO = array_sum($EURO);


$commonConsCounted=array_count_values($coommonCons);

arsort($commonConsCounted);
$max = (array_slice($commonConsCounted,0,3));

?>
<br>
<p class="table_footer">Общие данные по расходам и доходам</p>
<table>
    <thead>
        <tr>
            <td>
                Дата операции
            </td>
            <td>
                Тип операции
            </td>
            <td>
                Цель операции
            </td>
            <td>
                Сумма операции
            </td>
            <td>
                Валюта
            </td>
        </tr>
    </thead>
    <tbody>
        <?foreach ($arrEditedCons as $data):?>
            <tr>
                <?foreach ($data as $str):?>
                    <td>
                        <?=substr($str,(strpos($str, ':')+1),-2)?>
                    </td>
                <?endforeach;?>
            </tr>
        <?endforeach;?>
    </tbody>
</table>
<p class=table_footer>Общая сумма расходов в $ составляет: <?=$USA?>.</p>
<p class=table_footer>Общая сумма расходов в € составляет: <?=$EURO?>.</p>

    <p class=table_footer>Самые распространенные расходы: </p>
    <ul>
        <?foreach($max as $k=> $value):?>
            <li><?=$k . " " . $value . ' раз'?>.</li>
        <?endforeach;?>
    </ul>            
<br>
<br>

<table>
    <thead>
        <tr>
            <td>
                Дата операции
            </td>
            <td>
                Тип операции
            </td>
            <td>
                Цель операции
            </td>
            <td>
                Сумма операции
            </td>
            <td>
                Валюта
            </td>
        </tr>
    </thead>
    <tbody>
        <?foreach ($arrEditedIncome as $data):?>
            <tr>
                <?foreach ($data as $str):?>
                    <td>
                        <?=substr($str,(strpos($str, ':')+1),-2)?>
                    </td>
                <?endforeach;?>
            </tr>
                <?endforeach;?>
    </tbody>
</table>
<p class=table_footer>Общая сумма доходов в $ составляет: <?=$USAIn?>.</p>
<p class=table_footer>Общая сумма доходов в € составляет: <?=$EUROIn?>.</p>

<br>

<p class=table_footer>Разница Доходов/Расходов в $ составляет: <?=$USAIn - $USA?>.</p>
<p class=table_footer>Разница Доходов/Расходов в € составляет: <?=$EUROIn - $EURO?>.</p>

