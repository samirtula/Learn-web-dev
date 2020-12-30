
<?php
$decodedData = json_decode(file_get_contents('php://input'),true);


$fileCons=file_get_contents('./consumption.txt');
$filedCons = trim(json_encode($fileCons,JSON_UNESCAPED_UNICODE+JSON_NUMERIC_CHECK),'"');
$arrFromfileCons=explode('\n',$filedCons);
$arrEditedCons=(array_diff($arrFromfileCons, array('')));
$arrEditedCons = array_chunk($arrEditedCons,5);


$file = file_get_contents('./income.txt');
$filed = trim(json_encode($file,JSON_UNESCAPED_UNICODE+JSON_NUMERIC_CHECK),'"');
$arrFromfileIncome=explode('\n', $filed);
$arrEditedIncome=(array_diff($arrFromfileIncome, array('')));
$arrEditedIncome = array_chunk($arrEditedIncome,5);


$filterArr = [];

foreach ($arrEditedCons as $k => $value) {
    if (substr_compare($value[0], $decodedData['months'], 12, 2) === 0) {
        $filterArr[] = $value;
    }
}
foreach ($arrEditedIncome as $k => $value) {
    if (substr_compare($value[0], $decodedData['months'], 12, 2) === 0) {
        $filterArr[] = $value;
    }
}
echo '<pre>';
print_r($filterArr);
?>


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
    <?foreach ($filterArr as $data):?>
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
    li {
        margin-left:280px;
        font-size: 18px;
    }
</style>
