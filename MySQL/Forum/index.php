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
    <title>Document</title>
</head>
<body>
    <div class="authorization">
        Welcome <br> You are the One
        <button class="checkIn" >
            Authorisation
        </button>
        <button class="registration" >
            Registration
        </button>
        <form method="post" action="chekIn.php" class="authorization__checkIn">
            <input class="user" name="name" type="text" placeholder="user">
            <input class="user" name="password" type="password" placeholder="password">
            <input class="userIn" type="submit" value="Enter">
        </form>
        <form method="post" action="reg.php" class="authorization__registration">
            <input class="user" name="name" type="text" placeholder="user">
            <input class="user" name="password" type="password" placeholder="password">
            <input class="user" name="confirm-password" type="password" placeholder="confirm password">
            <input class="user" name="email" type="email" placeholder="email">
            <input class="userIn userReg" type="submit" value="Registration">
        </form>
    </div>
    <script src="app.js"></script>
</body>
</html>