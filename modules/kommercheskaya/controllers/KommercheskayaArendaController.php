<?php
namespace app\modules\kommercheskaya\controllers;

use yii\web\Controller;
use Yii;
use app\models\Flat;
use app\models\Subway;
use app\models\City;

class KommercheskayaArendaController extends Controller
{
	public $enableCsrfValidation = false;
	
	public $classes = [1, 2, 3, 4, 5, 6, 7, 8, 9];
	
	public $officeClasses = [
		'1' => [
			'classTitle' => 'A'
		],
		'2' => [
			'classTitle' => 'B'
		],
		'3' => [
			'classTitle' => 'B+'
		],
		'4' => [
			'classTitle' => 'C'
		],
	];
	
	public $areaMin = null;
	public $areaMax = null;
	
	public $priceMin = null;
	public $priceMax = null;
	
	public $class1 = null;
	public $class2 = null;
	public $class3 = null;
	public $class4 = null;
	
	public $subway = null;
	public $city = null;
	
	public $strArr = [];
	
	public $regions = [
		'1' => [
			'regionTitle' => 'Москва'
		],
		'2' => [
			'regionTitle' => 'Подмосковье'
		],
		'3' => [
			'regionTitle' => 'Воронежская область'
		],
		'4' => [
			'regionTitle' => 'Тверская область'
		],
		'5' => [
			'regionTitle' => 'Саратовская область'
		],
	];
	
	public function getFilterString($min, $max, $field, $type) {
		if(is_numeric($min)) :
			$this->{$type . 'Min'} = (int)$min;
			if($type == 'price') :
				$this->{$type . 'Min'} = (int)$min*1000;
			endif;
			$str = $type . ' >= ' . $this->{$type . 'Min'};
		endif;
		
		if(is_numeric($max)) :
			$this->{$type . 'Max'} = (int)$max;
			if($type == 'price') :
				$this->{$type . 'Max'} = (int)$max*1000;
			endif;
			$str = $field . ' <= ' . $this->{$type . 'Max'};
		endif;
		
		if(is_numeric($min) && is_numeric($max)) :
			$str = $field . ' BETWEEN ' . $this->{$type . 'Min'} . ' AND ' . $this->{$type . 'Max'};
		endif;
		
		if(isset($str)) :
			return $str;
		endif;
		
		return false;
	}
	
	public function actionIndex($subway = null, $class1 = null, $class2 = null, $class3 = null, $class4 = null, $areaMin = null, $areaMax = null, $priceMin = null, $priceMax = null) {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM commerce WHERE CommerceAction = "АРЕНДА"';
		
		$subwayList = Subway::find()->asArray()->all();
		$subwayIndexes = [];
		foreach($subwayList as $item) :
			array_push($subwayIndexes, $item['SubwayIndex']);
		endforeach;
		
		if(in_array($subway, $subwayIndexes)) :
			$this->subway = $subway;
			$str = 'CommerceSubway = ' . $subway;
			array_push($this->strArr, $str);
		endif;
		
		if($str = $this->getFilterString($areaMin, $areaMax, 'CommerceArea', 'area')) :
			array_push($this->strArr, $str);
		endif;
		
		if($str = $this->getFilterString($priceMin, $priceMax, 'CommercePrice', 'price')) :
			array_push($this->strArr, $str);
		endif;
		
		$classes = [];
		
		if(in_array($class1, $this->classes)) :
			$this->class1 = $class1;
			array_push($classes, $class1);
		endif;
		
		if(in_array($class2, $this->classes)) :
			$this->class2 = $class2;
			array_push($classes, $class2);
		endif;
		
		if(in_array($class3, $this->classes)) :
			$this->class3 = $class3;
			array_push($classes, $class3);
		endif;
		
		if(in_array($class4, $this->classes)) :
			$this->class4 = $class4;
			array_push($classes, $class4);
		endif;
		
		if(!empty($classes)) :
			$str = 'CommerceClass IN (' . implode(',', $classes) . ')';
			array_push($this->strArr, $str);
		endif;
		
		if(count($this->strArr) > 1) {
			$sql .= ' AND ' . implode(' AND ', $this->strArr);
		} elseif(count($this->strArr) == 1) {
			$sql .= ' AND ' . $this->strArr[0];
		}

		$connection = Yii::$app->db;
		$itemList = $connection->createCommand($sql)->queryAll();
		return $this->render('index', [
			'itemList' => $itemList,
			'areaMin' => $this->areaMin,
			'areaMax' => $this->areaMax,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'class1' => $this->class1,
			'class2' => $this->class2,
			'class3' => $this->class3,
			'class4' => $this->class4,
			'regions' => $this->regions,
			'officeClasses' => $this->officeClasses,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
		]);
	}

