<?php

class AdminAdPositionController extends CAdminController
{
    public $column = 'ad';
	public function actionIndex()
	{
        $search = AdPosition::model();
        $criteria=new CDbCriteria;
        $condition = $_GET;
        list($criteria,$condition,$search) = $search->getCriteriaCondition($criteria,$condition,$search);
        $model=new CActiveDataProvider('AdPosition',
            array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>30,
                ),
            )
        );
        $this->render('index',array(
            'model' 	=> $model->getData(),
            'pager'   	=> $model->getPagination(),
            'search'    =>$search,
            'condition' =>$condition,
        ));
	}

    //广告位置添加
    public function actionAdd() {
        $id = !empty($_REQUEST['id'])?$_REQUEST['id']:'';
        if(empty($id)){
            $model = new AdPosition();
        }else{
            $model = AdPosition::model()->findByPk($id);
        }
        if (isset($_POST['AdPosition']) && !empty($_POST['AdPosition'])) {
            $model->attributes = $_POST['AdPosition'];
            if ($model->save())
                $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id .'/'.Yii::app()->controller->id . '/index'));
        }

        $this->render('add', array('model' => $model));
    }

    public function actionDelete(){
        $state = false;
        $code = 0;
        $message= '广告位删除错误';
        if(Yii::app ()->request->isPostRequest){
            $id = $_POST['id'];
            if(empty($id) || $id === array()){
                echo CJSON::encode ( CUtils::retCode ( false, 0, Yii::t ( 'common', 'param_error' ) ) );
                Yii::app ()->end ();
            }

            if(AdPosition::model()->deleteAll('position_id in (' . implode(',', $id) . ')')){
                $state = true;
                $code = 3;
                $message = '广告位删除成功';
            }
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message));
    }
}