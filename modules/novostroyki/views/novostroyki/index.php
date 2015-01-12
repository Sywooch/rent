<?php
$this->title = 'Аренда квартир - Новостройки';
?>
<div class="section-list-wrap">
	<ul>
		<li><a href="/novostroyki">Все новостройки</a></li>
		<li><a href="/novostroyki/novostroyki-moskva">Новостройки в Москве</a></li>
		<li><a href="/novostroyki/novostroyki-podmoskovie">Новостройки в Подмосковье</a></li>
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
				<input class="input-short" type="text" name="priceMin" value="<?php echo $priceMin; ?>" />
				<span>—</span>
				<input class="input-short" type="text" name="priceMax" value="<?php echo $priceMax; ?>" />
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
				<td>Фото</td>
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
				<td></td>
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
