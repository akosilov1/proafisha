<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)	die();
IncludeTemplateLangFile("/bitrix/templates/proafisha_main_copy/header.php");
$APPLICATION->SetTitle("");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html>
<head>
<meta name='yandex-verification' content='466ab9a7363511f0' />

<!-- proafisha -->
<title><?$APPLICATION->ShowTitle()?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?= LANG_CHARSET;?>">
<?$APPLICATION->ShowHead();?>
<META NAME="ROBOTS" content="ALL">

<script language="JavaScript" src="<?=BX_ROOT?>/templates/<?=SITE_TEMPLATE_ID?>/popup.js" type="text/javascript">
</script>

</head>
<body><?$APPLICATION->ShowPanel();?>
<?/*table cellspacing="0" cellpadding="0" border="0" width="100%" class="tophead"> 
  <tbody> 
    <tr height="25"><td> 
        <h1><?$APPLICATION->ShowProperty("header1")?></h1>
       </td></tr>
   </tbody>
 </table*/?>
<table cellspacing="0" cellpadding="0" border="0" width="1005" bgcolor="#ffffff" align="center">
	<tbody>
		<tr>
			<td width="5" bgcolor="#ffffff"></td>
			<td width="995" valign="top">
				<div class="banner_sh">
					<?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/include_areas/banners.php", Array(), Array("MODE"=>"php"))?>
				</div>
			</td>
			<td width="7" bgcolor="#ffffff">
				
			</td>
		</tr>
	</tbody>
</table>
<table cellspacing="0" cellpadding="0" width="100%" border="0" class="head-top">
	<tbody>
		<tr>
		<td class="head-top-logo"><a href="/"><img src="<?=SITE_TEMPLATE_PATH?>/img/logo1_s.jpg" alt="logo" /></a></td>

		<td class="head-top-search text-center">
			<div class="search-form">
				<form action="/search/">
					<input type="text" name="q" value="" size="40" maxlength="100" placeholder="�����" /><input name="s" type="submit" value="�����" />
				</form>
			</div>
		</td>
		<td class="head-top-tel" width="380">
			<span>����� ������ � 09:00 �� 22:00&nbsp;&nbsp;&nbsp;&nbsp;</span>
			<!--noindex--><a rel="nofollow" href="tel:+74952239281">8 (495) 2239281</a><!--/noindex-->
			<?/*img src="<?=SITE_TEMPLATE_PATH?>/img/nomer.jpg" style="height:85px" alt="" /*/?>
		</td>
	</tr>
</tbody>
</table>
<?$APPLICATION->IncludeComponent("bitrix:menu", "top", array(
	"ROOT_MENU_TYPE" => "event",
	"MENU_CACHE_TYPE" => "Y",
	"MENU_CACHE_TIME" => "43200",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "1",
	"CHILD_MENU_TYPE" => "",
	"USE_EXT" => "Y",
	"DELAY" => "N",
	"ALLOW_MULTI_SELECT" => "N"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y"
	)
);?>

