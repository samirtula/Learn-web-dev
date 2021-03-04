<?php
header("Access-Control-Allow-Origin: *");
setlocale(LC_ALL, "ru_RU");
date_default_timezone_set("Europe/Moscow");

require ('vendor/autoload.php');
use classes\WeatherInfo;


$filename = 'weather-data.cache';
$expiry = 1800;

$weather = new WeatherInfo($filename,$expiry);
$weather->readCache();
$weather->setWeatherValues();


$today = date("d.m.Y");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Погода в СНТ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
  <link href="styles/app.css" rel="stylesheet"></head>
  <body id="snt">
    <header class="header">
      <div class="header__wrapper">
        <div class="header__meet">
          <div class="header__meet-clock-image"></div><span class="header__meet-text">Общее собрание состоится 15.05.2021 г.</span>
        </div>
        <div class="header__tel">
          <div class="header__tel-phone-image"></div><span class="header__tel-num">8-910-165-29-07</span>
        </div>
        <div class="header__mail">
          <div class="header__mail-image"></div><span class="header__mail-text">snt.solnechnyi-92@mail.ru</span>
        </div>
      </div>
    </header>
    <nav class="nav">
      <div class="nav__wrapper" >
        <div class="nav__logo-image"></div><a href="index.php">главная</a><a href="news.php">новости</a><a href="/authorization/">личный кабинет</a><a href="/letter/">написать в правление</a><a href="/forum/">форум</a><a href="/boards/">объявления</a><a href="/gallery/">фотогалерея</a><a href="/weather/">погода</a>
        <div class="nav__burger-menu"><span></span></div>
        <div class="footer__social-links"><a class="footer__social-links-login" href="/authorization/"></a></a></div>
      </div>
      <div class="nav__burger-wrapper clicked">
        <div class="nav__burger-block"><a href="index.php">главная</a><a href="news.php">новости</a><a href="/authorization/">личный кабинет</a><a href="/letter/">написать в правление</a><a href="/forum/">форум</a><a href="/boards/">объявления</a><a href="/gallery/">фотогалерея</a><a href="/weather/">погода</a></div>
      </div>
    </nav>
    <section class="weather-image images">
      <div class="weather-image__title">
        <div class="weather-image__title-headers">
          <h1>погода в СНТ</h1>
        </div>
      </div>
    </section>
    <section class="weather">
      <div class="weather__wrapper">
        <div class="weather__today">
          <div class="weather__inner-image">
            <img src="<?='https://yastatic.net/weather/i/icons/blueye/color/svg/' . $weather->icon?>" class="weather__image">
            <div class="weather__info">
                <span class="weather__temperature"> <?= $weather->temp .  '&deg;C<br>'?></span>
                <span class="weather__info-text"> <img src="images/weather/pressure.svg"> Давление: <?= $weather->pressure .  ' мм рт. ст.<br>'?></span>
                <span class="weather__info-text"> <img src="images/weather/wind.svg"> Скорость ветра:  <?= $weather->speed .  ' м/с.<br>'?></span>
                <span class="weather__info-text"> <img src="images/weather/arrow.svg" class="wind"> Направление ветра: <?=$weather->windDir . '<br>'?></span>
                <span class="weather__info-text"> <img src="images/weather/prob.svg"> Вероятность осадков: <?=$weather->precProb . '%.'?></span>
                <span class="weather__info-text"> <img src="images/weather/humidity.svg"> Влажность: <?= $weather->humidity .  '%.<br>'?></span></div>
            </div>
          </div>
      </div>
    </section>
    <footer class="footer">
      <div class="footer__wrapper">
        <div class="nav__logo-image"></div><a href="index.php">главная</a><a href="news.php">новости</a><a href="/authorization/">личный кабинет</a><a href="/letter/">написать в правление</a><a href="/forum/">форум</a><a href="/boards/">объявления</a><a href="/gallery/">фотогалерея</a><a href="/weather/">погода</a>
        <div class="footer__social-links"><a class="footer__social-links-login" href="/authorization/"></a></a></div>
      </div>
    </footer>
  <script type="text/javascript" src="scripts/app.js"></script>

  <script>
      let windDirection = "<?= $weather->windDir?>";
      let windImg = document.querySelector('.wind');
      switch (windDirection) {
          case " С.":
              windImg.style.transform = 'rotate(180deg)';
              break;
          case " В.":
              windImg.style.transform = 'rotate(-90deg)';
              break;
          case " З.":
              windImg.style.transform = 'rotate(90deg)';
              break;
          case " СВ.":
              windImg.style.transform = 'rotate(-135deg)';
              break;
          case " СЗ.":
              windImg.style.transform = 'rotate(135deg)';
              break;
          case " ЮВ.":
              windImg.style.transform = 'rotate(-45deg)';
              break;
          case " ЮЗ.":
              windImg.style.transform = 'rotate(45deg)';
              break;
      }
  </script>
  </body>
</html>