<?php
$this->title = 'Аренда квартир - Коммерческая';
?>
<div class="section-list-wrap">
	<ul>
		<li <?php if(Yii::$app->controller->id == 'kommercheskaya' && Yii::$app->controller->action->id == 'index'){echo 'class="active"';} ?>><a href="/kommercheskaya">Продажа</a></li>
		<li <?php if(Yii::$app->controller->id == 'kommercheskaya' && Yii::$app->controller->action->id == 'arenda'){echo 'class="active"';} ?>><a href="/kommercheskaya/arenda">Аренда</a></li>
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
		<div class="filter-navigation">
			<input type="submit" value="Найти" />
		</div>
		</form>
	</div>
</div>
<div class="flat-list">
	<table>
		<thead>
			<tr>
				<td class="front-image-cell">Фото</td>
				<td>Название</td>
				<td>Адресс</td>
				<td>Город</td>
				<td>Количество комнат</td>
				<td>Площадь</td>
				<td>Цена</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($flatList as $flat) : ?>
			<tr>
				<td class="front-image-cell">
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 					width="32px" height="24.191px" viewBox="0 0 32 24.191" style="enable-background:new 0 0 32 24.191;" xml:space="preserv			e">
<g>
	<path d="M1.38,11.504l13.288-0.527l8.085-9.339l7.727,11.579L32,12.999l-9.09-12.91l-9.283,1.719V0.158L12.862,0l-2.304,0.487
		v1.889L7.463,2.949L0,9.729v1.785C0,11.515,0.763,11.495,1.38,11.504z"/>
	<path d="M22.702,2.438l-7.804,9.016L2.155,11.961v10.82l11.708,1.406v0.004l7.319-0.854v-8.43l3.368-0.004v8.041l5.395-0.662v-8.99
		L22.702,2.438z M7.126,19.404l-3.393-0.218v-4.33l3.393,0.002V19.404z M12.862,19.751l-3.945-0.253v-4.66l3.945,0.001V19.751z
		 M19.522,19.549l-4.165,0.273v-4.94l4.165-0.003V19.549z M28.97,18.957l-3.144,0.207v-4.275l3.144-0.004V18.9
57z"/>
</svg>
				</td>
				<td><?php echo $flat['FlatName']; ?></td>
				<td><?php echo $flat['FlatAddress']; ?></td>
				<td><?php echo $flat['FlatCity']; ?></td>
				<td><?php echo $flat['FlatRoomNumber']; ?></td>
				<td><?php echo $flat['FlatArea']; ?></td>
				<td><?php echo $flat['FlatPrice']; ?></td>
			</tr>	
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
