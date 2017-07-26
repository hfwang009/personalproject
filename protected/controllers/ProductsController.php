<?php
class ProductsController extends Controller{
    public $layout = '/layouts/web';
    public function actionIndex(){
        $this->opertmize_seo('产品介绍','漆面保护膜');
        $this->render('index');
    }

    public function actionBuilding(){
        $this->opertmize_seo('产品介绍','家居膜/建筑膜');
        $this->render('building');
    }

    public function actionRespect(){
        $this->opertmize_seo('产品介绍','尊享产品');
        $this->render('respect');
    }
}