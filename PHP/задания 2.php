
<?php
/*Вывести на страницу текстовое поле и кнопку. По
клику на кнопке страница обновляется и под текстовым полем отображается то, что пользователь ввел
в текстовое поле.*/

$request = $_REQUEST;
$errors = [];

echo'<pre>';
print_r($request);
echo'</pre>';


 
function getPasswordHash($val)
{
    $salt = 'sam';
    $hashString = $userPassword . $salt;
    return md5($val);
}



function saveResult($request)
{
    $string = '';
    $string .= date('d.m.Y H:i') . PHP_EOL;
    foreach($request as $k => $value) {
        if($k === 'password'){
            $value = getPasswordHash($value);
        }
        $string .= $k .':' . $value . PHP_EOL;
    }
        $string .= '==============' . PHP_EOL;
        $save = file_put_contents('form.txt', $string, FILE_APPEND);
        return $save;
    }




foreach ($request as $k => $item) {
    $item=trim(strip_tags($item));
    if (empty($item)) {
        $errors[$k] = 'Не заполнили поле ' . $k;
    }
}



if (empty($errors)) {
    $saveResult = saveResult($request);
}

?>

<ul class="<?=(!empty($errors)) ? 'error' : ''?>">
    <?if (!empty($errors)):?>
        <?foreach ($errors as $error):?>
            <li><?=$error?></li>
        <?endforeach;?>
    <?endif;?>
</ul>

<div> <?=($saveResult === false)? 'Ошибка на стороне сервера' : ''?> </div>
        

<form method="post" action="задания 2.php">
    <input placeholder="Имя" name="name" type="text">
    <input placeholder="Фамилия" name="surname" type="text">
    <input placeholder="Возраст" name="age" type="text">
    <input placeholder="Пароль" name="password" type="password">
    <input type="submit" value="Отправить">
</form>




/*Вывести на страницу текстовое поле, кнопку и список
стран. Пользователь вводит текст в поле, нажимает
кнопку и в списке выводятся только те страны, которые удовлетворяют условию поиска (строка поиска в
результатах выделяется жирным и окрашена в красный).

*/
<form method="post" action="задания 2.php">
    <input placeholder="Страна" name="country" type="text">
    <input type="submit" value="Поиск">
   
</form>



<?php
$countries = ['Azerbaijan','Albania','Belarus','Belgium','Canada','Russia','USA'];
foreach($countries as $k=> $string){
    if (strpos($string, $request['country'])){
        $substr = '<span>' . $request['country'] . '</span>';
        $editedStr= str_replace($request['country'], $substr, $string);
        $countries[$k]=$editedStr;
    }   
}
?>
<ul>
    <?foreach ($countries as $country):?>
        <li><?=$country?></li>
    <?endforeach;?>
</ul>

<style> 
span {
    color:red;
}
</style>


