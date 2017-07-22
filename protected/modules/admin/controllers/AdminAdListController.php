<?php

class AdminAdListController extends CAdminController{
    public $column = 'ad';
	public function actionIndex()
	{
        $search = new Ad();
        $criteria=new CDbCriteria;
        $condition = $_GET;
        list($criteria,$condition,$search) = $search->getCriteriaCondition($criteria,$condition,$search);
        $model=new CActiveDataProvider('Ad',
            array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>30,
                ),
            )
        );
        $ajax_url = $this->createUrl('setting');
        $langs = Yii::app()->params['conf']['syssetting']['lang'];
        $this->render('index',array(
            'model' 	=> $model->getData(),
            'pager'   	=> $model->getPagination(),
            'search'    =>$search,
            'condition' =>$condition,
            'langs' => $langs,
            'ajax_url'  =>$ajax_url
        ));
	}

    public function actionAdd() {
        $id = !empty($_REQUEST['id'])?$_REQUEST['id']:'';
        if(empty($id)){
            $model = new Ad();
        }else{
            $model = Ad::model()->findByPk($id);
            $model->start_time = date('Y-m-d', $model->start_time);
            $model->end_time = date('Y-m-d', $model->end_time);
        }
//        print_r($model);exit;
        if (isset($_POST['Ad']) && !empty($_POST['Ad'])) {
            $position = AdPosition::model()->findByPk(intval($_POST['Ad']['position_id']));
            if ($_POST['Ad']['media_type'] == 1) {
//                $_POST['Ad']['ad_code'] = $_POST['Ad']['ad_img'];
//                $_POST['Ad']['ad_link'] = $_POST['Ad']['ad_link_img'];
//                unset($_POST['Ad']['ad_link_img']);
            }elseif($_POST['Ad']['media_type'] == 2) {
                $_POST['Ad']['ad_code'] = $_POST['Ad']['ad_flash'];
            }elseif($_POST['Ad']['media_type'] == 3) {
                if (!empty($_POST['Ad']['ad_code']))
                    $_POST['Ad']['ad_code'] = trim($_POST['Ad']['ad_code']);
            }elseif($_POST['Ad']['media_type'] == 4) {
                if (!empty($_POST['Ad']['ad_text'])) {
                    $_POST['Ad']['ad_code'] = $_POST['Ad']['ad_text'];
                }
                $_POST['Ad']['ad_link'] = $_POST['Ad']['ad_link_font'];
                unset($_POST['Ad']['ad_link_font']);
            }elseif ($_POST['Ad']['media_type'] == 5) {
                $video = serialize(array('thumb'=>$_POST["Ad"]['ad_thumb'], 'video'=>$_POST["Ad"]['ad_video']));
                $_POST['Ad']['ad_code'] = serialize($video);
                $_POST['Ad']['ad_link'] = $_POST['Ad']['ad_link_video'];
                unset($_POST['Ad']['ad_link_video']);
            }
            unset($_POST['Ad']['ad_img']);
            unset($_POST['Ad']['ad_flash']);
            unset($_POST['Ad']['ad_text']);
            unset($_POST['Ad']['ad_video']);

            $_POST['Ad']['start_time'] = strtotime($_POST['Ad']['start_time']);
            $_POST['Ad']['end_time'] = strtotime($_POST['Ad']['end_time']);
//            print_r($_POST['Ad']);exit;
            $model->attributes = $_POST['Ad'];
            $model->lang = $_POST['Ad']['lang'];
            if ($model->save()){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id .'/'.Yii::app()->controller->id . '/index'));
            }else{
                var_dump($model->getErrors());exit;
            }
        }
        $ajax_url = $this->createUrl('setting');
        $langs = Yii::app()->params['conf']['syssetting']['lang'];
        $this->render('add', array(
                'model' => $model,
                'langs' => $langs,
                'ajax_url'=>$ajax_url
            )
        );
    }

    //广告删除
    public function actionDelete() {
        $state = false;
        $code = 0;
        $message= '广告删除错误';
        if(Yii::app ()->request->isPostRequest){
            $id = $_POST['id'];
            if(empty($id) || $id === array()){
                echo CJSON::encode ( CUtils::retCode ( false, 0, Yii::t ( 'common', 'param_error' ) ) );
                Yii::app ()->end ();
            }
            $model = Ad::model()->findByPk($id);
            if(Ad::model()->deleteAll('ad_id in (' . implode(',', $id) . ')')){
//                OuterLink::model()->deleteAll('outer_link = :outer_link',array(":outer_link"=>$model['ad_link']));
                $state = true;
                $code = 3;
                $message = '广告删除成功';
            }
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message));
    }
    //ajax 设置
    public function actionSetting(){
        $ct = Yii::app ()->request->getParam ( 'ct', '-1' );
        $ac = Yii::app ()->request->getParam ( 'ac', '-1' );
        if ($ct == "-1" || $ac == "-1") {
            echo CJSON::encode ( CUtils::retCode ( false, 0, Yii::t ( 'common', 'param_error' ) ) );
            Yii::app ()->end ();
        }
        if($ct == "ad" && $ac == "disabled"){
            $this->disabled();
        }elseif($ct == "ad" && $ac == "sort"){
            $this->sort();
        }else{
            echo CJSON::encode(CUtils::retCode(false, 0, Yii::t ('common', 'param_error')));
            Yii::app ()->end ();
        }
    }
    //广告状态设置
    private function disabled(){
        $state = false;
        $code = 0;
        $message= '广告状态设置错误';
        $href=Yii::app()->createUrl(Yii::app()->controller->module->id .'/'.Yii::app()->controller->id . '/index');
        $id = Yii::app()->request->getParam('id', null);
        $status = Yii::app()->request->getParam('status', null);
        if(empty($id)){
            echo CJSON::encode ( CUtils::retCode ( false, 0, Yii::t ( 'common', 'param_error' ) ) );
            Yii::app ()->end ();
        }
        $model = Ad::model()->findByPk(intval($id));
        if(!empty($model)){
            $model->enabled = $status;
            if($model->save()){
                $state = true;
                $code = 2;
                $message = '广告状态设置成功';
            }
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message,$href));
        Yii::app ()->end ();
    }
    //广告排序设置
    private function sort(){
        $state = false;
        $code = 0;
        $message= '广告排序设置错误';
        $href=Yii::app()->createUrl(Yii::app()->controller->module->id .'/'.Yii::app()->controller->id . '/index');
        $id = Yii::app()->request->getParam('id', null);
        $sort = Yii::app()->request->getParam('sort', null);
        if(empty($id)){
            echo CJSON::encode ( CUtils::retCode ( false, 0, Yii::t ( 'common', 'param_error' ) ) );
            Yii::app ()->end ();
        }
        $model = Ad::model()->findByPk(intval($id));
        if(!empty($model)){
            $model->sort_order = $sort;
            if($model->save()){
                $state = true;
                $code = 1;
                $message = '广告排序设置成功';
            }
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message,$href));
        Yii::app ()->end ();
    }
	
    public function actionUploadImage(){
    	$path = Yii::app()->params['conf']['path'];
    	$systemfile = $path['systemfile'];
    	$adfile = $path['adpic'];
    	$filepath = str_replace($systemfile, '', $adfile);
        $media_type = intval($_POST['media_type']);
        $message = '';
        $state = false;
        switch ($media_type){
            case 1:
                $attach = CUploadedFile::getInstanceByName('upload');
                $preRand = ''.time().rand(100, 999);
                $path = $adfile . 'adfile/';
                if(!is_dir($path))
                {
                    @mkdir($path,0777,true);
                }
                $images_path = $path.$preRand.".".strtolower($attach->extensionName);
                $state = true;
                $attach->saveAs($images_path);
                $message = $filepath. 'adfile/'.$preRand.".".strtolower($attach->extensionName);
                break;
            case 2:
                $attach = CUploadedFile::getInstanceByName('upload');
                $preRand = ''.time().rand(100, 999);
                $path = $adfile . 'adflash/';
                if(!is_dir($path))
                {
                    @mkdir($path,0777,true);
                }
                $images_path = $path.$preRand.".".strtolower($attach->extensionName);
                $state = true;
                $attach->saveAs($images_path);
                $message = $filepath . 'adflash/'.$preRand.".".strtolower($attach->extensionName);
                break;
            case 5:
                $attach = CUploadedFile::getInstanceByName('upload');
                $preRand = ''.time().rand(100, 999);
                $path = $adfile . 'advideo/';
                if(!is_dir($path))
                {
                    @mkdir($path,0777,true);
                }
                $images_path = $path.$preRand.".".strtolower($attach->extensionName);
                $state = true;
                $attach->saveAs($images_path);
                $message = $filepath. 'advideo/'.$preRand.".".strtolower($attach->extensionName);
                break;
            default :
                $message = '上传失败';
                break;
        }
        echo CJSON::encode ( CUtils::retMessage ( $state, 1, $message ));
        Yii::app ()->end ();
    }
}