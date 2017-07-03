<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="renderer" content="webkit" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="blank" />
        <meta name="format-detection" content="telephone=no" />
        <title>车辆项目管理系统</title>
        <meta content="车辆项目管理系统" name="keywords">
        <meta content="车辆项目管理系统" name="description">
        <link rel="Shortcut Icon" href="<?php echo(Yii::app()->baseUrl)?>/statics/front/images/baijia.ico" type="image/x-icon" />
        <link rel="Bookmark" href="<?php echo(Yii::app()->baseUrl)?>/statics/front/images/baijia.ico" />
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/statics/admin/css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/statics/admin/css/icon.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/statics/back/css/login.css" />
    </head>
    <body>
        <div class="aw-login">
            <div class="mod center-block">
                <h1><img src="<?php echo Yii::app()->baseUrl; ?>/statics/admin/img/inst_logo.png" alt="" /></h1>
                <?php
                $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'login-form',
                    'enableClientValidation'=>true,
                    'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                    ),
                ));
                ?>
                <?php echo $form->error($model,'username',array('class'=>'alert alert-danger hide error_message')); ?>
                <?php echo $form->error($model,'password',array('class'=>'alert alert-danger hide error_message')); ?>
                <?php echo $form->error($model,'code',array('class'=>'alert alert-danger hide error_message')); ?>
                <div class="form-group">
                    <?php echo $form->labelEx($model,'username'); ?>
                    <?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'用户名')); ?>
                    <i class="icon icon-user"></i>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model,'password'); ?>
                    <?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'密码')); ?>
                    <i class="icon icon-lock"></i>
                </div>
                <?php
                //if(get_setting('admin_login_seccode') == 'Y'){
                ?>
                <div class="form-group">
                    <?php echo $form->labelEx($model,'code'); ?>
                    <div class="row">
                        <div class="col-xs-6">
                            <?php echo $form->textField($model,'code',array('class'=>'form-control')); ?>
                        </div>
                        <?php
                        if(CCaptcha::checkRequirements()):
                            ?>
                            <div class="col-xs-6">
                                <?php $this->widget('CCaptcha', array('clickableImage' => true, 'showRefreshButton' => false,'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','class'=>'verification'))); ?>
                            </div>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
                <?php
                //}
                ?>
                <?php echo CHtml::htmlButton('登录',array('class'=>'btn btn-primary','type'=>'submit')); ?>
                <?php $this->endWidget(); ?>
                <h2 class="text-center text-color-999">GeekCivil Admin Control</h2>
            </div>
        </div>
    </body>
</html>