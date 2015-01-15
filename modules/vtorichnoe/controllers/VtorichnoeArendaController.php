<?php
namespace app\modules\vtorichnoe\controllers;

use yii\web\Controller;
use Yii;
use app\models\Flat;
use app\models\Subway;

class VtorichnoeArendaController extends Controller
{
	public $enableCsrfValidation = false;
	
	public $rooms = [1, 2, 3, 4, 5, 6, 7, 8, 9];
	
	public $roomNumber = null;
	
	public $priceMin = null;
	public $priceMax = null;
	
	public $flatType = null;
	
	public $subway = null;
	
	public $flatTypes = [
		'fm' => [
			'flatType' => 'КВАРТИРА',
			'isMoskow' => true
		],
		'fmo' => [
			'flatType' => 'КВАРТИРА',
			'isMoskow' => false
		],
		'rm' => [
			'flatType' => 'КОМНАТА',
			'isMoskow' => true
		],
		'rmo' => [
			'flatType' => 'КОМНАТА',
			'isMoskow' => false
		],
		'pm' => [
			'flatType' => 'ДОЛЯ',
			'isMoskow' => true
		],
		'pmo' => [
			'flatType' => 'ДОЛЯ',
			'isMoskow' => false
		]
	];
	
	public function actionIndex($subway = null, $roomNumber = null, $flatType = null, $priceMin = null, $priceMax = null) {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "АРЕНДА"';
		$typeStr = '';
		$priceStr = '';
		$roomStr = '';
		$strArr = [];
		
		$subwayList = Subway::find()->asArray()->all();
		$subwayIndexes = [];
		foreach($subwayList as $item) :
			array_push($subwayIndexes, $item['SubwayIndex']);
		endforeach;
		
		if(in_array($subway, $subwayIndexes)) :
			$this->subway = $subway;
			$str = 'FlatSubway = ' . $subway;
			array_push($strArr, $str);
		endif;
		
		
		if(in_array((int)$roomNumber, $this->rooms)) {
			$this->roomNumber = (int)$roomNumber;
			if($this->roomNumber >= 4) {
				$roomStr = 'FlatRoomNumber >= 4';
			} else {
				$roomStr = 'FlatRoomNumber = ' . $this->roomNumber;
			}
			array_push($strArr, $roomStr);
		}
		
		if(array_key_exists($flatType, $this->flatTypes)) :
			$this->flatType = $flatType;
			$a = $this->flatTypes[$flatType];
			$typeStr = 'FlatType = "' . $a['flatType'] . '"';
			if($a['isMoskow']) {
				$typeStr .= ' AND FlatCity = "МОСКВА"';
			} else {
				$typeStr .= ' AND NOT FlatCity = "МОСКВА"';
			}
			array_push($strArr, $typeStr);
		endif;
		
		if(is_numeric($priceMin)) :
			$this->priceMin = (int)$priceMin;
			$priceStr = 'FlatTotalPrice >= ' . $this->priceMin;
		endif;
		
		if(is_numeric($priceMax)) :
			$this->priceMax = (int)$priceMax;
			$priceStr = 'FlatTotalPrice <= ' . $this->priceMax;
		endif;
		
		if(is_numeric($priceMin) && is_numeric($priceMax)) :
			$priceStr = 'FlatTotalPrice BETWEEN ' . $this->priceMin . ' AND ' . $this->priceMax;
		endif;
		
		if(!empty($priceStr)) {
			array_push($strArr, $priceStr);
		}
		
		if(count($strArr) > 1) {
			$sql .= ' AND ' . implode(' AND ', $strArr);
		} elseif(count($strArr) == 1) {
			$sql .= ' AND ' . $strArr[0];
		}
		
		
		
		$connection = Yii::$app->db;
		$flatList = $connection->createCommand($sql)->queryAll();
		
		return $this->render('index', [
			'itemList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'subwayList' => $subwayList,
			'subway' => $this->subway
		]);
	}

	public function actionKvartirymoskva() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "АРЕНДА" AND FlatType = "КВАРТИРА" AND FlatCity = "МОСКВА"';
		
		$subwayList = Subway::find()->asArray()->all();
		
		$flatList = $this->getFlatList($sql);
		
		return $this->render('kvartirymoskva', [
			'itemList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'subwayList' => $subwayList,
			'subway' => $this->subway
		]);
	}
	
	public function actionKvartirypodmoskovie() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "АРЕНДА" AND FlatType = "КВАРТИРА" AND NOT FlatCity = "МОСКВА"';
		
		$subwayList = Subway::find()->asArray()->all();
		
		$flatList = $this->getFlatList($sql);
		
		return $this->render('kvartirypodmoskovie', [
			'itemList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'subwayList' => $subwayList,
			'subway' => $this->subway
		]);
	}
	
	public function getFlatList($sql) {
		$connection = Yii::$app->db;
		return $connection->createCommand($sql)->queryAll();
	}
	
	
}