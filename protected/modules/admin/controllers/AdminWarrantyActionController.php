<?php
class AdminWarrantyActionController extends CAdminController{
    public $column = 'warranty';

    public function actionIndex(){
        $search = new WarrantyAction();
        $criteria=new CDbCriteria;
        $criteria->condition = 1;
        $condition = $_GET;
        list($criteria,$condition,$search) = $search->getCriteriaCondition($criteria,$condition,$search);
        $model=new CActiveDataProvider('WarrantyAction',
            array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>20,
                ),
            )
        );
        $ajax_url = $this->createUrl('setting');
        $ptype = Yii::app()->params['conf']['setting']['ptype'];
        $warranty_data = Warranty::model()->getWarrantyData1();
        $store_data = Store::model()->getStore();
        $this->render("index",array(
            "search"=>$search,
            "condition"=>$condition,
            "pager"=>$model->getPagination(),
            "ajax_url"=>$ajax_url,
            "ptype"=>$ptype,
            "warranty_data"=>$warranty_data,
            "store_data"=>$store_data,
            "model"=>$model->getData()
        ));
    }

    public function actionAdd(){
        $search = new WarrantyAction();
        $id = !empty($_REQUEST['id'])?$_REQUEST['id']:'';
        if(empty($id)){
            $model = new WarrantyAction();
        }else{
            $model = WarrantyAction::model()->getActionData($id);
            $model->acttime = !empty($model->acttime)?date('Y-m-d',$model->acttime):'--';
            $model->warranty->construct_time = !empty($model->warranty->construct_time)?date('Y-m-d',$model->warranty->construct_time):'--';
        }
        if(isset($_POST['WarrantyAction'])){
//            print_r($_POST['WarrantyAction']);exit;
            unset($_POST['warranty']);
            $_POST['WarrantyAction']['constructor'] = $this->FilterXss($_POST['WarrantyAction']['constructor']);
            $_POST['WarrantyAction']['action_no'] = $this->FilterXss($_POST['WarrantyAction']['action_no']);
            $_POST['WarrantyAction']['action'] = $this->FilterXss($_POST['WarrantyAction']['action']);
            $_POST['WarrantyAction']['act_reason'] = $this->FilterXss($_POST['WarrantyAction']['act_reason']);
            $_POST['WarrantyAction']['remark'] = $this->FilterXss($_POST['WarrantyAction']['remark']);
            $_POST['WarrantyAction']['acttime'] = strtotime($_POST['WarrantyAction']['acttime']);
            $_POST['WarrantyAction']['admin_id'] = Yii::app()->user->id;
            $_POST['WarrantyAction']['ctime'] = time();
            $res = WarrantyAction::model()->addWarrantyAction($_POST);
            if($res){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
            }
        }
        $ajax_url = $this->createUrl('setting');
        $ptype = Yii::app()->params['conf']['setting']['ptype'];
        $warranty_data = Warranty::model()->getWarrantyData1();
        $store_data = Store::model()->getStore();
//        if(empty($id)){
//            $provinces = Region::model()->getRegions();
//            $citys = array();
//            $areas = array();
//            $stores = Store::model()->getRelaStores1(null);
//        }else{
//            $provinces = Region::model()->getRegions();
//            $pid = !empty($model->province)?$model->province:'';
//            $cid = !empty($model->city)?$model->city:'';
//            $aid = !empty($model->area)?$model->area:'';
//            $citys = !empty($pid)?Region::model()->getRegions($pid):array();
//            $areas = !empty($cid)?Region::model()->getRegions($cid):array();
//            if(!empty($aid)){
//                $stores = Store::model()->getRelaStores1($aid,'areaid');
//            }elseif(empty($aid)&&!empty($cid)){
//                $stores = Store::model()->getRelaStores1($cid,'cityid');
//            }elseif(empty($aid)&&empty($cid)&&!empty($pid)){
//                $stores = Store::model()->getRelaStores1($pid,'provinceid');
//            }else{
//                $stores = Store::model()->getRelaStores1(null);
//            }
//        }
        $this->render("add",
            array(
                "model"=>$model,
                "search"=>$search,
                "warranty_data"=>$warranty_data,
                "ptype"=>$ptype,
                "store_data"=>$store_data,
                "ajax_url"=>$ajax_url,
            ));
    }

    //品牌删除
    public function actionDelete(){
        $state = false;
        $code = 0;
        $message= '质保操作记录删除错误';
        if(Yii::app ()->request->isPostRequest){
            $id = !empty($_POST['warrantyact_id'])?$_POST['warrantyact_id']:array();
            if(empty($id) || $id === array()){
                echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
                Yii::app ()->end ();
            }
            if(WarrantyAction::model()->deleteAll('id in (' . implode(',', $id) . ')')){
                $state = true;
                $code = 3;
                $message = '质保操作记录删除成功';
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
        if($ct == "warrantyaction" && $ac == "delete"){
            $this->__delete();
        }elseif($ct == "warrantyaction" && $ac == "getwarranty"){
            $this->__getwarranty();
        }else{
            echo CJSON::encode(CUtils::retCode(false, 0, '参数错误'));
            Yii::app ()->end ();
        }
    }

    private function __getwarranty(){
        $state = false;
        $code = 0;
        $message= '质保产品获取错误';
        $id = Yii::app()->request->getParam('id', null);
        if(!empty($id)){
            $model = Warranty::model()->getWarrantyDataByPk($id,false);
            if(!empty($model)){
                $store = !empty($model->store)?$model->store->name:'';
                $data = CJSON::decode(CJSON::encode($model),true);
                $data['store'] = $store;
                $data['construct_time'] = date('Y-m-d',$data['construct_time']);
                $state = true;
                $code = 2;
                $message = json_encode($data);
            }
        }
        echo CJSON::encode(CUtils::retMessage($state, $code, $message));
        Yii::app ()->end ();
    }
}