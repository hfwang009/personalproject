<?php
class AdminRoleController extends CAdminController {
    public $column = 'admin';

    public function actionIndex(){
        $search = new Role();
        $criteria=new CDbCriteria;
        $criteria->condition = 1;
        $condition = $_GET;
        list($criteria,$condition,$search) = $search->getCriteriaCondition($criteria,$condition,$search);
        $model=new CActiveDataProvider('Role',
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

    /**
     * 添加修改
     * @author yplovecl
     * @version 1.0
     * @copyright joyrunning.cc
     */
    public function actionAdd(){
        $search = new Role();
        $id = !empty($_REQUEST['id'])?$_REQUEST['id']:'';
        if(empty($id)){
            $model = new Role();
        }else{
            $model = Role::model()->findByPk($id);
        }
        if(isset($_POST['Role'])){
            $_POST['Role']['name'] = $this->FilterXss($_POST['Role']['name']);
            $post = Role::model()->formatData($_POST,$model,$id);
            $res = Role::model()->addRole($post);
            if($res){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
            }
        }
        $arrArray = array();
        $ajax_url = $this->createUrl('setting');
        //查询所有资源
        $parents = Privilieges::model()->getParents();
        $array['json'] = json_encode($parents);
        $array['attr_values'] = !empty($model['res'])?json_encode(explode(',',$model['res'])):json_encode(array());
        $this->render("add",
            array(
                "model"=>$model,
                "search"=>$search,
                'data'=>$arrArray,
                "ajax_url"=>$ajax_url,
                "array"=>$array,
            ));
    }
}
