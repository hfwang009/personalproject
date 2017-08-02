<?php
class ContactController extends Controller{
    public $layout = '/layouts/front';
    public function actionIndex(){
        $messageModel = new Message();
        $recruits = Recruit::model()->getRecurites();
        //$this->opertmize_seo('联系我们','联系我们');
        $this->render('index',array(
            'recruits'=>$recruits,
            'messageModel'=>$messageModel
        ));
    }

    public function actionAdd(){
        if(isset($_POST['Message'])){
            if(empty($_POST['Message']['authcode'])){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
            }else{
                $result = CUtils::validVerify($_POST['Message']['telephone'],$_POST['Message']['authcode'],'auth');
                if($result['status']!=true){
                    $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
                }
            }
//            print_r($_POST['Message']);exit;
            $_POST['Message']['name'] = $this->FilterXss($_POST['Message']['name']);
            $_POST['Message']['telephone'] = $this->FilterXss($_POST['Message']['telephone']);
            $_POST['Message']['address'] = $this->FilterXss($_POST['Message']['address']);
            $_POST['Message']['message'] = $this->FilterXss($_POST['Message']['message']);
            unset($_POST['Message']['authcode']);
            $res = Message::model()->addMessage($_POST);
            if($res){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
            }
        }
    }
}