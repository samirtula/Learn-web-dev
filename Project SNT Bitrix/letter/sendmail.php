<?php
$decodedData = json_decode(file_get_contents('php://input'), true);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';


$mail = new PHPMailer(true);

$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', '../local/templates/snt/phpMailer/language/');


$mail->isSMTP();
$mail->Host = 'smtp.mail.ru';
$mail->SMTPAuth = true;
$mail->Username = 'xx';                                             /*Заполнить*/
$mail->Password = 'xx';                                             /*Заполнить*/
$mail->SMTPSecure = 'ssl';
$mail->Port = '465';


$mail->setFrom('xx', 'Обращение в правление');
$mail->addAddress('xx');
$mail->IsHTML(true);


$mail->Subject = $decodedData['theme'];
$body = '';
if (trim(!empty($decodedData['name']))) {
    $body = '<p>ФИО:' . $decodedData['name'] . '</p>';
}
if (trim(!empty($decodedData['email']))) {
    $body .= '<p>E-mail:' . $decodedData['name'] . '</p>';
}
if (trim(!empty($decodedData['telNum']))) {
    $body .= '<p>Телефон:' . $decodedData['telNum'] . '</p>';
}
if (trim(!empty($decodedData['message']))) {
    $body .= '<p>Сообщение:' . $decodedData['message'] . '</p>';
}

$mail->Body = $body;

if (!$mail->send()) {
    $message = 'Ошибка';
} else {
    $message = 'Данные отправлены';
}

$response = ['message' => $message];

header('Content-Type: application/json');
echo json_encode($response)
?>
