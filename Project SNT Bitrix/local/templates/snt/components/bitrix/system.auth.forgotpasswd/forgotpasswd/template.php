<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?><?

ShowMessage($arParams["~AUTH_RESULT"]);

?>
<form name="bform" method="post" target="_top" action="<?= $arResult["AUTH_URL"] ?>" id="forget">
    <?
    if ($arResult["BACKURL"] <> '') {
        ?>
        <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
        <?
    }
    ?>
    <input type="hidden" name="AUTH_FORM" value="Y">
    <input type="hidden" name="TYPE" value="SEND_PWD">


    <div>
        <h3 class="title">Забыли свой пароль?</h3>
        <div>
            <input type="text" name="USER_LOGIN" placeholder="Логин или email" value="<?= $arResult["USER_LOGIN"] ?>"
                   class="req3"/>       <!-- Логин-->
            <input type="hidden" name="USER_EMAIL"/>
        </div>
        <div style="width: 290px; font-family: Roboto Condensed"
             align="left"><? echo GetMessage("sys_forgot_pass_note_email") ?></div>
    </div>

    <? if ($arResult["PHONE_REGISTRATION"]): ?>

        <div>
            <div><b><?= GetMessage("sys_forgot_pass_phone") ?></b></div>
            <div><input type="text" name="USER_PHONE_NUMBER" value="<?= $arResult["USER_PHONE_NUMBER"] ?>"/></div>
            <div><? echo GetMessage("sys_forgot_pass_note_phone") ?></div>
        </div>
    <? endif; ?>

    <? if ($arResult["USE_CAPTCHA"]): ?>
        <div>
            <div>
                <input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>"/>
                <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>" width="180"
                     height="40" alt="CAPTCHA"/>
            </div>
            <div><? echo GetMessage("system_auth_captcha") ?></div>
            <div><input type="text" name="captcha_word" maxlength="50" value=""/></div>
        </div>
    <? endif ?>
    <div>                                                          <!-- Инпут отправки -->
        <input type="submit" class="req3" name="send_account_info" value="<?= GetMessage("AUTH_SEND") ?>"/>
    </div>
</form>

<script type="text/javascript">
    document.bform.onsubmit = function () {
        document.bform.USER_EMAIL.value = document.bform.USER_LOGIN.value;
    };
    document.bform.USER_LOGIN.focus();

    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('forget');
        form.addEventListener('submit', function (e) {
            if (formValidate(form)) e.preventDefault(); /* Обрываем логику если есть пуcтые поля*/

            function formValidate(form) {
                let error = 0;
                let formReq = document.querySelectorAll('.req3');

                for (let i = 0; i < formReq.length; i++) {
                    const input = formReq[i];
                    formRemoveError(input);
                    if (input.value === '') {
                        formAddError(input);
                        error++;
                    }
                }
                return error;
            }

            function formAddError(input) {
                input.classList.add('error');
            }

            function formRemoveError(input) {
                input.classList.remove('error');
            }
        })

    })


</script>
