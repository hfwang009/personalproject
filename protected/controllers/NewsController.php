<?php
class NewsController extends Controller{
    public $layout = '/layouts/web';

    public function actionIndex(){
        $current_pageNo = !empty($_REQUEST['News_page'])?$_REQUEST['News_page']:1;
        $news_model = News::model()->getNews($current_pageNo,10,'desc');
        $_model = $news_model['history'];
        $this->opertmize_seo('新闻资讯','市场活动');
        $pager = $news_model['pager'];
        $this->render('index',array(
            'model'   	=> $_model,
            'pager'    => $pager,
        ));
    }

    public function actionDetail(){
        $id = Yii::app()->request->getParam('id','');
        if(empty($id)){
            throw new CHttpException('参数错误',404);
        }
        $detail = News::model()->findByPk($id);
        $this->opertmize_seo('新闻资讯','新闻资讯');
        $this->render('detail',array(
            'detail'=>$detail
        ));
    }
}