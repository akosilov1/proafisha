<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?/*?><h1><?=$HEAD1?></h1><?*/?>
<h2><?=$arResult["NAME"]?></h2>
<br />

<div class="catalog-element">
	<table width="100%" border="0" cellspacing="0" cellpadding="2">
		<tr>
			<td width="150" valign="top">
						<img  border="0" src="<?=CFile::GetPath($arResult["PROPERTIES"]["proafisha_p_img"]["VALUE"])?>" alt="<?=$arResult["NAME"]?>"  title="<?=$arResult["NAME"]?>" class="border" />

			</td>
			<td valign="top">	
				<?=$arResult["PROPERTIES"]["adress_pro"]["VALUE"]?>
				<?foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
					<?=$arProperty["NAME"]?>:<b>&nbsp;<?
					if(is_array($arProperty["DISPLAY_VALUE"])):
						echo implode("&nbsp;/&nbsp;", strip_tags($arProperty["DISPLAY_VALUE"]));
					else:
						echo strip_tags($arProperty["DISPLAY_VALUE"]);?>
					<?endif?></b><br />
				<?endforeach?>
  

    </strong></td>
  </tr><script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="none" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,moimir,lj"></div> 






			</td>
		</tr>
	</table>
	<div><br>
  <a class="buttonLink buyTiketsBillboard" href="<?=$arResult["DETAIL_PAGE_URL"]?>billboard/"><img src="/bitrix/templates/benuar/img/billboard.gif" alt="Заказ билетов и репертуар " title="Заказ билетов и репертуар" border="0" width="167" height="23"></a>
  &nbsp;&nbsp;&nbsp;
  <a class="buttonLink schema" href="<?=$arResult["DETAIL_PAGE_URL"]?>schema/"><img src="<?=BX_ROOT?>/templates/<?=SITE_TEMPLATE_ID?>/img/sxema.gif" width="83" height="23" border="0" alt="Схема зала" title="Схема зала" /></a>
</div>
		<br /><?=$arResult["PROPERTIES"]["proafisha_d_text"]["~VALUE"]["TEXT"]?><br />
	
	<?if(count($arResult["LINKED_ELEMENTS"])>0):?>
		<br /><b><?=$arResult["LINKED_ELEMENTS"][0]["IBLOCK_NAME"]?>:</b>
		<ul>
	<?foreach($arResult["LINKED_ELEMENTS"] as $arElement):?>
		<li><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a></li>
	<?endforeach;?>
		</ul>
	<?endif?>
</div>

<?//echo '<pre>';print_r($arResult);echo '</pre>';?>
