<?php
class StoreController extends Controller{
    public $layout = '/layouts/front';

    public function actionIndex(){
        $model = Store::model();
        $provinces = Region::model()->getRegions();
        $citys = array();
        $areas = array();
        $types = Yii::app()->params['conf']['setting']['type'];
        $this->opertmize_seo('门店搜索','门店搜索');
        $ajax_url = $this->createUrl('setting');
        $this->render('index',array(
            'model'=>$model,
            'provinces'=>$provinces,
            'citys'=>$citys,
            'areas'=>$areas,
            'types'=>$types,
            'news'=>$this->news,
            'ajax_url'=>$ajax_url,
        ));
    }

    public function actionSearch(){
        if(Yii::app()->request->isPostRequest){
            $params = $_POST['Store'];
            $type = isset($params['type'])?$params['type']:'';
            $provinceid = isset($params['provinceid'])?$params['provinceid']:'';
            if(empty($provinceid)){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
            }
            $cityid = isset($params['cityid'])?$params['cityid']:'';
            $areaid = isset($params['areaid'])?$params['areaid']:'';
            $results = Store::model()->getStoresByParams($type,$provinceid,$cityid,$areaid);
        }else{
            $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
        }
        $this->opertmize_seo('门店搜索结果','门店搜索结果');
        $this->render('search',array(
            'results'=>$results,
            'news'=>$this->news,
        ));
    }

    public function actionMap(){
        $id = Yii::app()->request->getParam('id','');
        if(empty($id)){
            throw new CHttpException('参数错误',404);
        }
        $store = Store::model()->findByPk($id);
        $this->opertmize_seo('门店搜索位置','门店搜索位置');
        $this->render('map',array(
            'store'=>$store,
            'news'=>$this->news,
        ));
    }

    public function actionNavi(){
        $id = Yii::app()->request->getParam('id','');
        $id = 13;
        if(empty($id)){
            $this->redirect(Yii::app()->controller->id.'/index');
        }
        $store = Store::model()->findByPk($id);
        $this->opertmize_seo('门店位置导航','门店位置导航');
        $this->render('navi',array(
            'store'=>$store,
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
        if($ct == "Store" && $ac == "getCity"){
            $this->__getCity();
        }elseif($ct == "Store" && $ac == "getArea"){
            $this->__getArea();
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
}