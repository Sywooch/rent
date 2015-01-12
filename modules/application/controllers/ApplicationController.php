<?php
namespace app\modules\application\controllers;

use yii\web\Controller;
use Yii;

class ApplicationController extends Controller
{
	public $enableCsrfValidation = false;
	
	public function actionIndex() {
		return $this->render('index');
	}
	
		
}