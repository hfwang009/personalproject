<?php
class IndexController extends Controller{
    public $layout = '/layouts/webfront';
    //设置404页面
    public function actionIndex(){
        $this->opertmize_seo('戈纳美','戈纳美');
        $video = Video::model()->findByPk(4);
        $video['video'] = unserialize($video['video']);
        $this->render ( 'index',array(
            'video'=>$video
        ));
    }

    //设置404页面
    public function actionError(){
        $this->layout = '/layouts/web';
        if ($error = Yii::app ()->errorHandler->error) {
            if (Yii::app ()->request->isAjaxRequest)
                echo $error ['message'];
            else
                $this->render ( 'error', $error );
        }
    }
}