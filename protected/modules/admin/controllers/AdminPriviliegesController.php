<?php
class AdminPriviliegesController extends CAdminController
{
    public $column = 'admin';
    public function actionIndex(){
        $search = new Privilieges();
        $criteria=new CDbCriteria;
        $criteria->condition = 1;
        $condition = $_GET;
        list($criteria,$condition,$search) = $search->getCriteriaCondition($criteria,$condition,$search);
        $model=new CActiveDataProvider('Privilieges',
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
        $search = new Privilieges();
        $id = !empty($_REQUEST['id'])?$_REQUEST['id']:'';
        if(empty($id)){
            $model = new Privilieges();
        }else{
            $model = Privilieges::model()->findByPk($id);
        }
        if(isset($_POST['Privilieges'])){
            $_POST['Privilieges']['pname'] = $this->FilterXss($_POST['Privilieges']['pname']);
            $_POST['Privilieges']['ctime'] = !empty($id)?$model['ctime']:time();
            $res = Privilieges::model()->addPrivilieges($_POST);
            if($res){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
            }
        }
        $arrArray = array();
        $ajax_url = $this->createUrl('setting');
        //查询所有资源
        $parents = Privilieges::model()->getParents1();
        $this->render("add",
            array(
                "model"=>$model,
                "search"=>$search,
                'data'=>$arrArray,
                "ajax_url"=>$ajax_url,
                "parents"=>$parents,
            ));
    }
}