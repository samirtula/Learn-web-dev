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
        </div>
        <div class="gallery__images">
          <h2>наше товарищество</h2>
            <?$APPLICATION->IncludeComponent("bitrix:photogallery", "gallery", Array(
	"ADDITIONAL_SIGHTS" => array(	// Дополнительные эскизы
			0 => "",
		),
		"ALBUM_PHOTO_SIZE" => "120",	// Размер картинки фотоальбома (px)
		"CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"DATE_TIME_FORMAT_DETAIL" => "d.m.Y",	// Формат вывода даты фото
		"DATE_TIME_FORMAT_SECTION" => "d.m.Y",	// Формат вывода даты альбома
		"DRAG_SORT" => "Y",	// Сортировать фотографии в альбоме перетаскиванием
		"ELEMENTS_PAGE_ELEMENTS" => "50",	// Количество фото на странице
		"ELEMENT_SORT_FIELD" => "sort",	// По какому полю сортируем фото
		"ELEMENT_SORT_ORDER" => "desc",	// Порядок сортировки фото в альбомах
		"IBLOCK_ID" => "7",	// Инфоблок
		"IBLOCK_TYPE" => "gallery",	// Тип инфоблока
		"JPEG_QUALITY" => "100",	// Качество загружаемой фотографии (%)
		"JPEG_QUALITY1" => "100",	// Качество фотографии-анонса (%)
		"ORIGINAL_SIZE" => "1280",	// Обязательно ограничивать размер оригинала (px) (при значении 0 ограничение не происходит)
		"PAGE_NAVIGATION_TEMPLATE" => "",	// Шаблон для постраничной навигации
		"PATH_TO_FONT" => "default.ttf",
		"PATH_TO_USER" => "",	// Путь к профилю пользователя
		"PHOTO_LIST_MODE" => "Y",	// Отображать список альбомов в качестве рубрик со списком последних добавленных фотографий
		"SECTION_LIST_THUMBNAIL_SIZE" => "70",	// Размер картинки в предпросмотре в списке альбомов (px)
		"SECTION_PAGE_ELEMENTS" => "15",	// Количество альбомов на странице
		"SECTION_SORT_BY" => "UF_DATE",	// По какому полю сортируем альбомы
		"SECTION_SORT_ORD" => "DESC",	// Порядок сортировки альбомов
		"SEF_MODE" => "N",	// Включить поддержку ЧПУ
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"SHOWN_ITEMS_COUNT" => "8",	// Количество выводимых фотографий в списке альбомов
		"SHOW_LINK_ON_MAIN_PAGE" => array(	// Показывать ссылки на главной странице
			0 => "id",
			1 => "shows",
			2 => "rating",
			3 => "comments",
		),
		"SHOW_NAVIGATION" => "N",	// Отображать навигационную цепочку 'хлебные крошки' в рамках комплексного компонента
		"SHOW_TAGS" => "N",	// Показывать теги
		"THUMBNAIL_SIZE" => "100",	// Размер фотографии-анонса (px)
		"UPLOAD_MAX_FILE_SIZE" => "50",	// Максимальный размер загружаемого файла (не должен превышать 50 Мб) (Мб)
		"USE_COMMENTS" => "N",	// Разрешить отзывы
		"USE_LIGHT_VIEW" => "Y",	// Использовать простой режим настройки
		"USE_RATING" => "N",	// Разрешить голосование
		"USE_WATERMARK" => "N",	// Наносить авторский знак
		"VARIABLE_ALIASES" => array(
			"ACTION" => "ACTION",
			"ELEMENT_ID" => "ELEMENT_ID",
			"PAGE_NAME" => "PAGE_NAME",
			"SECTION_ID" => "SECTION_ID",
		),
		"WATERMARK_MIN_PICTURE_SIZE" => "800",
		"WATERMARK_RULES" => "USER"
	),
	false
);?>
     <!--     <div class="item1 item"></div>
          <div class="item2 item"></div>
          <div class="item3 item"></div>
          <div class="item4 item"></div>
          <div class="item5 item"></div>
          <div class="item6 item"></div>
          <div class="item7 item"></div>
          <div class="item8 item"></div>-->
        </div>
      </div>
    </section>
    <div class="popup">
      <div class="popup__close-button"></div><img class="popup__image" src="images/letter/letter.jpg">
    </div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>