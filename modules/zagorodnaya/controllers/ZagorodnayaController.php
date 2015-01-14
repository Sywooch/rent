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
			'destinationTitle' => 'Алтуфьевское шоссе'
		],
		'3' => [
			'destinationTitle' => 'Алтуфьевское шоссе'
		],
		'4' => [
			'destinationTitle' => 'Алтуфьевское шоссе'
		],
		'5' => [
			'destinationTitle' => 'Алтуфьевское шоссе'
		],
		'6' => [
			'destinationTitle' => 'Алтуфьевское шоссе'
		],
		'7' => [
			'destinationTitle' => 'Алтуфьевское шоссе'
		],
		'8' => [
			'destinationTitle' => 'Алтуфьевское шоссе'
		],
		'9' => [
			'destinationTitle' => 'Алтуфьевское шоссе'
		],
		'10' => [
			'destinationTitle' => 'Алтуфьевское шоссе'
		],
	];
	
	public function getFilterString($min, $max, $field, $type) {
		if(is_numeric($min)) :
			$this->{$type . 'Min'} = (int)$min;
			$str = $type . ' >= ' . $this->{$type . 'Min'};
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
			'flatList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'areaMin' => $this->areaMin,
			'areaMax' => $this->areaMax,
			'plotareaMin' => $this->plotareaMin,
			'plotareaMax' => $this->plotareaMax,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'distanceMin' => $this->distanceMin,
			'distanceMax' => $this->distanceMax,
			'direction' => $this->direction
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
			'flatList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'areaMin' => $this->areaMin,
			'areaMax' => $this->areaMax,
			'plotareaMin' => $this->plotareaMin,
			'plotareaMax' => $this->plotareaMax,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'distanceMin' => $this->distanceMin,
			'distanceMax' => $this->distanceMax,
			'direction' => $this->direction
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
		
		return $this->render('index', [
			'flatList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'areaMin' => $this->areaMin,
			'areaMax' => $this->areaMax,
			'plotareaMin' => $this->plotareaMin,
			'plotareaMax' => $this->plotareaMax,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'distanceMin' => $this->distanceMin,
			'distanceMax' => $this->distanceMax,
			'direction' => $this->direction
		]);
	}
	
	
}