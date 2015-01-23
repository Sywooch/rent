<?php
namespace app\modules\vtorichnoe\controllers;

use yii\web\Controller;
use Yii;
use app\models\Flat;
use app\models\Subway;
use app\models\Department;
use app\models\District;
use app\models\Street;
use app\models\City;

class VtorichnoeProdazhaController extends Controller
{
	public $enableCsrfValidation = false;
	
	public $rooms = [1, 2, 3, 4, 5, 6, 7, 8, 9];
	
	public $itemList = null;
	
	public $roomNumber = null;
	
	public $priceMin = null;
	public $priceMax = null;
	
	public $flatType = null;
	
	public $subway = null;
	
	public $department = null;
	
	public $district = null;
	
	public $street = null;
	
	public $city = null;
	
	public $pageHeaders = [
		'fm' => 'квартир в Москве', 
		'fmo' => 'квартир в Подмосковье',
		'rm' => 'комнат в Москве',
		'rmo' => 'комнат в Подмосковье',
		'pm' => 'доли в Москве',
		'pmo' => 'доли в Подмосковье',
	];
	
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
	
	public function actionIndex($street = null, $district = null, $department = null, $subway = null, $roomNumber = null, $flatType = null, $priceMin = null, $priceMax = null) {
		header('Content-Type: text/html; charset=utf-8');
		
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА"';
		$typeStr = '';
		$priceStr = '';
		$roomStr = '';
		$strArr = [];
		$pageHeader = 'Продажа квартир и комнат в Москве и Подмосковье';
		
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
		
		$departmentList = Department::find()->asArray()->all();
		$departmentIndexes = [];
		foreach($departmentList as $item) :
			array_push($departmentIndexes, $item['DepartmentIndex']);
		endforeach;
		
		if(in_array($department, $departmentIndexes)) :
			$this->department = $department;
			$str = 'FlatDepartment = ' . $department;
			array_push($strArr, $str);
		endif;
		
		$districtList = District::find()->asArray()->all();
		$districtIndexes = [];
		foreach($districtList as $item) :
			array_push($districtIndexes, $item['DistrictIndex']);
		endforeach;
		
		if(in_array($district, $districtIndexes)) :
			$this->district = $district;
			$str = 'FlatDistrict = ' . $district;
			array_push($strArr, $str);
		endif;
		
		$streetList = Street::find()->asArray()->all();
		$streetIndexes = [];
		foreach($streetList as $item) :
			array_push($streetIndexes, $item['StreetIndex']);
		endforeach;
		
		if(in_array($street, $streetIndexes)) :
			$this->street = $street;
			$str = 'FlatStreet = ' . $street;
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
			$pageHeader = 'Продажа ' . $this->pageHeaders[$flatType];
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
			'itemList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
			'departmentList' => $departmentList,
			'department' => $this->department,
			'districtList' => $districtList,
			'district' => $this->district,
			'streetList' => $streetList,
			'street' => $this->street,
			'pageHeader' => $pageHeader
		]);
	}

	public function actionDepartment($id = null) {
		header('Content-Type: text/html; charset=utf-8');
		
		$subwayList = Subway::find()->orderBy('SubwayTitle')->asArray()->all();
		$departmentList = Department::find()->orderBy('DepartmentTitle')->asArray()->all();
		$districtList = District::find()->orderBy('DistrictTitle')->asArray()->all();
		$streetList = Street::find()->orderBy('StreetTitle')->asArray()->all();
		
		$department = Department::findOne(['DepartmentUrl' => $id]);
		
		if($department) {
			$this->department = $department;
			$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatCity = "МОСКВА" AND FlatDepartment = ' . $department->DepartmentIndex;
			$this->itemList = $this->getItemList($sql);
			$actionName = 'department';
		} else {
			$actionName = 'departmentlist';
		}
		
		return $this->render($actionName, [
			'itemList' => $this->itemList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
			'departmentList' => $departmentList,
			'department' => $this->department,
			'districtList' => $districtList,
			'district' => $this->district,
			'streetList' => $streetList,
			'street' => $this->street,
		]);
	}
	
	public function actionSubway($id = null) {
		header('Content-Type: text/html; charset=utf-8');
		
		$subwayList = Subway::find()->orderBy('SubwayTitle')->asArray()->all();
		$departmentList = Department::find()->orderBy('DepartmentTitle')->asArray()->all();
		$districtList = District::find()->orderBy('DistrictTitle')->asArray()->all();
		$streetList = Street::find()->orderBy('StreetTitle')->asArray()->all();
		
		$subway = Subway::findOne(['SubwayUrl' => $id]);
		
		if($subway) {
			$this->subway = $subway;
			$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatCity = "МОСКВА" AND FlatSubway = ' . $subway->SubwayIndex;
			$this->itemList = $this->getItemList($sql);
			$actionName = 'subway';
		} else {
			$actionName = 'subwaylist';
		}
		
		return $this->render($actionName, [
			'itemList' => $this->itemList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
			'departmentList' => $departmentList,
			'department' => $this->department,
			'districtList' => $districtList,
			'district' => $this->district,
			'streetList' => $streetList,
			'street' => $this->street,
		]);
	}
	
	public function actionDistrict($id = null) {
		header('Content-Type: text/html; charset=utf-8');
		
		$subwayList = Subway::find()->orderBy('SubwayTitle')->asArray()->all();
		$departmentList = Department::find()->orderBy('DepartmentTitle')->asArray()->all();
		$districtList = District::find()->orderBy('DistrictTitle')->asArray()->all();
		$streetList = Street::find()->orderBy('StreetTitle')->asArray()->all();
		
		$district = District::findOne(['DistrictUrl' => $id]);
		
		if($district) {
			$this->district = $district;
			$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatCity = "МОСКВА" AND FlatDistrict = ' . $district->DistrictIndex;
			$this->itemList = $this->getItemList($sql);
			$actionName = 'district';
		} else {
			$actionName = 'districtlist';
		}
		
		return $this->render($actionName, [
			'itemList' => $this->itemList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
			'departmentList' => $departmentList,
			'department' => $this->department,
			'districtList' => $districtList,
			'district' => $this->district,
			'streetList' => $streetList,
			'street' => $this->street,
		]);
	}
	
	public function actionStreet($id = null) {
		header('Content-Type: text/html; charset=utf-8');
		
		$subwayList = Subway::find()->orderBy('SubwayTitle')->asArray()->all();
		$departmentList = Department::find()->orderBy('DepartmentTitle')->asArray()->all();
		$districtList = District::find()->orderBy('DistrictTitle')->asArray()->all();
		$streetList = Street::find()->orderBy('StreetTitle')->asArray()->all();
		
		$street = Street::findOne(['StreetUrl' => $id]);
		
		if($street) {
			$this->street = $street;
			$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatCity = "МОСКВА" AND FlatStreet = ' . $street->StreetIndex;
			$this->itemList = $this->getItemList($sql);
			$actionName = 'street';
		} else {
			$actionName = 'streetlist';
		}
		
		return $this->render($actionName, [
			'itemList' => $this->itemList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
			'departmentList' => $departmentList,
			'department' => $this->department,
			'districtList' => $districtList,
			'district' => $this->district,
			'streetList' => $streetList,
			'street' => $this->street,
		]);
	}

	public function actionPodmoskovie($id = null) {
		header('Content-Type: text/html; charset=utf-8');
		
		$subwayList = Subway::find()->asArray()->all();
		$departmentList = Department::find()->asArray()->all();
		$districtList = District::find()->asArray()->all();
		$streetList = Street::find()->asArray()->all();
		$cityList = City::find()->asArray()->all();
		
		$city = City::findOne(['CityUrl' => $id]);
		
		if($city) {
			$this->city = $city;
			$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КВАРТИРА" AND FlatCityId = ' . $city->CityIndex;
			$this->itemList = $this->getItemList($sql);
			$actionName = 'city';
		} else {
			$actionName = 'citylist';
		}
		
		return $this->render($actionName, [
			'itemList' => $this->itemList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
			'departmentList' => $departmentList,
			'department' => $this->department,
			'districtList' => $districtList,
			'district' => $this->district,
			'streetList' => $streetList,
			'street' => $this->street,
			'cityList' => $cityList,
			'city' => $this->city,
		]);
	}

	public function actionKomnaty() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КОМНАТА"';
		$typeStr = '';
		$priceStr = '';
		$roomStr = '';
		$strArr = [];
		
		$subwayList = Subway::find()->asArray()->all();
		
		$departmentList = Department::find()->asArray()->all();
		$districtList = District::find()->asArray()->all();
		$streetList = Street::find()->asArray()->all();
		
		
		$connection = Yii::$app->db;
		$flatList = $connection->createCommand($sql)->queryAll();
		
		return $this->render('komnaty', [
			'itemList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
			'departmentList' => $departmentList,
			'department' => $this->department,
			'districtList' => $districtList,
			'district' => $this->district,
			'streetList' => $streetList,
			'street' => $this->street,
		]);
	}
	
	public function actionKvartirymoskva() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КВАРТИРА" AND FlatCity = "МОСКВА"';
		
		$subwayList = Subway::find()->asArray()->all();
		$departmentList = Department::find()->asArray()->all();
		$districtList = District::find()->asArray()->all();
		$streetList = Street::find()->asArray()->all();
		
		$flatList = $this->getItemList($sql);
		
		return $this->render('kvartirymoskva', [
			'itemList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
			'departmentList' => $departmentList,
			'department' => $this->department,
			'districtList' => $districtList,
			'district' => $this->district,
			'streetList' => $streetList,
			'street' => $this->street,
		]);
	}
	
	public function actionKvartirypodmoskovie() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КВАРТИРА" AND NOT FlatCity = "МОСКВА"';
		
		$subwayList = Subway::find()->asArray()->all();
		$departmentList = Department::find()->asArray()->all();
		$districtList = District::find()->asArray()->all();
		$streetList = Street::find()->asArray()->all();
		
		$flatList = $this->getItemList($sql);
		
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
	
	public function actionOdnokomnatnyekvartirymoskva() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КВАРТИРА" AND FlatRoomNumber = 1 AND FlatCity = "МОСКВА"';
		
		$subwayList = Subway::find()->asArray()->all();
		$departmentList = Department::find()->asArray()->all();
		$districtList = District::find()->asArray()->all();
		$streetList = Street::find()->asArray()->all();
		
		$flatList = $this->getItemList($sql);
		
		return $this->render('odnakomnatamoskva', [
			'itemList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
			'departmentList' => $departmentList,
			'department' => $this->department,
			'districtList' => $districtList,
			'district' => $this->district,
			'streetList' => $streetList,
			'street' => $this->street,
		]);
	}
	
	public function actionDvuhkomnatnyekvartirymoskva() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КВАРТИРА" AND FlatRoomNumber = 2 AND FlatCity = "МОСКВА"';
		
		$subwayList = Subway::find()->asArray()->all();
		$departmentList = Department::find()->asArray()->all();
		$districtList = District::find()->asArray()->all();
		$streetList = Street::find()->asArray()->all();
		
		$flatList = $this->getItemList($sql);
		
		return $this->render('dvekomnatymoskva', [
			'itemList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
			'departmentList' => $departmentList,
			'department' => $this->department,
			'districtList' => $districtList,
			'district' => $this->district,
			'streetList' => $streetList,
			'street' => $this->street,
		]);
	}
	
	public function actionTrehkomnatnyekvartirymoskva() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КВАРТИРА" AND FlatRoomNumber = 3 AND FlatCity = "МОСКВА"';
		
		$subwayList = Subway::find()->asArray()->all();
		$departmentList = Department::find()->asArray()->all();
		$districtList = District::find()->asArray()->all();
		$streetList = Street::find()->asArray()->all();
		
		$flatList = $this->getItemList($sql);
		
		return $this->render('trikomnatymoskva', [
			'itemList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
			'departmentList' => $departmentList,
			'department' => $this->department,
			'districtList' => $districtList,
			'district' => $this->district,
			'streetList' => $streetList,
			'street' => $this->street,
		]);
	}
	
	public function actionChetyrehkomnatnyekvartirymoskva() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КВАРТИРА" AND FlatRoomNumber >= 4 AND FlatCity = "МОСКВА"';
		
		$subwayList = Subway::find()->asArray()->all();
		$departmentList = Department::find()->asArray()->all();
		$districtList = District::find()->asArray()->all();
		$streetList = Street::find()->asArray()->all();
		
		$flatList = $this->getItemList($sql);
		
		return $this->render('chetyrekomnatymoskva', [
			'itemList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
			'departmentList' => $departmentList,
			'department' => $this->department,
			'districtList' => $districtList,
			'district' => $this->district,
			'streetList' => $streetList,
			'street' => $this->street,
		]);
	}

	public function actionOdnokomnatnyekvartirypodmoskovie() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КВАРТИРА" AND FlatRoomNumber = 1 AND NOT FlatCity = "МОСКВА"';
		
		$subwayList = Subway::find()->asArray()->all();
		$departmentList = Department::find()->asArray()->all();
		$districtList = District::find()->asArray()->all();
		$streetList = Street::find()->asArray()->all();
		
		$flatList = $this->getItemList($sql);
		
		return $this->render('odnakomnatapodmoskovie', [
			'itemList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
			'departmentList' => $departmentList,
			'department' => $this->department,
			'districtList' => $districtList,
			'district' => $this->district,
			'streetList' => $streetList,
			'street' => $this->street,
		]);
	}
	
	public function actionDvuhkomnatnyekvartirypodmoskovie() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КВАРТИРА" AND FlatRoomNumber = 2 AND NOT FlatCity = "МОСКВА"';
		
		$subwayList = Subway::find()->asArray()->all();
		$departmentList = Department::find()->asArray()->all();
		$districtList = District::find()->asArray()->all();
		$streetList = Street::find()->asArray()->all();
		
		$flatList = $this->getItemList($sql);
		
		return $this->render('dvekomnatypodmoskovie', [
			'itemList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
			'departmentList' => $departmentList,
			'department' => $this->department,
			'districtList' => $districtList,
			'district' => $this->district,
			'streetList' => $streetList,
			'street' => $this->street,
		]);
	}
	
	public function actionTrehkomnatnyekvartirypodmoskovie() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КВАРТИРА" AND FlatRoomNumber = 3 AND NOT FlatCity = "МОСКВА"';
		
		$subwayList = Subway::find()->asArray()->all();
		$departmentList = Department::find()->asArray()->all();
		$districtList = District::find()->asArray()->all();
		$streetList = Street::find()->asArray()->all();
		
		$flatList = $this->getItemList($sql);
		
		return $this->render('trikomnatypodmoskovie', [
			'itemList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
			'departmentList' => $departmentList,
			'department' => $this->department,
			'districtList' => $districtList,
			'district' => $this->district,
			'streetList' => $streetList,
			'street' => $this->street,
		]);
	}
	
	public function actionChetyrehkomnatnyekvartirypodmoskovie() {
		header('Content-Type: text/html; charset=utf-8');
		$sql = 'SELECT * FROM flat WHERE FlatSection = "ВТОРИЧНОЕ" AND FlatAction = "ПРОДАЖА" AND FlatType = "КВАРТИРА" AND FlatRoomNumber >= 4 AND NOT FlatCity = "МОСКВА"';
		
		$subwayList = Subway::find()->asArray()->all();
		$departmentList = Department::find()->asArray()->all();
		$districtList = District::find()->asArray()->all();
		$streetList = Street::find()->asArray()->all();
		
		$flatList = $this->getItemList($sql);
		
		return $this->render('chetyrekomnatypodmoskovie', [
			'itemList' => $flatList,
			'roomNumber' => $this->roomNumber,
			'flatType' => $this->flatType,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
			'subwayList' => $subwayList,
			'subway' => $this->subway,
			'departmentList' => $departmentList,
			'department' => $this->department,
			'districtList' => $districtList,
			'district' => $this->district,
			'streetList' => $streetList,
			'street' => $this->street,
		]);
	}
	
	public function getItemList($sql) {
		$connection = Yii::$app->db;
		return $connection->createCommand($sql)->queryAll();
	}
	
	
	
	
}