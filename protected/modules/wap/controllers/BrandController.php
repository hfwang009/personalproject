<?php
class BrandController extends Controller{
    public function actionIndex(){
        $this->opertmize_seo('品牌介绍','品牌介绍');
        $video = Video::model()->findByPk(4);
        $video['video'] = unserialize($video['video']);
        $this->render('index',array(
            'video'=>$video
        ));
    }
}