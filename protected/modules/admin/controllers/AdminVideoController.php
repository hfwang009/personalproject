<?php
class AdminVideoController extends CAdminController{
    public $column = 'video';

    public function actionIndex(){
        $search = new Video();
        $criteria = new CDbCriteria();
        $condition = $_GET;
        list($criteria,$condition,$search) = $search->getCriteriaCondition($criteria,$condition,$search);
        $model = new CActiveDataProvider('Video',array(
            'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>20
            )
        ));
        $ajax_url = $this->createUrl('setting');
        $langs = Yii::app()->params['conf']['syssetting']['lang'];
        $this->render('index',array(
            'search'=>$search,
            'condition'=>$condition,
            'model'=>$model->getData(),
            'pager'=>$model->getPagination(),
            'langs' => $langs,
            'ajax_url'=>$ajax_url
        ));
    }

    //添加企业视频
    public function actionAdd(){
        $id = !empty($_REQUEST['id'])?$_REQUEST['id']:'';
        if(empty($id)){
            $model =  new Video();
        }else{
            $model = Video::model()->findByPk($id);
            $model['video'] = !empty($model['video'])?unserialize($model->video):array();
        }
//        print_r($model);exit;
        if (Yii::app ()->request->isPostRequest) {
            $model->attributes = $_POST ['Video'];
            $model->video = !empty($_POST ['Video']['video'])?serialize($_POST ['Video']['video']):'';
            $model->lang = !empty($_POST ['Video']['lang'])?$_POST ['Video']['lang']:'';
            $model->ctime = time();
            $model->mtime = time();
            if($model->save()){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id . '/' . Yii::app()->controller->id . '/index'));
            }
        }
        $ajax_url = $this->createUrl('setting');
        $langs = Yii::app()->params['conf']['syssetting']['lang'];
        $this->render('add',array(
            'model'   =>$model,
            'search'  =>$model,
            'langs' => $langs,
            'ajax_url'=>$ajax_url
        ));
    }

    //批量删除企业视频
    public function actionDelete(){
        $state = false;
        $code = 0;
        $message= '企业视频删除错误';
        if(Yii::app ()->request->isPostRequest){
            if(empty($_POST['id']) || $_POST['id'] === array() || empty($_POST)){
                echo CJSON::encode ( CUtils::retCode ( false, 0, $message ) );
                Yii::app ()->end ();
            }
            $id = $_POST['id'];
            $count = count($id);
            $i = 0;
            foreach($id as $_id){
                if(Video::model()->updateAll(array('is_deleted'=>'0'),'id = :id',array(':id'=>$_id))){
                    $i+=1;
                }
            }
            if($i == $count){
                $state = true;
                $code = 3;
                $message = '企业视频删除成功';
            }else{
                $message = '部分企业视频删除成功，请重新操作';
            }
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message));
        Yii::app ()->end ();
    }

    //企业视频ajax设置
    public function actionSetting(){
        $ct = Yii::app ()->request->getParam ( 'ct', '-1' );
        $ac = Yii::app ()->request->getParam ( 'ac', '-1' );
        if ($ct == "-1" || $ac == "-1") {
            echo CJSON::encode ( CUtils::retCode ( false, 0, '参数错误' ) );
            Yii::app ()->end ();
        }
        if($ct == "Video" && $ac == "thumb"){
            $this->thumb();
        }elseif($ct == "Video" && $ac == "delete"){
            $this->delete();
        }elseif($ct == "Video" && $ac == "uploadfile"){
            $this->uploadfile();
        }elseif($ct == "Video" && $ac == "show"){
            $this->show();
        }else{
            echo CJSON::encode(CUtils::retCode(false, 0, '参数错误'));
            Yii::app ()->end ();
        }
    }

    //企业视频图片上传
    private function thumb(){
        $state = false;
        $message = '';
        $file = $_FILES['Video'];
        $file_name = $file['name']['thumb'];
        $file_size = $file['size']['thumb'];
        if(!CUtils::getImageType($file_name)){
            $message = '仅支持.jpg,.bmp,.gif,.png为后缀名的文件!';
        }elseif($file_size > 2097152){
            $message = '上传图片不能超过2MB';
        }else{
            $imgArr = CUtils::upladImage('videopic','Video','thumb','403','267');
            if(!($imgArr === array())){
                $state = true;
                $message = $imgArr['src_img'];
            }
        }
        echo CJSON::encode( CUtils::retMessage ( $state, 1, $message ) );
        Yii::app ()->end ();
    }

    //单个删除企业视频
    private function delete(){
        $state = false;
        $code = 0;
        $message= '企业视频删除错误';
        $id = Yii::app()->request->getParam('id', null);
        if(empty($id)){
            echo CJSON::encode ( CUtils::retCode ( false, 0, $message ) );
            Yii::app ()->end ();
        }
        $model = Video::model()->findByPk(intval($id));
        if(!empty($model)){
            $model->is_deleted = '0';
            $model->mtime = time();
            if($model->save()){
                $state = true;
                $code = 3;
                $message = '企业视频删除成功';
            }
        }else{
            $message = '企业视频不存在';
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message));
        Yii::app ()->end ();
    }

    //企业视频上传
    private function uploadfile(){
//        print_r($_FILES);exit;
        $message = array("jsonrpc"=>"2.0", "error"=>array("code"=>100, "result"=>"文件上传错误"), "id"=>0);
        $file = $_POST;
        $path = Yii::app()->params['conf']['path'];
        $file['uploadDir'] = $path['videopath'] . date("Ymd") . '/';
        $file['filePath'] = Yii::app()->baseUrl . '/' . str_replace($path['systemfile'], '', $file['uploadDir']);
        $file['targetDir'] = $path['videopath'] . 'temp/';
        $file['tmp_name'] = $_FILES['file']['tmp_name'];
//        print_r($_FILES);exit;
//        print_r($file);exit;
        $upload = new CUploadFile($file);
        $info = $upload->upload();
        if(!empty($info) && empty($info['error'])){
            if(isset($info['result']['uploaded']) && $info['result']['uploaded']){
                $data=array();
                $data['file_name'] = $info['result']['file_name'];
                $data['file_path'] = $info['result']['file_path'];
                $data['file_size'] = $info['result']['file_size'];
//                $data['mime_type'] = $info['result']['mime_type'];
                $data['uploaded'] = $info['result']['uploaded'];
                unset($message['error']);
                $message['result'] = $data;
            }else{
                unset($message['error']);
                $message['result']['uploaded'] = false;
                $message['id'] = $file['id'];
            }
        }
        die(CJSON::encode($message));
    }
    //视频显示设置
    private function show(){
        $state = false;
        $code = 0;
        $message= '视频显示设置错误';
        $id = Yii::app()->request->getParam('id', null);
        $show_type = Yii::app()->request->getParam('show_type', null);
        if(empty($id)){
            echo CJSON::encode ( CUtils::retCode ( false, 0, $message ) );
            Yii::app ()->end ();
        }
        $model = Video::model()->findByPk(intval($id));
        if(!empty($model)){
            $model->show_type = $show_type;
            $model->mtime = time();
            if($model->save()){
                $state = true;
                $message = '视频显示设置成功';
            }
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message));
        Yii::app ()->end ();
    }
}