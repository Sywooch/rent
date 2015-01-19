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
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
			<a id="inline" class="load-map" href="#map-block">Ajax</a>
			<div style="display: none;" id="map-block" >
	<div id="map-canvas" style="height: 700px;width: 700px;"></div>	
</div>
<script>
var map;
initialize();
function initialize() {
	var geocoder = new google.maps.Geocoder();	
	var center = new google.maps.LatLng(55.7522200,37.6155600); 
	var mapOptions = {
		zoom: 15,
		center: center
	}
	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	//addMarker(map);
	getAddress(geocoder, map);	
}
function getAddress(geocoder, map) {
	$.post('db.php',{},function(json){
		for(var key in json){
			var myLatlng = new google.maps.LatLng(json[key].lat,json[key].lng);
			var marker;
			marker = new google.maps.Marker({
				map: map, 
				position: myLatlng,
				title: json[key].name
			}); 
			aaa(marker, json[key].id, json[key].name);

		}
	},'json');			
}
			function aaa(marker, id, name){
				google.maps.event.addListener(marker, 'click', function(){
					$('#metro').val(id);
					$('.selected-metro-name').text(name);
					$.fancybox.close();
				});
			}
</script>
			<script>
				$(document).ready(function() {
	$("#inline").fancybox({
				width:700,
				height:700
	});
});
			</script>
		</div>
		<div class="filter-navigation">
			<input type="submit" value="Найти" />
		</div>
		</div>