<?php
class AdminProductController extends CAdminController{
    public $column = 'warranty';

    public function actionIndex(){
        $search = new Product();
        $criteria=new CDbCriteria;
        $criteria->condition = 1;
        $condition = $_GET;
        list($criteria,$condition,$search) = $search->getCriteriaCondition($criteria,$condition,$search);
        $model=new CActiveDataProvider('Product',
            array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>20,
                ),
            )
        );
        $ajax_url = $this->createUrl('setting');
        $models_data= Models::model()->getModelData();
        $brand_arr = Brand::model()->getBrandData();
        $ptype = Yii::app()->params['conf']['setting']['ptype'];
        $level = Yii::app()->params['conf']['setting']['level'];
        $provinces = Region::model()->getRegions();
        $citys = array();
        $areas = array();
        $stores = Store::model()->getRelaStores1(null);
        $this->render("index",array(
            "search"=>$search,
            "condition"=>$condition,
            "models_data"=>$models_data,
            "ptype"=>$ptype,
            "brand_arr"=>$brand_arr,
            "level"=>$level,
            "pager"=>$model->getPagination(),
            "ajax_url"=>$ajax_url,
            'provinces'=>$provinces,
            'citys'=>$citys,
            'areas'=>$areas,
            'stores'=>$stores,
            "model"=>$model->getData()
        ));
    }

    public function actionAdd(){
        $search = new Product();
        $id = !empty($_REQUEST['id'])?$_REQUEST['id']:'';
        if(empty($id)){
            $model = new Product();
        }else{
            $model = Product::model()->findByPk($id);
        }
        if(isset($_POST['Product'])){
//            print_r($_POST['Product']);exit;
            $_POST['Product']['name'] = $this->FilterXss($_POST['Product']['name']);
            $_POST['Product']['create_user'] = Yii::app()->user->id;
            $res = Product::model()->addProduct($_POST);
            if($res){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
            }
        }
        $ajax_url = $this->createUrl('setting');
        $models_data= Models::model()->getModelData();
        $brand_arr = Brand::model()->getBrandData();
        $ptype = Yii::app()->params['conf']['setting']['ptype'];
        if(empty($id)){
            $provinces = Region::model()->getRegions();
            $citys = array();
            $areas = array();
            $stores = Store::model()->getRelaStores1(null);
        }else{
            $provinces = Region::model()->getRegions();
            $pid = !empty($model->province)?$model->province:'';
            $cid = !empty($model->city)?$model->city:'';
            $aid = !empty($model->area)?$model->area:'';
            $citys = !empty($pid)?Region::model()->getRegions($pid):array();
            $areas = !empty($cid)?Region::model()->getRegions($cid):array();
            if(!empty($aid)){
                $stores = Store::model()->getRelaStores1($aid,'areaid');
            }elseif(empty($aid)&&!empty($cid)){
                $stores = Store::model()->getRelaStores1($cid,'cityid');
            }elseif(empty($aid)&&empty($cid)&&!empty($pid)){
                $stores = Store::model()->getRelaStores1($pid,'provinceid');
            }else{
                $stores = Store::model()->getRelaStores1(null);
            }
        }
        $this->render("add",
            array(
                "model"=>$model,
                "search"=>$search,
                "brand_arr"=>$brand_arr,
                "ptype"=>$ptype,
                "models_data"=>$models_data,
                'provinces'=>$provinces,
                'citys'=>$citys,
                'areas'=>$areas,
                'stores'=>$stores,
                "ajax_url"=>$ajax_url,
            ));
    }

    //品牌删除
    public function actionDelete(){
        $state = false;
        $code = 0;
        $message= '品牌删除错误';
        if(Yii::app ()->request->isPostRequest){
            $id = !empty($_POST['product_id'])?$_POST['product_id']:array();
            if(empty($id) || $id === array()){
                echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
                Yii::app ()->end ();
            }
            $warranty = Warranty::model()->findAll('pid in('.implode(',',$id).')');
            if(!empty($warranty)){
                $message = '选中型号中有相应的产品，请先删除相应的产品再尝试删除型号';
            }else{
                if(Product::model()->deleteAll('id in (' . implode(',', $id) . ')')){
                    $state = true;
                    $code = 3;
                    $message = '品牌删除成功';
                }
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
        if($ct == "product" && $ac == "delete"){
            $this->__delete();
        }elseif($ct == "product" && $ac == "change"){
            $this->__change();
        }elseif($ct == "product" && $ac == "remarkShow"){
            $this->__remarkShow();
        }elseif($ct == "product" && $ac == "addRemark"){
            $this->__addRemark();
        }elseif($ct == 'product' && $ac == 'getcity'){
            $this->__getcity();
        }elseif($ct == 'product' && $ac == 'getarea'){
            $this->__getarea();
        }elseif($ct == 'product' && $ac == 'getstore'){
            $this->__getstore();
        }else{
            echo CJSON::encode(CUtils::retCode(false, 0, '参数错误'));
            Yii::app ()->end ();
        }
    }

    //品牌单个删除
    private function __delete(){
        $state = false;
        $code = 0;
        $message= '产品删除错误';
        $href=Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');
        $id = Yii::app()->request->getParam('id', null);
        if(empty($id)){
            echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
            Yii::app ()->end ();
        }
        $warranty = Warranty::model()->findAll('pid ='.$id);
        if(!empty($warranty)){
            $message = '选中型号中有相应的产品，请先删除相应的产品再尝试删除型号';
        }else{
            $model = Product::model()->findByPk(intval($id));
            if(!empty($model) && $model->delete()){
                $state = true;
                $code = 2;
                $message = '产品删除成功';
            }
        }

        echo CJSON::encode(CUtils::retCode($state, $code, $message,$href));
        Yii::app ()->end ();
    }

    private function __change(){
        $state = false;
        $code = 0;
        $message= '产品数量设置错误';
        $href=Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');
        $id = Yii::app()->request->getParam('id', null);
        $num = Yii::app()->request->getParam('num', null);
        if(empty($id)||empty($num)){
            echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
            Yii::app ()->end ();
        }
        $model = Product::model()->findByPk(intval($id));
        if(!empty($model)){
            $ctotal = $model['total'];
            $ccurrent = $model['current_num'];
            $data = $num-($ctotal-$ccurrent);
            if($data<0){
                $message = '不能设置为该数量';
            }else{
                $state = true;
                $code = 2;
                $message = $data;
            }
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message,$href));
        Yii::app ()->end ();
    }

    private function __remarkShow(){
        $state = false;
        $code = 0;
        $message= '备注显示错误';
        $html = '';
        $id = filter_var(Yii::app()->request->getParam('id', null),FILTER_VALIDATE_INT);
        if(empty($id)){
            echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
            Yii::app ()->end ();
        }
        $product = Product::model()->findByPk($id);
        if(!empty($product)){
            $html = $this->renderPartial('remark',array('id'=>$id,'product'=>$product),true,true);
            $state = true;
            $message = '备注显示成功';
        }
        echo CJSON::encode(CUtils::retMessage($state, $code, $message, $html));
        Yii::app ()->end ();
    }

    private function __addRemark(){
        $state = false;
        $code = 0;
        $message= '添加备注错误';
        $href = Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index');
        $id = filter_var(Yii::app()->request->getParam('id', null),FILTER_VALIDATE_INT);
        $remark = filter_var(Yii::app()->request->getParam('remarks', null),FILTER_SANITIZE_STRING);
        if(empty($id)){
            echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
            Yii::app ()->end ();
        }
        $product = Product::model()->findByPk($id);
        if(!empty($product)){
            $product->remarks = $remark;
            if($product->save()){
                $state = true;
                $message= '添加备注成功';
            }
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message, $href));
        Yii::app ()->end ();
    }

    private function __getcity(){
        $id = Yii::app()->request->getParam('parent', null);
        if(empty($id)){
            $data = array(
                'citys'=>"<option value=''>-- 请选择  --</option>",
                'areas'=>"<option value=''>-- 请选择  --</option>",
                'stores'=>Store::model()->getRelaStores($id,'provinceid',true),
            );
            echo CJSON::encode ( CUtils::retMessage ( true, 0,'', $data ) );
            Yii::app ()->end ();
        }
        $data = Region::model()->getRelaCitys($id,true);
        $data['stores'] = Store::model()->getRelaStores($id,'provinceid',true);
        echo CJSON::encode ( CUtils::retMessage ( true, 0, '', $data ) );
        Yii::app ()->end ();
    }

    private function __getarea(){
        $id = Yii::app()->request->getParam('parent', null);
        $_id = Yii::app()->request->getParam('_parent', null);
        if(empty($id)){
            $data = array(
                'citys'=>"<option value=''>-- 请选择  --</option>",
                'areas'=>"<option value=''>-- 请选择  --</option>",
                'stores'=>!empty($_id)?Store::model()->getRelaStores($_id,'provinceid',true):Store::model()->getRelaStores(null),
            );
            echo CJSON::encode ( CUtils::retMessage ( true, 0,'', $data ) );
            Yii::app ()->end ();
        }
        $data = Region::model()->getRelaAreas($id,true);
        $data['stores'] = Store::model()->getRelaStores($id,'cityid',true);
        echo CJSON::encode ( CUtils::retMessage ( true, 0, '', $data ) );
        Yii::app ()->end ();
    }

    private function __getStore(){
        $id = Yii::app()->request->getParam('parent', null);
        $_id = Yii::app()->request->getParam('_parent', null);
        $__id = Yii::app()->request->getParam('__parent', null);
        if(empty($id)){
            $data = array(
                'citys'=>"<option value=''>-- 请选择  --</option>",
                'areas'=>"<option value=''>-- 请选择  --</option>",
                'stores'=>!empty($_id)?Store::model()->getRelaStores($_id,'cityid',true):(!empty($__id)?Store::model()->getRelaStores($__id,'provinceid',true):Store::model()->getRelaStores(null)),
            );
            echo CJSON::encode ( CUtils::retMessage ( true, 0,'', $data ) );
            Yii::app ()->end ();
        }
//        $data = Region::model()->getRelaAreas($id,true);
        $data['stores'] = Store::model()->getRelaStores($id,'areaid',true);
        echo CJSON::encode ( CUtils::retMessage ( true, 0, '', $data ) );
        Yii::app ()->end ();
    }
}