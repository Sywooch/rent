<?php
$this->title = 'Аренда квартир - Загородная';
?>
<div class="section-list-wrap">
	<ul>
		<li <?php if(Yii::$app->controller->id == 'zagorodnaya' && Yii::$app->controller->action->id == 'index'){echo 'class="active"';} ?>><a href="/zagorodnaya">Продажа домов</a></li>
		<li <?php if(Yii::$app->controller->id == 'zagorodnaya' && Yii::$app->controller->action->id == 'uchastki'){echo 'class="active"';} ?>><a href="/zagorodnaya/uchastki">Продажа участков</a></li>
		<li <?php if(Yii::$app->controller->id == 'zagorodnaya' && Yii::$app->controller->action->id == 'arenda'){echo 'class="active"';} ?>><a href="/zagorodnaya/arenda">Аренда</a></li>
	</ul>
</div>
<div class="filter-wrap">
	<div class="filter-section" id="novostroyki">
		<form action="" method="get">
		<div class="filter-group room-number-filter">
			<h5>Направление</h5>
			<select class="filter-select" name="direction">
				<option value="">- -</option>
				<option <?php if($direction == '1'){echo 'selected';} ?> value="1">Алтуфьевское шоссе</option>
				<option <?php if($direction == '2'){echo 'selected';} ?> value="2">Боровское шоссе</option>
				<option <?php if($direction == '3'){echo 'selected';} ?> value="3">Варшавское шоссе</option>
				<option <?php if($direction == '4'){echo 'selected';} ?> value="4">Волоколамское шоссе</option>
				<option <?php if($direction == '5'){echo 'selected';} ?> value="5">Горьковское шоссе</option>
				<option <?php if($direction == '6'){echo 'selected';} ?> value="6">Дмитровское шоссе</option>
				<option <?php if($direction == '7'){echo 'selected';} ?> value="7">Егорьевское шоссе</option>
				<option <?php if($direction == '8'){echo 'selected';} ?> value="8">Звенигородское шоссе</option>
				<option <?php if($direction == '9'){echo 'selected';} ?> value="9">Калужское шоссе</option>
				<option <?php if($direction == '10'){echo 'selected';} ?> value="10">Каширское шоссе</option>
				<option <?php if($direction == '11'){echo 'selected';} ?> value="11">Киевское шоссе</option>
				<option <?php if($direction == '12'){echo 'selected';} ?> value="12">Коровинское шоссе</option>
				<option <?php if($direction == '13'){echo 'selected';} ?> value="13">Куркинское шоссе</option>
				<option <?php if($direction == '14'){echo 'selected';} ?> value="14">Ленинградское шоссе</option>
				<option <?php if($direction == '15'){echo 'selected';} ?> value="15">Минское шоссе</option>
				<option <?php if($direction == '16'){echo 'selected';} ?> value="16">Можайское шоссе</option>
				<option <?php if($direction == '17'){echo 'selected';} ?> value="17">Нижегородское шоссе</option>
				<option <?php if($direction == '18'){echo 'selected';} ?> value="18">Новокаширское шоссе</option>
				<option <?php if($direction == '19'){echo 'selected';} ?> value="19">Новорижское шоссе</option>
				<option <?php if($direction == '20'){echo 'selected';} ?> value="20">Новорязанское шоссе</option>
				<option <?php if($direction == '21'){echo 'selected';} ?> value="21">Носовихинское шоссе</option>
				<option <?php if($direction == '22'){echo 'selected';} ?> value="22">Осташковское шоссе</option>
				<option <?php if($direction == '23'){echo 'selected';} ?> value="23">Очаковское шоссе</option>
				<option <?php if($direction == '24'){echo 'selected';} ?> value="24">Перовское шоссе</option>
				<option <?php if($direction == '25'){echo 'selected';} ?> value="25">Путилковское шоссе</option>
				<option <?php if($direction == '26'){echo 'selected';} ?> value="26">Пятницкое шоссе</option>
				<option <?php if($direction == '27'){echo 'selected';} ?> value="27">Рогачёвское шоссе</option>
				<option <?php if($direction == '28'){echo 'selected';} ?> value="28">Рублёво-Успенское шоссе</option>
				<option <?php if($direction == '29'){echo 'selected';} ?> value="29">Рублёвское шоссе</option>
				<option <?php if($direction == '30'){echo 'selected';} ?> value="30">Рязанское шоссе</option>
				<option <?php if($direction == '31'){echo 'selected';} ?> value="31">Симферопольское шоссе</option>
				<option <?php if($direction == '32'){echo 'selected';} ?> value="32">Сколковское шоссе</option>
				<option <?php if($direction == '33'){echo 'selected';} ?> value="33">Щёлковское шоссе</option>
				<option <?php if($direction == '34'){echo 'selected';} ?> value="34">Ярославское шоссе</option>
				
			</select>
		</div>
		<div class="filter-group left-25">
			<h5>От МКАД (км):</h5>
			<div class="input-wrap">
				<input class="input-short input-40" type="text" name="distanceMin" value="<?php echo $distanceMin; ?>" />
				<span>—</span>
				<input class="input-short input-40" type="text" name="distanceMax" value="<?php echo $distanceMax; ?>" />
			</div>
		</div>
		<div class="filter-group price-filter">
			<h5>Площадь дома (м²):</h5>
			<div class="input-wrap">
				<input class="input-short input-40" type="text" name="areaMin" value="<?php echo $areaMin; ?>" />
				<span>—</span>
				<input class="input-short input-40"  type="text" name="areaMax" value="<?php echo $areaMax; ?>" />
			</div>
		</div>
		<div class="filter-group city-filter">
			<h5>Участок (соток):</h5>
			<div class="input-wrap">
				<input class="input-short input-40" type="text" name="plotareaMin" value="<?php echo $plotareaMin; ?>" />
				<span>—</span>
				<input class="input-short input-40" type="text" name="plotareaMax" value="<?php echo $plotareaMax; ?>" />
			</div>
		</div>
		<div class="filter-group left-75">
			<h5>Цена (тыс. руб):</h5>
			<div class="input-wrap">
				<input class="input-short input-50" type="text" name="priceMin" value="<?php if($priceMin){echo $priceMin;}  ?>" />
				<span>—</span>
				<input class="input-short input-50" type="text" name="priceMax" value="<?php if($priceMax){echo $priceMax;} ?>" />
			</div>
		</div>
		<div class="filter-navigation">
			<input type="submit" value="Найти" />
		</div>
		</form>
	</div>
</div>
<h2>Продажа загородных домов</h2>
<div class="flat-list">
	<?php foreach($flatList as $flat) : ?>
	<div class="flat-item">
		<div class="flat-item-inner">
			<img src="/assets/jpg/house.jpg" />
			<div class="flat-item-info">
				<p>
					<span>Направление</span>
					<span><?php echo $flat['HouseDirectionId']; ?></span>
				</p>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
