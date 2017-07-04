<?php
class HelpController extends Controller{
    public $layout = '/layouts/front';
    public function actionIndex(){
        $articles = Article::model()->getArticle1();
        $this->opertmize_seo('关于我们','关于我们的介绍');
        $this->render('index',array(
            'articles'=>$articles
        ));
    }

    public function actionDetail(){
        $id = Yii::app()->request->getParam('id','');
        if(empty($id)){
            throw new CHttpException('参数错误',404);
        }
        $detail = Article::model()->findByPk($id);
        $this->opertmize_seo($detail['title'],'关于我们的文章');
        $this->render('detail',array(
            'detail'=>$detail
        ));
    }
}