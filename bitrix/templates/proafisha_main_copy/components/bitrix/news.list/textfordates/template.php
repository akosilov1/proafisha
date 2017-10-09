<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
foreach($arResult["ITEMS"] as $arElement):?>
	<?$req = substr($_REQUEST["date"], 0, -5)?>
		<?if ($arElement["NAME"] == $req):?>
			<?=$arElement["PREVIEW_TEXT"];?>
		<?endif?>
		<?foreach($arElement["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
			<?if ($arElement["NAME"] == $req):?>
				<?if ($arProperty["ID"] == 168):?>
					<?$APPLICATION->SetPageProperty("title", $arProperty["DISPLAY_VALUE"]);?>
				<?elseif ($arProperty["ID"] == 169):?>
					<?$APPLICATION->SetPageProperty("header1", $arProperty["DISPLAY_VALUE"]);?>
				<?elseif ($arProperty["ID"] == 170):?>
					<?$APPLICATION->SetPageProperty("keywords", $arProperty["DISPLAY_VALUE"]);?>
				<?elseif ($arProperty["ID"] == 171):?>
					<?$APPLICATION->SetPageProperty("description", $arProperty["DISPLAY_VALUE"]);?>
				<?endif?>				
			<?endif?>	
		<?endforeach;?>
<?endforeach;?>