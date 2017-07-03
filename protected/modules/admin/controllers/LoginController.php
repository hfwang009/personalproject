<?php
/**
 *
 *
 * @author jgenius
 *
 */
class LoginController extends Controller {

    public function init(){
        $this->layout='//';
    }
    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'height'=>50,
                'width'=>160,
                'foreColor' => 0x55FF00,
                'minLength' => 4,
                'maxLength' => 4,
                'offset'=>2,
                'padding'=>1,
                'transparent' => true,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if($error=Yii::app()->errorHandler->error) {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the login page
     */
    public function actionIndex() {
        $model = new LoginForm();
        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        //如果用户已经登录直接跳转到默认页面
        if(!Yii::app()->user->isGuest){
            $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.'AdminSettingPanel/index'));
        }
        // collect user input data
        if(isset($_POST['LoginForm'])) {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login())
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.'AdminSettingPanel/index'));
        }
        $this->render('index',array('model'=>$model));
    }
    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        $uid = Yii::app()->user->id;
        $privilieges = RedisInit::getInstance()->get('carprojectadmin:privilieges:'.$uid,true);
        if($privilieges!==false){
            RedisInit::getInstance()->del('carprojectadmin:privilieges:'.$uid);
        }
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.'login/index'));
    }
}
