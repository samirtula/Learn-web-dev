<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<footer class="footer">
    <div class="footer__wrapper">
        <div class="nav__logo-image"></div><a href="../">главная</a><a href="/news/">новости</a><a href="/authorization/">личный кабинет</a><a href="/letter/">написать в правление</a><a href="/forum/">форум</a><a href="/boards/">объявления</a><a href="/gallery/">фотогалерея</a><a href="/weather/">погода</a>
        <div class="footer__social-links"><a class="footer__social-links-login" href="/authorization/"></a></div>
    </div>
</footer>
<?php
use \Bitrix\Main\Page\Asset;
$APPLICATION->ShowHead();
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/scripts/app.js");?><?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_SUFFIX" => "inc",
        "EDIT_TEMPLATE" => "",
        "PATH" => "/include/working_hours.php"
    )
);?>
</body>
</html>