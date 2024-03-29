<?php

class WapModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

        parent::init();//这步是调用main.php里的配置文件
        if (isset($_POST['PHPSESSID'])) {
            $_COOKIE['PHPSESSID'] = $_POST['PHPSESSID'];
        }
		// import the module-level models and components
		$this->setImport(array(
			'wap.models.*',
			'wap.components.*',
		));
        $this->setModules(array());

        //这里重写父类里的组件
        //如有需要还可以参考API添加相应组件
        Yii::app()->setComponents(array(
            'errorHandler'=>array(
                'class'=>'CErrorHandler',
                'errorAction'=>'wap/default/error',
            ),
            'wap'=>array(
                'class'=>'WapWebUser',//后台登录类实
                'stateKeyPrefix'=>'wap',//后台session前缀
                'loginUrl'=>"wap/login",
            ),
        ), false);
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
