<?php
class WarrantyController extends Controller{
    public $layout = '/layouts/front';
    public function actionIndex(){
        $model = Warranty::model();
        $ajax_url = $this->createUrl('setting');
        $this->opertmize_seo('质保搜索','质保搜索');
        $this->render('index',array(
            'model'=>$model,
            'news'=>$this->news,
            'ajax_url'=>$ajax_url,
        ));
    }

    public function actionAdd(){
        $model = new Warranty();
        if(Yii::app ()->request->isPostRequest){
            if(empty($_POST['Warranty']['authcode'])){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
            }else{
                $result = CUtils::validVerify($_POST['Warranty']['telephone'],$_POST['Warranty']['authcode'],'auth');
                if($result['status']!=true){
                    $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
                }
            }
            unset($_POST['Warranty']['provinceid']);
            unset($_POST['Warranty']['cityid']);
            unset($_POST['Warranty']['areaid']);
            unset($_POST['Warranty']['authcode']);
            $_POST['Warranty']['name'] = $this->FilterXss(strval($_POST['Warranty']['name']));
            $_POST['Warranty']['telephone'] = $this->FilterXss(strval($_POST['Warranty']['telephone']));
            $_POST['Warranty']['address'] = $this->FilterXss(strval($_POST['Warranty']['address']));
//            $_POST['Warranty']['carlicence'] = $this->FilterXss($_POST['Warranty']['carlicence']);
            $_POST['Warranty']['carmodel'] = $this->FilterXss($_POST['Warranty']['carmodel']);
            $_POST['Warranty']['engineno'] = $this->FilterXss($_POST['Warranty']['engineno']);
            $_POST['Warranty']['construct_time'] = strtotime($_POST['Warranty']['construct_time']);
            $res = Warranty::model()->addWarranty($_POST);
            if($res){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/success'));
            }
        }
        $store = Store::model()->getStore();
        $provinces = Region::model()->getRegions();
        $citys = array();
        $areas = array();
        $ajax_url = $this->createUrl('setting');
        $this->opertmize_seo('提交质保信息申请','提交质保信息申请');
        $this->render('add',array(
            'model'=>$model,
            'store'=>$store,
            'provinces'=>$provinces,
            'citys'=>$citys,
            'areas'=>$areas,
            'news'=>$this->news,
            'ajax_url'=>$ajax_url,
        ));
    }

    public function actionSuccess(){
        $this->opertmize_seo('质保搜索结果','质保搜索结果');
        $this->render('success');
    }

    public function actionSearch(){
        $result = array();
        if(Yii::app()->request->isPostRequest){
            $params = $_POST['Warranty'];
            $carlicence = isset($params['carlicence'])?$params['carlicence']:'';
            if(empty($carlicence)){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
            }
            $result = Warranty::model()->getWarrantyByParams($carlicence);
        }else{
            $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
        }
        $this->opertmize_seo('质保搜索结果','质保搜索结果');
        if(count($result)==1){
            $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/result',array('id'=>$result[0]['id'])));
        }elseif(count($result)==0){
            $result = array();
        }
        $this->render('search',array(
            'result'=>$result,
            'news'=>$this->news,
        ));
    }

    public function actionResult(){
        $id = Yii::app()->request->getParam('id','');
        if(empty($id)){
            $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
        }
        $result = Warranty::model()->getWarrantyDataByPk($id);
        $this->opertmize_seo('质保结果','质保结果');
        $this->render('result',array(
            'result'=>$result,
            'news'=>$this->news,
        ));
    }

    //ajax 设置
    public function actionSetting(){
        $ct = Yii::app ()->request->getParam ( 'ct', '-1' );
        $ac = Yii::app ()->request->getParam ( 'ac', '-1' );
        if ($ct == "-1" || $ac == "-1") {
            echo CJSON::encode ( CUtils::retCode ( false, 0, '参数错误' ) );
            Yii::app ()->end ();
        }
        if($ct == "warranty" && $ac == "getSore"){
            $this->__getSore();
        }elseif($ct == "warranty" && $ac == "checkWarranty"){
            $this->__checkWarranty();
        }elseif($ct == "warranty" && $ac == "sendauthcode"){
            $this->__sendauthcode();
        }elseif($ct == "warranty" && $ac == "checkAuth"){
            $this->__checkAuth();
        }else{
            echo CJSON::encode(CUtils::retCode(false, 0, '参数错误'));
            Yii::app ()->end ();
        }
    }

