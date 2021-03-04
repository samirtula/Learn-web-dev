<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Форум");
?>
<section class="forum-image images">
      <div class="forum-image__title">
        <div class="forum-image__title-headers">
          <h1>форум</h1>
        </div>
      </div>
    </section>
    <section class="forum">
      <div class="forum__wrapper">
        <table class="forum__table">
          <thead>
            <tr>
              <th>Тема</th>
              <th>Последнее сообщение</th>
              <th>Перейти к обсуждению</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Установка забора</td>
              <td>Светлана Иванова 21.10.2020  17:30</td>
              <td><a href="/discuss/"><img class="forum__arrow-image" src="../local/templates/snt/images/forum/arrow.svg"></a></td>
            </tr>
            <tr>
              <td>Голосование по вопросу укладки асфальта на центральной дороге</td>
              <td>Светлана Иванова 21.10.2020  17:30</td>
              <td><a href="/vote/"><img class="forum__arrow-image" src="../local/templates/snt/images/forum/arrow.svg"></a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>