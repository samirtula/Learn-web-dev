<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?>
    <section class="indications-image images">
      <div class="indications-image__title">
        <div class="indications-image__title-headers">
          <h1>Передача показаний</h1>
        </div>
      </div>
    </section>
    <section class="indications">
      <div class="indications__wrapper">
        <div class="indications__form"><span class="indications__user-name">Иванов Иван Сергеевич</span><span class="indications__previous-date">Дата предыдущих показаний: 27.10.2020</span><span class="indications__previous-information">Предыдущие показания: 785645</span>
          <form>
            <input type="number" placeholder="Введите показания счетчика">
            <input type="submit" value="отправить">
          </form>
        </div><span class="indications__type">Передача показаний за воду</span>
      </div>
    </section>
    <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>