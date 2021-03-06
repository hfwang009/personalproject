<?php
class AdminPackageController extends CAdminController{
    public $column = 'product';

    public function actionIndex(){
        $search = new Package();
        $criteria=new CDbCriteria;
        $criteria->condition = 1;
        $condition = $_GET;
        list($criteria,$condition,$search) = $search->getCriteriaCondition($criteria,$condition,$search);
        $model=new CActiveDataProvider('Package',
            array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>20,
                ),
            )
        );
        $ajax_url = $this->createUrl('setting');
        $this->render("index",array(
            "search"=>$search,
            "condition"=>$condition,
            "pager"=>$model->getPagination(),
            "ajax_url"=>$ajax_url,
            "model"=>$model->getData()
        ));
    }

    public function actionAdd(){
        $search = new Package();
        $id = !empty($_REQUEST['id'])?$_REQUEST['id']:'';
        if(empty($id)){
            $model = new Package();
        }else{
            $model = Package::model()->findByPk($id);
        }
        if(isset($_POST['Package'])){
            $_POST['Package']['name'] = $this->FilterXss($_POST['Package']['name']);
            $res = Package::model()->addPackage($_POST);
            if($res){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
            }
        }
        $arrArray = array();
        $ajax_url = $this->createUrl('setting');
        $this->render("add",
            array(
                "model"=>$model,
                "search"=>$search,
                'data'=>$arrArray,
                "ajax_url"=>$ajax_url,
            ));
    }

    //套餐删除
    public function actionDelete(){
        $state = false;
        $code = 0;
        $message= '套餐删除错误';
        if(Yii::app ()->request->isPostRequest){
            $id = !empty($_POST['package_id'])?$_POST['package_id']:array();
            if(empty($id) || $id === array()){
                echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
                Yii::app ()->end ();
            }
            if(Package::model()->deleteAll('id in (' . implode(',', $id) . ')')){
                $state = true;
                $code = 3;
                $message = '套餐删除成功';
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
        if($ct == "package" && $ac == "delete"){
            $this->__delete();
        }elseif($ct == 'package' && $ac == 'uploadimg'){
            $this->__uploadimg();
        }else{
            echo CJSON::encode(CUtils::retCode(false, 0, '参数错误'));
            Yii::app ()->end ();
        }
    }
    private function __uploadimg(){
        $state = false;
        $message = '';
        $file = $_FILES['Brand'];
        $file_name = $file['name']['brand_logo'];
        $file_size = $file['size']['brand_logo'];
        if(!$this->getImageType($file_name)){
            $message = '仅支持.jpg,.bmp,.gif,.png为后缀名的文件!';
        }elseif($file_size > 2097152){
            $message = '上传图片不能超过2MB';
        }else{
            $imgArr = $this->upladImage('brandimg','Brand','brand_logo',200,100,false);
            if(!($imgArr === array())){
                $state = true;
                $message = $imgArr['src_img'];
            }
        }
        echo CJSON::encode( CUtils::retMessage ( $state, 1, $message ) );
        Yii::app ()->end ();
    }
    //套餐单个删除
    private function __delete(){
        $state = false;
        $code = 0;
        $message= '套餐删除错误';
        $href=Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');
        $id = Yii::app()->request->getParam('id', null);
        if(empty($id)){
            echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
            Yii::app ()->end ();
        }
        $model = Package::model()->findByPk(intval($id));
        if(!empty($model) && $model->delete()){
            $state = true;
            $code = 2;
            $message = '套餐删除成功';
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message,$href));
        Yii::app ()->end ();
    }
}