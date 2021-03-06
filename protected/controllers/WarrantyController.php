<?php
class WarrantyController extends Controller{
    public $layout = '/layouts/web';
    public function actionIndex(){
        $model = Warranty::model();
        $this->opertmize_seo('产品质保','质保查询');
        $store = Store::model()->getStore();
        $provinces = Region::model()->getRegions();
        $citys = array();
        $areas = array();
        $ajax_url = $this->createUrl('setting');
        $this->render('index',array(
            'model'=>$model,
            'store'=>$store,
            'provinces'=>$provinces,
            'citys'=>$citys,
            'areas'=>$areas,
            'ajax_url'=>$ajax_url,
        ));
    }

    public function actionAdd(){
//        $model = new Warranty();
        if(Yii::app ()->request->isPostRequest){
            unset($_POST['Warranty']['provinceid']);
            unset($_POST['Warranty']['cityid']);
            unset($_POST['Warranty']['areaid']);
            if(empty($_POST['Warranty']['authcode'])){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->id.'/index'));
            }else{
                $result = CUtils::validVerify($_POST['Warranty']['telephone'],$_POST['Warranty']['authcode'],'auth');
                if($result['status']!=true){
                    $this->redirect(Yii::app()->createUrl(Yii::app()->controller->id.'/index'));
                }
            }
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
                $session = Yii::app()->session->sessionID;
                $flag = md5(md5(sha1($session)));;
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->id.'/success',array('flag'=>$flag)));
            }
        }
        $this->redirect(Yii::app()->createUrl(Yii::app()->controller->id.'/index'));
//        $store = Store::model()->getStore();
//        $provinces = Region::model()->getRegions();
//        $citys = array();
//        $areas = array();
//        $ajax_url = $this->createUrl('setting');
//        $this->opertmize_seo('产品质保','提交质保申请');
//        $this->render('add',array(
//            'model'=>$model,
//            'store'=>$store,
//            'provinces'=>$provinces,
//            'citys'=>$citys,
//            'areas'=>$areas,
//            'ajax_url'=>$ajax_url,
//        ));
    }

    public function actionSuccess(){
        $flag = Yii::app()->request->getParam('flag',null);
        $session = Yii::app()->session->sessionID;
        $session = md5(md5(sha1($session)));
        if(!$flag||$flag!=$session){
            $this->redirect(Yii::app()->createUrl(Yii::app()->controller->id.'/index'));
        }
        $this->opertmize_seo('质保搜索结果','质保搜索结果');
        $this->render('success');
    }

    public function actionSearch(){
        $result = array();
        if(Yii::app()->request->isPostRequest){
            $params = $_POST['Warranty'];
            $carlicence = isset($params['carlicence'])?$params['carlicence']:'';
            if(empty($carlicence)){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->id.'/index'));
            }
            $result = Warranty::model()->getWarrantyByParams($carlicence);
        }else{
            $this->redirect(Yii::app()->createUrl(Yii::app()->controller->id.'/index'));
        }
        $this->opertmize_seo('产品质保','质保搜索');
        if(count($result)==1){
            $this->redirect(Yii::app()->createUrl(Yii::app()->controller->id.'/result',array('id'=>$result[0]['id'])));
        }elseif(count($result)==0){
            $result = array();
        }
        $this->render('search',array(
            'result'=>$result,
            
        ));
    }

    public function actionResult(){
        $id = Yii::app()->request->getParam('id','');
        if(empty($id)){
            $this->redirect(Yii::app()->createUrl(Yii::app()->controller->id.'/index'));
        }
        $result = Warranty::model()->getWarrantyDataByPk($id);
        $this->opertmize_seo('产品质保','质保详情');
        $this->render('detail',array(
            'result'=>$result,
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
        if($ct == "Store" && $ac == "getCity"){
            $this->__getCity();
        }elseif($ct == "Store" && $ac == "getArea"){
            $this->__getArea();
        }elseif($ct == "warranty" && $ac == "sendauthcode"){
            $this->__sendauthcode();
        }elseif($ct == "warranty" && $ac == "checkAuth"){
            $this->__checkAuth();
        }elseif($ct == "warranty" && $ac == "checkWarranty"){
            $this->__checkWarranty();
        }elseif($ct == "warranty" && $ac == "getSore"){
            $this->__getSore();
        }else{
            echo CJSON::encode(CUtils::retCode(false, 0, '参数错误'));
            Yii::app ()->end ();
        }
    }

    private function __getCity(){
        $state = false;
        $code = 0;
        $message = '';
        $html = '';
        if(Yii::app()->request->isPostRequest){
            $province = Yii::app()->request->getParam('province','');
            if(!empty($province)){
                $message = Region::model()->getRelaCityJson($province);
                $html = Region::model()->getRelaCitys($province);;
                if(!empty($message)){
                    $state = true;
                }
            }
        }
        echo CJSON::encode(CUtils::retMessage($state, $code, $message,$html));
        Yii::app ()->end ();
    }

    private function __getArea(){
        $state = false;
        $code = 0;
        $message = '';
        $html = '';
        if(Yii::app()->request->isPostRequest){
            $city = Yii::app()->request->getParam('city','');
            $message = Region::model()->getRelaAreaJson($city);
            $html = Region::model()->getRelaAreas($city);
            if(!empty($message)){
                $state = true;
            }
        }
        echo CJSON::encode(CUtils::retMessage($state, $code, $message,$html));
        Yii::app ()->end ();
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
}