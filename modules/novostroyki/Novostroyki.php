<?php
namespace app\modules\novostroyki;

use Yii;
use yii\base\Module;

class Novostroyki extends Module
{
	public $defaultRoute = 'novostroyki';
	
	public $controllerMap = [
		'novostroyki' => 'app\modules\novostroyki\controllers\NovostroykiController',
		'novostroyki-moskva' => 'app\modules\novostroyki\controllers\NovostroykiMoskvaController',
		'novostroyki-podmoskovie' => 'app\modules\novostroyki\controllers\NovostroykiPodmoskovieController',
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