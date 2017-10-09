<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?  

    include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
 	$cpt = new CCaptcha();
 	$captchaPass = COption::GetOptionString("main", "captcha_password", "");
 	if(strlen($captchaPass) <= 0)
 	{
 	    $captchaPass = randString(10);
 	    COption::SetOptionString("main", "captcha_password", $captchaPass);
 	}
 	$cpt->SetCodeCrypt($captchaPass);
?>
	 <?php if ($arResult['PAY_PAGE']):?>
	 <b>Вы можете <a target='_top' href='<?=$arResult['PAY_PAGE']?>'>оплатить заказ по безналичному рассчету.</a></b>
	 <?php endif;?>
	<script src='https://code.jquery.com/jquery-1.11.3.min.js'></script>
	<script src='/bitrix/templates/.default/js/jquery.maskedinput.js'></script>
	<script src='/bitrix/templates/.default/js/jquery.tablesorter.js'></script>
	<script>
		var strSummary;
		var total;
		$(document).ready(function(){
			$("table.ticketsTable").tablesorter({ 
			    widgets: ['zebra'],
				sortList: [[0,0]]
			});
			
			$('#phone').mask("+7 (999) 999-99-99");	
			$('.tickets-seat').click(function(){
				$(this).toggleClass('active');
				updateSummary();	
			});
			$('#event_date').change(function(){
				$('.tickets-date-block').hide();
				$(".tickets-date-block[data-date='"+$(this).val()+"']").show();
				$('.tickets-seat').removeClass('active');
				updateSummary();	
			});	
			$('#event_date').trigger('change');

			$('#makeOrder').click(function(){
				makeOrder();
			});
			
			$('.close').click(function(){
				$('.tickets-summary').hide();
			});
			
			$('.sectorList li').click(function(){
				$(this).parent().find('li').removeClass('active');
				$(this).addClass('active');
				
				$(this).parent().parent().find('.seats').hide();
				$(this).parent().parent().find('.seats[data-sector="'+$(this).data('sector')+'"]').show();
			});
		});
		function makeOrder(){
			 
			$('#order-status').html('Проверка доступности мест...');
			var request=[];
			$('.tickets-seat.active').each(function(){
				//request=request+'&'+$(this).data('seat')+'='+$(this).data('id');
				request[$(this).data('seat')]=($(this).data('id'));
			});
			//console.log(request);
			$.ajax({
				  type: "POST",
				  url: "/bitrix/components/pd/buy.ticket/ajax.php",
				  data: {html: strSummary, 
					  	total: total, 
					  	items: request,
						name: $('#name').val(),
						phone: $('#phone').val(),
						email: $('#email').val(),
						adress: $('#adress').val(),
						comments: $('#comments').val(),
						captcha_word: $('#captcha_word').val(),
						captcha_code: $('#captcha_code').val(),
					  	},
				  success: function(data){
					  if (data=='ok'){
						  $('.buy-tickets').hide();
						  $('.buy-tickets-ok').fadeIn(200);						  
					  }else{	  
					  $('#order-status').html(data);
					  }
				  }
			});
			
		}
		function updateSummary(){
			strSummary='';
			total=0;
			marker = '';
			
			$('.tickets-seat.active').each(function(){
				if ($(this).data('source') == 't') marker = ' +';
				
				strSummary=strSummary+'<tr><td>'+$(this).data('description')+marker+'</td><td>'+number_format($(this).data('price'),0,'.',' ')+' р. </td></tr>';
				total+=parseInt($(this).data('price'));
			});
			strSummary='<table>'+strSummary+'<tr><td><B>ИТОГО:</B></td><td>'+number_format(total,0,'.',' ')+' р.</td></table>';
			$('.tickets-summary-date').html($("select#event_date :selected").html());
			$('.tickets-summary-table').html(strSummary);
			if (total>0){
				$('.tickets-summary').fadeIn(100);
			}else{
				$('.tickets-summary').hide();
			}	
		}
		function number_format( number, decimals, dec_point, thousands_sep ) {	// Format a number with grouped thousands
			// 
			// +   original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
			// +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
			// +	 bugfix by: Michael White (http://crestidg.com)

			var i, j, kw, kd, km;

			// input sanitation & defaults
			if( isNaN(decimals = Math.abs(decimals)) ){
				decimals = 2;
			}
			if( dec_point == undefined ){
				dec_point = ",";
			}
			if( thousands_sep == undefined ){
				thousands_sep = ".";
			}

			i = parseInt(number = (+number || 0).toFixed(decimals)) + "";

			if( (j = i.length) > 3 ){
				j = j % 3;
			} else{
				j = 0;
			}

			km = (j ? i.substr(0, j) + thousands_sep : "");
			kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
			//kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).slice(2) : "");
			kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : "");


			return km + kw + kd;
		}
	</script>
	
	<?php if ($USER->IsAuthorized()) {
		//echo '<pre>'; print_r($arResult); echo '</pre>';
	} ?>
	
	<div class='buy-tickets'>	 
	<?if ($arResult['NO_TICKETS']):?>	
		 
		<?
		GLOBAL $arrFilterTickets; 
		$arrFilterTickets = Array("PROPERTY_event" => $_REQUEST["ID"]);?> <?$APPLICATION->IncludeComponent("bitrix:news.list", "tickets", array(
    	"IBLOCK_TYPE" => "places",
    	"IBLOCK_ID" => "22",
    	"NEWS_COUNT" => "100",
    	"SORT_BY1" => "PROPERTY_date",
    	"SORT_ORDER1" => "ASC",
    	"SORT_BY2" => "",
    	"SORT_ORDER2" => "ASC",
    	"FILTER_NAME" => "arrFilterTickets",
    	"FIELD_CODE" => array(
    		0 => "",
    		1 => "",
    	),
    	"PROPERTY_CODE" => array(
    		0 => "date",
    		1 => "seats",
    		2 => "quantity",
    		3 => "price",
    		4 => "",
    	),
    	"CHECK_DATES" => "Y",
    	"DETAIL_URL" => "news_detail.php?ID=#ELEMENT_ID#",
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
    	"DISPLAY_TOP_PAGER" => "N",
    	"DISPLAY_BOTTOM_PAGER" => "N",
    	"PAGER_TITLE" => "Новости",
    	"PAGER_SHOW_ALWAYS" => "N",
    	"PAGER_TEMPLATE" => "",
    	"PAGER_DESC_NUMBERING" => "N",
    	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
    	"PAGER_SHOW_ALL" => "Y",
    	"DISPLAY_DATE" => "Y",
    	"DISPLAY_NAME" => "Y",
    	"DISPLAY_PICTURE" => "N",
    	"DISPLAY_PREVIEW_TEXT" => "N",
    	"AJAX_OPTION_ADDITIONAL" => ""
    	),
    	false,
    	array(
    	"ACTIVE_COMPONENT" => "Y"
    	)
    );?>
		
		
	<?else:?>
	<pre style="display: none;"><?print_r($arResult['DATES'])?></pre>
		<b class="event-date">Дата и выбор билетов на "<?=$arResult["FIELDS"]["NAME"]?>":</b><br>
		<select id='event_date'>
			<?foreach ($arResult['DATES'] as $date):?>:
				<option value='<?=$date['DATE']?>'><?=$date['CAPTION']?></option>
			<?endforeach;?>
		</select>
		
		<?php
			function cmp($a, $b) {
				if ($a['ROW'] == $b['ROW']) {
					return 0;
				}
				return ($a['ROW'] < $b['ROW']) ? -1 : 1;
			}
		?>
	
	
		<?if ($arResult['SCHEME']):?>
			<?php 				 
            $schemaLink = substr($_SERVER['REQUEST_URI'], 0, -6).'schema/';
			echo '<div class="scheme_link"><a class="buttonLink schema" href="'./*$arResult['SCHEME'].'?returnUrl='.$_SERVER['REQUEST_URI']*/$schemaLink.'" target="_blank"><img src="/bitrix/templates/benuar/img/sxema.gif" alt="Схема зала" title="Схема зала" border="0" width="79" height="23"></a></div>';
			?>
		<?endif;?>

        <div style="display:none"><?php echo '<pre>'; print_r($arResult['OFFERS'][$date['DATE']][215]); /*print_r($arResult['OFFERS']);*/ echo '</pre>'; ?></div>
		
		<?php //echo '>>> '.print_r($arResult['DATES']); ?>
		<?php //echo '>'.print_r($arResult['SECTORS']); ?>
		<?php //echo '<pre>'; print_r($arResult['OFFERS']); ?>
		<?foreach ($arResult['DATES'] as $date):?>
		<div class='tickets-date-block' data-date='<?=$date['DATE']?>'>
			<h3><?=$date['CAPTION']?></h3>
			
			<?php
			    //echo '<pre>'; var_dump($arResult['SECTORS']); echo '</pre>';
			    $sectors = array();
				
				foreach ($arResult['SECTORS'] as $sectorId) {
					//echo $sectorId;
					//echo $date['DATE'];
					//var_dump($arResult['OFFERS'][$date['DATE']]);
				    $showFlag = false;
					foreach ($arResult['OFFERS'][$date['DATE']][$sectorId] as $offer) {
						if (!empty($offer))
						{
							//echo '*';
							$showFlag = true;
							break;
						}
					}
				    if(!empty($arResult['OFFERS'][$date['DATE']][$sectorId]) && $showFlag) {
						$sectors[$sectorId] = $arResult['SECTORS_LIST'][$sectorId]!=''?/*mb_convert_case(*/$arResult['SECTORS_LIST'][$sectorId]/*, MB_CASE_TITLE)*/:$sectorId;
					}
				}
				asort($sectors);
				
				//echo '>>> '; print_r($sectors);
			?>
			
			<?php /*<ul class="sectorList">
			    <?php $i = 0; ?>
				<?php $firstSector = 0; ?>
				<?php foreach ($sectors as $sectorId => $sectorName) { ?>
					<li class="<?php echo $i==0?'active':'' ?>" data-sector="<?php echo $sectorId; ?>"><?php echo $sectorName; ?></li>
					<?php if($i == 0) $firstSector = $sectorId; ?>
					<?php $i++; ?>
				<?php } ?>
			</ul> */ ?>
			
			<table width="65%">
				<tr <?php //echo $firstSector==$sectorId?'':'style="display:none"' ?> data-sector="<?php echo $sectorId; ?>" class="seats">
					<td>
					<?php //echo '<pre>'; print_r($offers); echo '</pre>'; ?>
						<table class="ticketsTable" width="150%">
							<thead><tr><th width="18%">Сектор</th><th width="2%">Ряд / ложа</th><th width="70%">Место</th><th width="10%">Цена, руб.</th></tr></thead><tbody>
			    <?php $i = 0; ?>
				<?foreach ($arResult['SECTORS'] as $sectorId):?>
				
					<?php 
						$offers = array();
						foreach ($arResult['OFFERS'][$date['DATE']][$sectorId] as $offerRow=>$arOfferRow) 
						{
							foreach ($arResult['OFFERS'][$date['DATE']][$sectorId][$offerRow] as $of)
							{
								$offers[] = $of;
							}
						}

						uasort($offers, 'cmp');
					?>
				    
				    <?php /*<tr class="sectors">
					    <td><?php echo $arResult['SECTORS_LIST'][$sectorId]!=''?$arResult['SECTORS_LIST'][$sectorId]:'дополнительный сектор'; ?></td>
					</tr> */ ?>
					
								<?//foreach ($arResult['OFFERS'][$date['DATE']][$sectorId] as $offerRow=>$arOfferRow):?>
								
									<?//foreach ($arResult['OFFERS'][$date['DATE']][$sectorId][$offerRow] as $offer):?>
									<?foreach ($offers as $offer):?>
									<tr>
										<td class='tickets-sector'><?=$sectors[$sectorId]?></td>
										<td class='tickets-row'><?=$offer['ROW']?></td>
										<td class='tickets-list'>
											<?foreach($offer['SEAT'] as $seat):?>
												<div 	class='tickets-seat'
														data-row='<?=$offer['ROW']?>'
														data-seat='<?=$seat?>'
														data-price='<?=$offer['PRICE']?>'
														data-id='<?=$offer['ID']?>'
														data-date='<?=$date['DATE']?>'
														data-source='<?= !empty($offer['SOURCE'])?$offer['SOURCE']:"z"?>'
														data-description='<span class="hidden"><?=$arResult['FIELDS']['NAME']?>, <?=$date['CAPTION']?>, </span><b><?=$sectors[$sectorId]/*$arResult['SECTORS_LIST'][$sectorId]*/?></b>, ряд: <b><?=$offer['ROW']?></b>, место: <b><?=$seat?></b>'
												><?=$seat?></div>
											<?endforeach;?>
										</td>
										<td class='tickets-price'><?=number_format($offer['PRICE'],0,'.','')?></td>
									</tr>
									<?endforeach;?>
									
								<?//endforeach;?>
							
					<?php $i++; ?>
				<?endforeach;?>
				        </tbody></table>
					</td>
				</tr>
			</table>
		</div>
		<?endforeach;?>
		
		
		<div class='tickets-summary'>
		    <div class="closeWrap">
			    <div class="close"></div>
			</div>
			<h3>Ваш выбор:</h3>
			<h4><?=$arResult['FIELDS']['NAME']?><br><span class="tickets-summary-date"><?=$date['CAPTION']?></span></h4>
			<div class='tickets-summary-table'>			
			</div>
			<table>
				<tr><td>
				<label>Ваше имя</label>
				<input type='text' id='name'>
				<label>Контактный телефон <span style='color:red;'>*</span></label>
				<input type='text' id='phone'>
				</td><td>			
				<label>E-mail <span style='color:red;'>*</span></label>
				<input type='text' id='email'>
				<label>Адрес доставки билетов</label>
				<input type='text' id='adress'>
				</td></tr>
				<tr><td colspan=2 class="comment">
				<label>Комментарии</label>
				<textarea type='text' id='comments'></textarea>
				</td></tr>
				
				<?php /*<tr><td colspan=2>
				<input id="captcha_code" value="<?=htmlspecialchars($cpt->GetCodeCrypt());?>" type="hidden">
				<label>Код с картинки</label>
				<input id="captcha_word" name="captcha_word" type="text">
				<img src="/bitrix/tools/captcha.php?captcha_code=<?=htmlspecialchars($cpt->GetCodeCrypt());?>">
				
				</td></tr>*/?>
			</table><br><center>
			<span id='order-status'></span>
			<br>
			<input type='button' id='makeOrder' value='Заказать'></center>
		</div>
		
	
	<?endif;?>
	 </div>
	 <div class='buy-tickets-ok'>
	 <h3>Спасибо!</h3>
	 <h4>Информация о бронировании направлена Вам на e-mail.<br>В ближайшее время мы свяжемся с Вами для подтверждения заказа</h4>
	 <br><br>
	 <center>
	 <?php if ($arResult['PAY_PAGE']):?>
	 <b>Вы можете <a target='_top'  href='<?=$arResult['PAY_PAGE']?>'>.</a></b>
	 <?php endif;?>
	 </center>
	 </div>
	 <br><br><br>