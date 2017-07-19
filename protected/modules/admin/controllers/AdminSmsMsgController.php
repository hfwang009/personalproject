<?php
class AdminSmsMsgController extends CAdminController{
    public $column = 'tools';

    public function actionIndex(){
        $search = new SmsRecord();
        $criteria=new CDbCriteria;
        $criteria->condition = 1;
        $condition = $_GET;
        list($criteria,$condition,$search) = SmsRecord::model()->getCriteriaCondition($criteria,$condition,$search);
        $model=new CActiveDataProvider('SmsRecord',
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
}