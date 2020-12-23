<?php
$request = $_REQUEST;
$errors = [];
foreach($request as $k => $item) {
    $item = trim(strip_tags($item));
    if (empty($item)) {
        $errors[$k] = 'Не заполнено поле ' . $k;
    }
}



function getPasswordHash($userPassword)
{
    $salt = 'samy2020';
    $hashString = $userPassword . $salt;
    return md5($hashString);
}



function saveResult($req) 
{
    $string='';
    $string .= date('d.m.Y H:i') . PHP_EOL;
    foreach ($req as $k => $val){
        if ($k === 'pass') {
            $val = getPasswordHash($val);
        }
        $string .= $k . ':' . $val . PHP_EOL;
    }
    $string .= '==================='. PHP_EOL;
    $save = file_put_contents('homeworkForm.txt',$string, FILE_APPEND);
    return $save;
}   


if (empty($errors)) {
    $saveResult = saveResult($request);
}

?>
<ul class="<?=(!empty($errors)) ? 'error': ''?>">
    <?if (!empty ($errors)):?>
        <?foreach ($errors as $error):?>
            <li><?=$error?></li>
        <?endforeach;?>
    <?endif;?>
</ul>


<div>
<?=($saveResult === false) ? 'Ошибка на стороне сервера' : ''?>
</div>