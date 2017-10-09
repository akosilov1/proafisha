<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?//echo '<pre>';print_r($arResult);echo '</pre>';?>
<?CJSCore::Init();?>
<?CAjax::Init();?>

<?
$aMonths = array(GetMessage("jan"), GetMessage("feb"), GetMessage("mar"), GetMessage("apr"), GetMessage("may"), GetMessage("jun"), GetMessage("jul"), GetMessage("aug"), GetMessage("sep"), GetMessage("okt"), GetMessage("nov"), GetMessage("des"));
$aWeek = array(GetMessage("su"), GetMessage("mo"), GetMessage("tu"), GetMessage("we"), GetMessage("th"), GetMessage("fr"), GetMessage("sa"));
?>

<?if(CModule::IncludeModule("currency")):?>

<?
$Date = "";
$arDates = Array();
foreach($arResult["ITEMS"] as $arItem):
	if(strlen($arItem["PROPERTIES"]["seats"]["VALUE"])>0 || $arItem["PROPERTIES"]["quantity"]["VALUE"]>0):
		if($DB->CompareDates($arItem["PROPERTIES"]["date"]["VALUE"],date("d.m.Y H:i:s"))>0)
			$arDates[] = $arItem["PROPERTIES"]["date"]["VALUE"];
	endif;
endforeach;
$arDates = array_unique($arDates);

if(!empty($_REQUEST["date"])){
	$SelectedDate = $_REQUEST["date"];
} else {
	$SelectedDate = $arDates[0];
}
?>

<div id="order_block" style="display:block">
<a name="order"></a>
<p><class="name"><strong><span style="color: #ee1d24;">КУПИТЬ БИЛЕТЫ , ФОРМА ЗАКАЗА БИЛЕТОВ. ВЫБИРАЕТЕ ДАТУ И МЕСТА ИЗ СПИСКА ИЛИ ЗВОНИТЕ ПО ТЕЛ. +7 (499) 504 98 22 	 . МЫ ОБЯЗАТЕЛЬНО ПОМОЖЕМ !:<strong></></p>

<?if(count($arDates)>0):?>
<?
$res = CIBlockElement::GetByID($_REQUEST["ID"]);
if($obRes = $res->GetNextElement())
{
  $ar_res = $obRes->GetProperty("time");
  $arDatesTemp = $ar_res["VALUE"];
}
?>

<?
$today = MakeTimeStamp(date("d.m.Y"), "DD.MM.YYYY");
foreach($arDatesTemp as $date):
	$date_unix = MakeTimeStamp($date, "DD.MM.YYYY HH:MI:SS");
	if ($date_unix >= $today)
		$arDatesUnix[] = $date_unix;
endforeach;
sort($arDatesUnix);
foreach($arDatesUnix as $date)
	$arDates2[] = ConvertTimeStamp($date, "FULL");;
?>
<table border="0" cellpadding="0" cellspacing="0">
<tr>
	<td><span style="color:green;">Выберите дату или оставить заявку</span>:&nbsp;</td>
	<td>
	<form name="DateSelect" method="POST" action="#order" style="margin:0;">
	<select name="date" onChange="form.submit();">
	<?foreach($arDates2 as $Date):
		$weekday = $aWeek[date("w",MakeTimeStamp($Date, "DD.MM.YYYY"))];
		$pDate = ParseDateTime($Date, "DD.MM.YYYY HH:MI:SS");
		echo '<option value="'.$Date.'"'.($Date==$SelectedDate ? " selected" : "").'>'.$weekday.', '.intval($pDate["DD"]).' '.$aMonths[intval($pDate["MM"])-1]?>, <?=$pDate["HH"].':'.$pDate["MI"].'</option>';
	endforeach;?>
	</select>
	</form>
	</td>
</tr>
</table>
<?endif;?>


<!--  <form name="Order" method="POST" action="/order.php" style="margin:0;">-->

<?=CAjax::GetForm('name="Order" action="/order.php" method="POST" enctype="multipart/form-data"', 'order_result', '1')?>

<input type="hidden" name="backurl" value="<?=$APPLICATION->GetCurDir()?>" />

<?if($_REQUEST["ID"]):
	$res = CIBlockElement::GetByID($_REQUEST["ID"]);
	if($ar_res = $res->GetNextElement()):
		$arFields = $ar_res->GetFields();
		$arProp = $ar_res->GetProperty("place");
		$PLACE_ID = $arProp["VALUE"];
		echo '<input type="hidden" name="event" value="'.$arFields["NAME"].'" />';
		echo '<input type="hidden" name="eventid" value="'.$arFields["ID"].'" />';
	endif;
	
	$res = CIBlockElement::GetByID($PLACE_ID);
	if($ar_res = $res->GetNext())
		echo '<input type="hidden" name="place" value="'.$ar_res["NAME"].'" />';
endif;?>

<?if(count($arDates)>0):?>

<input type="hidden" name="date" value="<?=$SelectedDate?>" />
<input type="hidden" name="items" value="<?=count($arResult["ITEMS"])?>" />

<table width="400" border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="2"><hr style="border: 1px solid #164573;" /></td></tr>

<?foreach($arResult["ITEMS"] as $id=>$arItem):?>

<?if(strlen($arItem["PROPERTIES"]["seats"]["VALUE"])>0 || $arItem["PROPERTIES"]["quantity"]["VALUE"]>0):?>
<?if($arItem["PROPERTIES"]["date"]["VALUE"] == $SelectedDate):?>

