<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<?foreach($arResult as $arItem):?>
<div class="left-menu-grey">
	<?if($arItem["SELECTED"]):?>
		<a href="<?=$arItem["LINK"]?>" class="selected"><?=$arItem["TEXT"]?></a>
	<?else:?>
		<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
	<?endif?>
	<img src="<?=BX_ROOT?>/templates/<?=SITE_TEMPLATE_ID?>/img/bull.gif" width="25" height="11" alt="" border="0" align="middle">
</div>
<?endforeach?>
<div class="left-menu"></div>
<?endif?>