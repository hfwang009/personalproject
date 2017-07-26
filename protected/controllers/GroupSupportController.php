<?php
class GroupSupportController extends Controller{
    public $layout = '/layouts/web';
    public function actionIndex(){
        $this->opertmize_seo('客户服务','客户服务');
        $this->render('index');
    }
}