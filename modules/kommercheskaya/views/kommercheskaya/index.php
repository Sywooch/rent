<?php
$this->title = 'Аренда квартир - Коммерческая';
?>
<div class="section-list-wrap">
	<ul>
		<li <?php if(Yii::$app->controller->id == 'kommercheskaya'){echo 'class="active"';} ?>><a href="/kommercheskaya">Продажа</a></li>
		<li <?php if(Yii::$app->controller->id == 'kommercheskayaarenda'){echo 'class="active"';} ?>><a href="/kommercheskaya/arenda">Аренда</a></li>
	</ul>
	<ul>
		<li <?php if(Yii::$app->controller->id == 'kommercheskaya' && Yii::$app->controller->action->id == 'index'){echo 'class="active"';} ?>><a href="/kommercheskaya">Все обьекты</a></li>
		<li <?php if(Yii::$app->controller->id == 'kommercheskaya' && Yii::$app->controller->action->id == 'ofisy'){echo 'class="active"';} ?>><a href="/kommercheskaya/prodazha/ofisy">Офисы</a></li>
		<li <?php if(Yii::$app->controller->id == 'kommercheskaya' && Yii::$app->controller->action->id == 'osobnyaki'){echo 'class="active"';} ?>><a href="/kommercheskaya/prodazha/osobniaki">Особняки</a></li>
		<li <?php if(Yii::$app->controller->id == 'kommercheskaya' && Yii::$app->controller->action->id == 'torgovoye'){echo 'class="active"';} ?>><a href="/kommercheskaya/prodazha/torgovaya">Торговая недвижимость</a></li>
		<li <?php if(Yii::$app->controller->id == 'kommercheskaya' && Yii::$app->controller->action->id == 'biznes'){echo 'class="active"';} ?>><a href="/kommercheskaya/prodazha/biznes">Арендный бизнес</a></li>
		<li <?php if(Yii::$app->controller->id == 'kommercheskaya' && Yii::$app->controller->action->id == 'podmoskovie'){echo 'class="active"';} ?>><a href="/kommercheskaya/prodazha/podmoskovie">Недвижимость в Подмосковье</a></li>
		<li <?php if(Yii::$app->controller->id == 'kommercheskaya' && Yii::$app->controller->action->id == 'sklady'){echo 'class="active"';} ?>><a href="/kommercheskaya/prodazha/sklady">Склады</a></li>
		
	</ul>
</div>
<div class="filter-wrap">
	
	<div class="filter-section" id="novostroyki">
		<form action="" method="get">
		<?php echo $this->render('filter', [
			'class1' => $class1,
			'class2' => $class2,
			'class3' => $class3,
			'class4' => $class4,
			'priceMin' => $priceMin,
			'priceMax' => $priceMax,
			'areaMin' => $areaMin,
			'areaMax' => $areaMax,
			'subwayList' => $subwayList,
			'subway' => $subway,
		]); ?>
		</form>
	</div>
</div>
<h2>Продажа коммерческой недвижимости</h2>
<div class="flat-list">
	<?php foreach($itemList as $item) : ?>
	<div class="flat-item">
		<div class="flat-item-inner">
			<img src="/assets/jpg/commerce.jpg" />
			<div class="flat-item-info">
				<p>
					<span class="title">Тип обьекта:</span>
					<span><?php
					 $low = mb_convert_case($item['CommerceType'], MB_CASE_LOWER, 'UTF-8');
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
					 $low = mb_convert_case($item['CommerceAction'], MB_CASE_LOWER, 'UTF-8');
					 echo mb_convert_case($low, MB_CASE_TITLE, 'UTF-8');
					 ?></span>
				</p>
				<p>
					<span class="title">Город:</span>
					<span><?php
					 $low = mb_convert_case($item['CommerceCity'], MB_CASE_LOWER, 'UTF-8');
					 echo mb_convert_case($low, MB_CASE_TITLE, 'UTF-8');
					 ?></span>
				</p>
				<p>
					<span class="title">Регион:</span>
					<span><?php echo $regions[$item['CommerceRegionId']]['regionTitle']; ?></span>
				</p>
				<p>
					<span class="title">Плошадь:</span>
					<span><?php echo $item['CommerceArea'] . ' м²'; ?></span>
				</p>
				<p>
					<span class="title">Цена:</span>
					<span><?php echo (int)$item['CommercePrice']/1000 . ' тыс.  руб/м²'; ?></span>
				</p>
				
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