	public function actionOfisy($subway = null, $class1 = null, $class2 = null, $class3 = null, $class4 = null, $areaMin = null, $areaMax = null, $priceMin = null, $priceMax = null) {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM commerce WHERE CommerceAction = "АРЕНДА" AND CommerceType = "ОФИС"';
		
		$subwayList = Subway::find()->asArray()->all();
		$subwayIndexes = [];
		foreach($subwayList as $item) :
			array_push($subwayIndexes, $item['SubwayIndex']);
		endforeach;
		
		if($str = $this->getFilterString($areaMin, $areaMax, 'CommerceArea', 'area')) :
			array_push($this->strArr, $str);
		endif;
		
		if($str = $this->getFilterString($priceMin, $priceMax, 'CommercePrice', 'price')) :
			array_push($this->strArr, $str);
		endif;
		
		$classes = [];
		
		if(in_array($class1, $this->classes)) :
			$this->class1 = $class1;
			array_push($classes, $class1);
		endif;
		
		if(in_array($class2, $this->classes)) :
			$this->class2 = $class2;
			array_push($classes, $class2);
		endif;
		
		if(in_array($class3, $this->classes)) :
			$this->class3 = $class3;
			array_push($classes, $class3);
		endif;
		
		if(in_array($class4, $this->classes)) :
			$this->class4 = $class4;
			array_push($classes, $class4);
		endif;
		
		if(!empty($classes)) :
			$str = 'CommerceClass IN (' . implode(',', $classes) . ')';
			array_push($this->strArr, $str);
		endif;
		
		if(count($this->strArr) > 1) {
			$sql .= ' AND ' . implode(' AND ', $this->strArr);
		} elseif(count($this->strArr) == 1) {
			$sql .= ' AND ' . $this->strArr[0];
		}

		$connection = Yii::$app->db;
		$itemList = $connection->createCommand($sql)->queryAll();
		return $this->render('ofisy', [
			'itemList' => $itemList,
			'areaMin' => $this->areaMin,
			'areaMax' => $this->areaMax,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'class1' => $this->class1,
			'class2' => $this->class2,
			'class3' => $this->class3,
			'class4' => $this->class4,
			'regions' => $this->regions,
			'officeClasses' => $this->officeClasses,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
		]);
	}

	public function actionOsobniaki($subway = null, $areaMin = null, $areaMax = null, $priceMin = null, $priceMax = null) {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM commerce WHERE CommerceAction = "АРЕНДА" AND CommerceType = "ОСОБНЯК"';
		
		$subwayList = Subway::find()->asArray()->all();
		$subwayIndexes = [];
		foreach($subwayList as $item) :
			array_push($subwayIndexes, $item['SubwayIndex']);
		endforeach;
		
		if(in_array($subway, $subwayIndexes)) :
			$this->subway = $subway;
			$str = 'CommerceSubway = ' . $subway;
			array_push($this->strArr, $str);
		endif;
		
		if($str = $this->getFilterString($areaMin, $areaMax, 'CommerceArea', 'area')) :
			array_push($this->strArr, $str);
		endif;
		
		if($str = $this->getFilterString($priceMin, $priceMax, 'CommercePrice', 'price')) :
			array_push($this->strArr, $str);
		endif;
		
		if(count($this->strArr) > 1) {
			$sql .= ' AND ' . implode(' AND ', $this->strArr);
		} elseif(count($this->strArr) == 1) {
			$sql .= ' AND ' . $this->strArr[0];
		}

		$connection = Yii::$app->db;
		$itemList = $connection->createCommand($sql)->queryAll();
		return $this->render('osobniaki', [
			'itemList' => $itemList,
			'areaMin' => $this->areaMin,
			'areaMax' => $this->areaMax,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'class1' => $this->class1,
			'class2' => $this->class2,
			'class3' => $this->class3,
			'class4' => $this->class4,
			'regions' => $this->regions,
			'officeClasses' => $this->officeClasses,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
		]);
	}

