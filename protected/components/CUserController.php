<?php
class CUserController extends Controller {
	
	protected function beforeAction($action) {
		if (Yii::app()->user->isGuest) {
			$returnUrl = Yii::app()->request->hostInfo . Yii::app()->request->getUrl();
			$url = CLOUD_LOGIN_URL;
			$url .= "?backUrl=" . base64_encode($returnUrl);
			$this->redirect ( $url );
		}
        return true;
	}
}