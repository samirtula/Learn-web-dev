<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?>
    <section class="forum-discuss-image images">
      <div class="forum-discuss-image__title">
        <div class="forum-discuss-image__title-headers">
          <h1>форум</h1>
        </div>
      </div>
    </section>
    <section class="forum-discuss">
      <div class="forum-discuss__wrapper">
        <h3>Голосование по вопросу укладки асфальта на центральной дороге</h3>
        <p>Товарищи! новая модель организационной деятельности в значительной степени обуславливает создание дальнейших направлений развития. Идейные соображения высшего порядка, а также начало повседневной работы.</p>
        <div class="forum-discuss__vote">
          <form class="vote">
            <label class="radio-other">
              <input type="radio" value="yes" id="yes"><span class="radio-other__text">Согласен</span>
            </label>
            <label class="radio-other">
              <input type="radio" value="no" id="no"><span class="radio-other__text">Не согласен</span>
            </label>
            <label class="radio-other">
              <input type="radio" value="doubt" id="doubt"><span class="radio-other__text">Затрудняюсь ответить</span>
            </label>
            <input type="submit" value="Проголосовать">
            <input type="submit" value="Показать результаты">
          </form>
          <div class="forum-discuss__results"><span>75% Cогласен</span><span>75% Не согласен</span><span>75% Затрудняюсь ответить</span></div>
        </div>
        <div class="forum-discuss__table-block">
          <div class="forum-discuss__table">
            <table>
              <thead>
                <tr>
                  <td>Светлана Иванова 21.10.2021 в 17:30</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Товарищи! новая модель организационной деятельности в значительной степени обуславливает создание дальнейших направлений развития. Идейные соображения высшего порядка, а также начало повседневной работы по формированию позиции требуют от нас анализа соответствующий условий активизации.Равным образом сложившаяся структура организации в значительной степени обуславливает создание дальнейших направлений развития.</td>
                </tr>
              </tbody>
            </table>
            <table class="forum-discuss__table">
              <thead>
                <tr>
                  <td>Светлана Иванова 21.10.2021 в 17:30</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Товарищи! новая модель организационной деятельности в значительной степени обуславливает создание дальнейших направлений развития. Идейные соображения высшего порядка, а также начало повседневной работы по формированию позиции требуют от нас анализа соответствующий условий активизации.Равным образом сложившаяся структура организации в значительной степени обуславливает создание дальнейших направлений развития.</td>
                </tr>
              </tbody>
            </table>
          </div>
          <form>
            <textarea placeholder="Сообщение"></textarea>
            <input type="submit" value="Отправить">
          </form>
        </div>
      </div>
    </section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>