<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Написать в правление");
?>
    <section class="letter-image images">
        <div class="letter-image__title">
            <div class="letter-image__title-headers">
                <h1>написать письмо <br>в правление</h1>
            </div>
        </div>
    </section>
    <section class="letter">
        <div class="letter__wrapper">
            <form class="letter__form" id="form">
                <input class="req" type="text" name="name" placeholder="ФИО">
                <input class="req email" type="email" name="userEmail" placeholder="Адрес электронной почты">
                <input class="req tel" type="text" name="telNum" placeholder="Номер телефона">
                <input class="req" type="text" name="theme" placeholder="Тема письма">
                <textarea class="req" name="message" placeholder="Сообщение"></textarea>
                <input class="letter__form-button" type="submit" value="Отправить">
            </form>
        </div>
    </section>
<?php

use \Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/scripts/mailer.js"); ?>                             <!--Подключаем скрипт Валидации полей и fetch-->
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>