<table cellspacing="0" cellpadding="0" align="center" border="0">
	<tbody>
		<tr>
		<td width="220" align="center" height="170">
		</td>
		<td width="540" height="170">
			<div class="banner">
				<table width="100%" cellspacing="0" cellpadding="0" border="0"> 
				  <tbody> 
				    <tr><td width="33%" align="center"><?$APPLICATION->IncludeComponent("bitrix:advertising.banner", "template3", array(
					"TYPE" => "TOP",
						"NOINDEX" => "Y",
						"CACHE_TYPE" => "Y",
						"CACHE_TIME" => "",
						"COMPONENT_TEMPLATE" => "template3",
						"QUANTITY" => "1"
					),
					false,
					array(
					"ACTIVE_COMPONENT" => "Y"
					)
				);?> </td><td width="33%" align="center"><?$APPLICATION->IncludeComponent("bitrix:advertising.banner", ".default", array(
					"TYPE" => "TOP",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "0",
						"COMPONENT_TEMPLATE" => ".default",
						"NOINDEX" => "Y",
						"QUANTITY" => "1"
					),
					false,
					array(
					"ACTIVE_COMPONENT" => "Y"
					)
				);?> </td><td width="33%" align="center"><?$APPLICATION->IncludeComponent("bitrix:advertising.banner", ".default", array(
					"TYPE" => "TOP",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "0",
						"COMPONENT_TEMPLATE" => ".default",
						"NOINDEX" => "Y",
						"QUANTITY" => "1"
					),
					false,
					array(
					"ACTIVE_COMPONENT" => "Y"
					)
				);?> </td></tr>
				   </tbody>
				 </table>
			</div>
		</td>
			
			<td width="210" height="170" align="right">
				<table cellspacing="0" cellpadding="0" border="0" id="rightmenu">
					<tbody>
					<?$APPLICATION->IncludeComponent("bitrix:menu", "main_top", array(
						"ROOT_MENU_TYPE" => "left",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_TIME" => "43200",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"MENU_CACHE_GET_VARS" => "",
							"MAX_LEVEL" => "1",
							"CHILD_MENU_TYPE" => "place",
							"USE_EXT" => "Y",
							"DELAY" => "N",
							"ALLOW_MULTI_SELECT" => "N",
							"COMPONENT_TEMPLATE" => "main_top"
						),
						false,
						array(
						"ACTIVE_COMPONENT" => "N"
						)
					);?>
					</tbody>
				</table>			
			</td>
		</tr>
	</tbody>
