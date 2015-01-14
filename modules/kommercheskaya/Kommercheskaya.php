<?php
namespace app\modules\kommercheskaya;

use Yii;
use yii\base\Module;

class Kommercheskaya extends Module
{
	public $defaultRoute = 'kommercheskaya';
	
	public $controllerMap = [
		'kommercheskaya' => 'app\modules\kommercheskaya\controllers\KommercheskayaController',
		
	];
	
	/*
	public function init()
	{
		parent::init();
		$this->setLayoutPath(Yii::$app->basePath . '/views/layouts');
	}
	public function beforeAction($action)
	{
		 if (parent::beforeAction($action)) {
        	$actionName = Yii::$app->controller->action->id;
			if($actionName == 'adminlogin')
			{
				$this->layout = 'admin_login_layout';
			}
        	return true;  // or false if needed
    		}
		 else {
        	return false;
    	}
	}
	 * 
	 * 
	 */
}