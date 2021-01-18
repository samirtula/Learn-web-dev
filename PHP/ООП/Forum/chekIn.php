<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="style.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
                integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                crossorigin="anonymous"></script>
        <script src="app.js"></script>
        <link href="style.css" rel="stylesheet">
        <title>Forum</title>
    </head>
<?php
require ('vendor/autoload.php');

use classes\CheckInUser;

$request = $_REQUEST;

$user = new CheckInUser();
$user->setName("'" . $request['name']."'");
$user->setPassword("'" .$request['password'] . "'");

$authorizationInForum = $user->query("SELECT * FROM users WHERE name=$user->name AND password=$user->password");
$authorizationInForumResult = $user->fetch_assoc();

$selectMessages = $user->query("SELECT * FROM messages");
?>

    <body class="forum-body">
        <form class="newMess">
            <textarea id="textarea" name="message" cols="30" rows="10"></textarea>
            <input class="publish" type="submit" value="PUBLISH">
        </form>
        <div class="main_block">
            <?=$user->showMessages()?>
        </div>
        <script>
            let userName = <?=$user->name?>;
            let mainRespData = '';
            let mainBlock = document.querySelector('.main_block');
            let textArea = document.querySelector('#textarea');
            const ajaxSend = (formData) => {
                fetch('publish.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type':'application/json',
                    },
                    body: JSON.stringify(formData)
                })
                    .then(response => response.text().then(function (data) {
                        mainRespData = data;
                        mainBlock.innerHTML = mainRespData;
                        textArea.value =" ";
                        console.log(mainRespData);
                    }))
                    .catch(error => console.error(error))
            };
            const form = document.querySelector('.newMess');

            form.addEventListener('submit', function(e){
                e.preventDefault();
                if (textArea.value == '') {
                    alert('this f*cking message is empty');
                }
                else
                {
                    let formData = new FormData(this);
                    formData = [textArea.value,userName];
                    ajaxSend(formData)
                }
            });
                let userNameDB = <?=$user->name?>;
                let userPass = <?=$user->password?>;

           function intervalFetch ()
            {
                fetch('checkDB.php', {
                method: 'POST',
                    headers: {
                    'Content-Type':'application/json',
                },
                body: JSON.stringify({userNameDB,userPass})
            })
            .then(response => response.text().then(function (data) {
                mainRespData = data;
                mainBlock.innerHTML = mainRespData;
            })).catch(error => console.error(error))
            };
            setInterval(intervalFetch,9000);
        </script>
    </body>
</html>