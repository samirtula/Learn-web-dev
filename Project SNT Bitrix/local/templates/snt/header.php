<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
    use \Bitrix\Main\Page\Asset;
    $APPLICATION->ShowHead();
    $APPLICATION->SetTitle("Главная");?>
    <title><?php $APPLICATION->ShowTitle(); ?></title>
    <?php
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/styles/app.css");
    Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">');
    ?>
</head>
<body id="snt">
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
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
    <div class="nav__wrapper">
        <div class="nav__logo-image"></div><a href="../">главная</a><a href="/news/">новости</a><a href="/authorization/">личный кабинет</a><a href="/letter/">написать в правление</a><a href="/forum/">форум</a><a href="/boards/">объявления</a><a href="/gallery/">фотогалерея</a><a href="/weather/">погода</a>
        <div class="nav__burger-menu"><span></span></div>
        <div class="footer__social-links"><a class="footer__social-links-login" href="/authorization/"></a></div>
    </div>
    <div class="nav__burger-wrapper clicked">
        <div class="nav__burger-block"><a href="../">главная</a><a href="/news/">новости</a><a href="/authorization/">личный кабинет</a><a href="/letter/">написать в правление</a><a href="/forum/">форум</a><a href="/boards/">объявления</a><a href="/gallery/">фотогалерея</a><a href="/weather/">погода</a></div>
    </div>
</nav>