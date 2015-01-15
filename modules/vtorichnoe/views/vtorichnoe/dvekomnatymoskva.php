<?php
$this->title = 'Аренда квартир - Продажа двокомнатных квартир в Москве';
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
							<p>По расположению</p>
							<ul class="location-list">
								<li><a>по метро</a></li>
								<li><a>по районам</a></li>
								<li><a>по улице</a></li>
								<li><a>по округам</a></li>
							</ul>
						</li>
						
					</ul>
				</li>
				<li>
					<a>Квартиры в Подмосковье</a>
					<ul>
						<li>
							<p>По числу комнат</p>
							<ul>
								<li class="num-item"><a href="/vtorichnoe/prodazha/odnokomnatnye-kvartiry-podmoskovie">1</a></li>
								<li class="num-item"><a href="/vtorichnoe/prodazha/dvuhkomnatnye-kvartiry-podmoskovie">2</a></li>
								<li class="num-item"><a href="/vtorichnoe/prodazha/trehkomnatnye-kvartiry-podmoskovie">3</a></li>
								<li class="num-item"><a href="/vtorichnoe/prodazha/chetyrehkomnatnye-kvartiry-podmoskovie">4+</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li <?php if(Yii::$app->controller->id == 'vtorichnoe' && Yii::$app->controller->action->id == 'komnaty'){echo 'class="active"';} ?>>
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
<h2>Продажа двокомнатных квартир в Москве</h2>
<div class="flat-list">
	<?php foreach($itemList as $item) : ?>
	<div class="flat-item">
		<div class="flat-item-inner">
			<img src="/assets/jpg/flat.jpg" />
			<div class="flat-item-info">
				<p>
					<span class="title">Тип обьекта:</span>
					<span><?php
					 $low = mb_convert_case($item['FlatType'], MB_CASE_LOWER, 'UTF-8');
					 echo mb_convert_case($low, MB_CASE_TITLE, 'UTF-8');
					 ?></span>
				</p>
				<?php if(!empty($item['CommerceClass'])) : ?>
				<p>
					<span class="title">Класс офиса:</span>
					<span><?php echo $officeClasses[$item['CommerceClass']]['classTitle']; ?></span>
				</p>
				<?php endif; ?>
				<p>
					<span class="title">Тип обьявления:</span>
					<span><?php
					 $low = mb_convert_case($item['FlatAction'], MB_CASE_LOWER, 'UTF-8');
					 echo mb_convert_case($low, MB_CASE_TITLE, 'UTF-8');
					 ?></span>
				</p>
				<p>
					<span class="title">Город:</span>
					<span><?php
					 $low = mb_convert_case($item['FlatCity'], MB_CASE_LOWER, 'UTF-8');
					 echo mb_convert_case($low, MB_CASE_TITLE, 'UTF-8');
					  ?></span>
				</p>
				<p style="display: none;">
					<span class="title">Адресс:</span>
					<span><?php
					 $low = mb_convert_case($item['FlatAddress'], MB_CASE_LOWER, 'UTF-8');
					 echo mb_convert_case($low, MB_CASE_TITLE, 'UTF-8');
					  ?></span>
				</p>
				<p>
					<span class="title">Метро:</span>
					<span>
						<?php
						foreach($subwayList as $subway) :
							if($item['FlatSubway'] == $subway['SubwayIndex']) :
								echo $subway['SubwayTitle'];
								continue;
							endif;
						endforeach;
						?>
					</span>
				</p>
				<p>
					<span class="title">Комнатность:</span>
					<span><?php
						if($item['FlatType'] == 'КОМНАТА' || $item['FlatType'] == 'ДОЛЯ') :
							echo '1/';
						endif;
					 echo $item['FlatRoomNumber'];
					  ?>
					
					 </span>
				</p>
				<p>
					<span class="title">Площадь:</span>
					<span><?php
						if($item['FlatType'] == 'КОМНАТА' || $item['FlatType'] == 'ДОЛЯ') :
							echo $item['FlatRoomArea'] . ' м² / ';
						endif;
					 echo $item['FlatArea'] . ' м²';
					  ?></span>
				</p>
				<p>
					<span class="title">Цена:</span>
					<span><?php echo (int)$item['FlatTotalPrice']/1000 . ' тыс. руб'; ?></span>
				</p>
				
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
