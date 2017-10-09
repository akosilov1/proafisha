<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?/*?><h1><?=$HEAD1?></h1><?*/

global  $f; 
if($f!=1):
?>
<h2><?=$arResult["NAME"]?></h2>
<?endif;
$aMonths = array(GetMessage("jan"), GetMessage("feb"), GetMessage("mar"), GetMessage("apr"), GetMessage("may"), GetMessage("jun"), GetMessage("jul"), GetMessage("aug"), GetMessage("sep"), GetMessage("okt"), GetMessage("nov"), GetMessage("des"));
$aWeek = array(GetMessage("su"), GetMessage("mo"), GetMessage("tu"), GetMessage("we"), GetMessage("th"), GetMessage("fr"), GetMessage("sa"));
?>
<table id="zakaz-info" border="0" cellspacing="0" cellpadding="0">
<?if ($arResult["PROPERTIES"]["type"]["VALUE"]):?>
  <tr>
    <td height="20" align="left" valign="top"><div><strong><?=$arResult["DISPLAY_PROPERTIES"]["type"]["DISPLAY_VALUE"]?></strong></div><br /></td>
  </tr>
<?endif;?>
  <tr>
    <td height="20" align="left" valign="top">   
                               <br />: <?if($arResult["PROPERTIES"]["place"]["VALUE"]):


	//echo str_replace('<a href="','<a href="/places',$arResult["DISPLAY_PROPERTIES"]["place"]["DISPLAY_VALUE"]);
	echo $arResult["DISPLAY_PROPERTIES"]["place"]["DISPLAY_VALUE"];

/*
$res = CIBlockElement::GetByID($arResult["PROPERTIES"]["place"]["VALUE"]);
if($ar_res = $res->GetNext())
	echo '<a class="place" href="/places/'.$ar_res["IBLOCK_SECTION_ID"].'/'.$ar_res["ID"].'/">'.$ar_res["NAME"].'</a>';
*/

                        endif;
                     ?>

    </strong></td>
  </tr>
  <?php /*<tr>
    <td height="20" align="left" valign="top">: 
    
			<?if($arResult["DISPLAY_ACTIVE_FROM"]):?>
				<?$Date = ParseDateTime($arResult["DISPLAY_ACTIVE_FROM"], "DD.MM.YYYY HH:MI:SS");?>
				<strong>  <?=$aWeek[date("w",MakeTimeStamp($arResult["DISPLAY_ACTIVE_FROM"], "DD.MM.YYYY"))]?>, <?=intval($Date["DD"]).' '.$aMonths[intval($Date["MM"])-1]?><?if($Date["HH"]!="00"):?>, <?=$Date["HH"].':'.$Date["MI"]?><?endif;?></strong>
                        <?endif;?>
			
    </td>
  </tr> */ ?>

  <?if($arResult["DISPLAY_PROPERTIES"]["duration"]["DISPLAY_VALUE"]):?>
  <tr><td height="20" align="left" valign="top"><div><?=$arResult["DISPLAY_PROPERTIES"]["duration"]["NAME"]?>: <strong><?=$arResult["DISPLAY_PROPERTIES"]["duration"]["DISPLAY_VALUE"]?></strong></div><br /></td></tr>
  <?endif?>
  
  <?if($arResult["DISPLAY_PROPERTIES"]["author"]["DISPLAY_VALUE"]):?>
  <tr><td height="20" align="left" valign="top"><div><?=$arResult["DISPLAY_PROPERTIES"]["author"]["NAME"]?>: <strong><?=$arResult["DISPLAY_PROPERTIES"]["author"]["DISPLAY_VALUE"]?></div><br /></td></tr>
  <?endif?>
  
<?if($arResult["DISPLAY_PROPERTIES"]["artists"]["DISPLAY_VALUE"]):?>
  <tr>
    <td class="artists" height="20" align="left" valign="top"><div><?=$arResult["DISPLAY_PROPERTIES"]["artists"]["NAME"]?>: </strong><?=$arResult["DISPLAY_PROPERTIES"]["artists"]["DISPLAY_VALUE"]?></div><br /></td></tr>
<?endif?>
  
<?if($arResult["DISPLAY_PROPERTIES"]["director"]["DISPLAY_VALUE"]):?> 
  <tr>
    <td class="director" height="20" align="left" valign="top"><div><?=$arResult["DISPLAY_PROPERTIES"]["director"]["NAME"]?>: </strong><?=$arResult["DISPLAY_PROPERTIES"]["director"]["DISPLAY_VALUE"]?></div><br /></td></tr>
<?endif?>
  
<?if($arResult["DISPLAY_PROPERTIES"]["info"]["DISPLAY_VALUE"]):?>
<tr>
  <td class="info" height="20" align="left" valign="top">111
    <div><?=$arResult["DISPLAY_PROPERTIES"]["info"]["NAME"]?>: </strong><?=$arResult["DISPLAY_PROPERTIES"]["info"]["DISPLAY_VALUE"]?></div><br />
  </td>
</tr>
<?endif?>
 
			<?php /*<tr>
			<td>

			<br /><br />
			</td>
			</tr>
            <tr>
              <td align="left" valign="top">:бяе дюрш янашрхъ бйкчвхрекэмн дн :
			
			<?
			$today = MakeTimeStamp(date("d.m.Y"), "DD.MM.YYYY");
			foreach($arResult["PROPERTIES"]["time"]["VALUE"] as $date):
				$date_unix = MakeTimeStamp($date, "DD.MM.YYYY HH:MI:SS");
				if ($date_unix >= $today)
					$arDatesUnix[] = $date_unix;
			endforeach;
			sort($arDatesUnix);
			foreach($arDatesUnix as $date)
				$arDates[] = ConvertTimeStamp($date, "FULL");;
			?>

			<?foreach($arDates as $date):?>
				<?$PDate = ParseDateTime($date, "DD.MM.YYYY HH:MI:SS");?>
				<nobr><strong><?=$aWeek[date("w",MakeTimeStamp($date, "DD.MM.YYYY"))]?>, <?=intval($PDate["DD"]).' '.$aMonths[intval($PDate["MM"])-1]?>, <?=$PDate["HH"].':'.$PDate["MI"]?></strong></nobr> | 
			<?endforeach;?>
			
           </td>
           </tr>*/ ?>
          </table>
