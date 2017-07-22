<?php
class AdminLogController extends CAdminController
{
    public $column = 'warranty';

    public function actionIndex()
    {
        $search = new AdminLog();
        $criteria = new CDbCriteria;
        $criteria->condition = 1;
        $condition = $_GET;
        list($criteria, $condition, $search) = $search->getCriteriaCondition($criteria, $condition, $search);
        $model = new CActiveDataProvider('AdminLog',
            array(
                'criteria' => $criteria,
                'pagination' => array(
                    'pageSize' => 20,
                ),
            )
        );
        $count = AdminLog::model()->count($criteria);
        $ajax_url = $this->createUrl('setting');
        $admin_data = Admin::model()->getAdminData();
//        $product_data = Product::model()->getProductData3();
        $result = $model->getData();
//        $result = $this->__formatData($result, $models_data, $product_data);
        $this->render("index", array(
            "search" => $search,
            "condition" => $condition,
            "admin_data" => $admin_data,
//            "product_data" => $product_data,
            "pager" => $model->getPagination(),
            "ajax_url" => $ajax_url,
            "count"=>$count,
            "model" => $result
        ));
    }
}