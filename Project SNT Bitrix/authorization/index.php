<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?>
    <section class="private-image images">
      <div class="private-image__title">
        <div class="private-image__title-headers">
          <h1>авторизация</h1>
        </div>
      </div>
    </section>
    <section class="private-forms">
      <div class="private-forms__wrapper">
        <div class="private-forms__login login">
          <h3 class="title">Войти в систему</h3>
          <form class="login__form">
            <input type="email" placeholder="Адрес электронной почты">
            <input type="password" placeholder="Пароль">
            <label class="checkbox-other">
              <input type="checkbox" value="save" id="save-cookie"><span class="checkbox-other-text">Запомнить меня на этом компьютере</span>
            </label>
            <input class="login__form-button" type="submit" value="войти">
          </form>
        </div>
        <div class="private-forms__registration registration">
          <h3 class="title">Регистрация нового пользователя</h3>
          <form class="registration__form">
            <input type="text" placeholder="Имя">
            <input type="text" placeholder="Фамилия">
            <input type="email" placeholder="Адрес электронной почты">
            <input type="tel" placeholder="Номер телефона">
            <input type="text" placeholder="Номер участка">
            <input type="password" placeholder="Пароль">
            <input type="password" placeholder="Подтвердите пароль">
            <input class="login__form-button" type="submit" value="Зарегистрироваться">
          </form>
        </div>
      </div>
    </section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>