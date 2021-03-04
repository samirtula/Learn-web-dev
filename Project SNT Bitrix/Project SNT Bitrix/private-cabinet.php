<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Личный кабинет</title>
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
      <div class="nav__wrapper">
        <div class="nav__logo-image"></div><a href="index.php">главная</a><a href="news.php">новости</a><a href="/authorization/">личный кабинет</a><a href="/letter/">написать в правление</a><a href="/forum/">форум</a><a href="/boards/">объявления</a><a href="/gallery/">фотогалерея</a><a href="/weather/">погода</a>
        <div class="nav__burger-menu"><span></span></div>
        <div class="footer__social-links"><a class="footer__social-links-login" href="/authorization/"></a></a></div>
      </div>
      <div class="nav__burger-wrapper clicked">
        <div class="nav__burger-block"><a href="index.php">главная</a><a href="news.php">новости</a><a href="/authorization/">личный кабинет</a><a href="/letter/">написать в правление</a><a href="/forum/">форум</a><a href="/boards/">объявления</a><a href="/gallery/">фотогалерея</a><a href="/weather/">погода</a></div>
      </div>
    </nav>
    <section class="private-cabinet__image images">
      <div class="private-cabinet__title">
        <div class="private-cabinet__title-headers">
          <h1>личный кабинет</h1>
        </div>
      </div>
    </section>
    <section class="private-cabinet">
      <div class="private-cabinet__wrapper">
        <div class="private-cabinet__menu-block"><a class="private-cabinet__menu-block-link-wrapper" href="#">
            <div class="private-cabinet__menu-block-link-inner"><span>Передача показаний счетчика электроэнергии</span></div></a><a class="private-cabinet__menu-block-link-wrapper" href="#">
            <div class="private-cabinet__menu-block-link-inner"><span>Передача показаний счетчика воды</span></div></a><a class="private-cabinet__menu-block-link-wrapper" href="#">
            <div class="private-cabinet__menu-block-link-inner"><span>Взнос за воду</span></div></a><a class="private-cabinet__menu-block-link-wrapper" href="#">
            <div class="private-cabinet__menu-block-link-inner"><span>Взнос за электроэенергию</span></div></a><a class="private-cabinet__menu-block-link-wrapper" href="#">
            <div class="private-cabinet__menu-block-link-inner"><span>Квитанция на оплату</span></div></a><a class="private-cabinet__menu-block-link-wrapper" href="#">
            <div class="private-cabinet__menu-block-link-inner"><span>История показаний</span></div></a><a class="private-cabinet__menu-block-link-wrapper" href="#">
            <div class="private-cabinet__menu-block-link-inner"><span>История платежей</span></div></a></div>
        <div class="private-cabinet__menu-block">
          <form class="private-cabinet__form">
            <input type="text" placeholder="Имя">
            <input type="text" placeholder="Фамилия">
            <input type="email" placeholder="Адрес электронной почты">
            <input type="tel" placeholder="Номер телефона">
            <input type="text" placeholder="Номер участка">
            <input class="login__form-button" type="submit" value="Изменить данные">
          </form>
          <form class="private-cabinet__change-password-form">
            <input type="password" placeholder="Новый пароль">
            <input type="password" placeholder="Подтвердите пароль">
            <input class="login__form-button" type="submit" value="Изменить пароль">
          </form>
        </div>
      </div>
    </section>
    <footer class="footer">
      <div class="footer__wrapper">
        <div class="nav__logo-image"></div><a href="index.php">главная</a><a href="news.php">новости</a><a href="/authorization/">личный кабинет</a><a href="/letter/">написать в правление</a><a href="/forum/">форум</a><a href="/boards/">объявления</a><a href="/gallery/">фотогалерея</a><a href="/weather/">погода</a>
        <div class="footer__social-links"><a class="footer__social-links-login" href="/authorization/"></a></a></div>
      </div>
    </footer>
  <script type="text/javascript" src="scripts/app.js"></script></body>
</html>