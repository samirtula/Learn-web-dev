<?php
require ('vendor/autoload.php');

use classes\CheckInUser;
use classes\MessageCreator;




$decodedData = json_decode(file_get_contents('php://input'),true);


$newMessage = new MessageCreator();
$newMessage->setName($decodedData[1]);
$newMessage->setMessage($decodedData[0]);
$newMessage->setDate();
$MessageInjection = $newMessage->setMsgToDataBaseQuery("INSERT INTO `messages` (`user`,`message`,`date`) VALUES ($newMessage->name,$newMessage->message,$newMessage->date);");

$user = new CheckInUser();

$selectMessages = $user->query("SELECT * FROM messages");
$authorizationInForumResult = $user->showMessages();
print_r($authorizationInForumResult);

?>
