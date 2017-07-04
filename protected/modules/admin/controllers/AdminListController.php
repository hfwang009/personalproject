<?php
class AdminListController extends CAdminController{
    public $column = 'admin';

    //管理员列表
    public function actionIndex(){
        $search = Admin::model();
        $criteria=new CDbCriteria;
        $criteria->condition = 1;
        $condition = $_GET;
        list($criteria,$condition,$search) = $search->getCriteriaCondition($criteria,$condition,$search);
        $model=new CActiveDataProvider('Admin',
            array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>15,
                ),
            )
        );
        $ajax_url = $this->createUrl('setting');
        $this->render('index',array(
            'model' 	=> $model->getData(),
            'pager'   	=> $model->getPagination(),
            'search'	=> $search,
            'condition'	=> $condition,
            'ajax_url'  => $ajax_url
        ));
    }

    public function actionAdd(){
        $search = new Admin();
        $id = !empty($_REQUEST['id'])?$_REQUEST['id']:'';
        if(empty($id)){
            $model = new Admin();
        }else{
            $model = Admin::model()->findByPk($id);
        }
        if(isset($_POST['Admin'])){
            $_POST['Admin']['username'] = $this->FilterXss($_POST['Admin']['username']);
            $res = Admin::model()->addAdmin($_POST);
            if($res){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
            }
        }
        $ajax_url = $this->createUrl('setting');
        $roles = Role::model()->getAllRoles1();
        if(empty($id)){
            $provinces = Region::model()->getRegions();
            $citys = array();
            $areas = array();
        }else{
            $provinces = Region::model()->getRegions();
            $pid = !empty($model->province)?$model->province:'';
            $cid = !empty($model->city)?$model->city:'';
            $citys = !empty($pid)?Region::model()->getRegions($pid):array();
            $areas = !empty($cid)?Region::model()->getRegions($cid):array();
        }
        $this->render("add",
            array(
                "model"=>$model,
                "search"=>$search,
                "roles"=>$roles,
                "provinces"=>$provinces,
                "citys"=>$citys,
                "areas"=>$areas,
                "ajax_url"=>$ajax_url,
            ));
    }

    //管理员编辑密码
    public function actionUpdate($id){
        if(isset($id)){
            $model = Admin::model()->findByPk(intval($id));
        }else{
            throw new CHttpException('404','参数若无');
        }
        $condition = $_GET;
//        print_R($_POST);exit;
        if(isset($_POST["Admin"])){
            //如果密码没有修改
            if(empty($_POST["Admin"]['password']) || empty($_POST["Admin"]['newpassword']) || empty($_POST["Admin"]['confirm_password'])){
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
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
            }
        }
        $model->password = '';
        $ajax_url = $this->createUrl('setting');
        $this->render("update",array(
            'model'=>$model,
            'ajax_url'=>$ajax_url
            )
        );
    }

    //ajax 设置
    public function actionSetting(){
        $ct = Yii::app ()->request->getParam ( 'ct', '-1' );
        $ac = Yii::app ()->request->getParam ( 'ac', '-1' );
        if ($ct == "-1" || $ac == "-1") {
            echo CJSON::encode ( CUtils::retCode ( false, 0, '参数错误' ) );
            Yii::app ()->end ();
        }
        if($ct == "admin" && $ac == "check"){
            $this->__check();
        }elseif($ct == 'provice' && $ac == 'getcity'){
            $this->__getcity();
        }elseif($ct == 'provice' && $ac == 'getarea'){
            $this->__getarea();
        }elseif($ct == "admin" && $ac == "delete"){
            $this->__delete();
        }elseif($ct == "admin" && $ac == "changestatus"){
            $this->__changeStatus();
        }else{
            echo CJSON::encode(CUtils::retCode(false, 0, '参数错误'));
            Yii::app ()->end ();
        }
    }

    private function __delete(){
        $state = false;
        $code = 0;
        $message= '管理员删除错误';
        $href=Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');
        $id = Yii::app()->request->getParam('id', null);
        if(empty($id)){
            echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
            Yii::app ()->end ();
        }
        $model = Admin::model()->findByPk(intval($id));
        if(!empty($model) && $model->delete()){
            $state = true;
            $code = 2;
            $message = '管理员删除成功';
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message,$href));
        Yii::app ()->end ();
    }

    private function __changeStatus(){
        $state = false;
        $code = 0;
        $message= '管理员状态设置错误';
        $href=Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');
        $id = Yii::app()->request->getParam('id', null);
        $status = Yii::app()->request->getParam('status', null);
        if(empty($id)||empty($status)){
            echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
            Yii::app ()->end ();
        }
        $model = Admin::model()->findByPk(intval($id));
        if(!empty($model)){
            $model->status = $status;
            if($model->save()){
                $state = true;
                $code = 2;
                $message = '管理员状态设置成功';
            }
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message,$href));
        Yii::app ()->end ();
    }

    private function __check(){
        $state = false;
        $code = 0;
        $message= '管理员身份验证错误！';
        $href=Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');
        $id = Yii::app()->request->getParam('id', null);
        $password = Yii::app()->request->getParam('password', null);
        if(empty($id)||empty($password)){
            echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
            Yii::app ()->end ();
        }
        $model = Admin::model()->findByPk(intval($id));
        if(!empty($model)){
            if($model->password==md5($password)){
                $state = true;
                $code = 2;
                $message = '管理员身份验证成功，用户存在！';
            }else{
                $message = '原密码错误！';
            }
        }else{
            $message = '管理员身份验证成功，用户不存在！';
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message,$href));
        Yii::app ()->end ();
    }

    private function __getcity(){
        $id = Yii::app()->request->getParam('parent', null);
        if(empty($id)){
            $data = array(
                'citys'=>"<option value=''>-- 请选择  --</option>",
                'areas'=>"<option value=''>-- 请选择  --</option>"
            );
            echo CJSON::encode ( CUtils::retMessage ( true, 0,'', $data ) );
            Yii::app ()->end ();
        }
        $data = Region::model()->getRelaCitys($id,true);
        echo CJSON::encode ( CUtils::retMessage ( true, 0, '', $data ) );
        Yii::app ()->end ();
    }

    private function __getarea(){
        $id = Yii::app()->request->getParam('parent', null);
        if(empty($id)){
            $data = array(
                'citys'=>"<option value=''>-- 请选择  --</option>",
                'areas'=>"<option value=''>-- 请选择  --</option>"
            );
            echo CJSON::encode ( CUtils::retMessage ( true, 0,'', $data ) );
            Yii::app ()->end ();
        }
        $data = Region::model()->getRelaAreas($id,true);
        echo CJSON::encode ( CUtils::retMessage ( true, 0, '', $data ) );
        Yii::app ()->end ();
    }
}