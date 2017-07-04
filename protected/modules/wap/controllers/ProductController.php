<?php
class ProductController extends Controller{
    public $layout = '/layouts/front';

    public function actionIndex(){
        $model = Product::model();
        $packages = Package::model()->getPackageData();
//        $models = array();
//        $ftype = array();
//        $btype = array();
        $ajax_url = $this->createUrl('setting');
        $this->opertmize_seo('产品搜索','产品搜索');
        $this->render('index',array(
            'model'=>$model,
            'packages'=>$packages,
//            'models'=>$models,
//            'ftype'=>$ftype,
//            'btype'=>$btype,
            'news'=>$this->news,
            'ajax_url'=>$ajax_url,
        ));
    }

    public function actionResult(){
        if(Yii::app()->request->isPostRequest){
            $params = $_POST['Product'];
            $_bid = isset($params['bid'])?$params['bid']:'';
//            $_mid = isset($params['mid'])?$params['mid']:'';
//            if(empty($_bid)||empty($_mid)){
//                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->id.'/index'));
//            }
//            $_ftype = isset($params['ftype'])?$params['ftype']:'';
//            $_btype = isset($params['btype'])?$params['btype']:'';
//            $_sprice = isset($params['price_start'])?$params['price_start']:'';
//            $_eprice = isset($params['price_end'])?$params['price_end']:'';
//            list($brand,$car,$results,$name,$sum,$ftype_name,$btype_name) = Product::model()->getProductsByParams($_bid,$_mid,$_ftype,$_btype,$_sprice,$_eprice);
            $results = Package::model()->findByPk($_bid);
        }else{
            $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
        }
        $this->opertmize_seo('产品搜索结果','产品搜索结果');
        $this->render('result',array(
            'results'=>$results,
//            'name'=>$name,
//            'sum'=>$sum,
//            'brand'=>$brand,
//            'car'=>$car,
            'news'=>$this->news,
//            'ftype_name'=>$ftype_name,
//            'btype_name'=>$btype_name,
        ));
    }

    //ajax 璁剧疆
    public function actionSetting(){
        $ct = Yii::app ()->request->getParam ( 'ct', '-1' );
        $ac = Yii::app ()->request->getParam ( 'ac', '-1' );
        if ($ct == "-1" || $ac == "-1") {
            echo CJSON::encode ( CUtils::retCode ( false, 0, '参数错误' ) );
            Yii::app ()->end ();
        }
        if($ct == "product" && $ac == "getModel"){
            $this->__getModel();
        }elseif($ct == "product" && $ac == "getTypes"){
            $this->__getTypes();
        }else{
            echo CJSON::encode(CUtils::retCode(false, 0, '参数错误'));
            Yii::app ()->end ();
        }
    }

    private function __getModel(){
        $state = false;
        $code = 0;
        $message = '';
        $href = '';
        if(Yii::app()->request->isPostRequest){
            $brand = Yii::app()->request->getParam('brand','');
            $message = Car::model()->getCarOption($brand);
            if(!empty($message)){
                $state = true;
            }
        }
        echo CJSON::encode(CUtils::retMessage($state, $code, $message));
        Yii::app ()->end ();
    }

    private function __getTypes(){
        $state = false;
        $code = 0;
        $message = '';
        $href = '';
        if(Yii::app()->request->isPostRequest){
            $model = Yii::app()->request->getParam('model','');
            if(!empty($model)){
                $message = Models::model()->getModelOption($model);
                if(!empty($message)){
                    $state = true;
                }
            }
        }
        echo CJSON::encode(CUtils::retMessage($state, $code, $message));
        Yii::app ()->end ();
    }
}