    private function __getSore(){
        $state = false;
        $code = 0;
        $message = '';
        $html = '';
        if(Yii::app()->request->isPostRequest){
            $province = Yii::app()->request->getParam('province','');
            $city = Yii::app()->request->getParam('city','');
            $area = Yii::app()->request->getParam('area','');
            $stores = Store::model()->getStoresByParams(null,$province,$city,$area);
            $message = "";
            if(!empty($stores)){
                foreach ($stores as $_data){
                    $message .= CHtml::tag('option', array('value'=>$_data['id']),CHtml::encode($_data['name']),true);
                }
            }
            $state = true;
        }
        echo CJSON::encode(CUtils::retMessage($state, $code, $message,$html));
        Yii::app ()->end ();
    }

    private function __checkWarranty(){
        $state = false;
        $code = 0;
        $message = '质保检查错误';
        $html = '';
        if(Yii::app()->request->isPostRequest){
            $name = Yii::app()->request->getParam('name','');
            $telephone = Yii::app()->request->getParam('telephone','');
            $carmodel = Yii::app()->request->getParam('carmodel','');
            $engineno = Yii::app()->request->getParam('engineno','');
            $flag = Warranty::model()->checkWarranty($name,$telephone,$carmodel,$engineno);
            if($flag){
                $state = true;
            }else{
                $message = '您已经提交了质保申请，在一周之内无法再次提交质保申请！';
            }
        }
        echo CJSON::encode(CUtils::retMessage($state, $code, $message,$html));
        Yii::app ()->end ();
    }

    private function __checkAuth(){
        $state = false;
        $code = 0;
        $message = '检测验证码错误';
        $html = '';
        if(Yii::app()->request->isPostRequest){
            $authcode = Yii::app()->request->getParam('authcode','');
            $telephone = Yii::app()->request->getParam('telephone','');
            $result = CUtils::validVerify($telephone,$authcode,'auth');
            if($result['status']){
                $state = true;
            }else{
                $message = $result['msg'];
            }
        }
        echo CJSON::encode(CUtils::retMessage($state, $code, $message,$html));
        Yii::app ()->end ();
    }

    private function __sendauthcode(){
        $state = false;
        $code = 0;
        $message = '发送验证码错误';
        $html = '';
        if(Yii::app()->request->isPostRequest){
            $telephone = Yii::app()->request->getParam('telephone','');
            if(empty($telephone)){
                $message = '请输入手机号！';
            }elseif(!$this->judgePhone($telephone)){
                $message = '手机号码不合法！';
            }else{
                $post['Warranty']['phone'] = $telephone;
                $message_arr = CUtils::sendSnsMsg($post);
                $state=$message_arr['status'];
                $message=$message_arr['msg'];
            }
        }

        echo CJSON::encode(CUtils::retMessage($state, $code, $message,$html));
        Yii::app ()->end ();
    }


    public function actionTest(){
        //当前ip地址
        $currentIP = CUtils::getIp();
//        $currentIP = '220.181.16.102';
//        $currentIP = '218.28.191.50';
//        $currentIP = '1.85.223.140';
        //通过当前ip获取信息
        $getLocation = CUtils::getLocation($currentIP);
        var_dump($getLocation);
        $res = json_decode($getLocation,true);
        print_r($res);
        list($pcountry,$pcity,$pprovince) = CUtils::getPyName($res);
        print_r($pcountry);
        print_r($pcity);
        print_r($pprovince);
    }


    public function actionTest1(){
        $ip = CUtils::getUserIp();
//        $ip1 = CUtils::getUserIp1();
//        $ip = '220.181.16.102';
//        $ip = '218.28.191.50';
//        $ip = '1.85.223.140';
        list($country,$area) = CUtils::getAddressData($ip);
        var_dump($country,$area);
    }


}