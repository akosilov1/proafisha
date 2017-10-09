<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//print_r($arResult);
?>

<?/*
<div class="places_left_menu">

<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$place = $_REQUEST["ELEMENT_ID"];?>

<form action="/place.php" name="places" style="display:inline">

<select name="ELEMENT_ID" size="1" onchange="document.location.href='/places/'+this.value+'/'">

<option value="all">театры и концертные залы</option>

<?

foreach($arResult["ITEMS"] as $arItem):?>

<?
if ($arItem["ID"] == $place) $selected = ' selected';
else $selected = '';
?>

<option<?=$selected?> value="<?=$arItem["IBLOCK_SECTION_ID"]."/".$arItem["ID"]?>" name="<?=$arItem["SECTION_ID"]?>" id="<?=$arItem["SECTION_ID"]?>"><?=$arItem["NAME"]?></option>

<?endforeach;?>

</select>
</form>
*/?>
<br><br>
<?foreach($arResult["ITEMS"] as $arItem):?>
<div class="left-menu-grey leftMenuItem">
	<a href="/places/<?=$arItem["IBLOCK_SECTION_ID"]."/".$arItem["ID"]?>/billboard/"><?=$arItem["NAME"]?></a>

	
</div>
<?endforeach;?>
