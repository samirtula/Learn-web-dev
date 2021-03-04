<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Личный кабинет");
?>
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
    <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>