<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Объявления");
?>
    <section class="boards-image images">
        <div class="boards-image__title">
            <div class="boards-image__title-headers">
                <h1>объявления</h1>
            </div>
        </div>
    </section>
    <section class="news">
        <div class="news__wrapper">
            <div class="news__block">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:news",
                    "news",
                    array(
                        "ADD_ELEMENT_CHAIN" => "N",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "BROWSER_TITLE" => "-",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "CHECK_DATES" => "Y",
                        "DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
                        "DETAIL_DISPLAY_TOP_PAGER" => "N",
                        "DETAIL_FIELD_CODE" => array(
                            0 => "",
                            1 => "",
                        ),
                        "DETAIL_PAGER_SHOW_ALL" => "Y",
                        "DETAIL_PAGER_TEMPLATE" => "",
                        "DETAIL_PAGER_TITLE" => "Страница",
                        "DETAIL_PROPERTY_CODE" => array(
                            0 => "AUTHOR",
                            1 => "DATE",
                            2 => "",
                        ),
                        "DETAIL_SET_CANONICAL_URL" => "N",
                        "DISPLAY_BOTTOM_PAGER" => "Y",
                        "DISPLAY_DATE" => "Y",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "Y",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "DISPLAY_TOP_PAGER" => "N",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => "5",
                        "IBLOCK_TYPE" => "board",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "LIST_FIELD_CODE" => array(
                            0 => "",
                            1 => "",
                        ),
                        "LIST_PROPERTY_CODE" => array(
                            0 => "AUTHOR",
                            1 => "DATE",
                            2 => "",
                        ),
                        "MESSAGE_404" => "",
                        "META_DESCRIPTION" => "-",
                        "META_KEYWORDS" => "-",
                        "NEWS_COUNT" => "20",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => "modern",
                        "PAGER_TITLE" => "Объявления",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "SEF_MODE" => "Y",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_STATUS_404" => "Y",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "DESC",
                        "SORT_ORDER2" => "ASC",
                        "STRICT_SECTION_CHECK" => "N",
                        "USE_CATEGORIES" => "N",
                        "USE_FILTER" => "N",
                        "USE_PERMISSIONS" => "N",
                        "USE_RATING" => "N",
                        "USE_REVIEW" => "N",
                        "USE_RSS" => "N",
                        "USE_SEARCH" => "N",
                        "USE_SHARE" => "N",
                        "IS_IT_SIDEBAR" => "N",
                        "COMPONENT_TEMPLATE" => "news",
                        "SEF_FOLDER" => "/boards/",
                        "SEF_URL_TEMPLATES" => array(
                            "news" => "",
                            "section" => "#SECTION_CODE#/",
                            "detail" => "#SECTION_CODE#/#ELEMENT_CODE#/",
                        )
                    ),
                    false
                ); ?>
            </div>
            <? $APPLICATION->IncludeComponent("bitrix:news.list", "list_news", Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
                "ADD_SECTIONS_CHAIN" => "N",    // Включать раздел в цепочку навигации
                "AJAX_MODE" => "N",    // Включить режим AJAX
                "AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
                "AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
                "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
                "AJAX_OPTION_STYLE" => "Y",    // Включить подгрузку стилей
                "CACHE_FILTER" => "N",    // Кешировать при установленном фильтре
                "CACHE_GROUPS" => "Y",    // Учитывать права доступа
                "CACHE_TIME" => "36000000",    // Время кеширования (сек.)
                "CACHE_TYPE" => "A",    // Тип кеширования
                "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
                "DETAIL_URL" => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
                "DISPLAY_BOTTOM_PAGER" => "Y",    // Выводить под списком
                "DISPLAY_DATE" => "Y",    // Выводить дату элемента
                "DISPLAY_NAME" => "Y",    // Выводить название элемента
                "DISPLAY_PICTURE" => "Y",    // Выводить изображение для анонса
                "DISPLAY_PREVIEW_TEXT" => "Y",    // Выводить текст анонса
                "DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
                "FIELD_CODE" => array(    // Поля
                    0 => "",
                    1 => "",
                ),
                "FILTER_NAME" => "",    // Фильтр
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",    // Скрывать ссылку, если нет детального описания
                "IBLOCK_ID" => "5",    // Код информационного блока
                "IBLOCK_TYPE" => "boards",    // Тип информационного блока (используется только для проверки)
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",    // Включать инфоблок в цепочку навигации
                "INCLUDE_SUBSECTIONS" => "Y",    // Показывать элементы подразделов раздела
                "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
                "NEWS_COUNT" => "20",    // Количество новостей на странице
                "PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
                "PAGER_DESC_NUMBERING" => "N",    // Использовать обратную навигацию
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для обратной навигации
                "PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
                "PAGER_SHOW_ALWAYS" => "N",    // Выводить всегда
                "PAGER_TEMPLATE" => "modern",    // Шаблон постраничной навигации
                "PAGER_TITLE" => "Объявления",    // Название категорий
                "PARENT_SECTION" => "",    // ID раздела
                "PARENT_SECTION_CODE" => "",    // Код раздела
                "PREVIEW_TRUNCATE_LEN" => "",    // Максимальная длина анонса для вывода (только для типа текст)
                "PROPERTY_CODE" => array(    // Свойства
                    0 => "AUTHOR",
                    1 => "",
                ),
                "SET_BROWSER_TITLE" => "N",    // Устанавливать заголовок окна браузера
                "SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
                "SET_META_DESCRIPTION" => "N",    // Устанавливать описание страницы
                "SET_META_KEYWORDS" => "N",    // Устанавливать ключевые слова страницы
                "SET_STATUS_404" => "Y",    // Устанавливать статус 404
                "SET_TITLE" => "N",    // Устанавливать заголовок страницы
                "SHOW_404" => "N",    // Показ специальной страницы
                "SORT_BY1" => "ACTIVE_FROM",    // Поле для первой сортировки новостей
                "SORT_BY2" => "SORT",    // Поле для второй сортировки новостей
                "SORT_ORDER1" => "DESC",    // Направление для первой сортировки новостей
                "SORT_ORDER2" => "ASC",    // Направление для второй сортировки новостей
                "STRICT_SECTION_CHECK" => "N",    // Строгая проверка раздела для показа списка
                "COMPONENT_TEMPLATE" => ".default"
            ),
                false
            ); ?>
        </div>
    </section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>