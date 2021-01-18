<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet">
    <title>Регистрация</title>
</head>
<body>

</body>
</html>
<?php
require "vendor/autoload.php";
use classes\Registration;

$requestReg = $_REQUEST;

$regUser = new Registration();
$regUser->setName("'" . trim(strip_tags($requestReg['name'])) . "'");
$regUser->setPassword("'" .trim(strip_tags($requestReg['password'])) . "'");
$regUser->setConfirmPassword("'" . trim(strip_tags($requestReg["confirm-password"])) . "'");
$regUser->setEmail("'" . trim(strip_tags($requestReg['email'])) . "'");
$regQuery = $regUser->query("SELECT * FROM `users` WHERE name = $regUser->name");
$regUser->fetch_assoc();

$newUserRegQuery = $regUser->query("INSERT INTO `users` (`name`, `password`, `email`) VALUES ($regUser->name, $regUser->password, $regUser->email);");

echo '<pre>';
print_r($newUserRegQuery);
