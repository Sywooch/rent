<?php
namespace app\modules\zagorodnaya\controllers;

use yii\web\Controller;
use Yii;
use app\models\Flat;

class ZagorodnayaController extends Controller
{
	public $enableCsrfValidation = false;
	
	public $rooms = [1, 2, 3, 4, 5, 6, 7, 8, 9];
	
	public $roomNumber = null;
	
	public $areaMin = null;
	public $areaMax = null;
	
	public $plotareaMin = null;
	public $plotareaMax = null;
	
	public $priceMin = null;
	public $priceMax = null;
	
	public $distanceMin = null;
	public $distanceMax = null;
	
	public $direction = null;
	
	public $strArr = [];
	
	public $destinations = [
		'1' => [
			'destinationTitle' => 'Алтуфьевское шоссе'
		],
		'2' => [
			'destinationTitle' => 'Боровское шоссе'
		],
		'3' => [
			'destinationTitle' => 'Варшавское шоссе'
		],
		'4' => [
			'destinationTitle' => 'Волоколамское шоссе'
		],
		'5' => [
			'destinationTitle' => 'Горьковское шоссе'
		],
		'6' => [
			'destinationTitle' => 'Дмитровское шоссе'
		],
		'7' => [
			'destinationTitle' => 'Егорьевское шоссе'
		],
		'8' => [
			'destinationTitle' => 'Звенигородское шоссе'
		],
		'9' => [
			'destinationTitle' => 'Калужское шоссе'
		],
		'10' => [
			'destinationTitle' => 'Каширское шоссе'
		],
		'11' => [
			'destinationTitle' => 'Киевское шоссе'
		],
		'12' => [
			'destinationTitle' => 'Коровинское шоссе'
		],
		'13' => [
			'destinationTitle' => 'Куркинское шоссе'
		],
		'14' => [
			'destinationTitle' => 'Ленинградское шоссе'
		],
		'15' => [
			'destinationTitle' => 'Минское шоссе'
		],
		'16' => [
			'destinationTitle' => 'Можайское шоссе'
		],
		'17' => [
			'destinationTitle' => 'Нижегородское шоссе'
		],
		'18' => [
			'destinationTitle' => 'Новокаширское шоссе'
		],
		'19' => [
			'destinationTitle' => 'Новорижское шоссе'
		],
		'20' => [
			'destinationTitle' => 'Новорязанское шоссе'
		],
		'21' => [
			'destinationTitle' => 'Носовихинское шоссе'
		],
		'22' => [
			'destinationTitle' => 'Осташковское шоссе'
		],
		'23' => [
			'destinationTitle' => 'Очаковское шоссе'
		],
		'24' => [
			'destinationTitle' => 'Перовское шоссе'
		],
		'25' => [
			'destinationTitle' => 'Путилковское шоссе'
		],
		'26' => [
			'destinationTitle' => 'Пятницкое шоссе'
		],
		'27' => [
			'destinationTitle' => 'Рогачёвское шоссе'
		],
		'28' => [
			'destinationTitle' => 'Рублёво-Успенское шоссе'
		],
		'29' => [
			'destinationTitle' => 'Рублёвское шоссе'
		],
		'30' => [
			'destinationTitle' => 'Рязанское шоссе'
		],
		'31' => [
			'destinationTitle' => 'Симферопольское шоссе'
		],
		'32' => [
			'destinationTitle' => 'Сколковское шоссе'
		],
		'33' => [
			'destinationTitle' => 'Щёлковское шоссе'
		],
		'34' => [
			'destinationTitle' => 'Ярославльское шоссе'
		],
		
		
		
	];
	
	public function getFilterString($min, $max, $field, $type) {
		if(is_numeric($min)) :
			$this->{$type . 'Min'} = (int)$min;
			$str = $field . ' >= ' . $this->{$type . 'Min'};
		endif;
		
		if(is_numeric($max)) :
			$this->{$type . 'Max'} = (int)$max;
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
	
	public function actionIndex($direction = null, $distanceMin = null, $distanceMax = null, $areaMin = null, $areaMax = null, $plotareaMin = null, $plotareaMax = null, $priceMin = null, $priceMax = null) {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM house WHERE HouseAction = "ПРОДАЖА" AND HouseType = "ДОМ"';
		
		if(array_key_exists($direction, $this->destinations)) :
			$this->direction = $direction;
			$destinationStr = 'HouseDirectionId = ' . $direction;
			array_push($this->strArr, $destinationStr);
		endif;
		
		if($str = $this->getFilterString($distanceMin, $distanceMax, 'HouseDistance', 'distance')) :
			array_push($this->strArr, $str);
		endif;
		
		if($str = $this->getFilterString($areaMin, $areaMax, 'HouseArea', 'area')) :
			array_push($this->strArr, $str);
		endif;
		
		if($str = $this->getFilterString($plotareaMin, $plotareaMax, 'HousePlotArea', 'plotarea')) :
			array_push($this->strArr, $str);
		endif;
		
		if($str = $this->getFilterString($priceMin, $priceMax, 'HousePrice', 'price')) :
			array_push($this->strArr, $str);
		endif;
		
		
		
		if(count($this->strArr) > 1) {
			$sql .= ' AND ' . implode(' AND ', $this->strArr);
		} elseif(count($this->strArr) == 1) {
			$sql .= ' AND ' . $this->strArr[0];
		}
		
		$connection = Yii::$app->db;
		$flatList = $connection->createCommand($sql)->queryAll();
		
		return $this->render('index', [
			'itemList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'areaMin' => $this->areaMin,
			'areaMax' => $this->areaMax,
			'plotareaMin' => $this->plotareaMin,
			'plotareaMax' => $this->plotareaMax,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'distanceMin' => $this->distanceMin,
			'distanceMax' => $this->distanceMax,
			'direction' => $this->direction,
			'directions' => $this->destinations
		]);
	}

	public function actionEkonom() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM house WHERE HousePrice <= 700';
		
		$connection = Yii::$app->db;
		$flatList = $connection->createCommand($sql)->queryAll();
		
		return $this->render('ekonom', [
			'itemList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'areaMin' => $this->areaMin,
			'areaMax' => $this->areaMax,
			'plotareaMin' => $this->plotareaMin,
			'plotareaMax' => $this->plotareaMax,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'distanceMin' => $this->distanceMin,
			'distanceMax' => $this->distanceMax,
			'direction' => $this->direction,
			'directions' => $this->destinations
		]);
	}
	
