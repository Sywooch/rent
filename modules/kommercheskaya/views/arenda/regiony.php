<?php
$this->title = 'Аренда квартир - Аренда коммерческой недвижимости в регионах';
?>
<div class="section-list-wrap">
	<ul>
		<li <?php if(Yii::$app->controller->id == 'kommercheskaya'){echo 'class="active"';} ?>><a href="/kommercheskaya">Продажа</a></li>
		<li <?php if(Yii::$app->controller->id == 'arenda'){echo 'class="active"';} ?>><a href="/kommercheskaya/arenda">Аренда</a></li>
	</ul>
	<ul>
		<li <?php if(Yii::$app->controller->id == 'arenda' && Yii::$app->controller->action->id == 'index'){echo 'class="active"';} ?>><a href="/kommercheskaya/arenda">Все обьекты</a></li>
		<li <?php if(Yii::$app->controller->id == 'arenda' && Yii::$app->controller->action->id == 'ofisy'){echo 'class="active"';} ?>><a href="/kommercheskaya/arenda/ofisy">Офисы</a></li>
		<li <?php if(Yii::$app->controller->id == 'arenda' && Yii::$app->controller->action->id == 'osobniaki'){echo 'class="active"';} ?>><a href="/kommercheskaya/arenda/osobniaki">Особняки</a></li>
		<li <?php if(Yii::$app->controller->id == 'arenda' && Yii::$app->controller->action->id == 'torgovaya'){echo 'class="active"';} ?>><a href="/kommercheskaya/arenda/torgovaya">Торговая недвижимость</a></li>
		<li <?php if(Yii::$app->controller->id == 'arenda' && Yii::$app->controller->action->id == 'biznes'){echo 'class="active"';} ?>><a href="/kommercheskaya/arenda/biznes">Арендный бизнес</a></li>
		<li <?php if(Yii::$app->controller->id == 'arenda' && Yii::$app->controller->action->id == 'podmoskovie'){echo 'class="active"';} ?>><a href="/kommercheskaya/arenda/podmoskovie">Недвижимость в Подмосковье</a></li>
		<li <?php if(Yii::$app->controller->id == 'arenda' && Yii::$app->controller->action->id == 'sklady'){echo 'class="active"';} ?>><a href="/kommercheskaya/arenda/sklady">Склады</a></li>
		<li <?php if(Yii::$app->controller->id == 'arenda' && Yii::$app->controller->action->id == 'regiony'){echo 'class="active"';} ?>><a href="/kommercheskaya/arenda/regiony">Регионы</a></li>
	</ul>
</div>
<div class="filter-wrap">
	
	<div class="filter-section" id="novostroyki">
		<form action="" method="get">
		
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
				<input class="input-short" type="text" name="priceMin" value="<?php if($priceMin){echo $priceMin;}  ?>" />
				<span>—</span>
				<input class="input-short" type="text" name="priceMax" value="<?php if($priceMax){echo $priceMax;} ?>" />
			</div>
		</div>
		<div class="filter-navigation">
			<input type="submit" value="Найти" />
		</div>
		</form>
	</div>
</div>
<h2>Аренда коммерческой недвижимости в регионах</h2>
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
					<span><?php echo (int)$item['CommercePrice']*1000 . ' руб/м за год²'; ?></span>
				</p>
				
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
