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
			<?php echo $this->render('fastfilter', [
			'flatType' => $flatType,
			'roomNumber' => $roomNumber,
			'priceMin' => $priceMin,
			'priceMax' => $priceMax,
			'subwayList' => $subwayList,
			'subway' => $subway,
		]); ?>
		</form>
	</div>
</div>
<h2 class="page-header">Квартиры по городам Подмосковья</h2>
<?php foreach($cityList as $city) : ?>
<p><a href="/vtorichnoe/prodazha/podmoskovie/<?php echo $city['CityUrl']; ?>"><?php echo $city['CityTitle']; ?></a></p>	
<?php endforeach; ?>
