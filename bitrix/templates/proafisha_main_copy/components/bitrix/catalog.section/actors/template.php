<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
if(count($arResult["ITEMS"]) > 0)
{
  echo '<h3>“–”œœ¿, –≈∆»——≈–€, »—œŒÀÕ»“≈À»</h3>';
}
?>


<div class="catalog-section">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

<table cellpadding="0" cellspacing="0" border="0" class="data-table">
		<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>

		<?if($cell%$arParams["LINE_ELEMENT_COUNT"] == 0):?>
		<tr>
		<?endif;?>

		<td valign="top" width="<?=round(100/$arParams["LINE_ELEMENT_COUNT"])?>%">

			<table cellpadding="0" cellspacing="2" border="0" class="data-table-noborder">
				<tr>
					<td valign="top" width="150" align="center">
						<?if(is_array($arElement["PREVIEW_PICTURE"])):?>
							<!--<a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><img border="0" src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arElement["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arElement["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" class="border" /></a><br />-->
							<img border="0" src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arElement["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arElement["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" class="border" /><br />
						<?else:?>
							<img src="<?=BX_ROOT?>/templates/<?=SITE_TEMPLATE_ID?>/img/pix.gif" width="150" height="105" border="0" class="border" />
						<?endif?>
					</td>
					<td valign="top">
						<!--<div><a href="<?=$arElement["DETAIL_PAGE_URL"]?>" title="<?=$arElement["NAME"]?>"><b><?=$arElement["NAME"]?></b></a></div><br />-->
						<div><b><?=$arElement["NAME"]?></b></div><br />

						<br />
						<div><?=$arElement["PREVIEW_TEXT"]?></div>


					</td>
					</td>
				</tr>
			</table>

		</td>

		<?$cell++;
		if($cell%$arParams["LINE_ELEMENT_COUNT"] == 0):?>
			</tr>
		<?endif?>

		<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>

		<?if($cell%$arParams["LINE_ELEMENT_COUNT"] != 0):?>
			<?while(($cell++)%$arParams["LINE_ELEMENT_COUNT"] != 0):?>
				<td>&nbsp;</td>
			<?endwhile;?>
			</tr>
		<?endif?>

</table>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
