<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
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
            <div class="private-forms__login login"> <!-- Вызов основного компонента авторизации-->
                <? $APPLICATION->IncludeComponent("bitrix:system.auth.form", "auth_form", Array(
                    "FORGOT_PASSWORD_URL" => "/authorization/",    // Страница забытого пароля
                    "PROFILE_URL" => "/private/",    // Страница профиля
                    "REGISTER_URL" => "/authorization/registration.php",    // Страница регистрации
                    "SHOW_ERRORS" => "Y",    // Показывать ошибки
                ),
                    false
                ); ?>
            </div>
            <div class="private-forms__login login"> <!-- Вызов  компонента восстановления пароля-->
                <? $APPLICATION->IncludeComponent("bitrix:system.auth.forgotpasswd", "forgotpasswd", Array(),
                    false
                ); ?>
            </div>
        </div>
    </section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>