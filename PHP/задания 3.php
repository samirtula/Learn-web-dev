<?php
$request = $_REQUEST;



$errLog;
$login = 'trewq';
$password = 'qwert';
foreach($request as $k=>$item) 
{
    if ($k == "login" || $k == "password2") {
        $uslog = trim(strip_tags($request['login']));
        $uspas = trim(strip_tags($request['password2']));
        ($uslog!=$login or $uspas!=$password) ? $errLog = "Ошибка. Повторите операцию или <a href = 'задания 3.2.php'>зарегистрируйтесь</a>"
        :header("Location: задания 3.1.php");
        
        
    }
}




?>
<form method="post" action="задания 3.php">
    <input placeholder="логин" name="login" type="text">
    <input placeholder="пароль" name="password2" type="text">
    <input type="submit" value="LOGIN" name="submit"> 
</form>

<span class="pos"><?=$errLog?></span>
<style>
form {
    position: absolute;
    top:45%;
    left:45%;
    
}

input[name='login'],input[name='password2'],input[name='submit']{
      height:25px;
      margin-left:15px;
}
input[name='submit']{
    width:100px;
    background:aqua;
    border-radius:5px;
}
span {
color:red;
font-weight:600;
}
.pos {
    position: absolute;
    top:50%;
    left:45%;
    margin-left:15px;
}
</style>
