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
          <input type="text" placeholder="ФИО">
          <input type="email" placeholder="Адрес электронной почты">
          <input type="tel" placeholder="Номер телефона">
          <input type="text" placeholder="Тема письма / Номер участка">
          <textarea placeholder="Сообщение"></textarea>
          <input class="letter__form-button" type="submit" value="Отправить">
        </form>
      </div>
    </section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>