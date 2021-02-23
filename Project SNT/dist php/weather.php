<?php
header("Access-Control-Allow-Origin: *");
setlocale(LC_ALL, "ru_RU");
date_default_timezone_set("Europe/Moscow");

$filename = 'weather-data.cache';
$expiry = 1800;

function readCache($filename, $expiry)
{
    if (file_exists($_SERVER['DOCUMENT_ROOT'] .'/cache/'. $filename) && time() < (filemtime($_SERVER['DOCUMENT_ROOT'] . '/cache/' . $filename) + $expiry)) {
            $cache = file($_SERVER['DOCUMENT_ROOT'] . '/cache/' . $filename);
            $cache = implode('', $cache);
            return json_decode($cache);
    }
    else
    {
        writeWeatherCache($filename);
        $cache = file($_SERVER['DOCUMENT_ROOT'] . '/cache/' . $filename);
        $cache = implode('', $cache);
        return json_decode($cache);
    }
}


function writeWeatherCache ($filename)
{
    $url = "https://api.weather.yandex.ru/v2/informers?lat=54.1961&lon=37.6182";

    $opts = array(
        'http' => array(
            'method' => "GET",
            'header' => "X-Yandex-API-Key: 04640705-85d4-4828-86c5-41cecbc7776f"
        )
    );

    $context = stream_context_create($opts);
    $contents = file_get_contents($url, false, $context);


    $fp = fopen($_SERVER['DOCUMENT_ROOT'] .'/cache/'. $filename, 'w+');
    fwrite($fp, $contents);
    fclose($fp);


    chmod($fp, 0777);
}


$clima = readCache($filename,$expiry);


$temp = $clima->fact->temp;
$humidity = $clima->fact->humidity;
$speed = $clima->fact->wind_speed;
$pressure = $clima->fact->pressure_mm;
$icon = $clima->fact->icon . ".svg";
$precProb = $clima->forecast->parts[0]->prec_prob;
$windDir = $clima->forecast->parts[0]->wind_dir;


if ($windDir === 's') $windDir = " Ю.";
if ($windDir === 'n') $windDir = " С.";
if ($windDir === 'e') $windDir = " В.";
if ($windDir === 'w') $windDir = " З.";
if ($windDir === 'ne') $windDir = " СВ.";
if ($windDir === 'nw') $windDir = " СЗ.";
if ($windDir === 'se') $windDir = " ЮВ.";
if ($windDir === 'sw') $windDir = " ЮЗ.";


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
          <div class="header__meet-clock-image"></div><span class="header__meet-text">Общее собрание состоится 24.11.2021 в 17:30</span>
        </div>
        <div class="header__tel">
          <div class="header__tel-phone-image"></div><span class="header__tel-num">+7-920-955-77-88</span>
        </div>
        <div class="header__mail">
          <div class="header__mail-image"></div><span class="header__mail-text">snt_Tula@mail.ru</span>
        </div>
      </div>
    </header>
    <nav class="nav">
      <div class="nav__wrapper">
        <div class="nav__logo-image"></div><a href="index.php">главная</a><a href="news.php">новости</a><a href="authorization.php">личный кабинет</a><a href="letter.php">написать в правление</a><a href="forum.php">форум</a><a href="boards.php">объявления</a><a href="gallery.php">фотогалерея</a><a href="weather.php">погода</a>
        <div class="nav__burger-menu"><span></span></div>
        <div class="footer__social-links"><a class="footer__social-links-login" href="authorization.php"></a><a class="footer__social-links-vk" href="#"></a><a class="footer__social-links-ok" href="#"></a></div>
      </div>
      <div class="nav__burger-wrapper clicked">
        <div class="nav__burger-block"><a href="index.php">главная</a><a href="news.php">новости</a><a href="authorization.php">личный кабинет</a><a href="letter.php">написать в правление</a><a href="forum.php">форум</a><a href="boards.php">объявления</a><a href="gallery.php">фотогалерея</a><a href="weather.php">погода</a></div>
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
            <img src="<?='https://yastatic.net/weather/i/icons/blueye/color/svg/' . $icon?>" class="weather__image">
            <div class="weather__info">
                <span class="weather__temperature"><?= $temp .  '&deg;C<br>'?></span>
                <span class="weather__info-text"> <img src="images/weather/pressure.svg"> Давление: <?= $pressure .  ' мм рт. ст.<br>'?></span>
                <span class="weather__info-text"> <img src="images/weather/wind.svg"> Скорость ветра:  <?= $speed .  ' м/с.<br>'?></span>
                <span class="weather__info-text"> <img src="images/weather/arrow.svg" class="wind"> Направление ветра: <?=$windDir . '<br>'?></span>
                <span class="weather__info-text"> <img src="images/weather/prob.svg"> Вероятность осадков: <?=$precProb . '%.'?></span>
                <span class="weather__info-text"> <img src="images/weather/humidity.svg"> Влажность: <?= $humidity .  '%.<br>'?></span></div>
            </div>
          </div>
      </div>
    </section>
    <footer class="footer">
      <div class="footer__wrapper">
        <div class="nav__logo-image"></div><a href="index.php">главная</a><a href="news.php">новости</a><a href="authorization.php">личный кабинет</a><a href="letter.php">написать в правление</a><a href="forum.php">форум</a><a href="boards.php">объявления</a><a href="gallery.php">фотогалерея</a><a href="weather.php">погода</a>
        <div class="footer__social-links"><a class="footer__social-links-login" href="authorization.php"></a><a class="footer__social-links-vk" href="#"></a><a class="footer__social-links-ok" href="#"></a></div>
      </div>
    </footer>
  <script type="text/javascript" src="scripts/app.js"></script>

  <script>
      let windDirection = "<?= $windDir?>";
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