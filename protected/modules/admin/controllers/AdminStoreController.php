<?php
class AdminStoreController extends CAdminController{
    public $column = 'store';

    public function actionIndex(){
        $search = new Store();
        $provinces = Region::model()->getRegions();
        $criteria=new CDbCriteria;
        $criteria->condition = 1;
        $condition = $_GET;
        $citys = !empty($condition['Store']['provinceid'])?Region::model()->getRegions($condition['Store']['provinceid']):array();
        $_areas = !empty($condition['Store']['cityid'])?Region::model()->getRegions($condition['Store']['cityid']):array();
        list($criteria,$condition,$search) = $search->getCriteriaCondition($criteria,$condition,$search);
        $model=new CActiveDataProvider('Store',
            array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>20,
                ),
            )
        );
        $ajax_url = $this->createUrl('setting');
        $areas= Region::model()->getData();
        $type = Yii::app()->params['conf']['setting']['type'];
        $this->render("index",array(
            "search"=>$search,
            "condition"=>$condition,
            "areas"=>$areas,
            "_areas"=>$_areas,
            "type"=>$type,
            "pager"=>$model->getPagination(),
            "ajax_url"=>$ajax_url,
            "provinces"=>$provinces,
            "citys"=>$citys,
            "model"=>$model->getData()
        ));
    }

    public function actionAdd(){
        $search = new Store();
        $provinces = Region::model()->getRegions();
        $citys = array();
        $areas = array();
        $id = !empty($_REQUEST['id'])?$_REQUEST['id']:'';
        if(empty($id)){
            $model = new Store();
        }else{
            $model = Store::model()->findByPk($id);
            $citys = Region::model()->getRegions($model['provinceid']);
            $areas = Region::model()->getRegions($model['cityid']);
        }
        if(isset($_POST['Store'])){
            $_POST['Store']['name'] = $this->FilterXss($_POST['Store']['name']);
            $_POST['Store']['address'] = $this->FilterXss($_POST['Store']['address']);
            $_POST['Store']['telephone'] = $this->FilterXss($_POST['Store']['telephone']);
            $res = Store::model()->addStore($_POST);
            if($res){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
            }
        }
        $ajax_url = $this->createUrl('setting');

        $type = Yii::app()->params['conf']['setting']['type'];
        $this->render("add",
            array(
                "model"=>$model,
                "search"=>$search,
                "type"=>$type,
                "provinces"=>$provinces,
                "citys"=>$citys,
                "areas"=>$areas,
                "ajax_url"=>$ajax_url,
            ));
    }

    //品牌删除
    public function actionDelete(){
        $state = false;
        $code = 0;
        $message= '门店删除错误';
        if(Yii::app ()->request->isPostRequest){
            $id = !empty($_POST['store_id'])?$_POST['store_id']:array();
            if(empty($id) || $id === array()){
                echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
                Yii::app ()->end ();
            }
            if(Store::model()->deleteAll('id in (' . implode(',', $id) . ')')){
                $state = true;
                $code = 3;
                $message = '门店删除成功';
            }
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message));
        Yii::app ()->end ();
    }

    //ajax 设置
    public function actionSetting(){
        $ct = Yii::app ()->request->getParam ( 'ct', '-1' );
        $ac = Yii::app ()->request->getParam ( 'ac', '-1' );
        if ($ct == "-1" || $ac == "-1") {
            echo CJSON::encode ( CUtils::retCode ( false, 0, '参数错误' ) );
            Yii::app ()->end ();
        }
        if($ct == "provice" && $ac == "delete"){
            $this->__delete();
        }elseif($ct == 'provice' && $ac == 'getcity'){
            $this->__getcity();
        }elseif($ct == 'provice' && $ac == 'getarea'){
            $this->__getarea();
        }else{
            echo CJSON::encode(CUtils::retCode(false, 0, '参数错误'));
            Yii::app ()->end ();
        }
    }

    //品牌单个删除
    private function __delete(){
        $state = false;
        $code = 0;
        $message= '门店删除错误';
        $href=Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');
        $id = Yii::app()->request->getParam('id', null);
        if(empty($id)){
            echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
            Yii::app ()->end ();
        }
        $model = Store::model()->findByPk(intval($id));
        if(!empty($model) && $model->delete()){
            $state = true;
            $code = 2;
            $message = '门店删除成功';
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