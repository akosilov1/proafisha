<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$res = CIBlockSection::GetList(Array("SORT"=>"­­ASC"), Array("IBLOCK_ID"=>19, "ID"=>$arResult["ID"]),false, Array("UF_LEFTMENU_KEY_PRO"));
if($ar_res = $res->GetNext())
{
	if (!empty($ar_res["UF_LEFTMENU_KEY_PRO"])){
		$APPLICATION->SetPageProperty("keywords", $ar_res["UF_LEFTMENU_KEY_PRO"]);
	}
}
$res = CIBlockSection::GetList(Array("SORT"=>"­­ASC"), Array("IBLOCK_ID"=>19, "ID"=>$arResult["ID"]),false, Array("UF_LEFTMENU_DESC_PRO"));
if($ar_res = $res->GetNext())
{
	if (!empty($ar_res["UF_LEFTMENU_DESC_PRO"])){
		$APPLICATION->SetPageProperty("description", $ar_res["UF_LEFTMENU_DESC_PRO"]);
	}
}
$res = CIBlockSection::GetList(Array("SORT"=>"­­ASC"), Array("IBLOCK_ID"=>19, "ID"=>$arResult["ID"]),false, Array("UF_MENU_TITLE_PRO"));
if($ar_res = $res->GetNext())
{
	if (!empty($ar_res["UF_MENU_TITLE_PRO"])){
		//print_r($ar_res);
		$APPLICATION->SetPageProperty("title", $ar_res["UF_MENU_TITLE_PRO"]);
		$APPLICATION->SetTitle($ar_res["UF_MENU_TITLE_PRO"]);
	}
}	
$res = CIBlockSection::GetList(Array("SORT"=>"­­ASC"), Array("IBLOCK_ID"=>19, "ID"=>$arResult["ID"]),false, Array("UF_LEFTMENU_H1_PRO"));
if($ar_res = $res->GetNext())
{
	if (!empty($ar_res["UF_LEFTMENU_H1_PRO"])){
		$APPLICATION->SetPageProperty("header1", $ar_res["UF_LEFTMENU_H1_PRO"]);
	}
}
?>


<h1><?=$arResult["NAME"]?></h1>

<div class="catalog-section">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

<table cellpadding="0" cellspacing="0" border="0" class="data-table">
		<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>

		<?if($cell%$arParams["LINE_ELEMENT_COUNT"] == 0):?>
		<tr>
		<?endif;?>

		<td valign="top" width="<?=round(100/$arParams["LINE_ELEMENT_COUNT"])?>%">

			<table cellpadding="0" cellspacing="2" border="0" class="data-table-noborder">
				<tr>
					<td valign="top" width="150" align="center">
						<?if(is_array($arElement["PREVIEW_PICTURE"])):?>
							<a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><img border="0" src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arElement["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arElement["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" class="border" /></a><br />
						<?else:?>
							<img src="<?=BX_ROOT?>/templates/<?=SITE_TEMPLATE_ID?>/img/pix.gif" width="100" height="70" border="0" class="border" />
						<?endif?>
					</td>
					<td valign="top">
						<div><a href="<?=$arElement["DETAIL_PAGE_URL"]?>" title="<?=$arElement["NAME"]?>"><b><?=$arElement["NAME"]?></b></a></div><br />
						<?foreach($arElement["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
							<?=$arProperty["NAME"]?>:&nbsp;<?
								if(is_array($arProperty["DISPLAY_VALUE"]))
									echo implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);
								else
									echo $arProperty["DISPLAY_VALUE"];?><br />
						<?endforeach?>
						<br />
						<div><?=$arElement["PREVIEW_TEXT"]?></div>
						<div><a class="buttonLink billboard" href="<?=$arElement["DETAIL_PAGE_URL"]?>billboard/"><img src="<?=BX_ROOT?>/templates/<?=SITE_TEMPLATE_ID?>/img/rep.gif" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" width="83" height="23" border="0" /></a></div>



<?if($arElement["DETAIL_PICTURE"]["ID"] or $arElement["PROPERTIES"]["benuar_d_img"]["VALUE"]):?>

<!--<a title="Óâåëè÷èòü" onClick="ImgShw('<?=$arElement["DETAIL_PICTURE"]["SRC"]?>','<?=$arElement["DETAIL_PICTURE"]["WIDTH"]?>','<?=$arElement["DETAIL_PICTURE"]["HEIGHT"]?>', ''); return false;" href="<?=$arElement["DETAIL_PICTURE"]["SRC"]?>" target=_blank>-->
<a class="buttonLink schema" href="<?=$arElement["DETAIL_PAGE_URL"]?>schema/">
<img src="<?=BX_ROOT?>/templates/<?=SITE_TEMPLATE_ID?>/img/sxema.gif" width="83" height="23" border="0" />
</a>
<?endif?>





					</td>
					</td>
				</tr>
			</table>

		</td>

		<?$cell++;
		if($cell%$arParams["LINE_ELEMENT_COUNT"] == 0):?>
			</tr>
		<?endif?>

		<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>

		<?if($cell%$arParams["LINE_ELEMENT_COUNT"] != 0):?>
			<?while(($cell++)%$arParams["LINE_ELEMENT_COUNT"] != 0):?>
				<td>&nbsp;</td>
			<?endwhile;?>
			</tr>
		<?endif?>

</table>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