<tr>
<td valign="top">
	<b><?=$arItem["NAME"]?></b>
	<input type="hidden" name="name<?=$id?>" value="<?=$arItem["NAME"]?>" />
	<input type="hidden" name="id<?=$id?>" value="<?=$arItem["ID"]?>" />
</td>
<td valign="top" align="right">
	<?if(strlen($arItem["PROPERTIES"]["price"]["VALUE"])>0):?>
		Цена: <span class="price"><?=CurrencyFormat($arItem["PROPERTIES"]["price"]["VALUE"], "RUB");?></span>
		<input type="hidden" name="price<?=$id?>" value="<?=$arItem["PROPERTIES"]["price"]["VALUE"]?>" />
	<?endif;?>
</td>
</tr>

<tr>
<td colspan="2" align="right">
	<?if(strlen($arItem["PROPERTIES"]["seats"]["VALUE"])>0):?>
		<?$arSeats = explode(",",$arItem["PROPERTIES"]["seats"]["VALUE"])?>
		<br />
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td align="right" valign="top" width="70">Места:</td>
		<input type="hidden" name="seats<?=$id?>" value="<?=count($arSeats)?>" />
		<?foreach ($arSeats as $sid=>$seat):?>
			<td align="center"><input type="checkbox" name="seat<?=$id?>_<?=$sid?>" value="<?=$seat?>" /><br /><?=$seat?></td>
			<?if($sid>0 && $sid%19==0):?>
				</tr><tr><td>&nbsp;</td>
			<?endif;?>
		<?endforeach;?>
		</td>
		</table>
	<?elseif($arItem["PROPERTIES"]["quantity"]["VALUE"]>0):?>
		Укажите количество: <input class="inputtext" name="quantity<?=$id?>" type="text" size="3" maxlength="3" onKeyPress="if ((event.keyCode < 48) || (event.keyCode > 57)) event.returnValue = false" />
	<?endif;?>
</td>
</tr>

<tr><td colspan="2"><hr style="border: 1px solid #164573;" /></td></tr>

<?endif?>
<?endif?>

<?endforeach;?>
</table>
<div style="width:500px; text-align:right;"><input class="submit" type="reset" value="Сбросить" /></div>
<br />

<?endif;?>

<?if(count($arDates)==0):?>

<?
$res = CIBlockElement::GetByID($_REQUEST["ID"]);
if($obRes = $res->GetNextElement())
{
  $ar_res = $obRes->GetProperty("time");
  $arDatesTemp = $ar_res["VALUE"];
}
?>

<?
$today = MakeTimeStamp(date("d.m.Y"), "DD.MM.YYYY");
foreach($arDatesTemp as $date):
	$date_unix = MakeTimeStamp($date, "DD.MM.YYYY HH:MI:SS");
	if ($date_unix >= $today)
		$arDatesUnix[] = $date_unix;
endforeach;
sort($arDatesUnix);
foreach($arDatesUnix as $date)
	$arDates2[] = ConvertTimeStamp($date, "FULL");;
?>

<table width="500" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td><span style="color:green;">Выберите дату</span>:&nbsp;</td>
	<td>
	<select name="date">
	<?foreach($arDates2 as $Date):
		if(MakeTimeStamp($Date, "DD.MM.YYYY")>=MakeTimeStamp(date("d.m.Y"), "DD.MM.YYYY")):
			$weekday = $aWeek[date("w",MakeTimeStamp($Date, "DD.MM.YYYY"))];
			$pDate = ParseDateTime($Date, "DD.MM.YYYY HH:MI:SS");
			echo '<option value="'.$Date.'"'.($Date==$SelectedDate ? " selected" : "").'>'.$weekday.', '.intval($pDate["DD"]).' '.$aMonths[intval($pDate["MM"])-1]?>, <?=$pDate["HH"].':'.$pDate["MI"].'</option>';
		endif;
	endforeach;?>
	</select>
	</td>
</tr>
</table>
<?endif;?>

<table border="0" cellpadding="0" cellspacing="3">
<tr>
	<td>Имя:<br /><input class="inputtext" type="text" name="username" size="37" value="" /></td>
	<td>Телефон: <span class="starrequired">*</span><br /><input class="inputtext" type="text" name="phone" size="37" value=""  onBlur="if(this.value != ''){document.getElementById('submit').disabled = false;} else{document.getElementById('submit').disabled = true;}" /></td>
</tr>
<tr>
	<td>Адрес доставки:<br /><input class="inputtext" type="text" name="address" size="37" value="" /></td>
	<td>E-mail:<br /><input class="inputtext" type="text" name="email" size="37" value="" /></td>
</tr>
<!--<tr>
	<td colspan="2">Комментарий:<br /><textarea class="inputtext" name="comment" cols="60" rows="5"></textarea></td>
</tr>-->

					
<?
$capCode = $GLOBALS["APPLICATION"]->CaptchaGetCode(); 
?>
<tr>
	<td colspan="2">
		<input type="hidden" name="captcha_sid" value="<?=$capCode?>">
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$capCode?>" width="180" height="40" alt="CAPTCHA">
	</td>
</tr>
<tr>
	<td>
		<span class="starrequired">*</span>Введите слово на картинке:<br />
		<input class="inputtext" type="text" name="captcha_word" size="25" maxlength="50" value="">
	</td>
	<td align="right" valign="bottom">
		<input id="submit" disabled class="submit" type="submit" style="width:250px" value="Заказать" />
	</td>
</tr>
</table>
<br />
</form>
</div>


<div id="order_result">
</div>

<?endif;?>