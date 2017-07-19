<div class="aw-content-wrap">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <span class="pull-left">编辑密码</span>
				<span class="pull-right">
                	<a class="btn btn-xs btn-primary mod-site-save" onclick="location.href='<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');?>'" href="javascript:;">返回列表</a>
                </span>
            </h3>
        </div>
        <div class="tab-content mod-content">
            <div id="add" class="tab-pane active">
                <div class="table-responsive">
                    <?php
                    $form = $this->beginWidget("CActiveForm",array(
                        'id'=>'admin_update_form',
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                        ),
                        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
                    ));
                    ?>
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'username',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-5 col-xs-8">
                                        <?php echo $form->textField($model, 'username', array("class"=>"form-control",'readonly'=>true));?>
                                        <?php echo $form->hiddenField($model, 'id', array("class"=>"form-control"));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <div class="form-group">-->
<!--                                    --><?php //echo $form->label($model,'password',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
<!--                                    <div class="col-sm-5 col-xs-8">-->
<!--                                        --><?php //echo $form->passwordField($model, 'password', array("class"=>"form-control",'ng-check'=>'js_check_admin()','ng-id'=>!empty($model)?$model['id']:''));?>
<!--                                        --><?php //echo $form->error($model,'password',array('class'=>'help-block'));?>
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </td>-->
<!--                        </tr>-->
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'newpassword',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-5 col-xs-8">
                                        <?php echo $form->passwordField($model, 'newpassword', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'newpassword',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'confirm_password',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-5 col-xs-8">
                                        <?php echo $form->passwordField($model, 'confirm_password', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'confirm_password',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>
                                <div class="tab-content mod-content mod-one-btn">
                                    <div class="center-block">
                                        <?php echo CHtml::htmlButton('修改',array('class'=>'btn btn-primary','type'=>'button','ng-click'=>'submit_button','ng-id'=>!empty($model)?$model['id']:''));?>
                                        <?php echo CHtml::htmlButton('返回',array('class'=>'btn btn-success','onclick'=>'location.href="'.Yii::app()->createUrl( Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index').'"')); ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('body').on('blur','input[ng-check="js_check_admin()"]',function(){
            js_check_admin(this);
        });
        $('body').on('click','button[ng-click="submit_button"]',function(){
            submit_form();
        });
    });
    var js_check_admin = function(eve){
        var pass = $(eve).val();
        var id = $(eve).attr('ng-id');
        console.log(pass);
        console.log(id);
        if(isEmpty(pass)||isEmpty(id)){
            show_tip_message('请输入原密码！');
            return false;
        }
        $.ajax({
            url:'<?php echo $ajax_url; ?>',
            type:'post',
            data:{ct:'admin',ac:'check',password:pass,id:id},
            dataType:'json',
            success:function(re){
                if(!re.state){
                    show_tip_message(re.msg);
                    $(eve).val('');
                }
            }
        });
    }
    var submit_form = function(){
//        var pass = $('#Admin_password').val();
        var npass = $('#Admin_newpassword').val();
        var cpass = $('#Admin_confirm_password').val();
        if(isEmpty(npass)||isEmpty(cpass)){
            show_tip_message('请输入密码！');
            return false;
        }
//        if(pass==npass||pass==cpass){
//            $('#Admin_password').val('');
//            $('#Admin_newpassword').val('');
//            $('#Admin_confirm_password').val('');
//            show_tip_message('没有重置密码！');
//            return false;
//        }
        if(npass!==cpass){
            $('#Admin_newpassword').val('');
            $('#Admin_confirm_password').val('');
            show_tip_message('新密码和确认密码不一致！');
            return false;
        }
        $("#admin_update_form").submit();
    }
</script>