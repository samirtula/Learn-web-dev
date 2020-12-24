<?php
$file = file_get_contents('http://ddred.ru/users.php');
$save = file_put_contents('employers.txt', $file);
$filegeted = file_get_contents('./employers.txt');
$arrfile = json_decode($filegeted, true);
echo "<pre>";
/* print_r($arrfile); */
echo "<pre>";

//- написать функцию, которая находит полных тезок


function oneName($arr)
{
    $namesArr = [];
    foreach ($arr as $j => $value) {
        foreach ($value as $k  => $item) {
            if ($k === 'name') $namesArr[] = $item;
        }
    }

    $commonNames = array_count_values($namesArr);

    $fullSameName = [];
    foreach ($commonNames as $k  => $item) {
        if ($item>1) $fullSameName[] = $k;
    }

    $fullNamefinally=[];
    foreach ($arr as $k => $value) {
        foreach ($value as $j  => $item) {
            foreach($fullSameName as $n => $subitem) {
                if ($subitem === $item) {
                    $fullNamefinally[$subitem][]=$value;
                }
            }
        }
    }
    
return $fullNamefinally;
}
/* oneName($arrfile); */


//- написать функцию, которая возвращает всех однофамильцев

function oneSurname($arr)
{
    $namesArr = [];
    foreach ($arr as $j => $value) {
        foreach ($value as $k  => $item) {
            if ($k === 'name') {
                $namesArr[] = substr($item, 0, strpos($item, ' '));
            }
        }
   
    }
    $commonNames = array_count_values($namesArr);


    $surnamesSame=[];
    foreach ($commonNames as $k  => $item) {
        if ($item>1) $surnamesSame[] = $k;
    }


    $sameSurnames = [];
    foreach ($arr as $k => $value) {
        foreach ($value as $j  => $item) {
            foreach($surnamesSame as $n => $subitem) {
                if (stristr($item,$subitem )) {
                    $sameSurnames[$subitem][]=$item;
                }
            }
        }
    }

    return $sameSurnames;
}

/* oneSurname($arrfile); */

//- написать функцию, которая возвращает всех пользователей, которые старше 31 года
function minage ($arr, $age)
{ 
    $ages = [];
    foreach ($arr as $j => $value) {
        foreach ($value as $k  => $item) {
            if ($k === 'age' && $item > $age ) $ages[] = $value;
        }
    }

    return $ages;
}

$a = 31;
/* minage($arrfile, $a );  */


//- написать функцию, которая вычисляет средний возраст пользователей

function midAdge($arr)
{
    $ages = [];
    foreach ($arr as $j => $value) {
        foreach ($value as $k  => $item) {
            if ($k === 'age') $ages[] = $item;
        }
    }

    $mid = ceil(array_sum($ages)/count($ages));

    return $mid;
}

/* midAdge($arrfile); */


//- написать функцию, которая определяет сколько в компании сотрудников с одинаковой должностью

function employers($arr) 
{
    $employers = [];
    foreach ($arr as $j => $value) {
        foreach ($value as $k  => $item) {
            if ($k === 'position') $employers[] = $item; // массив должностей
        }
    }

    $employersNames = array_count_values($employers);// число сколько должностей и сколько позиций

    $fullSamePosName = [];
    foreach ($employersNames as $k  => $item) {
        if ($item>1) $fullSamePosName[] = $k; // только должности число которых больше 1
    }

    $fullSamePosfinally=[];
    foreach ($arr as $k => $value) {
        foreach ($value as $j  => $item) {
            foreach($fullSamePosName as $n => $subitem) { //перебираем должности число позиций которых более 1 
                if ($subitem === $item) {//сравниваем со всеми значениями массивов внутри основного массива
                    $fullSamePosfinally[$subitem][]=$value; // свопадает забираем в конечный массив предварительно поместив в подмассив с названием профессии
                }
            }
        }
    }
    $positionNums = [];
    foreach($fullSamePosfinally as $k => $item){
        $positionNums[]= $k . ' должностей ' . count($item) . '<br>';
    }
   
    return $positionNums;
}

employers($arrfile); 

// зовут Bob Proper. Т.е. функция должна вернуть массив без сотрудников, которые подверглись увольнению

function firedRand ($arr) 
{
    $potentialFired = [];
    foreach ($arr as $k => $value) {
        if ($value['name'] === 'Bob Proper' || $value['age']%3 === 0) $potentialFired[] = $value;
    }
    return $potentialFired;
}

/* firedRand($arrfile); */
//- написать функцию, которая выдает зарплату сотруднику. 
//Зарплата считается следующим образом должности 'Cleaner', 'Director', 'Clerk'  (случайное число от 1000 до 3000 умножить на 3.2 минус возраст сотрудника) , все остальные должности (случайное число от 1000 до 3000 умножить на 0.98 минус возраст сотрудника). На выходе должен получиться массив, в котором для каждого пользователя будет указана зп Значение зп округляем до целого числа вниз.

function salary($arr) 
{
    $arrForSalary = $arr;
    foreach($arr as $k=> $value) {
        if ($value['position'] === 'Cleaner' || $value['position'] === 'Director' || $value['position'] === 'Clerk'){
            $arrForSalary[$k]['salary'] = ceil((rand(1000,3000) * 3.2) - $value['age']);
        }
        else
        {
            $arrForSalary[$k]['salary'] = ceil((rand(1000,3000) * 0.98) - $value['age']);
        }
    }
    return $arrForSalary;
}

/* salary($arrfile); */


