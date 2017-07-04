<?php
class AdminWarrantyController extends CAdminController{
    public $column = 'warranty';

    public function actionIndex(){
        $search = new Warranty();
        $criteria=new CDbCriteria;
        $criteria->condition = 1;
        $search->status='';
        $condition = $_GET;
        list($criteria,$condition,$search) = $search->getCriteriaCondition($criteria,$condition,$search);
        $model=new CActiveDataProvider('Warranty',
            array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>20,
                ),
            )
        );
        $ajax_url = $this->createUrl('setting');
        $models_data= Models::model()->getModelData();
        $product_data= Product::model()->getProductData3();
        $result = $model->getData();
        $result = $this->__formatData($result,$models_data,$product_data);
        $this->render("index",array(
            "search"=>$search,
            "condition"=>$condition,
            "models_data"=>$models_data,
            "product_data"=>$product_data,
            "pager"=>$model->getPagination(),
            "ajax_url"=>$ajax_url,
            "model"=>$result
        ));
    }

    public function actionAdd(){
        $search = new Warranty();
        $id = !empty($_REQUEST['id'])?$_REQUEST['id']:'';
        if(!empty($id)){
            $model = Warranty::model()->findByPk($id);
//            $model->num = WarrantyDetail::model()->find('wid="'.$id.'"')->num;
            $model['construct_time'] = date('Y-m-d', $model['construct_time']);
        }else{
            $model = new Warranty();
        }
        $_products = !empty($model['extension'])?unserialize(base64_decode($model['extension'])):array();
        if(isset($_POST['Warranty'])){
//            print_r($_POST);exit;
            $products = $_POST['product'];
            if(empty($products)){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
            }else{
                $pids = array();
                $mids = array();
                $warrantytimes = array();
                foreach($products as $product){
                    if(empty($product['pid'])||empty($product['mid'])||empty($product['type'])||empty($product['num'])||empty($product['warrantytime'])){
                        $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
                        break;
                    }else{
                        $pids[] = $product['pid'];
                        $mids[] = $product['mid'];
                        $warrantytimes[] = $product['warrantytime'];
                    }
                }
            }
            $_POST['Warranty']['mid'] = !empty($mids)?implode(',',$mids):'';
            $_POST['Warranty']['pid'] = !empty($pids)?implode(',',$pids):'';
            $_POST['Warranty']['warrantytime'] = !empty($warrantytimes)?implode(',',$warrantytimes):'';
            $_POST['Warranty']['extension'] = base64_encode(serialize($products));
            $_POST['Warranty']['name'] = $this->FilterXss(strval($_POST['Warranty']['name']));
            $_POST['Warranty']['telephone'] = $this->FilterXss(strval($_POST['Warranty']['telephone']));
            $_POST['Warranty']['address'] = $this->FilterXss(strval($_POST['Warranty']['address']));
            $_POST['Warranty']['carlicence'] = $this->FilterXss($_POST['Warranty']['carlicence']);
            $_POST['Warranty']['engineno'] = $this->FilterXss($_POST['Warranty']['engineno']);
            $_POST['Warranty']['construct_time'] = strtotime($_POST['Warranty']['construct_time']);
            $_POST['Warranty']['refuse_reason'] = CUtils::formatTxtarea($_POST['Warranty']['refuse_reason']);
            $_POST['Warranty']['create_user'] = Yii::app()->user->id;
            $_POST['Warranty']['is_send'] = $_POST['Warranty']['status']==1?0:$model['status'];
            $res = Warranty::model()->updateWarranty($_POST,$id);
//            var_dump($res);exit;
            if(!empty($res)){
                $warranty = Warranty::model()->findByPk($res);
                $rs = $this->__sendMessage($_POST,$warranty);
                if($rs){
                    $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
                }
            }
        }
        $product= !empty($model['pid'])?Product::model()->getProductData2($model['pid']):array();
        if(!empty($product)){
            list($mname,$brand,$product) = Product::model()->formatData($product);
        }else{
            $mname = '';
            $brand = '';
        }
        $ptypes = Yii::app()->params['conf']['setting']['ptype'];
        $ajax_url = $this->createUrl('setting');
        $models_data= Models::model()->getModelData();
        $product_data= Product::model()->getProductData3();
        $stores= Store::model()->getStore();
        $admin = Admin::model()->findByPk(Yii::app()->user->id);
        $this->render("add",
            array(
                "model"=>$model,
                "search"=>$search,
                "models_data"=>$models_data,
                "product_data"=>$product_data,
                "stores"=>$stores,
                'product'=>$product,
                'mname'=>$mname,
                'brand'=>$brand,
                'admin'=>$admin,
                "ajax_url"=>$ajax_url,
                "ptypes"=>$ptypes,
                "products"=>$_products,
            ));
    }

    //品牌删除
    public function actionDelete(){
        $state = false;
        $code = 0;
        $message= '质保记录删除错误';
        if(Yii::app ()->request->isPostRequest){
            $id = !empty($_POST['warranty_id'])?$_POST['warranty_id']:array();
            if(empty($id) || $id === array()){
                echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
                Yii::app ()->end ();
            }
            $total = count($id);
            $current = 0;
            foreach($id as $v){
                $model = Warranty::model()->findByPk(intval($v));
                if(!empty($model)){
                    list($flag,$_flag) = $this->__removeRelationData($model);
                    if($flag&&$_flag&&$model->delete()){
                        $current+=1;
                    }
                }
            }
            if($total==$current){
                $state = true;
                $code = 3;
                $message = '质保记录删除成功';
            }else{
                $message = '只有部分质保信息被删除，请重新执行删除操作';
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
        if($ct == "warranty" && $ac == "delete"){
            $this->__delete();
        }elseif($ct == "warranty" && $ac == "getmodel"){
            $this->__getmodel();
        }elseif($ct == "warranty" && $ac == "getCheck"){
            $this->__getCheck();
        }elseif($ct == "warranty" && $ac == "checkNum"){
            $this->__checkNum();
        }else{
            echo CJSON::encode(CUtils::retCode(false, 0, '参数错误'));
            Yii::app ()->end ();
        }
    }

    private function __getmodel(){
        $state = false;
        $code = 0;
        $message= '质保产品获取型号错误';
        $href=Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');
        $id = Yii::app()->request->getParam('id', null);
        if(empty($id)){
            echo CJSON::encode ( CUtils::retMessage ( $state, $code, '参数错误' ) );
            Yii::app ()->end ();
        }
        $model = Product::model()->getProductData4($id);
        if(!empty($model)){
            if($model->current_num<=0){
                $message = '该批次的质保产品没有库存了，无法生成质保单！';
            }else{
                $mid = $model->mid;
                list($mname,$brand,$product) = Product::model()->formatData($model);
                $data = array(
                    'mid'=>$mid,
                    'brand'=>$brand,
                    'model'=>$mname,
                    'product'=>$product,
                );
                $state = true;
                $code = 2;
                $message = json_encode($data);
            }
        }else{
            $message = '请确认该序列号是否正确，没有相关产品信息！';
        }
        echo CJSON::encode(CUtils::retMessage($state, $code, $message));
        Yii::app ()->end ();
    }

    private function __getCheck(){
        $state = false;
        $code = 0;
        $message= '文档审核显示错误';
        $html = '';
        $id = filter_var(Yii::app()->request->getParam('id', null),FILTER_VALIDATE_INT);
        if(empty($id)){
            echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
            Yii::app ()->end ();
        }
        $result = Warranty::model()->getWarrantyDataByPk($id);
        if(!empty($result)){
            $html = $this->renderPartial('return',array('result'=>$result,'type'=>'showdetail'),true,true);
            $state = true;
            $message = '文档审核显示成功';
        }
        echo CJSON::encode(CUtils::retMessage($state, $code, $message, $html));
        Yii::app ()->end ();
    }

    private function __checkNum(){
        $state = false;
        $code = 0;
        $message= '检测数量错误';
        $html = '';
        $id = filter_var(Yii::app()->request->getParam('id', null),FILTER_VALIDATE_INT);
        $num = filter_var(Yii::app()->request->getParam('num', null),FILTER_VALIDATE_INT);
        if(empty($id)||empty($num)){
            echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
            Yii::app ()->end ();
        }
        $product = Product::model()->findByPk($id);
        if(!empty($product)&&$num<=$product['total']){
            $state = true;
            $message = '检测数量成功';
        }else{
            $message = '输入数量无法进行质保';
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message, $html));
        Yii::app ()->end ();
    }

    //品牌单个删除
    private function __delete(){
        $state = false;
        $code = 0;
        $message= '质保记录删除错误';
        $href=Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');
        $id = Yii::app()->request->getParam('id', null);
        if(empty($id)){
            echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
            Yii::app ()->end ();
        }
        $model = Warranty::model()->findByPk(intval($id));
        if(!empty($model)){
            list($flag,$_flag) = $this->__removeRelationData($model);
            if($flag&&$_flag&&Warranty::model()->deleteByPk($model['id'])){
                $state = true;
                $code = 2;
                $message = '质保记录删除成功';
            }
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message,$href));
        Yii::app ()->end ();
    }

    private function __formatData($result,$models_data,$product_data){
        if(!empty($result)){
            foreach($result as $key=>&$_model){
                $_mids = !empty($_model['mid'])?explode(',',$_model['mid']):array();
                $_mids = array_unique($_mids);
                $models = array();
                foreach($_mids as $a=>$b){
                    if(isset($models_data[$b])){
                        $models[] = $models_data[$b];
                    }
                }
                $_model['mid'] = !empty($models)?implode(',',$models):'--';

                $_pids = !empty($_model['pid'])?explode(',',$_model['pid']):array();
                $_pids = array_unique($_pids);
                $products = array();
                foreach($_pids as $c=>$d){
                    if(isset($product_data[$d])){
                        $products[] = $product_data[$d];
                    }
                }
                $_model['pid'] = !empty($products)?implode(',',$products):'--';
            }
        }
        return $result;
    }

    private function __removeRelationData($model){
        if(!empty($model['pid'])){
            $flag = false;
            $_flag = false;
            //还原产品数量
            $pids = !empty($model['pid'])?explode(',',$model['pid']):array();
            $pids = array_unique($pids);
            if(!empty($pids)){
                $total = count($pids);
                $count = 0;
                foreach($pids as $pid){
                    $product = Product::model()->findByPk($pid);
                    //删除质保明细记录
                    $warrantyDetails = WarrantyDetail::model()->findAll('wid = "'.$model['id'].'" AND pid = "'.$pid.'"');
                    $num = 0;
                    if(!empty($warrantyDetails)){
                        foreach($warrantyDetails as $warrantyDetail){
                            $num+=$warrantyDetail['num'];
                        }
                    }
                    if($product['current_num']+$num>$product['total']){
                        $message = '数据错误';
                    }else{
                        $product->current_num = $product['current_num']+$num;
                        if($product->save()){
                            $count+=1;
                        }
                    }
                }
                $flag = $total==$count?true:false;
            }
            $_flag = WarrantyDetail::model()->deleteAll('wid="'.$model['id'].'"');
        }else{
            $flag = true;
            $_flag = true;
        }
        return array(
            $flag,
            $_flag
        );
    }

    private function __sendMessage($post,$warranty=false){
        if(!in_array($post['Warranty']['status'],array(0,1,2))){
            return false;
        }
        if($post['Warranty']['status']==1&&empty($warranty)){
            return false;
        }
        if(!empty($warranty)&&$warranty['is_send']==1){
            return true;
        }
        $config = Yii::app()->params['conf']['phone1'];
        switch($post['Warranty']['status']){
            case 1:
                $smsData = array(
                    'phone' => $post['Warranty']['telephone'],
                    'param' => array('name' => $post['Warranty']['name'],'number'=>$warranty['series_number']),
                    'type' => $config['success']['code']
                );
                break;
            case 2:
            case 0:
            $smsData = array(
                'phone' => $post['Warranty']['telephone'],
                'param' => array('name' => $post['Warranty']['name']),
                'type' => $config['fail']['code']
            );
                break;
        }
        $rs = CUtils::sendSms($smsData['phone'], $smsData['param'], $smsData['type']);
        if($rs->result->err_code==0&&$rs->result->success==true){
            //记录发送的短信，记录发送短信的相关状态后台可以补发（需要新增字段来判断是否发送短信）
            $msgid = $rs->request_id;
            $_model = $rs->result->model;
            if($post['Warranty']['status']==1){
                $warranty->is_send = 1;
                $warranty->save();
            }
            return true;
        }
        return false;
    }
}