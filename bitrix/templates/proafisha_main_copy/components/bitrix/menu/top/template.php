<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="dropdown dropdown-horizontal">
<?foreach($arResult as $arItem):?>
<?if($arItem["TEXT"]):?>
<li>
	<?if($arItem["SELECTED"]):?>
		<a href="<?=$arItem["LINK"]?>" style="text-decoration:underline" class="selected"><?=$arItem["TEXT"]?></a>
	<?else:?>
		<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
	<?endif?>
</li>
<?endif?>
<?endforeach?>
</ul>
<?endif?>