<?php

class IndexController extends Controller{
//    public $layout = "front";

    //加载软件首页
    public function actionIndex(){
        $this->opertmize_seo('首页','首页');
        //设置ajax路径
        $ajax_url = $this->createUrl("setting");
        $this->render("index",array(
            "ajax_url"=>$ajax_url
        ));
    }
}