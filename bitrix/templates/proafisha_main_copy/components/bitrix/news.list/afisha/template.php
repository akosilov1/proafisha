<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$aMonths = array(GetMessage("jan"), GetMessage("feb"), GetMessage("mar"), GetMessage("apr"), GetMessage("may"), GetMessage("jun"), GetMessage("jul"), GetMessage("aug"), GetMessage("sep"), GetMessage("okt"), GetMessage("nov"), GetMessage("des"));
$aWeek = array(GetMessage("su"), GetMessage("mo"), GetMessage("tu"), GetMessage("we"), GetMessage("th"), GetMessage("fr"), GetMessage("sa"));
$arParams["LINE_ELEMENT_COUNT"] = 2;
echo $arResult["SECTION"]["PATH"][0]["DESCRIPTION"];
echo '<br /><br />';
//print_r();
global $var;
if($var=="Y"){
$res = CIBlockSection::GetList(Array("SORT"=>"≠≠ASC"), Array("IBLOCK_ID"=>23, "ID"=>$arResult["SECTION"]["PATH"][0]["ID"]),false, Array("UF_KEY"));
if($ar_res = $res->GetNext())
{
	$APPLICATION->SetPageProperty("keywords", $ar_res["UF_KEY"]);
}
$res = CIBlockSection::GetList(Array("SORT"=>"≠≠ASC"), Array("IBLOCK_ID"=>23, "ID"=>$arResult["SECTION"]["PATH"][0]["ID"]),false, Array("UF_DESC"));
if($ar_res = $res->GetNext())
{
	$APPLICATION->SetPageProperty("description", $ar_res["UF_DESC"]);
}


$res = CIBlockSection::GetList(Array("SORT"=>"≠≠ASC"), Array("IBLOCK_ID"=>23, "ID"=>$arResult["SECTION"]["PATH"][0]["ID"]),false, Array("UF_TITLE"));
if($ar_res = $res->GetNext())
{

//print_r($ar_res);
	$APPLICATION->SetPageProperty("title", $ar_res["UF_TITLE"]);
	$APPLICATION->SetTitle($ar_res["UF_TITLE"]);
}	
$res = CIBlockSection::GetList(Array("SORT"=>"≠≠ASC"), Array("IBLOCK_ID"=>23, "ID"=>$arResult["SECTION"]["PATH"][0]["ID"]),false, Array("UF_H1"));
if($ar_res = $res->GetNext())
{
	$APPLICATION->SetPageProperty("header1", $ar_res["UF_H1"]);
}
}
?>


<table width="100%" cellpadding="0" cellspacing="0" border="0" class="data-table">
	<tr>
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
					
                  	<div class="name"><a href="<?=$arElement["DETAIL_PAGE_URL"]?>" title="<?=$arElement["NAME"]?>"><?=$arElement["NAME"]?></a></div>
                  	<?if($arElement["DISPLAY_PROPERTIES"]["type"]["DISPLAY_VALUE"]):?>
				<div><?=$arElement["DISPLAY_PROPERTIES"]["type"]["DISPLAY_VALUE"]?></div>
			<?endif?>

                  	<?if($arElement["PREVIEW_TEXT"]):?>
				<p>
				<?
				if(strlen($arElement["PREVIEW_TEXT"])<=250):
					echo $arElement["PREVIEW_TEXT"];
				else:
					$length = strrpos(trim(substr($arElement["PREVIEW_TEXT"],0,250))," ");
					echo substr($arElement["PREVIEW_TEXT"],0,$length);
				endif;
				?>
				</p>
			<?endif?>
                  
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
				<?$Date = ParseDateTime($arElement["DISPLAY_ACTIVE_FROM"], "DD.MM.YYYY HH:MI:SS");?>
				<strong><?=$aWeek[date("w",MakeTimeStamp($arElement["DISPLAY_ACTIVE_FROM"], "DD.MM.YYYY"))]?>, <?=intval($Date["DD"]).' '.$aMonths[intval($Date["MM"])-1]?><?if($Date["HH"]!="00"):?>, <?=$Date["HH"].':'.$Date["MI"]?><?endif;?></strong>
                        <?//endif;?>

                     </td>
	                     <td align="center" valign="middle"><a href="<?echo $arElement["DETAIL_PAGE_URL"]?>#order"><img src="<?=BX_ROOT?>/templates/<?=SITE_TEMPLATE_ID?>/img/order.gif" width="63" height="23" border="0" /></a></td>
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
