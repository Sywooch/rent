<?php
namespace app\modules\application\controllers;

use yii\web\Controller;
use Yii;

class ApplicationController extends Controller
{
	public $enableCsrfValidation = true;
	
	public function actionIndex() {
		return $this->render('index');
	}
	
	public function actionCheck() {
		$request = Yii::$app->request;
		if($request->isPost) {
			$response = [];
			$response['response'] = $request->method;
			return json_encode(['qqq' => 'ssss']);
		} else {
			echo 'fdfdfdf';die;
		}
	}
	
		
}