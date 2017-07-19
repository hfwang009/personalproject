<?php
class AdminUserController extends CAdminController{
    public function actionUpdatePass($id){
        //管理员编辑密码
        if(isset($id)){
            $model = Admin::model()->findByPk(intval($id));
        }else{
            throw new CHttpException('404','参数错误');
        }
        $condition = $_GET;
//        print_R($_POST);exit;
        if(isset($_POST["Admin"])){
            //如果密码没有修改
            if(empty($_POST["Admin"]['newpassword']) || empty($_POST["Admin"]['confirm_password'])){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/update',array('id'=>$condition['id'])));
            }else{
                if($_POST["Admin"]['newpassword']!==$_POST["Admin"]['confirm_password']){
                    $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/update',array('id'=>$condition['id'])));
                }else{
                    $_POST["Admin"]['password'] = md5($_POST["Admin"]['newpassword']);
                }
            }
            $model->attributes = $_POST["Admin"];
            $model->created = time();
            if($model->save()){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/adminSettingPanel/index'));
            }
        }
        $model->password = '';
        $ajax_url = $this->createUrl('setting');
        $this->render("index",array(
                'model'=>$model,
                'ajax_url'=>$ajax_url
            )
        );
    }
}