	public function actionMiddle() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM house WHERE HousePrice BETWEEN 700 AND 25000';
		
		$connection = Yii::$app->db;
		$flatList = $connection->createCommand($sql)->queryAll();
		
		return $this->render('middle', [
			'itemList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'areaMin' => $this->areaMin,
			'areaMax' => $this->areaMax,
			'plotareaMin' => $this->plotareaMin,
			'plotareaMax' => $this->plotareaMax,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'distanceMin' => $this->distanceMin,
			'distanceMax' => $this->distanceMax,
			'direction' => $this->direction,
			'directions' => $this->destinations
		]);
	}
	
	public function actionElitnaya() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM house WHERE HousePrice >= 25000';
		
		$connection = Yii::$app->db;
		$flatList = $connection->createCommand($sql)->queryAll();
		
		return $this->render('elitnaya', [
			'itemList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'areaMin' => $this->areaMin,
			'areaMax' => $this->areaMax,
			'plotareaMin' => $this->plotareaMin,
			'plotareaMax' => $this->plotareaMax,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'distanceMin' => $this->distanceMin,
			'distanceMax' => $this->distanceMax,
			'direction' => $this->direction,
			'directions' => $this->destinations
		]);
	}

	public function actionUchastki($direction = null, $distanceMin = null, $distanceMax = null, $plotareaMin = null, $plotareaMax = null, $priceMin = null, $priceMax = null) {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM house WHERE HouseAction = "ПРОДАЖА" AND HouseType = "УЧАСТОК"';
		
		if(array_key_exists($direction, $this->destinations)) :
			$this->direction = $direction;
			$destinationStr = 'HouseDirectionId = ' . $direction;
			array_push($this->strArr, $destinationStr);
		endif;
		
		if($str = $this->getFilterString($distanceMin, $distanceMax, 'HouseDistance', 'distance')) :
			array_push($this->strArr, $str);
		endif;
		
		if($str = $this->getFilterString($plotareaMin, $plotareaMax, 'HousePlotArea', 'plotarea')) :
			array_push($this->strArr, $str);
		endif;
		
		if($str = $this->getFilterString($priceMin, $priceMax, 'HousePrice', 'price')) :
			array_push($this->strArr, $str);
		endif;
		
		 
		
		if(count($this->strArr) > 1) {
			$sql .= ' AND ' . implode(' AND ', $this->strArr);
		} elseif(count($this->strArr) == 1) {
			$sql .= ' AND ' . $this->strArr[0];
		}
		
		$connection = Yii::$app->db;
		$flatList = $connection->createCommand($sql)->queryAll();
		
		return $this->render('uchastki', [
			'itemList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'areaMin' => $this->areaMin,
			'areaMax' => $this->areaMax,
			'plotareaMin' => $this->plotareaMin,
			'plotareaMax' => $this->plotareaMax,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'distanceMin' => $this->distanceMin,
			'distanceMax' => $this->distanceMax,
			'direction' => $this->direction,
			'directions' => $this->destinations
		]);
	}

	public function actionArenda($direction = null, $distanceMin = null, $distanceMax = null, $areaMin = null, $areaMax = null, $plotareaMin = null, $plotareaMax = null, $priceMin = null, $priceMax = null) {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM house WHERE HouseAction = "АРЕНДА" AND HouseType = "ДОМ"';
		
		if(array_key_exists($direction, $this->destinations)) :
			$this->direction = $direction;
			$destinationStr = 'HouseDirectionId = ' . $direction;
			array_push($this->strArr, $destinationStr);
		endif;
		
		if($str = $this->getFilterString($distanceMin, $distanceMax, 'HouseDistance', 'distance')) :
			array_push($this->strArr, $str);
		endif;
		
		if($str = $this->getFilterString($areaMin, $areaMax, 'HouseArea', 'area')) :
			array_push($this->strArr, $str);
		endif;
		
		if($str = $this->getFilterString($plotareaMin, $plotareaMax, 'HousePlotArea', 'plotarea')) :
			array_push($this->strArr, $str);
		endif;
		
		if($str = $this->getFilterString($priceMin, $priceMax, 'HousePrice', 'price')) :
			array_push($this->strArr, $str);
		endif;
		
		 
		
		if(count($this->strArr) > 1) {
			$sql .= ' AND ' . implode(' AND ', $this->strArr);
		} elseif(count($this->strArr) == 1) {
			$sql .= ' AND ' . $this->strArr[0];
		}
		
		$connection = Yii::$app->db;
		$flatList = $connection->createCommand($sql)->queryAll();
		
		return $this->render('arenda', [
			'itemList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'areaMin' => $this->areaMin,
			'areaMax' => $this->areaMax,
			'plotareaMin' => $this->plotareaMin,
			'plotareaMax' => $this->plotareaMax,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'distanceMin' => $this->distanceMin,
			'distanceMax' => $this->distanceMax,
			'direction' => $this->direction,
			'directions' => $this->destinations
		]);
	}
	
	
}