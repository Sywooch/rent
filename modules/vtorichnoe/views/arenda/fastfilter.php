<div class="fast-search-wrap">
	<ul class="fast-filter-list">
		<li>
			<span>Быстрый поиск</span>
		</li>
		<li>
			<a class="fast-filter-list-link" href="/vtorichnoe/arenda/kvartiry-moskva">Квартиры в Москве</a>
			
		</li>
		<li>
			<a class="fast-filter-list-link"  href="/vtorichnoe/arenda/kvartiry-podmoskovie">Квартиры в Подмосковье</a>
		</li>
		<li>
			<a class="fast-filter-list-link"  href="/vtorichnoe/arenda/komnaty">Комнаты в Москве и Подмосковье</a>
		</li>
		
	</ul>
</div>
<div class="filter-groups">
			
		<div class="filter-group vtorichka-price-filter">
			<h5>Цена (млн. руб):</h5>
			<div class="input-wrap">
				<input class="input-short" type="text" name="priceMin" value="<?php if($priceMin){echo $priceMin/1000000;}  ?>" />
				<span>—</span>
				<input class="input-short" type="text" name="priceMax" value="<?php if($priceMax){echo $priceMax/1000000;} ?>" />
			</div>
		</div>
		<div class="filter-group room-numbers-filter">
			<h5>Количество комнат:</h5>
			<select name="roomNumber">
				<option <?php if(!$roomNumber){echo 'selected';} ?> value="">не важно</option>
				<option <?php if($roomNumber == 1){echo 'selected';} ?> value="1">1-комнатная</option>
				<option <?php if($roomNumber == 2){echo 'selected';} ?> value="2">2-х-комнатная</option>
				<option <?php if($roomNumber == 3){echo 'selected';} ?> value="3">3-х-комнатная</option>
				<option <?php if($roomNumber >= 4){echo 'selected';} ?> value="4">4-х-комнатная и более</option>
			</select>
		</div>
		<div class="filter-group left-70">
			<h5>Метро:</h5>
			<div id="metro">
  					<input type="hidden" id="metro_input" name="subway" value="[]">
 				</div>
 				<div id="MetroMainCont" style=" float:left; width:1120; height:1040px; margin-top:10px; background-color:#FFFFFF; display:none;">
  					<div style="position:absolute;width:150px;right:0;z-index:100000;background-color:#fff; font-size:10px;" id="metro_list">
   						<ul style="margin:0; padding:0 0 0 10px;"></ul>
   						<div style="font-size:14px;">
    						<a href="javascript:void(o)" onclick="$.fancybox.close();" class="btn">Выбрать</a>
   						</div>
  					</div>
 				</div>
 				<a class="load-map various" href="#MetroMainCont">Выбрать станцию</a>
 				<div class="selected-metro-name"></div>
<script>
    $(document).ready(function () {
        MosMapApi_Setup('MetroMainCont');
    });
    function MertoActive(p_StationName, p_StationID) {
  var metro = $('#metro_list ul');
  var metro_input = $('#metro_input');
  if(metro.find('li.metro_list_'+p_StationID).length > 0){
   //metro_input.find('[name="metro['+p_StationID+']"]').remove();
   metro.find('li.metro_list_'+p_StationID).remove();
  }else{
   //metro_input.append('<input type="hidden" name="metro['+p_StationID+']" value="'+p_StationID+'">');
   metro.append('<li class="metro_list_'+p_StationID+'" data-id="'+p_StationID+'">'+p_StationName+'</li>');  
  }
  var metro_id = [];
  metro.find('li').each(function(){
   metro_id.push($(this).attr('data-id'));
  });
  metro_input.attr('value', '['+metro_id+']')  
        //alert(p_StationName + " " + p_StationID);
  //$('#metro').val(p_StationID);
  $('.selected-metro-name').text('Выбрано станций '+$('#metro_list ul li').length);
    }
 $(".various").fancybox({
  maxWidth : 1120,
  maxHeight : 1040,
  fitToView : false,
  width  : '100%',
  height  : '100%',
  autoSize : false,
  closeClick : false,
  openEffect : 'none',
  closeEffect : 'none'
 }); 
 
</script>

		</div>
		<div class="filter-navigation">
			<input type="submit" value="Найти" />
		</div>
		</div>