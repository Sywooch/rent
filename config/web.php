<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'application',
	'modules' => array(
    	'application' => [
    		'class' => 'app\modules\application\Application',
		],
		'novostroyki' => [
    		'class' => 'app\modules\novostroyki\Novostroyki',
		],
		'vtorichnoe' => [
    		'class' => 'app\modules\vtorichnoe\Vtorichnoe',
		],
		'zagorodnaya' => [
    		'class' => 'app\modules\zagorodnaya\Zagorodnaya',
		],
		'kommercheskaya' => [
    		'class' => 'app\modules\kommercheskaya\Kommercheskaya',
		],
		'twitter' => [
    		'class' => 'app\modules\twitter\Twitter',
		],
		
	),
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'BySWmiwSxFs4zAZ5bq71PP2dstzfRq_H',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        
		'urlManager' => [
			'baseUrl' => '/',
    		'enablePrettyUrl' => true,
    		'showScriptName' => false,
    		'rules' => [
    			'zagorodnaya/arenda_domov' => 'zagorodnaya/zagorodnaya/arenda',
    			'vtorichnoe/prodazha/subway/<id>' => 'vtorichnoe/vtorichnoe/subway',
    			'vtorichnoe/prodazha/department/<id>' => 'vtorichnoe/vtorichnoe/department',
    			'vtorichnoe/prodazha/district/<id>' => 'vtorichnoe/vtorichnoe/district',
    			'vtorichnoe/prodazha/street/<id>' => 'vtorichnoe/vtorichnoe/street',
    			'vtorichnoe/prodazha/podmoskovie/<id>' => 'vtorichnoe/vtorichnoe/podmoskovie',
    			'vtorichnoe/prodazha/kvartiry-moskva' => 'vtorichnoe/vtorichnoe/kvartirymoskva',
    			'vtorichnoe/prodazha/kvartiry-podmoskovie' => 'vtorichnoe/vtorichnoe/kvartirypodmoskovie',
    			'vtorichnoe/prodazha/odnokomnatnye-kvartiry-moskva' => 'vtorichnoe/vtorichnoe/odnokomnatnyekvartirymoskva',
    			'vtorichnoe/prodazha/dvuhkomnatnye-kvartiry-moskva' => 'vtorichnoe/vtorichnoe/dvuhkomnatnyekvartirymoskva',
    			'vtorichnoe/prodazha/trehkomnatnye-kvartiry-moskva' => 'vtorichnoe/vtorichnoe/trehkomnatnyekvartirymoskva',
    			'vtorichnoe/prodazha/chetyrehkomnatnye-kvartiry-moskva' => 'vtorichnoe/vtorichnoe/chetyrehkomnatnyekvartirymoskva',
    			'vtorichnoe/prodazha/odnokomnatnye-kvartiry-podmoskovie' => 'vtorichnoe/vtorichnoe/odnokomnatnyekvartirypodmoskovie',
    			'vtorichnoe/prodazha/dvuhkomnatnye-kvartiry-podmoskovie' => 'vtorichnoe/vtorichnoe/dvuhkomnatnyekvartirypodmoskovie',
    			'vtorichnoe/prodazha/trehkomnatnye-kvartiry-podmoskovie' => 'vtorichnoe/vtorichnoe/trehkomnatnyekvartirypodmoskovie',
    			'vtorichnoe/prodazha/chetyrehkomnatnye-kvartiry-podmoskovie' => 'vtorichnoe/vtorichnoe/chetyrehkomnatnyekvartirypodmoskovie',
    			'vtorichnoe/arenda/kvartiry-moskva' => 'vtorichnoe/arenda/kvartirymoskva',
    			'vtorichnoe/arenda/kvartiry-podmoskovie' => 'vtorichnoe/arenda/kvartirypodmoskovie',
    			'vtorichnoe/prodazha/<action>' => 'vtorichnoe/vtorichnoe/<action>',
    			
    			'kommercheskaya/prodazha/<action>' => 'kommercheskaya/kommercheskaya/<action>',
    			'zagorodnaya/<action>' => 'zagorodnaya/zagorodnaya/<action>',
    			
    		]
		],
		
		'assetManager' => array(
    		'bundles' => array(
    			'yii\web\YiiAsset' => array(
    				'js' => array(),
				),
				'yii\bootstrap\BootstrapPluginAsset' => array(
					'js' => array(),
				),
				'yii\bootstrap\BootstrapAsset' => array(
					//'css' => array()
				),
				'yii\web\JqueryAsset' => array(
					'js' => array(),
				),
				'app\assets\AppAsset' => array(
					//'css' => array(),
				),
			),
		),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    //$config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
