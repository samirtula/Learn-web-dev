<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<footer class="footer">
    <div class="footer__wrapper">
        <div class="nav__logo-image"></div><a href="/./">главная</a><a href="/news/">новости</a><a href="<? if ($USER->IsAuthorized()): ?>/private/ <?else:?> /authorization <?endif;?>">личный кабинет</a><a href="/letter/">написать в правление</a><a href="/forum/">форум</a><a href="/boards/">объявления</a><a href="/gallery/">фотогалерея</a><a href="/weather/">погода</a><!-- Делаем проверки авторизации меняем ссылки -->
        <div class="footer__social-links"><a class="footer__social-links-login" href="<? if ($USER->IsAuthorized()): ?>/private/ <?else:?> /authorization <?endif;?>"></a></div><!-- Делаем проверки авторизации меняем ссылки -->
    </div>
</footer>
<?php
use \Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/scripts/app.js");
$APPLICATION->ShowHeadScripts()?>



</body>
</html>