<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
print_r($arResult);echo '</pre>';
*/ ?>
<div class="news__nav">
    <?php foreach ($arResult['ITEMS'] as $resItem): ?>
        <a href="<?= $resItem['DETAIL_PAGE_URL'] ?>" class="news__nav-header">
            <h6><?= $resItem['NAME'] ?></h6><span class="news__nav-keys"><?= $resItem['PROPERTIES']['DATE']['VALUE'] ?> / <?= $resItem['PROPERTIES']['KEY']['VALUE'] ?></span>
        </a>
    <?php endforeach; ?>
</div>