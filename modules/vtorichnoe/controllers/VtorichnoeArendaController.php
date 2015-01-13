<?php
namespace app\modules\vtorichnoe\controllers;

use yii\web\Controller;
use Yii;
use app\models\Flat;

class VtorichnoeArendaController extends Controller
{
	public $enableCsrfValidation = false;
	
	public $rooms = [1, 2, 3, 4, 5, 6, 7, 8, 9];
	
	public $roomNumber = null;
	
	public $areaMin = null;
	public $areaMax = null;
	
	public $priceMin = null;
	public $priceMax = null;
	
	public function actionIndex($roomNumber = null, $areaMin = null, $areaMax = null, $priceMin = null, $priceMax = null) {
		
		
		return $this->render('index', [
			
		]);
	}
	
	
}