</table>
<div style="background:#D04D27;height:2px;width:100%"></div>
<table height="100%" cellspacing="0" cellpadding="0" border="0" width="100%"> 
  <tbody> 
    <tr valign="top"> 	 	 	
    	<?if(NOT_SHOW_LEFT_COLUMN!="Y"):?>
    		<td height="100%" bgcolor="#fff" align="center" width="280" valign="top" style="border-right:2px solid #ccc"> 
			<!-- ����� ������� OPEN -->
			<br />
			<noindex>
			<?	$path = BX_ROOT.'/templates/'.SITE_TEMPLATE_ID.'/calendar.php';
				$APPLICATION->IncludeFile($path, Array(), Array("MODE"=>"php"));?> 
			</noindex>
			<br /><br /><br />
			<b><a href="http://www.proafisha.ru" style="color:#448b3b;" >������ ������ ������</a></b> 
	       <br />
			<?$APPLICATION->IncludeComponent("bitrix:menu", "left_grey", array(
				"ROOT_MENU_TYPE" => "place",
				"MENU_CACHE_TYPE" => "Y",
				"MENU_CACHE_TIME" => "3600",
				"MENU_CACHE_USE_GROUPS" => "Y",
				"MENU_CACHE_GET_VARS" => array(
				),
				"MAX_LEVEL" => "1",
				"CHILD_MENU_TYPE" => "",
				"USE_EXT" => "Y",
				"DELAY" => "N",
				"ALLOW_MULTI_SELECT" => "N"
				),
				false,
				array(
				"ACTIVE_COMPONENT" => "N"
				)
			);?> <!--<hr /><b>��������� � ����</b> 
        <br />
       
        <br />-->
       <?$arrFilterPlaceMenu = Array("*");?> <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"places_left_menu", 
	array(
		"IBLOCK_TYPE" => "places",
		"IBLOCK_ID" => "19",
		"NEWS_COUNT" => "23",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "NAME",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "arrFilterPlaces",
		"FIELD_CODE" => array(
			0 => "ACTIVE_TO",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "benuar_show",
			1 => "type",
			2 => "info",
			3 => "time",
			4 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "/places/#SECTION_ID#/#ELEMENT_ID#/#CODE##SITE_DIR#",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "43200",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d-m-Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "�������",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "places_left_menu",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?> <hr />
         <!--<div align="center"><b>��������� �������:</b></div>
       
        <br />
       		
        <div align="center">  <hr /> 		 		 		<b></b> 
          <br />
         
          <br />
       		
        <div align="center"> <?//$path = BX_ROOT.'/templates/'.SITE_TEMPLATE_ID.'/calendar.php';
		//$APPLICATION->IncludeFile($path, Array(), Array("MODE"=>"php"));?> <hr /> 		 		 		<b></b> 
          <br />
         
          <br />-->

	</div>
    <hr /> 
    <br />
       <?if($APPLICATION->GetCurPage() == "/index.php"):?> 
        	<div>
        		<a href="/" >
        		<?$APPLICATION->IncludeFile(
					$APPLICATION->GetTemplatePath("include_areas/mainpage.php"),
					Array(),
					Array("MODE"=>"html")
				);?> 
				</a>
			</div>
		    <a href="/" > 
		          <br />
		<?endif;?> 
		    </a>
	</td> 
	<td bgcolor="#fff" width="2"></td> 
<?endif;?>
    <td bgcolor="#fff" id="site-content"> 
         	
<!-- ������ ������� OPEN -->
  <?/*table cellspacing="0" cellpadding="0" border="0" width="100%"> 
          <tbody> 
            <tr><td bgcolor="#fff"> 
                <p></p>
               <center> ��� ���������� ����������� �����? ���� ����� � ������? ����������  �� ���. +7 (499) 504 98 22 ���� ��������� ���������� ������ ������ �������, ������ �������� ������������ ���������� ��� ����� � ���������, ���������� ������� ������: ������� ����� � ����������� ��������� �������� �����������. ����� � �������� ������� �� ���������, ��������, �������� �������������� � ��� ������. ������ �� ������� ��� ����� � ��������� �� ������ � ������� ��� ��� �����. ����� ������ � 10:00 �� 20:00 ������ �������������. </center> 
                <div align="center"><span style="color: #9d0a0f;">������� ������� �� ��� ������� ������ �� ����� ����������� ������ ����������� ����� 2017 ��� ������ � ������� �� �����</span><p></p>
               </td></tr>
           </tbody>
         </table>
        
        <br />
       

 <?*/if($APPLICATION->GetCurPage()!="/index.php" and (strpos($APPLICATION->GetCurDir(), 'zakaz') === FALSE)):?> 
        <br />
       <? /*
        <table cellspacing="0" cellpadding="0" border="0" width="100%"> 
          <tbody> 
            <tr> <td align="center" width="25%"> <?$APPLICATION->IncludeComponent("bitrix:advertising.banner", ".default", array(
	"TYPE" => "TOP",
	"NOINDEX" => "N",
	"CACHE_TYPE" => "Y",
	"CACHE_TIME" => "0"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y"
	)
);?> </td> <td align="center" width="25%"> <?$APPLICATION->IncludeComponent("bitrix:advertising.banner", ".default", array(
	"TYPE" => "TOP",
	"NOINDEX" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => ""
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y"
	)
);?> </td> <td align="center" width="25%"> <?$APPLICATION->IncludeComponent(
	"bitrix:advertising.banner",
	".default",
	Array(
		"TYPE" => "TOP",
		"NOINDEX" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "0"
	)
);?> </td> <td align="center" width="25%"> <?$APPLICATION->IncludeComponent(
	"bitrix:advertising.banner",
	".default",
	Array(
		"TYPE" => "TOP",
		"NOINDEX" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "0"
	)
);?> </td> </tr>
           </tbody>
         </table>
       
        <br /><?*/?>
<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "template1", array(
	"START_FROM" => "",
		"PATH" => "",
		"SITE_ID" => "pr"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y"
	)
);?>
<?endif;?> 
<h1><?$APPLICATION->ShowProperty("header1")?></h1>
<!-- //wa -->