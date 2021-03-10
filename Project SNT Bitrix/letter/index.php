<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Написать в правление");
?>
    <section class="letter-image images">
      <div class="letter-image__title">
        <div class="letter-image__title-headers">
          <h1>написать письмо <br>в правление</h1>
        </div>
      </div>
    </section>
    <section class="letter">
      <div class="letter__wrapper">
        <form class="letter__form">
          <input type="text" name="name" placeholder="ФИО">
          <input type="email" name = "userEmail" placeholder="Адрес электронной почты">
          <input  id="phone_1" type="tel" name="telNum" placeholder="Номер телефона">
          <input type="text" name = "theme" placeholder="Тема письма / Номер участка">
          <textarea name="message" placeholder="Сообщение"></textarea>
          <input class="letter__form-button" type="submit" value="Отправить">
        </form>
      </div>
    </section>
<script>

    let form = document.querySelector('.letter__form-button');

   form.addEventListener('click', function (e) {
        e.preventDefault();
        let inputName = document.querySelector('input[name="name"]');
        let inputEmail = document.querySelector('input[name="userEmail"]');
        let inputTelNum = document.querySelector('input[name="telNum"]');
        let inputTheme = document.querySelector('input[name="theme"]');
        let inputMessage = document.querySelector('textarea[name="message"]');


        let name = inputName.value;
        let email = inputEmail.value;
        let telNum = inputTelNum.value;
        let theme = inputTheme.value;
        let message = inputMessage.value;
        let flag = 0;

        inputName.style.border = "1px solid #dbdbdb";


        if (name == '') {
            inputName.style.border = "1px solid red";
            flag = 1;
        }
    });

</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>