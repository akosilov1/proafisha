<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<h2><?=$arResult["NAME"]?></h2>
<br />

<div class="catalog-element">
	<?if(is_array($arResult["DETAIL_PICTURE"])):?>
		<img border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" title="<?=$arResult["NAME"]?>" class="border" style="float: left; margin: 0px 15px 10px 0px;" />
	<?endif?>

	<?if($arResult["DETAIL_TEXT"]):?>
		<br /><?=$arResult["DETAIL_TEXT"]?><br />
	<?elseif($arResult["PREVIEW_TEXT"]):?>
		<br /><?=$arResult["PREVIEW_TEXT"]?><br />
	<?endif;?>

</div>

<?//echo '<pre>';print_r($arResult);echo '</pre>';?>
