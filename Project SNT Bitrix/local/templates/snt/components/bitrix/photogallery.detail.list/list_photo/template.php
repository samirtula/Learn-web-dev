<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php /*echo '<pre>';
print_r($arResult);echo '</pre>';*/?>
<?php foreach ($arResult['ELEMENTS_LIST'] as $resItem): ?>
<div class= "item" style="background: url('<?=  $resItem['PICTURE']['SRC']?>'); background-size: cover"> </div>
<?php endforeach; ?>