<div class="fast-search-wrap">
	<ul class="fast-filter-list">
		<li>
			<span>Быстрый поиск</span>
		</li>
		<li>
			<a class="fast-filter-list-link" href="/vtorichnoe/prodazha/kvartiry-moskva">Квартиры в Москве</a>
			<ul>
				<li>
					<p class="fast-filter-subtitle">По числу комнат</p>
					<ul>
						<li class="num-item"><a class="flat-link" href="/vtorichnoe/prodazha/odnokomnatnye-kvartiry-moskva">1</a></li>
						<li class="num-item"><a class="flat-link" href="/vtorichnoe/prodazha/dvuhkomnatnye-kvartiry-moskva">2</a></li>
						<li class="num-item"><a class="flat-link" href="/vtorichnoe/prodazha/trehkomnatnye-kvartiry-moskva">3</a></li>
						<li class="num-item"><a class="flat-link" href="/vtorichnoe/prodazha/chetyrehkomnatnye-kvartiry-moskva">4+</a></li>
					</ul>
				</li>
				<li>
					<p class="fast-filter-subtitle">По расположению</p>
					<ul>
						<li class="location-item"><a class="flat-link medium-size-link" href="/vtorichnoe/prodazha/subway">по метро</a></li>
						<li class="location-item"><a class="flat-link medium-size-link" href="/vtorichnoe/prodazha/department">по районам</a></li>
						<li class="location-item"><a class="flat-link medium-size-link" href="/vtorichnoe/prodazha/street">по улице</a></li>
						<li class="location-item"><a class="flat-link medium-size-link" href="/vtorichnoe/prodazha/district">по округам</a></li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			<a class="fast-filter-list-link"  href="/vtorichnoe/prodazha/kvartiry-podmoskovie">Квартиры в Подмосковье</a>
			<ul>
				<li>
					<p class="fast-filter-subtitle">По числу комнат</p>
					<ul>
						<li class="num-item"><a class="flat-link" href="/vtorichnoe/prodazha/odnokomnatnye-kvartiry-podmoskovie">1</a></li>
						<li class="num-item"><a class="flat-link" href="/vtorichnoe/prodazha/dvuhkomnatnye-kvartiry-podmoskovie">2</a></li>
						<li class="num-item"><a class="flat-link" href="/vtorichnoe/prodazha/trehkomnatnye-kvartiry-podmoskovie">3</a></li>
						<li class="num-item"><a class="flat-link" href="/vtorichnoe/prodazha/chetyrehkomnatnye-kvartiry-podmoskovie">4+</a></li>
					</ul>
				</li>
				<li>
					<p class="fast-filter-subtitle">По расположению</p>
					<ul>
						<li class="location-item"><a class="flat-link medium-size-link" href="/vtorichnoe/prodazha/podmoskovie">по городам</a></li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			<a class="fast-filter-list-link"  href="/vtorichnoe/prodazha/komnaty">Комнаты</a>
		</li>
	</ul>
</div>
<div class="filter-groups">
			<div class="filter-group flat-type-filter">
			<h5>Тип недвижимости:</h5>
			<select name="flatType">
				<option <?php if(!$flatType){echo 'selected';} ?> value="">-</option>
				<option <?php if($flatType == 'fm'){echo 'selected';} ?> value="fm">Квартира в Москве</option>
				<option <?php if($flatType == 'fmo'){echo 'selected';} ?> value="fmo">Квартира в МО</option>
				<option <?php if($flatType == 'rm'){echo 'selected';} ?> value="rm">Комната в Москве</option>
				<option <?php if($flatType == 'rmo'){echo 'selected';} ?> value="rmo">Комната в МО</option>
				<option <?php if($flatType == 'pm'){echo 'selected';} ?> value="pm">Доля в Москве</option>
				<option <?php if($flatType == 'pmo'){echo 'selected';} ?> value="pmo">Доля в МО</option>
			</select>
		</div>
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
			<div class="selected-metro-name"></div>
			<div id="subway">
			</div>
			<div id="MetroMainCont" style=" float:left; width:1040; height:1040px; margin-top:10px; background-color:#FFFFFF; display:none;">
				<div style="position:absolute;width:150px;right:0;z-index:100000;background-color:#fff; font-size:12px;" id="metro_list">
					<ul style="margin:0; padding:0 0 0 10px;">

					</ul>
					<div style="font-size:14px;">
						<a href="javascript:void(0)" onclick="$.fancybox.close();" class="btn">Выбрать</a>
					</div>
				</div>
			</div>
			<a class="load-map various" href="#MetroMainCont">Выбрать станцию</a>
<script>
    $(document).ready(function () {
        MosMapApi_Setup('MetroMainCont');
    });

    function MertoActive(p_StationName, p_StationID) {
		var metro = $('#metro_list ul');
		var metro_input = $('#subway');
		if(metro.find('li.metro_list_'+p_StationID).length > 0){
			metro_input.find('[name="subway['+p_StationID+']"]').remove();
			metro.find('li.metro_list_'+p_StationID).remove();
		}else{
			metro_input.append('<input type="hidden" name="subway['+p_StationID+']" value="'+p_StationID+'">');
			metro.append('<li class="metro_list_'+p_StationID+'">'+p_StationName+'</li>');
		}
        //alert(p_StationName + " " + p_StationID);
		$('#subway').val(p_StationID);
		$('.selected-metro-name').text('Выбрано станций '+$('#metro_list ul li').length);
    }
	$(".various").fancybox({
		maxWidth	: 1040,
		maxHeight	: 1040,
		fitToView	: false,
		width		: '100%',
		height		: '100%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	});	
</script>	
		</div>
		<div class="filter-navigation">
			<input type="submit" value="Найти" />
		</div>
		</div>