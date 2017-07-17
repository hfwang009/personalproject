<?php
/**
 *      [超级工作室] (C)2009-2012 柏嘉集团科技有限公司.
 *   软件仅供研究与学习使用，如需商用，请访问www.yituyun.com获得授权
 * 
 */
?>
<?php

class CAdminController extends Controller {
    public $layout='/layouts/admin';
	protected function beforeAction($action) {
		if (Yii::app()->user->isGuest) {
			if ($_SERVER ["HTTP_HOST"] == "127.0.0.1" && ! strpos ( $_SERVER ["REQUEST_URI"], 'site/login' )) {
				$_SESSION ["redirect"] = $_SERVER ["REQUEST_URI"];
			}
			$returnUrl = Yii::app()->request->hostInfo . Yii::app()->request->getUrl();
			$url = Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.'login/index');
			$url .= "?backUrl=" . base64_encode($returnUrl);
			$this->redirect ( $url );
		}else{
            $privilieges = $this->__getAdminRole(Yii::app()->user->id);
            $controller = strtolower($this->getId());
            $action = strtolower($action->id);
//            print_r($action);
//            print_r($controller);exit;
//            print_r($privilieges);exit;
//            var_dump(!isset($privilieges[0]));
//            var_dump(!(isset($privilieges[$controller])&&in_array($action,$privilieges[$controller])));
//            var_dump($controller.'/'.$action!='adminsettingpanel/error'&&$controller.'/'.$action!=$controller.'/setting');exit;
            if(!isset($privilieges[0])&&!(isset($privilieges[$controller])&&in_array($action,$privilieges[$controller]))&&($controller.'/'.$action!='adminsettingpanel/error'&&$controller.'/'.$action!=$controller.'/setting')){
                if(Yii::app()->request->isAjaxRequest){
                    echo CJSON::encode(CUtils::retCode(false, 3, '您没有操作权限！！'));
                    Yii::app ()->end ();
                }else{
                    $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.'adminSettingPanel/error'));
                }
            }else{
                CUtils::addAdminLog($controller,$action,$_REQUEST,Yii::app()->user->id);
            }
        }
		return true;
	}

    private function __getAdminRole($id){
        $privilieges = RedisInit::getInstance()->get('carprojectadmin:privilieges:'.$id,true);
        return $privilieges;
    }
}