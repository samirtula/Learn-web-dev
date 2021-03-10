<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


/********************************************************************
				Input params
********************************************************************/
	$arParams["SHOW_TAGS"] = ($arParams["SHOW_TAGS"] == "Y" && IsModuleInstalled("search") ? "Y" : "N");
/********************************************************************
				/Input params
********************************************************************/
$URL_NAME_DEFAULT = array(
	"search" => "PAGE_NAME=search",
	"detail_list" => "PAGE_NAME=detail_list&SECTION_ID=#SECTION_ID#&ELEMENT_ID=#ELEMENT_ID#",
	"section_edit" => "PAGE_NAME=section_edit&SECTION_ID=#SECTION_ID#&ACTION=#ACTION#",
	"upload" => "PAGE_NAME=upload&SECTION_ID=#SECTION_ID#&ACTION=upload"
);

foreach ($URL_NAME_DEFAULT as $URL => $URL_VALUE)
{
	$arParams[mb_strtoupper($URL)."_URL"] = trim($arResult["URL_TEMPLATES"][mb_strtolower($URL)]);
	if (empty($arParams[mb_strtoupper($URL)."_URL"]))
		$arParams[mb_strtoupper($URL)."_URL"] = $APPLICATION->GetCurPageParam($URL_VALUE, array("PAGE_NAME", "SECTION_ID", "ELEMENT_ID", "ACTION", "sessid", "edit", "order"));
	$arParams["~".mb_strtoupper($URL)."_URL"] = $arParams[mb_strtoupper($URL)."_URL"];
	$arParams[mb_strtoupper($URL)."_URL"] = htmlspecialcharsbx($arParams["~".mb_strtoupper($URL)."_URL"]);
}

