<?php
$file = file_get_contents('http://ddred.ru/users.php');
$save = file_put_contents('employers.txt', $file);
$filegeted = file_get_contents('./employers.txt');
$arrfile = json_decode($filegeted, true);
echo "<pre>";
print_r($arrfile);
echo "<pre>";




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

    echo "<pre>";
    print_r($commonNames);
    echo "<pre>";
}
/* oneName($arrfile); */

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
    echo "<pre>";
    print_r($sameSurnames);
    echo "<pre>";
}

/* oneSurname($arrfile); */


function sameage ($arr, $age){ 
    $ages = [];
    foreach ($arr as $j => $value) {
        foreach ($value as $k  => $item) {
            if ($k === 'age' && $item > $age ) $ages[] = $item;
        }
    }

    $commonAges = array_count_values($ages);

    $fullSameage= [];
    foreach ($commonAges as $k  => $item) {
        if ($item>1) $fullSameage[] = $k;
    }

    $fullNameAge=[];
    foreach ($arr as $k => $value) {
        foreach ($value as $j  => $item) {
            foreach($fullSameage as $n => $subitem) {
                if ($subitem === $item) {
                    $fullNameAge[$subitem][]=$value;
                }
            }
        }
    }

    echo "<pre>";
    print_r($fullNameAge);
    echo "<pre>";
}

$a = 31;
/* sameage($arrfile, $a ); */



function midAdge($arr){
    $ages = [];
    foreach ($arr as $j => $value) {
        foreach ($value as $k  => $item) {
            if ($k === 'age') $ages[] = $item;
        }
    }

    $mid = ceil(array_sum($ages)/count($ages));
    echo "<pre>";
    print_r($mid);
    echo "<pre>";
}

/* midAdge($arrfile); */

function employers($arr) {
    $count = count($arr);
    echo "<pre>";
    print_r($count);
    echo "<pre>";
}

/* employers($arrfile); */


function fired ($arr) {
    $count = count($arr);

}