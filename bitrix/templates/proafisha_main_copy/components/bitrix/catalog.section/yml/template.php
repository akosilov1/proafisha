<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $DB;

//Собираем события
$arIds = array(0);
foreach($arResult["ITEMS"] as $cell=>$arElement)
{
	$arIds[] = intval($arElement['PROPERTIES']['event']['VALUE']);
}

$dbEvents = $DB->Query('SELECT `ID`, `IBLOCK_SECTION_ID`, `NAME` FROM `b_iblock_element` WHERE `ID` IN ('.implode(',', $arIds).')');
$arEvents = array();
while($arr = $dbEvents->Fetch())
{
	$arEvents[$arr['ID']] = $arr;
}


foreach($arResult["ITEMS"] as $cell=>$arElement)
{
	$event = $arEvents[$arElement['PROPERTIES']['event']['VALUE']];
	
	echo '  <offer id="'.$arElement['ID'].'">'."\r\n";
	echo '    <url>'.$arElement["DETAIL_PAGE_URL"].$event['IBLOCK_SECTION_ID'].'/'.$event['ID'].'/#order</url>'."\r\n";
	echo '    <price>'.$arElement['PROPERTIES']['price']['VALUE'].'</price>'."\r\n";
	echo '    <currencyId>RUR</currencyId>'."\r\n";
	echo '    <categoryId type="Own">'.$arElement["IBLOCK_SECTION_ID"].'</categoryId>'."\r\n";
	echo '    <picture></picture>'."\r\n";
	echo '    <deliveryIncluded />'."\r\n";
	echo '    <orderingTime>'."\r\n";
	echo '      <ordering>Есть в наличии</ordering>'."\r\n";
	echo '    </orderingTime>'."\r\n";
	echo '    <name>'.$arElement["NAME"].'</name>'."\r\n";
	echo '    <description />'."\r\n";
	echo '    <param name="Событие">'.$event['NAME'].'</param>'."\r\n";
	echo '    <param name="Места">'.$arElement['PROPERTIES']['seats']['VALUE'].'</param>'."\r\n";
	echo '    <param name="Количество">'.$arElement['PROPERTIES']['quantity']['VALUE'].'</param>'."\r\n";
	echo '  </offer>'."\r\n";
}
?>
