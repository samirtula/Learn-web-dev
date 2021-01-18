<?php

use classes\CheckInUser;

require ('vendor/autoload.php');

$decodedData = json_decode(file_get_contents('php://input'),true);
$user = new CheckInUser();
$user->setName("'" . $decodedData['userNameDB']."'");
$user->setPassword("'" .$decodedData['userPass'] . "'");

$authorizationInForum = $user->query("SELECT * FROM users WHERE name=$user->name AND password=$user->password");
$authorizationInForumResult = $user->fetch_assoc();

$selectMessages = $user->query("SELECT * FROM messages");
$authorizationInForumResult = $user->showMessages();
print_r($authorizationInForumResult);