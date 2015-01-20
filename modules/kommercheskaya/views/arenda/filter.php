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
					<input <?php if($class4){echo 'checked=""';} ?> type="checkbox" name="class4" value="4" id="room-number-3" />
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
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
			<input type="hidden" name="subway" id="metro" value="">
			<a id="inline" class="load-map" href="#map-block">Выбор станции</a>
			<div class="selected-metro-name"></div>
			<div id="map-block" >
				<div id="map-canvas" style="height: 700px;width: 700px;"></div>
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
		beforeLoad: initialize
	});
});
</script>	
			</div><!-- .map-block -->

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
