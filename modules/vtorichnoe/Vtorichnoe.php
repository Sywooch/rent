<?php
namespace app\modules\vtorichnoe;

use Yii;
use yii\base\Module;

class Vtorichnoe extends Module
{
	public $defaultRoute = 'vtorichnoe';
	
	public $controllerMap = [
		'vtorichnoe' => 'app\modules\vtorichnoe\controllers\VtorichnoeController',
		
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