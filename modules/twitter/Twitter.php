<?php
namespace app\modules\twitter;

use Yii;
use yii\base\Module;
use Exception;
use app\components\ApiHandler;
use app\modules\error\controllers\ErrorController;

class Twitter extends Module {
		
	public $defaultRoute = 'twitter';
	
}