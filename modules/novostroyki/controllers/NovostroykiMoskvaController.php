<?php
namespace app\modules\novostroyki\controllers;

use yii\web\Controller;
use Yii;

class NovostroykiMoskvaController extends Controller
{
	public $enableCsrfValidation = false;
	
	public function actionIndex() {
		return $this->render('index');
	}
	
	
}