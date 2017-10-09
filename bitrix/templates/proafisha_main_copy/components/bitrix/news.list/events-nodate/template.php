<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?//echo '<pre>';print_r($arResult);echo '</pre>';?>


<?
$aMonths = array(GetMessage("jan"), GetMessage("feb"), GetMessage("mar"), GetMessage("apr"), GetMessage("may"), GetMessage("jun"), GetMessage("jul"), GetMessage("aug"), GetMessage("sep"), GetMessage("okt"), GetMessage("nov"), GetMessage("des"));
$aWeek = array(GetMessage("su"), GetMessage("mo"), GetMessage("tu"), GetMessage("we"), GetMessage("th"), GetMessage("fr"), GetMessage("sa"));
?>

<?foreach($arResult["SECTIONS"] as $arSection):?>

<?if(count($arSection["ITEMS"])>0):?>

<h2><a href="<?=$arSection["SECTION_PAGE_URL"]?>" title="<?=$arSection["NAME"]?>"><?=$arSection["NAME"]?></a></h2>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<?
		$cell = 0;
		foreach($arSection["ITEMS"] as $arElement):
		?>
		<td valign="top" width="<?=round(100/$arParams["LINE_ELEMENT_COUNT"])?>%">


<?//echo '<pre>';print_r($arElement);echo '</pre>';?>


			<table width="100%" cellpadding="0" cellspacing="0" border="0" background="<?=BX_ROOT?>/templates/<?=SITE_TEMPLATE_ID?>/img/greydot2.gif" bgcolor="#F0F0F0">
				<tr>
	<td width="10" align="left" valign="top" bgcolor="#FF6600">&nbsp;</td>

		<?if($arParams["DISPLAY_PICTURE"]!="N"):?>
		<td width="100" align="left" valign="top">
		
		<?$img_params = 'alt="'.$arElement["NAME"].'" title="'.$arElement["NAME"].'"';?>
		<?if($arElement["PROPERTIES"]["allbilet_p_img"]["VALUE"]):?>
			<a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=CFile::ShowImage($arElement["PROPERTIES"]["allbilet_p_img"]["VALUE"], 200, 200, $img_params);?></a>
		<?elseif(is_array($arElement["PREVIEW_PICTURE"])):?>
			<a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><img class="preview_picture" border="0" src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arElement["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arElement["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" style="float:left" /></a>
		<?//else:?>
			<?/*?>
			<img border="1" src="<?=BX_ROOT?>/templates/<?=SITE_TEMPLATE_ID?>/img/bbg2.gif" width="100" height="100" style="float:left; border:1px solid #CCC" />
			<?*/?>
		<?endif?>
		</td>
		<?endif?>
	<td width="5" align="left" valign="top">&nbsp;</td>

					<td valign="top">
					
					
					
					
					
              <table width="100%" height="100" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="40" align="left" valign="top">
                  	<a class="name" href="<?=$arElement["DETAIL_PAGE_URL"]?>" title="<?=$arElement["NAME"]?>"><?=$arElement["NAME"]?></a>
                  	<br />
                  	<?=$arElement["DISPLAY_PROPERTIES"]["type"]["DISPLAY_VALUE"]?>
                  	
                  	<?if($arElement["DISPLAY_PROPERTIES"]["allbilet_p_text"]["DISPLAY_VALUE"]):?>
                  	<p><?=TruncateText(htmlspecialcharsback($arElement["DISPLAY_PROPERTIES"]["allbilet_p_text"]["DISPLAY_VALUE"]),250);?></p>
                  	<?endif?>

                  </td>
                </tr>
                <tr>
                  <td align="left" valign="middle">
                  
                        <?if($arElement["DISPLAY_PROPERTIES"]["place"]["DISPLAY_VALUE"]):?>
				<?$place = strip_tags($arElement["DISPLAY_PROPERTIES"]["place"]["DISPLAY_VALUE"]);?>
				<!--<a class="place" href="/place<?=$arElement["PROPERTIES"]["place"]["VALUE"]?>/" title="<?=$place?>"><?=$place?></a>-->
				<a class="place" href="<?=$arElement["PROPERTIES"]["place"]["VALUE"]?>" title="<?=$place?>"><?=$place?></a>
			<?endif?>
                  
                  </td>
                </tr>
                
                <tr>
                  <td height="20" align="left" valign="middle"><table width="100%" height="20" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="50%" align="left" valign="middle">


			<?if($arElement["ACTIVE_FROM"] && !$_REQUEST["date"]):?>
				<?$Date = ParseDateTime($arElement["ACTIVE_FROM"], "DD.MM.YYYY HH:MI:SS");?>
				<strong><?=$aWeek[date("w",MakeTimeStamp($arElement["ACTIVE_FROM"], "DD.MM.YYYY"))]?>, <?=intval($Date["DD"]).' '.$aMonths[intval($Date["MM"])-1]?><?if($Date["HH"]!="00"):?>, <?=$Date["HH"].':'.$Date["MI"]?><?endif;?></strong>
                        <?endif;?>


                     </td>
	                     <td>&nbsp;</td>
	                     <td width="120" align="center" valign="middle" bgcolor="#FFDE01"><a href="<?=$arElement["DETAIL_PAGE_URL"]?>" title="<?=$arElement["NAME"]?>">купить билеты...</a></td>
	                     <td width="20"></td>
                    </tr>
                  </table>                    
                  
                  </td>
                </tr>
              </table>              
					
					
					</td>

				</tr>
			</table>

		</td>
<td width="20" align="left" valign="top"></td>
	<?
	$cell++;
	if($cell>=$arParams["LINE_ELEMENT_COUNT"]):
		$cell = 0;
	?>
	</tr>
      <tr>
        <td width="485" height="20" align="left" valign="top">&nbsp;</td>
        <td width="20" height="20" align="left" valign="top"></td>
        <td width="485" height="20" align="left" valign="top">&nbsp;</td>
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
<?endif?>
<?endforeach?>
