<?php
class AdminRecruitController extends CAdminController{
    public $column = 'hr';

    public function actionIndex(){
        $search = new Recruit();
        $search->sex = '';
        $search->enable = '';
        $criteria=new CDbCriteria;
        $condition = $_GET;
        list($criteria,$condition,$search) = $search->getCriteriaCondition($criteria,$condition,$search);
        $model=new CActiveDataProvider('Recruit',
            array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>30,
                ),
            )
        );
        $ajax_url = $this->createUrl('setting');
        $langs = Yii::app()->params['conf']['syssetting']['lang'];
        $this->render('index',array(
            'model' 	=> $model->getData(),
            'pager'   	=> $model->getPagination(),
            'search'    =>$search,
            'condition' =>$condition,
            'langs' => $langs,
            'ajax_url'  =>$ajax_url
        ));
    }

    public function actionAdd(){
        $id = !empty($_REQUEST['id'])?$_REQUEST['id']:'';
        if(empty($id)){
            $model = new Recruit();
        }else{
            $model = Recruit::model()->findByPk($id);
        }
        $search = new Recruit();
        if (Yii::app ()->request->isPostRequest) {
            $model->attributes = $_POST ['Recruit'];
            $model->ctime = time();
            $model->lang = $_POST['Recruit']['lang'];
            if($model->validate()){
                if($model->save()){
                    $this->redirect(Yii::app()->createUrl(Yii::app()->controller->module->id . '/' . Yii::app()->controller->id . '/index'));
                }
            }else{
                $model->getErrors();
            }
        }
        $ajax_url = $this->createUrl('setting');
        $langs = Yii::app()->params['conf']['syssetting']['lang'];
        $this->render('add',array(
            'model'=>$model,
            'search'=>$search,
            'langs' => $langs,
            'ajax_url'=>$ajax_url
        ));
    }

    public function actionDelete(){
        $state = false;
        $code = 0;
        $message= '删除招聘信息错误';
        $href = Yii::app()->createUrl(Yii::app()->controller->module->id . '/' . Yii::app()->controller->id . '/index');
        if(Yii::app ()->request->isPostRequest){
            $id = $_POST['id'];
            if(empty($id) || $id === array()){
                echo CJSON::encode ( CUtils::retCode ( false, 0, $message ) );
                Yii::app ()->end ();
            }
            $count = Recruit::model()->count('id in ('.implode(',',$id).')');
            if($count>0){
                $res = Recruit::model()->updateAll(array('isdeleted'=>2),'id in (' . implode(',',$id) . ')');
                if($res){
                    $state = true;
                    $code = 2;
                    $message = '删除招聘信息成功';
                }else{
                    $message = '删除招聘信息失败';
                }
            }else{
                $message = '招聘信息数据错误';
            }
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message,$href));
        Yii::app ()->end ();
    }

    public function actionSetting(){
        $ct = Yii::app ()->request->getParam ( 'ct', '-1' );
        $ac = Yii::app ()->request->getParam ( 'ac', '-1' );
        if ($ct == "-1" || $ac == "-1") {
            echo CJSON::encode ( CUtils::retCode ( false, 0, '参数错误' ) );
            Yii::app ()->end ();
        }
        if($ct == "recruit" && $ac == "enable"){
            $this->enable();
        }elseif($ct == "recruit" && $ac == "delete"){
            $this->delete();
        }else{
            echo CJSON::encode(CUtils::retCode(false, 0, '参数错误'));
            Yii::app ()->end ();
        }
    }

    private function enable(){
        $message = '招聘信息激活状态调整失败';
        $state = false;
        $code = '0';
        $href=Yii::app()->createUrl(Yii::app()->controller->module->id . '/' . Yii::app()->controller->id . '/index');
        $id = filter_var(Yii::app()->request->getParam('id',''),FILTER_SANITIZE_STRING);
        $status = filter_var(Yii::app()->request->getParam('status',''),FILTER_SANITIZE_STRING);
        $model = Recruit::model()->findByPk($id);
        if(!empty($model)){
            $model->enable = $status;
            if($model->save()){
                $state = true;
                $code = 2;
                $message = '招聘信息激活状态调整成功';
            }
        }else{
            $message = '招聘信息出现错误';
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message,$href));
        Yii::app ()->end ();
    }

    private function delete(){
        $message = '删除招聘信息失败';
        $state = false;
        $code = '0';
        $href=Yii::app()->createUrl(Yii::app()->controller->module->id . '/' . Yii::app()->controller->id . '/index');
        $id = filter_var(Yii::app()->request->getParam('id',''),FILTER_SANITIZE_STRING);
        $model = Recruit::model()->findByPk($id);
        if(!empty($model)){
            $model->isdeleted = 2;
            if($model->save()){
                $state = true;
                $code = 2;
                $message = '删除招聘信息成功';
            }
        }else{
            $message = '招聘信息出现错误';
        }
        echo CJSON::encode(CUtils::retCode($state, $code, $message,$href));
        Yii::app ()->end ();
    }
}