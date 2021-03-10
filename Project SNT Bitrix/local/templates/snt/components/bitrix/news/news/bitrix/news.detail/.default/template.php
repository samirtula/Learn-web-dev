<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
/*echo '<pre>';
print_r($arResult);
echo '</pre>';*/
$APPLICATION->SetTitle($arResult['NAME']);
?>

<div class="new__block">
    <div class="new__article event"><img class="event__image" src="<?= $arResult['DETAIL_PICTURE']['SAFE_SRC']?>" alt="">
        <div class="event__text">
            <h5><?=$arResult['NAME']?></h5>
            <p><?= $arResult['DETAIL_TEXT']?></p>
        </div>
    </div>
</div>
<style>

</style>

