<?php
class AdminNewsController extends CAdminController{
    public $column = 'news';

    public function actionIndex(){
        $search = new News();
        $criteria=new CDbCriteria;
        $criteria->condition = 1;
        $condition = $_GET;
        list($criteria,$condition,$search) = News::model()->getCriteriaCondition($criteria,$condition,$search);
        $model=new CActiveDataProvider('News',
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
        $search = new News();
        $id = !empty($_REQUEST['id'])?$_REQUEST['id']:'';
        if(empty($id)){
            $model = new News();
        }else{
            $model = News::model()->findByPk($id);
        }
        if(isset($_POST['News'])){
            $_POST['News']['title'] = $this->FilterXss($_POST['News']['title']);
//            $_POST['News']['content'] = !empty($_POST['News']['content'])?$this->FilterXss($_POST['News']['content']):'';
            $res = News::model()->addNews($_POST);
            if($res){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
            }
        }
        $ajax_url = $this->createUrl('setting');
        $this->render("add",
            array(
                "model"=>$model,
                "search"=>$search,
                "ajax_url"=>$ajax_url,
            ));
    }

    //品牌删除
    public function actionDelete(){
        $state = false;
        $code = 0;
        $message= '品牌删除错误';
        if(Yii::app ()->request->isPostRequest){
            $id = !empty($_POST['news_id'])?$_POST['news_id']:array();
            if(empty($id) || $id === array()){
                echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
                Yii::app ()->end ();
            }
            if(News::model()->deleteAll('id in (' . implode(',', $id) . ')')){
                $state = true;
                $code = 3;
                $message = '品牌删除成功';
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
        if($ct == "news" && $ac == "delete"){
            $this->__delete();
        }else{
            echo CJSON::encode(CUtils::retCode(false, 0, '参数错误'));
            Yii::app ()->end ();
        }
    }

    //品牌单个删除
    private function __delete(){
        $state = false;
        $code = 0;
        $message= '资讯删除错误';
        $href=Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');
        $id = Yii::app()->request->getParam('id', null);
        if(empty($id)){
            echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
            Yii::app ()->end ();
        }
        $model = News::model()->findByPk(intval($id));
        if(!empty($model) && $model->delete()){
            $state = true;
            $code = 2;
            $message = '资讯删除成功';
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message,$href));
        Yii::app ()->end ();
    }
}