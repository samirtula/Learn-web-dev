<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
?>
<section class="private-image images">
    <div class="private-image__title">
        <div class="private-image__title-headers">
            <h1>регистрация</h1>
        </div>
    </div>
</section>
<section class="private-forms">
    <div class="private-forms__wrapper">
        <div class="private-forms__registration registration">
            <!--Вызов компонента регистрации -->
            <? $APPLICATION->IncludeComponent("bitrix:main.register", "registration", Array(
                "AUTH" => "Y",    // Автоматически авторизовать пользователей
                "REQUIRED_FIELDS" => array(    // Поля, обязательные для заполнения
                    0 => "EMAIL",
                    1 => "NAME",
                    2 => "LAST_NAME",
                    3 => "PERSONAL_MOBILE",
                ),
                "SET_TITLE" => "N",    // Устанавливать заголовок страницы
                "SHOW_FIELDS" => array(    // Поля, которые показывать в форме
                    0 => "EMAIL",
                    1 => "NAME",
                    2 => "LAST_NAME",
                    3 => "PERSONAL_MOBILE",
                ),
                "SUCCESS_PAGE" => "/authorization/registration.php",                          // Страница окончания регистрации !!!!!! Возможно надо будет изменить после настройки подтверждения регистрации
                "USER_PROPERTY" => "",    // Показывать доп. свойстваz
                "USER_PROPERTY_NAME" => "",    // Название блока пользовательских свойств
                "USE_BACKURL" => "N",    // Отправлять пользователя по обратной ссылке, если она есть
            ),
                false
            ); ?>
        </div>
        <div class="private-forms__login login">
            <!--Вызов компонента подтверждения регистрации -->
            <? $APPLICATION->IncludeComponent("bitrix:system.auth.confirmation", "confirm_auth", Array(
                "CONFIRM_CODE" => "confirm_code",    // Название переменной, в которой передается код подтверждения
                "LOGIN" => "login",    // Название переменной, в которой передается логин пользователя
                "USER_ID" => "confirm_user_id",    // Название переменной, в которой передается ID пользователя
            ),
                false
            ); ?>
        </div>
    </div>
</section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
