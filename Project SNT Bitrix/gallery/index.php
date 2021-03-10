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
        <?$APPLICATION->IncludeComponent("bitrix:photogallery.detail.list", "list_photo", Array(
            "ADDITIONAL_SIGHTS" => "",	// Дополнительные эскизы
            "BEHAVIOUR" => "SIMPLE",	// Режим работы галереи
            "CACHE_TIME" => "3600",	// Время кеширования (сек.)
            "CACHE_TYPE" => "A",	// Тип кеширования
            "DATE_TIME_FORMAT" => "d.m.Y",	// Формат вывода даты
            "DETAIL_SLIDE_SHOW_URL" => "slide_show.php?SECTION_ID=#SECTION_ID#&ELEMENT_ID=#ELEMENT_ID#",	// Страница слайд-шоу
            "DETAIL_URL" => "detail.php?SECTION_ID=#SECTION_ID#&ELEMENT_ID=#ELEMENT_ID#",	// Страница детального просмотра
            "DISPLAY_AS_RATING" => "rating",	// В качестве рейтинга показывать
            "ELEMENT_LAST_TYPE" => "none",	// Дополнительные параметры выбора фото
            "ELEMENT_SORT_FIELD" => "SORT",	// Первое поле сортировки фото
            "ELEMENT_SORT_FIELD1" => "",	// Второе поле сортировки фото
            "ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки фото
            "ELEMENT_SORT_ORDER1" => "asc",	// Порядок сортировки фото
            "GROUP_PERMISSIONS" => array(	// Группы пользователей, имеющие доступ к детальной информации
                0 => "1",
            ),
            "IBLOCK_ID" => "7",	// Инфоблок
            "IBLOCK_TYPE" => "gallery",	// Тип инфоблока
            "MAX_VOTE" => "5",	// Максимальный балл
            "PAGE_ELEMENTS" => "8",	// Количество фото на странице
            "PAGE_NAVIGATION_TEMPLATE" => "",	// Название шаблона для постраничной навигации
            "PICTURES_SIGHT" => "",	// Активный эскиз (один из множества дополнительных и основных эскизов)
            "PROPERTY_CODE" => array(	// Свойства
                0 => "",
                1 => "",
            ),
            "RATING_MAIN_TYPE" => "",	// Вид кнопок рейтинга (главного модуля)
            "SEARCH_URL" => "search.php",	// Страница поиска
            "SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела
            "SET_STATUS_404" => "Y",	// Устанавливать статус 404, если не найдены элемент или раздел
            "SET_TITLE" => "N",	// Устанавливать заголовок страницы
            "SHOW_COMMENTS" => "N",	// Показывать количество комментариев
            "SHOW_CONTROLS" => "N",	// Показывать элементы управления
            "SHOW_PAGE_NAVIGATION" => "bottom",	// Показывать навигацию
            "SHOW_RATING" => "N",	// Показывать голосования
            "SHOW_SHOWS" => "N",	// Показывать количество показов
            "THUMBNAIL_SIZE" => "120",	// Размер детальной фотографии (px)
            "USE_DESC_PAGE" => "Y",	// Использовать обратную навигацию
            "USE_PERMISSIONS" => "N",	// Использовать дополнительное ограничение доступа
            "VOTE_NAMES" => array(	// Подписи к баллам
                0 => "1",
                1 => "2",
                2 => "3",
                3 => "4",
                4 => "5",
                5 => "",
            )
        ),
            false
        );?>
         <h2>наше товарищество</h2>
        <?$APPLICATION->IncludeComponent("bitrix:photogallery.detail.list.ex", "slider", Array(
            "ADDITIONAL_SIGHTS" => "",	// Дополнительные эскизы
            "BEHAVIOUR" => "SIMPLE",	// Режим работы галереи
            "CACHE_TIME" => "3600",	// Время кеширования (сек.)
            "CACHE_TYPE" => "A",	// Тип кеширования
            "DATE_TIME_FORMAT" => "d.m.Y",	// Формат вывода даты
            "DETAIL_SLIDE_SHOW_URL" => "slide_show.php?SECTION_ID=#SECTION_ID#&ELEMENT_ID=#ELEMENT_ID#",	// Страница слайд-шоу
            "DETAIL_URL" => "detail.php?SECTION_ID=#SECTION_ID#&ELEMENT_ID=#ELEMENT_ID#",	// Страница детального просмотра
            "DISPLAY_AS_RATING" => "rating",	// В качестве рейтинга показывать
            "DRAG_SORT" => "Y",	// Сортировать фотографии в альбоме перетаскиванием
            "ELEMENT_LAST_TYPE" => "none",	// Дополнительные параметры выбора фото
            "ELEMENT_SORT_FIELD" => "SORT",	// Первое поле сортировки фото
            "ELEMENT_SORT_FIELD1" => "",	// Второе поле сортировки фото
            "ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки фото
            "ELEMENT_SORT_ORDER1" => "asc",	// Порядок сортировки фото
            "GROUP_PERMISSIONS" => array(	// Группы пользователей, имеющие доступ к детальной информации
                0 => "1",
            ),
            "IBLOCK_ID" => "7",	// Инфоблок
            "IBLOCK_TYPE" => "gallery",	// Тип инфоблока
            "MAX_VOTE" => "5",	// Максимальный балл
            "NAME_TEMPLATE" => "",	// Отображение имени
            "PAGE_ELEMENTS" => "8",	// Количество фото на странице
            "PATH_TO_USER" => "/company/personal/user/#USER_ID#",	// Путь к профилю пользователя
            "PICTURES_SIGHT" => "",	// Активный эскиз (один из множества дополнительных и основных эскизов)
            "PROPERTY_CODE" => array(	// Свойства
                0 => "",
                1 => "",
            ),
            "RATING_MAIN_TYPE" => "",	// Вид кнопок рейтинга (главного модуля)
            "SEARCH_URL" => "search.php",	// Страница поиска
            "SECTION_ID" => $_REQUEST["SECTION_ID"],	// ID раздела
            "SET_STATUS_404" => "Y",	// Устанавливать статус 404, если не найдены элемент или раздел
            "SET_TITLE" => "N",	// Устанавливать заголовок страницы
            "SHOW_COMMENTS" => "N",	// Показывать количество комментариев
            "SHOW_LOGIN" => "Y",	// Показывать логин, если не задано имя
            "SHOW_PAGE_NAVIGATION" => "bottom",	// Показывать навигацию
            "SHOW_RATING" => "N",	// Показывать голосования
            "SHOW_SHOWS" => "N",	// Показывать количество показов
            "THUMBNAIL_SIZE" => "250px",	// Размер фотографии-анонса (px)
            "USE_COMMENTS" => "N",	// Разрешить отзывы
            "USE_DESC_PAGE" => "Y",	// Использовать обратную навигацию
            "USE_PERMISSIONS" => "N",	// Использовать дополнительное ограничение доступа
            "VOTE_NAMES" => array(	// Подписи к баллам
                0 => "1",
                1 => "2",
                2 => "3",
                3 => "4",
                4 => "5",
                5 => "",
                    )
                ),
                false
            );?>
        </div>
    </section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>