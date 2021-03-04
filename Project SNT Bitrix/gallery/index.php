<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Фотогалерея");
?>
    <section class="gallery-image images">
      <div class="gallery-image__title">
        <div class="gallery-image__title-headers">
          <h1>фотогалерея</h1>
        </div>
      </div>
    </section>
    <section class="gallery">
      <div class="gallery__wrapper">
        <div class="gallery__carousel owl-carousel owl-theme">
          <div class="item1 item"></div>
          <div class="item2 item"></div>
          <div class="item3 item"></div>
          <div class="item4 item"></div>
          <div class="item5 item"></div>
          <div class="item6 item"></div>
          <div class="item7 item"></div>
          <div class="item8 item"></div>
        </div>
        <div class="gallery__images">
          <h2>наше товарищество</h2>
          <div class="item1 item"></div>
          <div class="item2 item"></div>
          <div class="item3 item"></div>
          <div class="item4 item"></div>
          <div class="item5 item"></div>
          <div class="item6 item"></div>
          <div class="item7 item"></div>
          <div class="item8 item"></div>
        </div>
      </div>
    </section>
    <div class="popup">
      <div class="popup__close-button"></div><img class="popup__image" src="images/letter/letter.jpg">
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>