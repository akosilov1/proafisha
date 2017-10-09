<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$aMonths = array(GetMessage("jan"), GetMessage("feb"), GetMessage("mar"), GetMessage("apr"), GetMessage("may"), GetMessage("jun"), GetMessage("jul"), GetMessage("aug"), GetMessage("sep"), GetMessage("okt"), GetMessage("nov"), GetMessage("dec"));
$aWeek = array(GetMessage("su"), GetMessage("mo"), GetMessage("tu"), GetMessage("we"), GetMessage("th"), GetMessage("fr"), GetMessage("sa"));
$arParams["LINE_ELEMENT_COUNT"] = 2;
$APPLICATION->IncludeComponent("bitrix:news.list", "textfordates", array(
	"IBLOCK_TYPE" => "places",
	"IBLOCK_ID" => "",
	"NEWS_COUNT" => "9999999999",
	"SORT_BY1" => "",
	"SORT_ORDER1" => "ASC",
	"SORT_BY2" => "",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "arrFilterEvents",
	"FIELD_CODE" => array(
		0 => "NAME",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "metatitle",
		1 => "head1",
		2 => "metakeywords",
		3 => "metadescription",
		4 => "",
	),
	"CHECK_DATES" => "N",
	"DETAIL_URL" => "/events/#SECTION_ID#/#ELEMENT_ID#/",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "43200",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"PREVIEW_TRUNCATE_LEN" => "",
	"ACTIVE_DATE_FORMAT" => "d.m.Y H:i",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"ADD_SECTIONS_CHAIN" => "Y",
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"PARENT_SECTION" => "",
	"PARENT_SECTION_CODE" => "",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => " ÓÌˆÂÚ˚",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);
echo '<br /><br />';
//print_r();
global $var;
global $date;
if($var=="Y"){
$res = CIBlockSection::GetList(Array("SORT"=>"≠≠ASC"), Array("IBLOCK_ID"=>23, "ID"=>$arResult["SECTION"]["PATH"][0]["ID"]),false, Array("UF_KEY"));
if($ar_res = $res->GetNext())
{
	//$APPLICATION->SetPageProperty("keywords", $ar_res["UF_KEY"]);
}
$res = CIBlockSection::GetList(Array("SORT"=>"≠≠ASC"), Array("IBLOCK_ID"=>23, "ID"=>$arResult["SECTION"]["PATH"][0]["ID"]),false, Array("UF_DESC"));
if($ar_res = $res->GetNext())
{
	//$APPLICATION->SetPageProperty("description", $ar_res["UF_DESC"]);
}


$res = CIBlockSection::GetList(Array("SORT"=>"≠≠ASC"), Array("IBLOCK_ID"=>23, "ID"=>$arResult["SECTION"]["PATH"][0]["ID"]),false, Array("UF_TITLE"));
if($ar_res = $res->GetNext())
{

//print_r($ar_res);
	//$APPLICATION->SetPageProperty("title", $ar_res["UF_TITLE"]);
	//$APPLICATION->SetTitle($ar_res["UF_TITLE"]);
	//$APPLICATION->SetPageProperty("header1", $ar_res["UF_TITLE"]);
}	
}
?>

<table width="100%" cellpadding="0" cellspacing="0" border="0" class="data-table">
	<tr>
		<?foreach($arResult[ITEMS][0][PROPERTY_115] as $mydate):?>
		<?$mydate = substr($mydate, 0, -9)?>
		<?if($date == $mydate):?>
		<?$lol = $mydate?>
		<?endif?>
		<?endforeach?>
		<?if($lol == $date):?>	
		<?
		$cell = 0;
		foreach($arResult["ITEMS"] as $arElement):
		?>
		<td valign="top" width="<?=round(100/$arParams["LINE_ELEMENT_COUNT"])?>%">

			<table width="100%" cellpadding="0" cellspacing="0" border="0" class="data-table-noborder">
				<tr>

		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arElement["PREVIEW_PICTURE"])):?>
		<td width="100" align="left" valign="top">
			<a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><img border="0" class="border" src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arElement["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arElement["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" style="float:left" /></a>
		</td>
		<?endif?>


					<td valign="top">
					
           
                  
					</td>

				</tr>
			</table>
<?if($arElement["PROPERTIES"]["place"]["VALUE"]):?>
	<br /><div>
	<?/*str_replace('<a href="','<a href="/places',$arElement["DISPLAY_PROPERTIES"]["place"]["DISPLAY_VALUE"])*/?>
	<?=$arElement["DISPLAY_PROPERTIES"]["place"]["DISPLAY_VALUE"]?>
	</div>
<?endif;?>
                  <table border="0" cellpadding="0" cellspacing="0" class="data-table-noborder">
                    <tr>
                      <td>
			<?//if($arElement["DISPLAY_ACTIVE_FROM"] && !$_REQUEST["date"]):?> ƒ‡Ú‡ :
				<?$Date = ParseDateTime($date, "DD.MM.YYYY HH:MI:SS");?>
				<strong><?=$aWeek[date("w",MakeTimeStamp($date, "DD.MM.YYYY"))]?>, <?=intval($Date["DD"]).' '.$aMonths[intval($Date["MM"])-1]?><?if($Date["HH"]!="00"):?>, <?=$Date["HH"].':'.$Date["MI"]?><?endif;?></strong>
                        <?//endif;?>

                     </td>
	                     <td align="center" valign="middle"><a href="<?echo $arElement["DETAIL_PAGE_URL"]?>zakaz/"><img src="<?=BX_ROOT?>/templates/<?=SITE_TEMPLATE_ID?>/img/order.gif" width="63" height="23" border="0" /></a></td>
                    </tr>
                  </table>                    

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
		endif;
		while ($cell<$arParams["LINE_ELEMENT_COUNT"]):
			$cell++;
		?><td>&nbsp;</td><?
		endwhile;
		?>
	</tr>
</table>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
