<?php
namespace app\modules\zagorodnaya;

use Yii;
use yii\base\Module;

class Zagorodnaya extends Module
{
	public $defaultRoute = 'zagorodnaya';
	
	public $controllerMap = [
		'zagorodnaya' => 'app\modules\zagorodnaya\controllers\ZagorodnayaController',
		
		
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