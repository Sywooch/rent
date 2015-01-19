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