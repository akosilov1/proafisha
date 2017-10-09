<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?/*?><h1><?=$HEAD1?></h1><?*/?>
<div style="text-align: center;">
<h2><?=$arResult["NAME"]?></h2>
<div style="text-align: center;">
  <?php if (empty($_REQUEST['returnUrl'])) { ?>
	<a href="<?=$arResult["DETAIL_PAGE_URL"]?>zakaz/" ></a>
  <?php } else { ?>
    <a class="linkWithBorder" href="<?=$_REQUEST['returnUrl']?>" ></a>
  <?php } ?>
</div>

<div class="catalog-element" style="text-align: center;">
	<div  style="margin: 20px 0px 0px 0px;">
	<img src="<?=$img["src"]?>" />
	<?//=CFile::ShowImage($arResult['DISPLAY_PROPERTIES']['scheme']['VALUE'])?>
	</div>
</div>
<!--<h2><?=$arResult["NAME"]?></h2>-->
<br />

<div class="catalog-element" style="text-align: center;">
	<?=$arResult["PROPERTIES"]["desc_schema_pro"]["~VALUE"]["TEXT"]?>


<?  $flag=0; ?>
	<div  style="margin: 20px 0px 0px 0px;">
	<?if($arResult["PROPERTIES"]["proafisha_d_img"]["VALUE"]):
	$arFilters = Array(
		array("name" => "watermark", "position" => "bottomright ", "size"=>"bir", 'alpha_level'=>'40', "file"=>$_SERVER['DOCUMENT_ROOT']."/upload/watermark.png")
	);
	$img = CFile::ResizeImageGet($arResult["PROPERTIES"]["proafisha_d_img"]["VALUE"], Array("width" => 999, "height" => 999), BX_RESIZE_IMAGE_PROPORTIONAL, true, $arFilters);
$width = $img['width'];
?>
        <?  $flag=1;  ?>
         
		<img border="0" src="<?=$img["src"];?>"  alt="????? ????" title="????? ????" />
	<?endif?>
	</div>

	<?if($flag==0):?>
	<div  style="margin: 20px 0px 0px 0px;">
	<?if(is_array($arResult["DETAIL_PICTURE"])):?>
		<img border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="????? ????" title="????? ????" />
	<?$width = $arResult["DETAIL_PICTURE"]["WIDTH"];?>
<?endif?>
	</div>
	<?endif?>


<div style='text-align:left;'>
 <pre>
<? //print_r($arResult["PROPERTIES"]["proafisha_d_img"]); ?>
</pre>
</div>
</div>
<style type="text/css">
	.switches { min-width: <?=$width?>px; }
</style>