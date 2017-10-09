<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<?$i=0;
foreach($arResult as $arItem):$i++;
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($i==1):?>
	<tr><td style="border-top:none" width="189" height="25" align="left"><div class="menu_right_poz"><a href="<?=$arItem["LINK"]?>" class="menu_right"><?=$arItem["TEXT"]?></a></div></td></tr>
	<?else:?>	
	<tr><td width="189" height="25" align="left"><div class="menu_right_poz"><a href="<?=$arItem["LINK"]?>" class="menu_right"><?=$arItem["TEXT"]?></a></div></td></tr>

	<?endif?>
	
<?endforeach?>

<?endif?>