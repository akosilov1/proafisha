<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?/*?><h1><?=$HEAD1?></h1><?*/
$arResult['DETAIL_PAGE_URL'] = '/events/'.$arResult["IBLOCK_SECTION_ID"].'/'.$arResult["ID"].'/';
global  $f; 
if($f!=1):
?>
<h2><?=$arResult["NAME"]?></h2>

<?endif;
$aMonths = array(GetMessage("jan"), GetMessage("feb"), GetMessage("mar"), GetMessage("apr"), GetMessage("may"), GetMessage("jun"), GetMessage("jul"), GetMessage("aug"), GetMessage("sep"), GetMessage("okt"), GetMessage("nov"), GetMessage("des"));
$aWeek = array(GetMessage("su"), GetMessage("mo"), GetMessage("tu"), GetMessage("we"), GetMessage("th"), GetMessage("fr"), GetMessage("sa"));
?>
          <table border="0" cellspacing="0" cellpadding="0" width="100%">
<?if ($arResult["PROPERTIES"]["type"]["VALUE"]):?>
  <tr>
    <td height="20" align="left" valign="top"><div>Подробности события : <strong><?=$arResult["DISPLAY_PROPERTIES"]["type"]["DISPLAY_VALUE"]?></strong></div><br /></td>
  </tr>
<?endif;?>
  <tr>
    <td height="20" align="left" valign="top"> 
                               <br /> Где состоится событие :  <? if($arResult["PROPERTIES"]["place"]["VALUE"]):


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
  </tr><script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="none" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,moimir,lj"></div> 

  <tr>
    <td height="20" align="left" valign="top"> Когда состоится событие : 
    
			<?if($arResult["DISPLAY_ACTIVE_FROM"]):?>
				<?$Date = ParseDateTime($arResult["DISPLAY_ACTIVE_FROM"], "DD.MM.YYYY HH:MI:SS");?><? //print_r($Date );?>
				<strong>  <?=$aWeek[date("w",MakeTimeStamp($arResult["DISPLAY_ACTIVE_FROM"], "DD.MM.YYYY"))]?>, <?=intval($Date["DD"]).' '.$aMonths[intval($Date["MM"])-1]?><?if($Date["HH"]!="00"):?>, <?=$Date["HH"].':'.$Date["MI"]?><?endif;?></strong>
                        <?endif;?>
			
    </td>
  </tr>

  <?if($arResult["DISPLAY_PROPERTIES"]["duration"]["DISPLAY_VALUE"]):?>
  <tr><td height="20" align="left" valign="top"><div><?=$arResult["DISPLAY_PROPERTIES"]["duration"]["NAME"]?>: <strong><?=$arResult["DISPLAY_PROPERTIES"]["duration"]["DISPLAY_VALUE"]?></strong></div><br /></td></tr>
  <?endif?>
  
  <?if($arResult["DISPLAY_PROPERTIES"]["author"]["DISPLAY_VALUE"]):?>
  <tr><td height="20" align="left" valign="top"><div><?=$arResult["DISPLAY_PROPERTIES"]["author"]["NAME"]?>: <strong><?=$arResult["DISPLAY_PROPERTIES"]["author"]["DISPLAY_VALUE"]?></div><br /></td></tr>
  <?endif?>
  
  <?if($arResult["DISPLAY_PROPERTIES"]["artists"]["DISPLAY_VALUE"]):?>
  <tr><td height="20" align="left" valign="top"><div><?=$arResult["DISPLAY_PROPERTIES"]["artists"]["NAME"]?>: </strong><?=$arResult["DISPLAY_PROPERTIES"]["artists"]["DISPLAY_VALUE"]?></div><br /></td></tr>
  <?endif?>
  
  <?if($arResult["DISPLAY_PROPERTIES"]["director"]["DISPLAY_VALUE"]):?> 
  <tr><td height="20" align="left" valign="top"><div><?=$arResult["DISPLAY_PROPERTIES"]["director"]["NAME"]?>: </strong><?=$arResult["DISPLAY_PROPERTIES"]["director"]["DISPLAY_VALUE"]?></div><br /></td></tr>
  <?endif?>
  
  <?if($arResult["DISPLAY_PROPERTIES"]["info"]["DISPLAY_VALUE"]):?>
  <tr><td height="20" align="left" valign="top"><div><?=$arResult["DISPLAY_PROPERTIES"]["info"]["NAME"]?>: </strong><?=$arResult["DISPLAY_PROPERTIES"]["info"]["DISPLAY_VALUE"]?></div><br /></td></tr>
  <?endif?>
 
            
            <tr>
              <td align="left" valign="top">
	<br />
	<?
		//echo $f;echo "@!@@@@@@@@@@@@@@@@@@@";
		//echo $f
