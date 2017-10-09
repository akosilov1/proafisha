<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$aMonths = array(GetMessage("jan"), GetMessage("feb"), GetMessage("mar"), GetMessage("apr"), GetMessage("may"), GetMessage("jun"), GetMessage("jul"), GetMessage("aug"), GetMessage("sep"), GetMessage("okt"), GetMessage("nov"), GetMessage("des"));
$aWeek = array(GetMessage("su"), GetMessage("mo"), GetMessage("tu"), GetMessage("we"), GetMessage("th"), GetMessage("fr"), GetMessage("sa"));
$arParams["LINE_ELEMENT_COUNT"] = 5;
 
echo '<br />';
//print_r();
global $var;
if($var=="Y"){
$res = CIBlockSection::GetList(Array("SORT"=>"­­ASC"), Array("IBLOCK_ID"=>23, "ID"=>$arResult["SECTION"]["PATH"][0]["ID"]),false, Array("UF_KEY_PRO"));
if($ar_res = $res->GetNext())
{
	$APPLICATION->SetPageProperty("keywords", $ar_res["UF_KEY_PRO"]);
}
$res = CIBlockSection::GetList(Array("SORT"=>"­­ASC"), Array("IBLOCK_ID"=>23, "ID"=>$arResult["SECTION"]["PATH"][0]["ID"]),false, Array("UF_DESC_PRO"));
if($ar_res = $res->GetNext())
{
	$APPLICATION->SetPageProperty("description", $ar_res["UF_DESC_PRO"]);
}


$res = CIBlockSection::GetList(Array("SORT"=>"­­ASC"), Array("IBLOCK_ID"=>23, "ID"=>$arResult["SECTION"]["PATH"][0]["ID"]),false, Array("UF_TITLE_PRO"));
if($ar_res = $res->GetNext())
{

//print_r($ar_res);
	$APPLICATION->SetPageProperty("title", $ar_res["UF_TITLE_PRO"]);
	$APPLICATION->SetTitle($ar_res["UF_TITLE_PRO"]);
}	
$res = CIBlockSection::GetList(Array("SORT"=>"­­ASC"), Array("IBLOCK_ID"=>23, "ID"=>$arResult["SECTION"]["PATH"][0]["ID"]),false, Array("UF_H1_PRO"));
if($ar_res = $res->GetNext())
{
	$APPLICATION->SetPageProperty("header1", $ar_res["UF_H1_PRO"]);
}
}
?>


<table width="100%" cellpadding="0" cellspacing="0" border="0" class="data-table">
	<tr>
		<?
		$cell = 0;
		foreach($arResult["ITEMS"] as $arElement):
		?>
		<td aling="center" valign="top" width="<?=round(100/$arParams["LINE_ELEMENT_COUNT"])?>%">
			<div class="contentBlockWrap">
				<div class="contentBlock">
					<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arElement["PREVIEW_PICTURE"])):?>
						<a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><img border="0" class="border" src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arElement["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arElement["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" /></a><br>
					<?endif?>
					<a class="name" href="<?=$arElement["DETAIL_PAGE_URL"]?>" title="<?=$arElement["NAME"]?>" style="color:#448b3b;"><?=$arElement["NAME"]?></a><br>
					<?if($arElement["DISPLAY_PROPERTIES"]["type"]["DISPLAY_VALUE"] && 1==2):?>
						<span class="prev"><?=$arElement["DISPLAY_PROPERTIES"]["type"]["DISPLAY_VALUE"]?></span><br>
					<?endif?>
					<?if($arElement["DISPLAY_ACTIVE_FROM"] && !$_REQUEST["date"]):?><span class="date">
						<?$Date = ParseDateTime($arElement["DISPLAY_ACTIVE_FROM"], "DD.MM.YYYY HH:MI:SS");?>
						<strong><?=$aWeek[date("w",MakeTimeStamp($arElement["DISPLAY_ACTIVE_FROM"], "DD.MM.YYYY"))]?>, <?=intval($Date["DD"]).' '.$aMonths[intval($Date["MM"])-1]?><?if($Date["HH"]!="00"):?>, <?=$Date["HH"].':'.$Date["MI"]?><?endif;?></strong>
                    </span><br><?endif;?>
					<a class="changeTickets" href="<?echo $arElement["DETAIL_PAGE_URL"]?>zakaz/"><img src="<?=BX_ROOT?>/templates/<?=SITE_TEMPLATE_ID?>/img/order.png" width="88" height="23" border="0" /></a>          
				    <?if($arElement["PROPERTIES"]["place"]["VALUE"]):?>
						<?=$arElement["DISPLAY_PROPERTIES"]["place"]["DISPLAY_VALUE"]?><br>
					<?endif;?>
				</div>
			</div>
		</td>
	<?
	$cell++;
	if($cell>=$arParams["LINE_ELEMENT_COUNT"]):
		$cell = 0;
	?>
	</tr>
	<tr>
	<?
	endif; // if($n%$LINE_ELEMENT_COUNT == 0):
		endforeach; // foreach($arResult["ITEMS"] as $arElement):
		while ($cell<$arParams["LINE_ELEMENT_COUNT"]):
			$cell++;
		?><td> </td><?
		endwhile;
		?>
	</tr>
</table>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
