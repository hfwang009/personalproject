<div class="aw-content-wrap">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');?>">管理员列表</a>
                    </li>
                    <li class="active">
                        <a data-toggle="tab" href="#add">添加管理员</a>
                    </li>
                    <li>
                        <a href="#search" data-toggle="tab">搜索</a>
                    </li>
                </ul>
            </h3>
        </div>

        <div class="tab-content mod-content">
            <div id="add" class="tab-pane active">
                <div class="table-responsive">
                    <?php
                    $form = $this->beginWidget("CActiveForm",array(
                        'id'=>'brand_add_form',
                        'method'=>'POST',
                        'action'=>Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/add'),
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                        ),
                        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
                    ));
                    ?>
                    <table class="table table-striped">
                        <tbody>
                        <input type="hidden" value="<?php echo !empty($model['id'])?$model['id']:''; ?>" name="id">
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'username',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'username', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'username',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php if(empty($model['id'])){ ?>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php echo $form->label($model,'password',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                        <div class="col-sm-6 col-xs-8">
                                            <?php echo $form->passwordField($model, 'password', array("class"=>"form-control"));?>
                                            <?php echo $form->error($model,'password',array('class'=>'help-block'));?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php echo $form->label($model,'confirm_password',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                        <div class="col-sm-6 col-xs-8">
                                            <?php echo $form->passwordField($model, 'confirm_password', array("class"=>"form-control"));?>
                                            <?php echo $form->error($model,'confirm_password',array('class'=>'help-block'));?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'role_id',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->dropDownList($model,'role_id',$roles,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                                        <?php echo $form->error($model,'role_id',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'province',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->dropDownList($model,'province',$provinces,
                                            array(
                                                'empty'=>'-- 请选择  --',
                                                'ajax' => array(
                                                    'type' => 'POST',
                                                    'url' => Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.'adminStore/setting'),
                                                    'dataType' => 'json',
                                                    'data' => array('ct'=>'provice','ac'=>'getcity','parent' => 'js:this.value'),
                                                    'success' => 'function(re) {
                                                if(re.state){
                                                    $("#Admin_city").html(re.html.citys);
                                                    $("#Admin_area").html(re.html.areas);
                                                }
                                             }',
                                                ),
                                                'class'=>'form-control'));?>
                                        <?php echo $form->error($model,'province',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'city',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->dropDownList($model,'city',$citys,
                                            array(
                                                'empty'=>'-- 请选择  --',
                                                'ajax' => array(
                                                    'type' => 'POST',
                                                    'url' => Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.'adminStore/setting'),
                                                    'dataType' => 'json',
                                                    'data' => array('ct'=>'provice','ac'=>'getarea','parent' => 'js:this.value'),
                                                    'success' => 'function(re) {
                                                if(re.state){
                                                    $("#Admin_area").html(re.html.areas);
                                                }
                                             }',
                                                ),
                                                'class'=>'form-control'));?>
                                        <?php echo $form->error($model,'city',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'area',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->dropDownList($model,'area',$areas,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                                        <?php echo $form->error($model,'area',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr><?php echo !empty($model['id'])?$model['id']:''; ?>
                            <td>
                                <?php echo CHtml::Button(!empty($model['id'])?'编辑管理员':'添加管理员',array('class'=>'btn btn-primary center-block','id'=>'Addsubmit'))?>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                    <?php $this->endWidget(); ?>
                </div>
            </div>

            <div class="tab-pane" id="search">
                <?php
                $form = $this->beginWidget("CActiveForm",array(
                        'id'=>'search_form',
                        'method'=>'get',
                        'action'=>Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index'),
                        'enableClientValidation'=>false,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>false,
                        ),
                        'htmlOptions'=>array('class'=>'form-horizontal'),
                    )
                );
                ?>
                <div class="form-group">
                    <?php echo $form->label($search,'username',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'username', array("class"=>"form-control"));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'created',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <div class="row">
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($search, 'created_start', array("class"=>"form-control mod-data","readonly"=>true));?>
                            </div>
                            <span class="mod-symbol col-xs-1 col-sm-1"> - </span>
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($search, 'created_end', array("class"=>"form-control mod-data","readonly"=>true));?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-5 col-xs-8">
                        <?php echo CHtml::submitButton('搜索',array('class'=>'btn btn-primary'));?>
                    </div>
                </div>
                <?php $this->endWidget();?>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('body').on('click','#Addsubmit',function(){
            var password = $('#Admin_password').val();
            var cpassword = $('#Admin_confirm_password').val();
            var username = $('#Admin_username').val();
            var role_id = $('#Admin_role_id').val();
            if(password!=cpassword){
                show_tip_message('两次密码不一致');
                return false;
            }
            if(isEmpty(username)){
                show_tip_message('没有填写管理员用户名');
                return false;
            }
            if(isEmpty(role_id)){
                show_tip_message('没有设置角色');
                return false;
            }
            $('#brand_add_form').submit();
        });
        $('body').on('blur','#Admin_password',function(){
            var pass = $(this).val();
            if(isEmpty(pass)){
                show_tip_message('没有填写登录密码');
                return false;
            }
        });
        $('body').on('blur','#Admin_confirm_password',function(){
            var pass = $('#Admin_password').val();
            var cpass = $(this).val();
            if(isEmpty(cpass)){
                show_tip_message('没有填写确认密码');
                return false;
            }
            if(pass!=cpass){
                show_tip_message('两次密码不一致');
                return false;
            }
        });
    });
</script>