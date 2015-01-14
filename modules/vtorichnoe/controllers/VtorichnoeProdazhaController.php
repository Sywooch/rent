<?php
namespace app\modules\vtorichnoe\controllers;

use yii\web\Controller;
use Yii;
use app\models\Flat;

class VtorichnoeProdazhaController extends Controller
{
	public $enableCsrfValidation = false;
	
	public $rooms = [1, 2, 3, 4, 5, 6, 7, 8, 9];
	
	public $roomNumber = null;
	
	public $priceMin = null;
	public $priceMax = null;
	
	public $flatType = null;
	
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
	
	public function actionIndex($roomNumber = null, $flatType = null, $priceMin = null, $priceMax = null) {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА"';
		$typeStr = '';
		$priceStr = '';
		$roomStr = '';
		$strArr = [];
		
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
			$this->priceMin = (int)$priceMin*1000000;
			$priceStr = 'FlatTotalPrice >= ' . $this->priceMin;
		endif;
		
		if(is_numeric($priceMax)) :
			$this->priceMax = (int)$priceMax*1000000;
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
			'flatList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
		]);
	}

	public function actionKomnaty() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КОМНАТА"';
		$typeStr = '';
		$priceStr = '';
		$roomStr = '';
		$strArr = [];
		
		$connection = Yii::$app->db;
		$flatList = $connection->createCommand($sql)->queryAll();
		
		return $this->render('index', [
			'flatList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
		]);
	}
	
	public function actionOdnokomnatnyekvartirymoskva() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КВАРТИРА" AND FlatRoomNumber = 1 AND FlatCity = "МОСКВА"';
		
		$flatList = $this->getFlatList($sql);
		
		return $this->render('index', [
			'flatList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
		]);
	}
	
	public function actionDvuhkomnatnyekvartirymoskva() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КВАРТИРА" AND FlatRoomNumber = 2 AND FlatCity = "МОСКВА"';
		
		$flatList = $this->getFlatList($sql);
		
		return $this->render('index', [
			'flatList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
		]);
	}
	
	public function actionTrehkomnatnyekvartirymoskva() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КВАРТИРА" AND FlatRoomNumber = 3 AND FlatCity = "МОСКВА"';
		
		$flatList = $this->getFlatList($sql);
		
		return $this->render('index', [
			'flatList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
		]);
	}
	
	public function actionChetyrehkomnatnyekvartirymoskva() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КВАРТИРА" AND FlatRoomNumber >= 4 AND FlatCity = "МОСКВА"';
		
		$flatList = $this->getFlatList($sql);
		
		return $this->render('index', [
			'flatList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
		]);
	}

	public function actionOdnokomnatnyekvartirypodmoskovie() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КВАРТИРА" AND FlatRoomNumber = 1 AND NOT FlatCity = "МОСКВА"';
		
		$flatList = $this->getFlatList($sql);
		
		return $this->render('index', [
			'flatList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
		]);
	}
	
	public function actionDvuhkomnatnyekvartirypodmoskovie() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КВАРТИРА" AND FlatRoomNumber = 2 AND NOT FlatCity = "МОСКВА"';
		
		$flatList = $this->getFlatList($sql);
		
		return $this->render('index', [
			'flatList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
		]);
	}
	
	public function actionTrehkomnatnyekvartirypodmoskovie() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КВАРТИРА" AND FlatRoomNumber = 3 AND NOT FlatCity = "МОСКВА"';
		
		$flatList = $this->getFlatList($sql);
		
		return $this->render('index', [
			'flatList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
		]);
	}
	
	public function actionChetyrehkomnatnyekvartirypodmoskovie() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КВАРТИРА" AND FlatRoomNumber >= 4 AND NOT FlatCity = "МОСКВА"';
		
		$flatList = $this->getFlatList($sql);
		
		return $this->render('index', [
			'flatList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
		]);
	}
	
	public function getFlatList($sql) {
		$connection = Yii::$app->db;
		return $connection->createCommand($sql)->queryAll();
	}
	
	
}