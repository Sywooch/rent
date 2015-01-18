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
<h2 class="page-header">Округа Москвы</h2>
<?php foreach($districtList as $district) : ?>
<p><a href="/vtorichnoe/prodazha/district/<?php echo $district['DistrictUrl']; ?>"><?php echo $district['DistrictTitle']; ?></a></p>	
<?php endforeach; ?>