$arRes = array();
if (is_array($arParams["SHOW_LINK_ON_MAIN_PAGE"]))
{
	$detail_list = array(
		"~url" => CComponentEngine::MakePathFromTemplate($arParams["DETAIL_LIST_URL"], array("SECTION_ID" => "all", "ELEMENT_ID" => "all")));
	$detail_list["url"] = $detail_list["~url"];
	if (mb_strpos($detail_list["url"], "?") === false)
		$detail_list["url"] .= "?";
	foreach ($arParams["SHOW_LINK_ON_MAIN_PAGE"] as $key)
	{
		if ($key == "id")
		{
			$arRes["id"] = array(
				"title" => GetMessage("P_PHOTO_SORT_ID"),
				"description" => GetMessage("P_PHOTO_SORT_ID_TITLE"),
				"url" => $detail_list["~url"]
			);
		}
		elseif ($key == "shows")
		{
			$arRes["shows"] = array(
				"title" => GetMessage("P_PHOTO_SORT_SHOWS"),
				"description" => GetMessage("P_PHOTO_SORT_SHOWS_TITLE"),
				"url" => $detail_list["url"]."&amp;order=shows"
			);
		}
		elseif ($key == "rating" && ($arParams["USE_RATING"] == "Y"))
		{
			$arRes["rating"] = array(
				"title" => GetMessage("P_PHOTO_SORT_RATING"),
				"description" => GetMessage("P_PHOTO_SORT_RATING_TITLE"),
				"url" => $detail_list["url"]."&amp;order=rating"
			);
		}
		elseif ($key == "comments" && ($arParams["USE_COMMENTS"] == "Y"))
		{
			$arRes["comments"] = array(
				"title" => GetMessage("P_PHOTO_SORT_COMMENTS"),
				"description" => GetMessage("P_PHOTO_SORT_COMMENTS_TITLE"),
				"url" => $detail_list["url"]."&amp;order=comments"
			);
		}
	}
}
?><div class="photo-page-main"><?
if ($arParams["PERMISSION"] >= "U" || $arParams["SHOW_TAGS"] == "Y" || !empty($arRes))
{
	ob_start();
	if ($arParams["PERMISSION"] >= "U")
	{
	?>
	<div class="photo-controls photo-controls-buttons">
		<ul class="photo-controls">
			<li class="photo-control photo-control-first photo-control-album-add">
				<a rel="nofollow" href="<?=CComponentEngine::MakePathFromTemplate($arParams["SECTION_EDIT_URL"],
					array("SECTION_ID" => "0", "ACTION" => "new"))?>" <?
					?>onclick="EditAlbum('<?=CUtil::JSEscape(CComponentEngine::MakePathFromTemplate($arParams["~SECTION_EDIT_URL"],
						array("SECTION_ID" => "0", "ACTION" => "new")))?>'); return false;">
					<span><?=GetMessage("P_ADD_ALBUM")?></span></a>
			</li>
			<li class="photo-control photo-control-last photo-control-album-upload">
				<a rel="nofollow" href="<?=CComponentEngine::MakePathFromTemplate($arParams["UPLOAD_URL"], array("SECTION_ID" => "0"))?>">
					<span><?=GetMessage("P_UPLOAD")?></span></a>
			</li>
		</ul>
		<div class="empty-clear"></div>
	</div>
	<?
	}
	if (!empty($arRes))
	{
?>
<noindex>

		<div class="photo-controls photo-controls-mainpage">
			<ul class="photo-controls">
		<?
		$counter = 1;
		foreach ($arRes as $key => $val):
			?><li class="photo-control <?=$key?> <?=($counter == 1 ? "photo-control-first" : "")?> <?=($counter == count($arRes) ? "photo-control-last" : "")?>">
				<a rel="nofollow" href="<?=$val["url"]?>" title="<?=$val["description"]?>"><span><?=$val["title"]?></span></a>
			</li><?
			$counter++;
		endforeach;
		?>
			</ul>
			<div class="empty-clear"></div>
		</div>
	</div>
</noindex>
<?
	}
	if ($arParams["SHOW_TAGS"] == "Y")
	{
	?>

        <?$result = $APPLICATION->IncludeComponent(
		"bitrix:search.tags.cloud",
		"photogallery",
		Array(
			"SEARCH" => $arResult["REQUEST"]["~QUERY"],
			"TAGS" => $arResult["REQUEST"]["~TAGS"],

			"PAGE_ELEMENTS" => $arParams["TAGS_PAGE_ELEMENTS"],
			"PERIOD" => $arParams["TAGS_PERIOD"],
			"TAGS_INHERIT" => $arParams["TAGS_INHERIT"],

			"URL_SEARCH" =>  CComponentEngine::MakePathFromTemplate($arParams["~SEARCH_URL"], array()),

			"FONT_MAX" => $arParams["FONT_MAX"],
			"FONT_MIN" => $arParams["FONT_MIN"],
			"COLOR_NEW" => $arParams["COLOR_NEW"],
			"COLOR_OLD" => $arParams["COLOR_OLD"],
			"SHOW_CHAIN" => $arParams["TAGS_SHOW_CHAIN"],
			"WIDTH" => "100%",
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"arrFILTER" => array("iblock_".$arParams["IBLOCK_TYPE"]),
			"arrFILTER_iblock_".$arParams["IBLOCK_TYPE"] => array($arParams["IBLOCK_ID"])
		),
		$component,
		array("HIDE_ICONS" => "Y")
	);?><?
	}
	$res = ob_get_clean();
	if (!empty($res)):
?>
	<div id="photo-main-page-right">
		<?=$res?>
	</div>
<?
	endif;
}

?> <?$APPLICATION->IncludeComponent("bitrix:photogallery.detail.list", "list_photo", Array(
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
<script>
function __photo_check_right_height()
{
	var res = document.getElementsByTagName('li');
	var result = false;
	for (var ii = 0; ii < res.length; ii++)
	{
		if (res[ii].id.match(/photo\_album\_info\_(\d+)/gi))
		{
			var kk = res[ii].offsetHeight;
			var jj = document.getElementById('photo-main-page-right');
			if (jj && kk > 0) {
				jj.style.height = ((parseInt(jj.offsetHeight / kk) + 1) * kk + 1 + 'px');
				result = true;
				break;
			}
		}
	}
	if (!result)
	{
		setTimeout(__photo_check_right_height, 150);
	}
}
//setTimeout(__photo_check_right_height, 150);
</script>
<?

if($arParams["SET_TITLE"] != "N"):
	$GLOBALS["APPLICATION"]->SetTitle(GetMessage("P_PHOTO"));
endif;
?>
	<div class="empty-clear"></div>
</div>