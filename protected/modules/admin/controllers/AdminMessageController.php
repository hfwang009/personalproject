<?php
class AdminMessageController extends CAdminController{
    public function actionIndex(){
        $search = new Message();
        $criteria=new CDbCriteria;
        $criteria->condition = 1;
        $condition = $_GET;
        list($criteria,$condition,$search) = Message::model()->getCriteriaCondition($criteria,$condition,$search);
        $model=new CActiveDataProvider('Message',
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

    public function actionDetail($id){
        $model = Message::model()->findByPk($id);
        $ajax_url = $this->createUrl('setting');
        $this->render("detail",
            array(
                "model"=>$model,
                "ajax_url"=>$ajax_url,
            ));
    }

    public function actionDelete(){
        $state = false;
        $code = 0;
        $message= '反馈意见删除错误';
        if(Yii::app ()->request->isPostRequest){
            $id = !empty($_POST['message_id'])?$_POST['message_id']:array();
            if(empty($id) || $id === array()){
                echo CJSON::encode ( CUtils::retCode ( $state, $code, '参数错误' ) );
                Yii::app ()->end ();
            }
            if(Message::model()->deleteAll('id in (' . implode(',', $id) . ')')){
                $state = true;
                $code = 3;
                $message = '反馈意见删除成功';
            }
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message));
        Yii::app ()->end ();
    }
}