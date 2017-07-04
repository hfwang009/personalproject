<?php
class AdminModelController extends CAdminController{
    public $column = 'warranty';

    public function actionIndex(){
        $search = new Models();
        $criteria=new CDbCriteria;
        $criteria->condition = 1;
        $condition = $_GET;
        list($criteria,$condition,$search) = $search->getCriteriaCondition($criteria,$condition,$search);
        $model=new CActiveDataProvider('Models',
            array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>20,
                ),
            )
        );
        $ajax_url = $this->createUrl('setting');
        $types = Yii::app()->params['conf']['setting']['ptype'];
        $this->render("index",array(
            "search"=>$search,
            "condition"=>$condition,
            "types"=>$types,
            "pager"=>$model->getPagination(),
            "ajax_url"=>$ajax_url,
            "model"=>$model->getData()
        ));
    }

    public function actionAdd(){
        $search = new Models();
        $id = !empty($_REQUEST['id'])?$_REQUEST['id']:'';
        if(empty($id)){
            $model = new Models();
        }else{
            $model = Models::model()->findByPk($id);
        }
        if(isset($_POST['Models'])){
            $_POST['Models']['name'] = $this->FilterXss($_POST['Models']['name']);
            $res = Models::model()->addModels($_POST);
            if($res){
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index'));
            }
        }
        $ajax_url = $this->createUrl('setting');
        $types = Yii::app()->params['conf']['setting']['ptype'];
        $this->render("add",
            array(
                "model"=>$model,
                "search"=>$search,
                'types'=>$types,
                "ajax_url"=>$ajax_url,
            ));
    }

    public function actionDelete(){
        $state = false;
        $code = 0;
        $message= '型号删除错误';
        if(Yii::app ()->request->isPostRequest){
            $id = !empty($_POST['model_id'])?$_POST['model_id']:array();
            if(empty($id) || $id === array()){
                echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
                Yii::app ()->end ();
            }
            $products = Product::model()->findAll('mid in ('.implode(',',$id).')');
            $warranty = Warranty::model()->findAll('mid in ('.implode(',',$id).')');
            if(!empty($products)||!empty($warranty)){
                $message = '选中型号中有相应的产品/质保，请先删除相应的产品/质保再尝试删除型号';
            }else{
                if(Models::model()->deleteAll('id in (' . implode(',', $id) . ')')){
                    $state = true;
                    $code = 3;
                    $message = '型号删除成功';
                }
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
        if($ct == "model" && $ac == "delete"){
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
        $message= '型号删除错误';
        $href=Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');
        $id = Yii::app()->request->getParam('id', null);
        if(empty($id)){
            echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
            Yii::app ()->end ();
        }
        $model = Models::model()->findByPk(intval($id));
        $product = Product::model()->findAll('mid ='.$id);
        $warranty = Warranty::model()->findAll('mid ='.$id);
        if(!empty($product)||!empty($warranty)){
            $message = '选中型号中有相应的产品/质保，请先删除相应的产品/质保再尝试删除型号';
        }else{
            if(!empty($model) && $model->delete()){
                $state = true;
                $code = 2;
                $message = '型号删除成功';
            }
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message,$href));
        Yii::app ()->end ();
    }
}