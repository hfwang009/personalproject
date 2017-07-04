<?php
class AdminArticleController extends CAdminController{

    public $column = 'news';

    public function actionIndex(){
        $search = new Article();
        $criteria=new CDbCriteria;
        $criteria->condition = 1;
        $condition = $_GET;
        list($criteria,$condition,$search) = Article::model()->getCriteriaCondition($criteria,$condition,$search);
        $model=new CActiveDataProvider('Article',
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
        $search = new Article();
        $id = !empty($_REQUEST['id'])?$_REQUEST['id']:'';
        if(empty($id)){
            $model = new Article();
        }else{
            $model = Article::model()->findByPk($id);
        }
        if(isset($_POST['Article'])){
            $_POST['Article']['title'] = $this->FilterXss($_POST['Article']['title']);
//            $_POST['Article']['content'] = !empty($_POST['Article']['content'])?$this->FilterXss($_POST['Article']['content']):'';
            $res = Article::model()->addArticle($_POST);
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

    //文章删除
    public function actionDelete(){
        $state = false;
        $code = 0;
        $message= '文章删除错误';
        if(Yii::app ()->request->isPostRequest){
            $id = !empty($_POST['article_id'])?$_POST['article_id']:array();
            if(empty($id) || $id === array()){
                echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
                Yii::app ()->end ();
            }
            if(Article::model()->deleteAll('id in (' . implode(',', $id) . ')')){
                $state = true;
                $code = 3;
                $message = '文章删除成功';
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
        if($ct == "article" && $ac == "delete"){
            $this->__delete();
        }else{
            echo CJSON::encode(CUtils::retCode(false, 0, '参数错误'));
            Yii::app ()->end ();
        }
    }

    //文章单个删除
    private function __delete(){
        $state = false;
        $code = 0;
        $message= '文章删除错误';
        $href=Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');
        $id = Yii::app()->request->getParam('id', null);
        if(empty($id)){
            echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
            Yii::app ()->end ();
        }
        $model = Article::model()->findByPk(intval($id));
        if(!empty($model) && $model->delete()){
            $state = true;
            $code = 2;
            $message = '文章删除成功';
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message,$href));
        Yii::app ()->end ();
    }
}