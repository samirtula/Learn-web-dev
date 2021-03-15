<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Погода в СНТ");
?>
<?php
header("Access-Control-Allow-Origin: *");
setlocale(LC_ALL, "ru_RU");
date_default_timezone_set("Europe/Moscow");

require('../vendor/autoload.php');

use classes\WeatherInfo;

$filename = 'weather-data.cache';
$expiry = 1800;

$weather = new WeatherInfo($filename, $expiry);
$weather->readCache();
$weather->setWeatherValues();


$today = date("d.m.Y");
?>

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
                    <img src="<?= 'https://yastatic.net/weather/i/icons/blueye/color/svg/' . $weather->icon ?>"
                         class="weather__image">
                    <div class="weather__info">
                        <span class="weather__temperature"> <?= $weather->temp . '&deg;C<br>' ?></span>
                        <span class="weather__info-text"> <img src="../local/templates/snt/images/weather/pressure.svg"> Давление: <?= $weather->pressure . ' мм рт. ст.<br>' ?></span>
                        <span class="weather__info-text"> <img src="../local/templates/snt/images/weather/wind.svg"> Скорость ветра:  <?= $weather->speed . ' м/с.<br>' ?></span>
                        <span class="weather__info-text"> <img src="../local/templates/snt/images/weather/arrow.svg"
                                                               class="wind"> Направление ветра: <?= $weather->windDir . '<br>' ?></span>
                        <span class="weather__info-text"> <img src="../local/templates/snt/images/weather/prob.svg"> Возможн. осадков: <?= $weather->precProb . '%.' ?></span>
                        <span class="weather__info-text"> <img src="../local/templates/snt/images/weather/humidity.svg"> Влажность: <?= $weather->humidity . '%.<br>' ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>