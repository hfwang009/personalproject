<?php
class SupportController extends Controller{
    public $layout = '/layouts/front';
    public function actionIndex(){
        $this->render('index');
    }
}