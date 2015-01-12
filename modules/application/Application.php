<?php
namespace app\modules\application;

use Yii;
use yii\base\Module;

class Application extends Module
{
	public $defaultRoute = 'application';
	
	
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