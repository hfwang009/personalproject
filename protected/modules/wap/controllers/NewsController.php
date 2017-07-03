
<?php
class NewsController extends Controller{
    public $layout = '/layouts/front';
    //产品分页每页数量
    const PAGE_SIZE = '100';
    //产品排序
    const SUB_ORDER = 'DESC';
    public function actionIndex(){
        $this->opertmize_seo('活动资讯','关于我们的活动资讯');
        $current_pageNo = !empty($_REQUEST['News_page'])?$_REQUEST['News_page']:1;
        $news_model = News::model()->getNews($current_pageNo,self::PAGE_SIZE,self::SUB_ORDER);
        $_model = $news_model['history'];
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
        $this->opertmize_seo($detail['title'],'关于我们的活动资讯');
        $this->render('detail',array(
            'detail'=>$detail
        ));
    }
}