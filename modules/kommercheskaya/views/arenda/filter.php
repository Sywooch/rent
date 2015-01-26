<?php if(Yii::$app->controller->action->id == 'index' || Yii::$app->controller->action->id == 'ofisy') : ?>
<div class="filter-group room-number-filter">
			<h5>Класс обьекта:</h5>
			<ul>
				<li>
					<input <?php if($class1){echo 'checked=""';} ?> type="checkbox" name="class1" value="1" id="room-number-1" />
					<label for="room-number-1">A</label>
				</li>
				<li>
					<input <?php if($class2){echo 'checked=""';} ?> type="checkbox" name="class2" value="2" id="room-number-2" />
					<label for="room-number-2">B</label>
				</li>
				<li>
					<input <?php if($class3){echo 'checked=""';} ?> type="checkbox" name="class3" value="3" id="room-number-3" />
					<label for="room-number-3">B+</label>
				</li>
				<li>
					<input <?php if($class4){echo 'checked=""';} ?> type="checkbox" name="class4" value="4" id="room-number-4" />
					<label for="room-number-4">C</label>
				</li>
			</ul>
		</div>
<?php endif; ?>
		<div class="filter-group area-filter">
			<h5>Площадь (м²):</h5>
			<div class="input-wrap">
				<input class="input-short" type="text" name="areaMin" value="<?php echo $areaMin; ?>" />
				<span>—</span>
				<input class="input-short" type="text" name="areaMax" value="<?php echo $areaMax; ?>" />
			</div>
		</div>
		<div class="filter-group price-filter">
			<h5>Цена (тыс. руб/м² за год):</h5>
			<div class="input-wrap">
				<input class="input-short" type="text" name="priceMin" value="<?php if($priceMin){echo $priceMin/1000;}  ?>" />
				<span>—</span>
				<input class="input-short" type="text" name="priceMax" value="<?php if($priceMax){echo $priceMax/1000;} ?>" />
			</div>
		</div>
<?php if(Yii::$app->controller->action->id != 'podmoskovie') { ?>
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
<?php } else {; ?>
	<div class="filter-group left-70">
			<h5>Город:</h5>
			<select class="chosen-select" name="city">
				<option <?php if(!$city){echo 'selected';} ?> value="">Выберите город</option>
				<?php foreach($cityList as $cityItem) : ?>
				<option <?php if($city == $cityItem['CityIndex']){echo 'selected';} ?> value="<?php echo $cityItem['CityIndex']; ?>"><?php echo $cityItem['CityTitle']; ?></option>
				<?php endforeach; ?>
			</select>
			<script>
				$(".chosen-select").chosen();
			</script>
		</div>
		<div class="filter-navigation">
			<input type="submit" value="Найти" />
		</div>
<?php } ?>		
