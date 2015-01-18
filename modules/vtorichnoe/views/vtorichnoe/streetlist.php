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
<h2 class="page-header">Квартиры по улицам Москвы</h2>
<?php foreach($streetList as $street) : ?>
<p><a href="/vtorichnoe/prodazha/street/<?php echo $street['StreetUrl']; ?>"><?php echo $street['StreetTitle']; ?></a></p>	
<?php endforeach; ?>
