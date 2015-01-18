<?php
$this->title = 'Аренда квартир - Продажа трехкомнатных квартир в Подмосковье';
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
<h2 class="page-header">Продажа трехкомнатных квартир в Подмосковье</h2>
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
				<p style="display: none;">
					<span class="title">Адресс:</span>
					<span><?php
					 $low = mb_convert_case($item['FlatAddress'], MB_CASE_LOWER, 'UTF-8');
					 echo mb_convert_case($low, MB_CASE_TITLE, 'UTF-8');
					  ?></span>
				</p>
				<p>
					<span class="title">Метро:</span>
					<span>
						<?php
						foreach($subwayList as $subway) :
							if($item['FlatSubway'] == $subway['SubwayIndex']) :
								echo $subway['SubwayTitle'];
								continue;
							endif;
						endforeach;
						?>
					</span>
				</p>
				<p>
					<span class="title">Район:</span>
					<span>
						<?php
						foreach($departmentList as $department) :
							if($item['FlatDepartment'] == $department['DepartmentIndex']) :
								echo $department['DepartmentTitle'];
								continue;
							endif;
						endforeach;
						?>
					</span>
				</p>
				<p>
					<span class="title">Округ:</span>
					<span>
						<?php
						foreach($districtList as $district) :
							if($item['FlatDistrict'] == $district['DistrictIndex']) :
								echo $district['DistrictTitle'];
								continue;
							endif;
						endforeach;
						?>
					</span>
				</p>
				<p>
					<span class="title">Улица:</span>
					<span>
						<?php
						foreach($streetList as $street) :
							if($item['FlatStreet'] == $street['StreetIndex']) :
								echo $street['StreetTitle'];
								continue;
							endif;
						endforeach;
						?>
					</span>
				</p>
				<p>
					<span class="title">Комнатность:</span>
					<span><?php
						if($item['FlatType'] == 'КОМНАТА' || $item['FlatType'] == 'ДОЛЯ') :
							echo '1/';
						endif;
					 echo $item['FlatRoomNumber'];
					  ?>
					
					 </span>
				</p>
				<p>
					<span class="title">Площадь:</span>
					<span><?php
						if($item['FlatType'] == 'КОМНАТА' || $item['FlatType'] == 'ДОЛЯ') :
							echo $item['FlatRoomArea'] . ' м² / ';
						endif;
					 echo $item['FlatArea'] . ' м²';
					  ?></span>
				</p>
				<p>
					<span class="title">Цена:</span>
					<span><?php echo (int)$item['FlatTotalPrice']/1000 . ' тыс. руб'; ?></span>
				</p>
				
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
