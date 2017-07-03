<?php
// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';
$main=dirname(__FILE__).'/protected/config/main.php';
// remove the following lines when in production mode
define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
//do not run app before register YiiExcel autoload
$app = Yii::createWebApplication($main);
//CUtils::getParamApp();

//Now you can run application
$app->run();