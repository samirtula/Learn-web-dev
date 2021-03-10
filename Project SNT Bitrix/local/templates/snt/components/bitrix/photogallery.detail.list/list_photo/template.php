<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="gallery__carousel owl-carousel owl-theme">
    <?php foreach ($arResult['ELEMENTS_LIST'] as $resItem): ?>
    <div class= "item" style="background: url('<?=  $resItem['PICTURE']['SRC']?>'); background-size: cover"> </div>
    <?php endforeach; ?>
</div>
