<?php
namespace app\modules\kommercheskaya\controllers;

use yii\web\Controller;
use Yii;
use app\models\Flat;

class KommercheskayaController extends Controller
{
	public $enableCsrfValidation = false;
	
	public $rooms = [1, 2, 3, 4, 5, 6, 7, 8, 9];
	
	public $roomNumber = null;
	
	public $areaMin = null;
	public $areaMax = null;
	
	public $priceMin = null;
	public $priceMax = null;
	
	public function actionIndex($roomNumber = null, $areaMin = null, $areaMax = null, $priceMin = null, $priceMax = null) {
		$sql = 'SELECT * FROM flat WHERE FlatSection = "НОВОСТРОЙКИ" AND FlatAction = "ПРОДАЖА"';
		$areaStr = '';
		$priceStr = '';
		$roomStr = '';
		$strArr = [];
		
		if(in_array($roomNumber, $this->rooms)) :
			$this->roomNumber = $roomNumber;
			$roomStr = 'FlatRoomNumber = ' . $roomNumber;
			array_push($strArr, $roomStr);
		endif;
		
		if(is_numeric($areaMin)) :
			$this->areaMin = (int)$areaMin;
			$areaStr = 'FlatArea >= ' . $this->areaMin;
		endif;
		
		if(is_numeric($areaMax)) :
			$this->areaMax = (int)$areaMax;
			$areaStr = 'FlatArea <= ' . $this->areaMax;
		endif;
		
		if(is_numeric($areaMin) && is_numeric($areaMax)) {
			$areaStr = 'FlatArea BETWEEN ' . $this->areaMin . ' AND ' . $this->areaMax;
		}
			
		if(!empty($areaStr)) {
			array_push($strArr, $areaStr);
		}
		
		if(is_numeric($priceMin)) :
			$this->priceMin = (int)$priceMin*1000;
			$priceStr = 'FlatPrice >= ' . $this->priceMin;
		endif;
		
		if(is_numeric($priceMax)) :
			$this->priceMax = (int)$priceMax*1000;
			$priceStr = 'FlatPrice <= ' . $this->priceMax;
		endif;
		
		if(is_numeric($priceMin) && is_numeric($priceMax)) :
			$priceStr = 'FlatPrice BETWEEN ' . $this->priceMin . ' AND ' . $this->priceMax;
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
			'areaMin' => $this->areaMin,
			'areaMax' => $this->areaMax,
			'priceMin' => $this->priceMin,
			'priceMax' => $this->priceMax,
		]);
	}
	
	
}