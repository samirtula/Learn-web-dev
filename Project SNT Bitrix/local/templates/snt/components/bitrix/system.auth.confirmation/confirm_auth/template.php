<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if($arResult["SHOW_FORM"]):?>
    <h3 class="title">Подтверждение регистрации</h3>  <!--Форма подтверждения регистрации-->
	<form method="post" action="<?echo $arResult["FORM_ACTION"]?>" id="auth">
		<table class="data-table bx-confirm-table">
			<tr>
				<td>
					<input type="text" placeholder="Логин" name="<?echo $arParams["LOGIN"]?>" maxlength="50" value="<?echo $arResult["LOGIN"]?>" size="17" class="req2" />
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" placeholder="Код подтверждения из email" name="<?echo $arParams["CONFIRM_CODE"]?>" maxlength="50" value="<?echo $arResult["CONFIRM_CODE"]?>" size="17" class="req2"/>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="<?echo GetMessage("CT_BSAC_CONFIRM")?>" /></td>
			</tr>
		</table>
		<input type="hidden" name="<?echo $arParams["USER_ID"]?>" value="<?echo $arResult["USER_ID"]?>" />
	</form>
    <?//here you can place your own messages
    switch($arResult["MESSAGE_CODE"])
    {
        case "E01":
            ?><? //When user not found
            break;
        case "E02":
            ?><? //User was successfully authorized after confirmation
            break;
        case "E03":
            ?><? //User already confirm his registration
            break;
        case "E04":
            ?><? //Missed confirmation code
            break;
        case "E05":
            ?><? //Confirmation code provided does not match stored one
            break;
        case "E06":
            ?><? //Confirmation was successfull
            break;
        case "E07":
            ?><? //Some error occured during confirmation
            break;
    }
    ?>
<script>                               /*Окрашиваем незаполненные поля*/
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('auth');
        form.addEventListener('submit', function (e) { /* Обрываем логику если есть путые поля*/
            if (formValidate(form)) e.preventDefault();

            function formValidate(form) {
                let error = 0;
                let formReq = document.querySelectorAll('.req2'); /* Используем другой класс */

                for (let i =0; i < formReq.length; i++) {
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
<?elseif(!$USER->IsAuthorized()):?>
	<?$APPLICATION->IncludeComponent("bitrix:system.auth.authorize", "", array());?>
<?endif?>