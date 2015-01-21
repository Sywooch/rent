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
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
			<input type="hidden" name="subway" id="metro" value="">
			<a id="inline" class="load-map" href="#map-block">Выбор станции</a>
			<div class="selected-metro-name"></div>
			<div id="map-block" >
				<img src="/img/moscow_metro_map_api.jpg" />

			</div><!-- .map-block -->
<script>
var map;
init = false;
subways = new Array;
	<?php foreach($subwayList as $subway) : ?>
	var subway = new Object;
	subway.index = <?php echo $subway['SubwayIndex']; ?>;
	subway.lat = <?php echo $subway['SubwayLat']; ?>;
	subway.lng = <?php echo $subway['SubwayLng']; ?>;
	subway.title = "<?php echo $subway['SubwayTitle']; ?>";
	subways.push(subway);
	<?php endforeach; ?>

function getAddress(geocoder, map) {
	subways.forEach(pasteMarker);
}
function initialize() {
	if(!init) {
	var geocoder = new google.maps.Geocoder();	
	var center = new google.maps.LatLng(55.7522200,37.6155600); 
	var mapOptions = {
		zoom: 10,
		center: center
	}
	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	getAddress(geocoder, map);
	init = true;
	}
}

function resize() {
	google.maps.event.trigger(map, "resize");
}
function pasteMarker(element) {
		var myLatlng = new google.maps.LatLng(element.lat,element.lng);
		var marker;
		marker = new google.maps.Marker({
				map: map, 
				position: myLatlng,
				title: element.title
			}); 
			aaa(marker, element.index, element.title);
}	

function aaa(marker, id, name){
	google.maps.event.addListener(marker, 'click', function(){
		$('#metro').val(id);
		$('.selected-metro-name').text(name);
		$.fancybox.close();
	});
}
$(document).ready(function() {
	$("#inline").fancybox({
		//beforeLoad: initialize
	});
});
</script>	
		</div>
		<div class="filter-navigation">
			<input type="submit" value="Найти" />
		</div>
		</div>