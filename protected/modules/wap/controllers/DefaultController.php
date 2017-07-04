<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

    //设置404页面
    public function actionError(){
        $this->layout = '/layouts/front';
        if ($error = Yii::app ()->errorHandler->error) {
            if (Yii::app ()->request->isAjaxRequest)
                echo $error ['message'];
            else
                $this->render ( 'error', $error );
        }
    }
}