	public function actionTorgovaya($subway = null, $areaMin = null, $areaMax = null, $priceMin = null, $priceMax = null) {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM commerce WHERE CommerceAction = "АРЕНДА" AND CommerceType = "ТОРГОВОЕ"';
		
		$subwayList = Subway::find()->asArray()->all();
		$subwayIndexes = [];
		foreach($subwayList as $item) :
			array_push($subwayIndexes, $item['SubwayIndex']);
		endforeach;
		
		if(in_array($subway, $subwayIndexes)) :
			$this->subway = $subway;
			$str = 'CommerceSubway = ' . $subway;
			array_push($this->strArr, $str);
		endif;
		
		if($str = $this->getFilterString($areaMin, $areaMax, 'CommerceArea', 'area')) :
			array_push($this->strArr, $str);
		endif;
		
		if($str = $this->getFilterString($priceMin, $priceMax, 'CommercePrice', 'price')) :
			array_push($this->strArr, $str);
		endif;
		
		if(count($this->strArr) > 1) {
			$sql .= ' AND ' . implode(' AND ', $this->strArr);
		} elseif(count($this->strArr) == 1) {
			$sql .= ' AND ' . $this->strArr[0];
		}

		$connection = Yii::$app->db;
		$itemList = $connection->createCommand($sql)->queryAll();
		return $this->render('torgovaya', [
			'itemList' => $itemList,
			'areaMin' => $this->areaMin,
			'areaMax' => $this->areaMax,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'class1' => $this->class1,
			'class2' => $this->class2,
			'class3' => $this->class3,
			'class4' => $this->class4,
			'regions' => $this->regions,
			'officeClasses' => $this->officeClasses,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
		]);
	}

	public function actionBiznes($subway = null, $areaMin = null, $areaMax = null, $priceMin = null, $priceMax = null) {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM commerce WHERE CommerceAction = "АРЕНДА" AND CommerceType = "БИЗНЕС"';
		
		$subwayList = Subway::find()->asArray()->all();
		$subwayIndexes = [];
		foreach($subwayList as $item) :
			array_push($subwayIndexes, $item['SubwayIndex']);
		endforeach;
		
		if(in_array($subway, $subwayIndexes)) :
			$this->subway = $subway;
			$str = 'CommerceSubway = ' . $subway;
			array_push($this->strArr, $str);
		endif;
		
		if($str = $this->getFilterString($areaMin, $areaMax, 'CommerceArea', 'area')) :
			array_push($this->strArr, $str);
		endif;
		
		if($str = $this->getFilterString($priceMin, $priceMax, 'CommercePrice', 'price')) :
			array_push($this->strArr, $str);
		endif;
		
		if(count($this->strArr) > 1) {
			$sql .= ' AND ' . implode(' AND ', $this->strArr);
		} elseif(count($this->strArr) == 1) {
			$sql .= ' AND ' . $this->strArr[0];
		}

		$connection = Yii::$app->db;
		$itemList = $connection->createCommand($sql)->queryAll();
		return $this->render('biznes', [
			'itemList' => $itemList,
			'areaMin' => $this->areaMin,
			'areaMax' => $this->areaMax,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'class1' => $this->class1,
			'class2' => $this->class2,
			'class3' => $this->class3,
			'class4' => $this->class4,
			'regions' => $this->regions,
			'officeClasses' => $this->officeClasses,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
		]);
	}

	public function actionPodmoskovie($city = null, $areaMin = null, $areaMax = null, $priceMin = null, $priceMax = null) {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM commerce WHERE CommerceAction = "АРЕНДА" AND CommerceRegionId = 2';
		
		$cityList = City::find()->asArray()->all();
		$cityIndexes = [];
		foreach($cityList as $item) :
			array_push($cityIndexes, $item['CityIndex']);
		endforeach;
		
		if(in_array($city, $cityIndexes)) :
			$this->city = $city;
			$str = 'CommerceCityId = ' . $city;
			array_push($this->strArr, $str);
		endif;
		
		if($str = $this->getFilterString($areaMin, $areaMax, 'CommerceArea', 'area')) :
			array_push($this->strArr, $str);
		endif;
		
		if($str = $this->getFilterString($priceMin, $priceMax, 'CommercePrice', 'price')) :
			array_push($this->strArr, $str);
		endif;
		
		if(count($this->strArr) > 1) {
			$sql .= ' AND ' . implode(' AND ', $this->strArr);
		} elseif(count($this->strArr) == 1) {
			$sql .= ' AND ' . $this->strArr[0];
		}

		$connection = Yii::$app->db;
		$itemList = $connection->createCommand($sql)->queryAll();
		return $this->render('podmoskovie', [
			'itemList' => $itemList,
			'areaMin' => $this->areaMin,
			'areaMax' => $this->areaMax,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'class1' => $this->class1,
			'class2' => $this->class2,
			'class3' => $this->class3,
			'class4' => $this->class4,
			'regions' => $this->regions,
			'officeClasses' => $this->officeClasses,
			'cityList' => $cityList,
			'city' => $this->city,
		]);
	}

	
	
	
}