<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$conf = array();
$menu = array();

if (file_exists(dirname(__FILE__) . '/config.php')) {
	$conf = require_once(dirname(__FILE__) . '/config.php');
}

if (file_exists(dirname(__FILE__) . '/menu.php'))
	$menu = require_once(dirname(__FILE__) . '/menu.php');

if (file_exists(dirname(__FILE__) . '/redis_config.php'))
    $redis = require_once(dirname(__FILE__) . '/redis_config.php');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'车辆销售系统',
	'language'=>'zn',

	// preloading 'log' component
	'preload'=>array('log'),
	'defaultController' => 'index',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.helpers.*',
		'application.utils.*',
		'application.extensions.*',
	),

	'modules'=>array(
        'api' => array(),
		//uncomment the following to enable the Gii tool
 		'gii'=>array(
 			'class'=>'system.gii.GiiModule',
 			'password'=>'zhangxiaohui',
 			// If removed, Gii defaults to localhost only. Edit carefully to taste.
 			'ipFilters' => array('127.0.0.1','192.168.0.62','192.168.0.108','192.168.0.109', '::1'),
 		),
        'admin'=>array(
            'defaultController' => 'login'
        ),
        'wap'=>array(
            'defaultController' => 'index'
        ),
	),
	'controllerMap'=>array(
			'ueditor'=>array(
					'class'=>'ext.ueditor.UeditorController',
			),
			'superSlide'=>array(
					'class'=>'ext.superSlide.SuperSlideController',
			),
	),
	// application components
	'components'=>array(
		'user'=>array(
				'stateKeyPrefix'=>'user',//这个是设置前台session的前缀
				'allowAutoLogin'=>true,//这里设置允许cookie保存登录信息，一边下次自动登录
		),
		'session'=>array(
				'timeout'=>86400,
		),
		'widgetFactory'=>array(
				'widgets'=>array(
						'CLinkPager'=>array(
								'cssFile'=>(strlen(dirname($_SERVER['SCRIPT_NAME']))>1 ? dirname($_SERVER['SCRIPT_NAME']) : '' ) . '/assets/fronts/css/pager.css',
						),

				),
		),
		'upload'=>array(
			'class'=>'application.extensions.upload.CUploadComponent',
		),
        'sms' => array (
            'class' => 'application.extensions.msg_sdk.mns-autoloader'
        ),

		// uncomment the following to enable URLs in path-format

 		'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName' => false, //去除index.php
            'urlSuffix'=>'.html', //加上.html
 			'rules'=>array(
 				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
 				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
 			),
        ),

		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=carproject',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix'=>'car_',
			'emulatePrepare'=>true,
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'index/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
                array (
                    'class' => 'CFileLogRoute',
                    'levels' => 'trace, info, xdebug',
                    'logFile' => 'pay.log'
                ),
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
                    'logFile' => 'error.log'
				),

				 array(
                    'class' => 'CWebLogRoute',
                    'levels' => 'profile,trace',
                 ),
                 array(
                    'class' => 'CProfileLogRoute',
                    'levels' => 'profile',
                 ),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/

			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'conf'=>$conf,
		'menu'=>$menu,
        'redis'=>$redis
	),
);