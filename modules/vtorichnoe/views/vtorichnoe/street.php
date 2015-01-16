<?php
$this->title = 'Аренда квартир - Вторичное';
?>
<div class="section-list-wrap">
	<ul>
		<li <?php if(Yii::$app->controller->id == 'vtorichnoe'){echo 'class="active"';} ?>><a href="/vtorichnoe">Продажа</a></li>
		<li <?php if(Yii::$app->controller->id == 'arenda'){echo 'class="active"';} ?>><a href="/vtorichnoe/arenda">Аренда</a></li>
		
	</ul>
</div>
<div class="filter-wrap">
	<div class="filter-section" id="novostroyki">
		<form action="/vtorichnoe" method="get">
		<div class="fast-search-wrap">
			<ul class="fast-filter-list">
				<li>
					<span>Быстрый поиск</span>
				</li>
				<li>
					<a href="/vtorichnoe/prodazha/kvartiry-moskva">Квартиры в Москве</a>
					<ul>
						<li>
							<p>По числу комнат</p>
							<ul>
								<li class="num-item"><a href="/vtorichnoe/prodazha/odnokomnatnye-kvartiry-moskva">1</a></li>
								<li class="num-item"><a href="/vtorichnoe/prodazha/dvuhkomnatnye-kvartiry-moskva">2</a></li>
								<li class="num-item"><a href="/vtorichnoe/prodazha/trehkomnatnye-kvartiry-moskva">3</a></li>
								<li class="num-item"><a href="/vtorichnoe/prodazha/chetyrehkomnatnye-kvartiry-moskva">4+</a></li>
							</ul>
							
						</li>
						<li>
							
							<p>По расположению</p>
							
							<ul>
								<li class="num-item"><a href="/vtorichnoe/prodazha/subway">По метро</a></li>
								<li class="num-item"><a href="/vtorichnoe/prodazha/department">По районам</a></li>
								<li class="num-item"><a href="/vtorichnoe/prodazha/street">По улице</a></li>
								<li class="num-item"><a href="/vtorichnoe/prodazha/district">По округам</a></li>
								
							</ul>
							
						</li>
					</ul>
				</li>
				<li>
					<a href="/vtorichnoe/prodazha/kvartiry-podmoskovie">Квартиры в Подмосковье</a>
				</li>
				<li>
					<a href="/vtorichnoe/prodazha/komnaty">Комнаты</a>
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
			<select class="chosen-select" name="subway">
				<option <?php if(!$subway){echo 'selected';} ?> value="">Выберите станцию</option>
				<?php foreach($subwayList as $subwayItem) : ?>
				<option <?php if($subway == $subwayItem['SubwayIndex']){echo 'selected';} ?> value="<?php echo $subwayItem['SubwayIndex']; ?>"><?php echo $subwayItem['SubwayTitle']; ?></option>
				<?php endforeach; ?>
			</select>
			<script>
				$(".chosen-select").chosen();
			</script>
		</div>
		<div class="filter-navigation">
			<input type="submit" value="Найти" />
		</div>
		</div>
		
		
		
		</form>
	</div>
</div>
<h3>Улицы москвы</h3>
<?php foreach($streetList as $street) : ?>
<p><a href="/vtorichnoe?street=<?php echo $street['StreetIndex']; ?>"><?php echo $street['StreetTitle']; ?></a></p>	
<?php endforeach; ?>