if($f!=1):?>

		<img hspace="15" align="left" border="0" src="<?=CFile::GetPath($arResult["PROPERTIES"]["proafisha_p_img"]["VALUE"])?>" alt="<?=$arResult["NAME"]?>"  title="<?=$arResult["NAME"]?>" />
	<div class="links">
	  <a class="buttonLink buyTikets" href="<?=$arResult['DETAIL_PAGE_URL']?>zakaz/"><img src="/bitrix/templates/benuar/img/buy_ticket.gif" alt="Выбрать билеты" title="Выбрать билеты" border="0" width="99" height="23"></a>
	  &nbsp;&nbsp;&nbsp;
<!--	  <a href="<?=preg_replace('/^.*href="([^"]*)".*/', '$1', $arResult['DISPLAY_PROPERTIES']['place']['DISPLAY_VALUE'])?>schema/"><img src="/bitrix/templates/benuar/img/sxema.gif" alt="Схема зала" title="Схема зала" border="0" width="79" height="23"></a>-->
	  <a class="buttonLink schema" href="<?=$arResult['DETAIL_PAGE_URL']?>schema/"><img src="/bitrix/templates/benuar/img/sxema.gif" alt="Схема зала" title="Схема зала" border="0" width="79" height="23"></a>
	</div>
	
	<div class="textblock">
 	<?


	?>
 	<?
	//echo'<pre>'; print_r($arResult["PROPERTIES"]);echo'</pre>';
	if(strlen($arResult["PROPERTIES"]["proafisha_d_text"]["VALUE"][TEXT])>0):
	
		echo htmlspecialcharsback($arResult["PROPERTIES"]["proafisha_d_text"]["VALUE"][TEXT]);
	else:
		echo htmlspecialcharsback($arResult["PROPERTIES"]["proafisha_p_text"]["VALUE"][TEXT]);
	endif;
	//echo'<pre>'; print_r($arResult["PROPERTIES"]["proafisha_p_text"]); echo'</pre>';
 	?>

	<?endif;?>
    <? /*if(strlen($arResult["PREVIEW_TEXT"])>0):?>
		<p><?=$arResult["PREVIEW_TEXT"];?><br /></p>
	<?endif?>
 	<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
		<p><?=$arResult["DETAIL_TEXT"];?><br /></p>
	<?endif;*/?>
	
	</div>
	</td>
            </tr>
			<?if($f==1):?>
			<tr>
			<td>
			Дорогие зрители! Мы будем очень рады получить Ваши отзывы и комментарии о спектаклях концертах и других событиях и мероприятиях , они будут опубликованы в форуме. Известно , что большинство Ваших размышлений  будут интересны не только тем, кто  посещает наш сайт. Уверены , что форум БЕНУАРА позволит всем, кто любит спектакли , концерты , цирковые представления ,мюзиклы и спортивные события  обмениваться мнениями на сайте .Ждем Ваших сообщений.
			<br /><br />
			</td>
			</tr>
			<?endif?>
            <tr>
             

	<td align="left" valign="top">

		<?php

		// Дата в активностях
		$iActiveDate = date("U", strtotime($arResult["DISPLAY_ACTIVE_FROM"]) );

		// Текущая метка времени
		$iToday = MakeTimeStamp(date("d.m.Y"), "DD.MM.YYYY");

		// Массив отображаемых дат
		$arDisplayDates = array();

		foreach( $arResult["PROPERTIES"]["time"]["VALUE"] as $date ) {
			$iDate = MakeTimeStamp($date, "DD.MM.YYYY HH:MI:SS");
			if ($iDate >= $iToday && $iDate >= $iActiveDate ) {
				$parseDate = ParseDateTime($date, "DD.MM.YYYY HH:MI:SS");
				$arDisplayDates[ $iDate ] = "<nobr><strong>".$aWeek[date("w",MakeTimeStamp($date, "DD.MM.YYYY"))].', '.intval($parseDate["DD"]).' '.$aMonths[intval($parseDate["MM"])-1].' '.$parseDate["HH"].':'.$parseDate["MI"]."</strong></nobr>";
			}
		}?>

		Дата:

		<?
		if ( empty($arDisplayDates) ) {
			echo "<span style='color:red'>Нет активных дат</span>";
		} else {
			ksort($arDisplayDates);
			echo implode(' | ',$arDisplayDates);
		}
		?>
		 
		<? /* 
 Дата:
			
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
			*/ ?>

           </td>
           </tr>
          </table>
<?$APPLICATION->IncludeComponent("bitrix:main.share", ".default", array(
	"HIDE" => "N",
	"HANDLERS" => array(
		0 => "lj",
		1 => "twitter",
		2 => "facebook",
		3 => "delicious",
		4 => "vk",
		5 => "mailru",
	),
	"PAGE_URL" => $APPLICATION->GetCurDir(),
	"PAGE_TITLE" => $arResult["NAME"],
	"SHORTEN_URL_LOGIN" => "",
	"SHORTEN_URL_KEY" => ""
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?>