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

?>
<?php foreach ($arResult['ITEMS'] as $resItem): ?>
        <a href="<?= $resItem['DETAIL_PAGE_URL'] ?>" class="news__article article" ><img class="article__image" src= "<?= $resItem['PREVIEW_PICTURE']['SRC']?>" alt=""><span class="article__date"><?= $resItem['PROPERTIES']['DATE']['VALUE']?></span>
            <div class="article__text">
                <h5><?= $resItem['NAME'] ?></h5>
                <p><?= $resItem['PREVIEW_TEXT'] ?></p>
            </div></a>
<?php endforeach; ?>




