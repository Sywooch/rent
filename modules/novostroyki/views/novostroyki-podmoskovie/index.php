<?php
$this->title = 'Аренда квартир - Новостройки Подмосковья';
?>
<div class="section-list-wrap">
	<ul>
		<li <?php if(Yii::$app->controller->id == 'novostroyki'){echo 'class="active"';} ?>><a href="/novostroyki">Все новостройки</a></li>
		<li <?php if(Yii::$app->controller->id == 'novostroyki-moskva'){echo 'class="active"';} ?>><a href="/novostroyki/novostroyki-moskva">Новостройки в Москве</a></li>
		<li <?php if(Yii::$app->controller->id == 'novostroyki-podmoskovie'){echo 'class="active"';} ?>><a href="/novostroyki/novostroyki-podmoskovie">Новостройки в Подмосковье</a></li>
	</ul>
</div>
<div class="filter-wrap">
	<div class="filter-section" id="novostroyki">
		<form action="" method="get">
		<div class="filter-group room-number-filter">
			<h5>Комнатность</h5>
			<ul>
				<li>
					<input <?php if($roomNumber == 1){echo 'checked=""';} ?> type="radio" name="roomNumber" value="1" id="room-number-1" />
					<label for="room-number-1">1</label>
				</li>
				<li>
					<input <?php if($roomNumber == 2){echo 'checked=""';} ?> type="radio" name="roomNumber" value="2" id="room-number-2" />
					<label for="room-number-2">2</label>
				</li>
				<li>
					<input <?php if($roomNumber == 3){echo 'checked=""';} ?> type="radio" name="roomNumber" value="3" id="room-number-3" />
					<label for="room-number-3">3</label>
				</li>
				<li>
					<input <?php if(!$roomNumber){echo 'checked=""';} ?> type="radio" name="roomNumber" value="" id="room-number-anyone" />
					<label for="room-number-anyone">Не важно</label>
				</li>
			</ul>
		</div>
		<div class="filter-group area-filter">
			<h5>Площадь (м²):</h5>
			<div class="input-wrap">
				<input class="input-short" type="text" name="areaMin" value="<?php echo $areaMin; ?>" />
				<span>—</span>
				<input class="input-short" type="text" name="areaMax" value="<?php echo $areaMax; ?>" />
			</div>
		</div>
		<div class="filter-group price-filter">
			<h5>Цена (тыс. руб/м²):</h5>
			<div class="input-wrap">
				<input class="input-short" type="text" name="priceMin" value="<?php if($priceMin){echo $priceMin/1000;}  ?>" />
				<span>—</span>
				<input class="input-short" type="text" name="priceMax" value="<?php if($priceMax){echo $priceMax/1000;} ?>" />
			</div>
		</div>
		<div class="filter-group city-filter">
			<h5>Населённый пункт:</h5>
			<div class="input-wrap">
				<input class="input-long" type="text" name="city" value="<?php if($city){echo $city;} ?>" />
			</div>
		</div>
		<div class="filter-navigation">
			<input type="submit" value="Найти" />
		</div>
		</form>
	</div>
</div>
<h2>Продажа квартир в новостройках Подмосковья</h2>
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
				<p>
					<span class="title">Адресс:</span>
					<span><?php
					 $low = mb_convert_case($item['FlatAddress'], MB_CASE_LOWER, 'UTF-8');
					 echo mb_convert_case($low, MB_CASE_TITLE, 'UTF-8');
					  ?></span>
				</p>
				<p>
					<span class="title">Комнатность:</span>
					<span><?php echo $item['FlatRoomNumber']; ?>
					
					 </span>
				</p>
				<p>
					<span class="title">Плошадь:</span>
					<span><?php echo $item['FlatArea'] . ' м²'; ?></span>
				</p>
				<p>
					<span class="title">Цена:</span>
					<span><?php echo (int)$item['FlatPrice']/1000 . ' тыс. руб/м²'; ?></span>
				</p>
				
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>