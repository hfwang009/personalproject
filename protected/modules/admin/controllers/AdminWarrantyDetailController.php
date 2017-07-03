<?php
class AdminWarrantyDetailController extends CAdminController{
    public $column = 'warranty';

    public function actionIndex(){
        $search = new WarrantyDetail();
        $criteria=new CDbCriteria;
        $criteria->condition = 1;
        $condition = $_GET;
        list($criteria,$condition,$search) = $search->getCriteriaCondition($criteria,$condition,$search);
        $model=new CActiveDataProvider('WarrantyDetail',
            array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>20,
                ),
            )
        );
        $ajax_url = $this->createUrl('setting');
        $models_data= Models::model()->getModelData();
        $product_data= Product::model()->getProductData3();
        $this->render("index",array(
            "search"=>$search,
            "condition"=>$condition,
            "models_data"=>$models_data,
            "product_data"=>$product_data,
            "pager"=>$model->getPagination(),
            "ajax_url"=>$ajax_url,
            "model"=>$model->getData()
        ));
    }
}