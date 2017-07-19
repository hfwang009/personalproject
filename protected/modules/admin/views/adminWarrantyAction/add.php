<div class="aw-content-wrap">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');?>">质保操作记录列表</a>
                    </li>
                    <li class="active">
                        <a data-toggle="tab" href="#add">添加质保操作记录</a>
                    </li>
                </ul>
            </h3>
        </div>

        <div class="tab-content mod-content">
            <div id="add" class="tab-pane active">
                <div class="table-responsive">
                    <?php
                    $form = $this->beginWidget("CActiveForm",array(
                        'id'=>'action_add_form',
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
                                    <?php echo $form->label($model,'wid',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php if(!empty($model['id'])){ ?>
                                            <?php echo $form->dropDownList($model,'wid',$warranty_data,array('empty'=>'-- 请选择  --','class'=>'form-control','ng-change'=>'js_get_warranty()','readonly'=>'readonly'));?>
                                        <?php }else{ ?>
                                            <?php echo $form->dropDownList($model,'wid',$warranty_data,array('empty'=>'-- 请选择  --','class'=>'form-control','ng-change'=>'js_get_warranty()'));?>
                                        <?php } ?>
                                        <?php echo $form->error($model,'wid',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td>
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label class='col-sm-2 col-xs-3 control-label' style="margin-left: -20px;">质保单数据</label>
                            </div>
                            <table id="productlist" class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-xs-3 control-label">质保单套餐</label>
                                                <div class="col-sm-6 col-xs-8">
                                                    <input type="text" class="form-control product_product" name="warranty[pack_name]" id="warranty_pack_name" disabled="disabled" value="<?php echo !empty($model->warranty)?$model->warranty->pack_name:''; ?>">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-xs-3 control-label">质保用户名</label>
                                                <div class="col-sm-6 col-xs-8">
                                                    <input type="text" class="form-control product_product" name="warranty[name]" id="warranty_name" disabled="disabled" value="<?php echo !empty($model->warranty)?$model->warranty->name:''; ?>" >
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-xs-3 control-label">质保用户电话</label>
                                                <div class="col-sm-6 col-xs-8">
                                                    <input type="text" class="form-control product_product" name="warranty[telephone]" id="warranty_telephone" disabled="disabled" value="<?php echo !empty($model->warranty)?$model->warranty->telephone:''; ?>" >
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-xs-3 control-label">质保用户地址</label>
                                                <div class="col-sm-6 col-xs-8">
                                                    <input type="text" class="form-control product_product" name="warranty[address]" id="warranty_address" disabled="disabled" value="<?php echo !empty($model->warranty)?$model->warranty->address:''; ?>" >
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-xs-3 control-label">开据质保单门店</label>
                                                <div class="col-sm-6 col-xs-8">
                                                    <input type="text" class="form-control product_product" name="warranty[storeid]" id="warranty_storeid" disabled="disabled" value="<?php echo !empty($model->warranty)?$model->warranty->store->name:''; ?>" >
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-xs-3 control-label">质保用户车型</label>
                                                <div class="col-sm-6 col-xs-8">
                                                    <input type="text" class="form-control product_product" name="warranty[carmodel]" id="warranty_carmodel" disabled="disabled" value="<?php echo !empty($model->warranty)?$model->warranty->carmodel:''; ?>" >
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-xs-3 control-label">质保用户车牌</label>
                                                <div class="col-sm-6 col-xs-8">
                                                    <input type="text" class="form-control product_product" name="warranty[carlicence]" id="warranty_carlicence" disabled="disabled" value="<?php echo !empty($model->warranty)?$model->warranty->carlicence:''; ?>" >
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-xs-3 control-label">质保用户发动机号</label>
                                                <div class="col-sm-6 col-xs-8">
                                                    <input type="text" class="form-control product_product" name="warranty[engineno]" id="warranty_engineno" disabled="disabled" value="<?php echo !empty($model->warranty)?$model->warranty->engineno:''; ?>" >
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-xs-3 control-label">质保时间</label>
                                                <div class="col-sm-6 col-xs-8">
                                                    <input type="text" class="form-control product_product" name="warranty[construct_time]" id="warranty_construct_time" disabled="disabled" value="<?php echo !empty($model->warranty)?$model->warranty->construct_time:''; ?>" >
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'actpart',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->dropDownList($model,'actpart',$ptype,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                                        <?php echo $form->error($model,'actpart',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'storeid',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->dropDownList($model,'storeid',$store_data,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                                        <?php echo $form->error($model,'storeid',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <div class="form-group">-->
<!--                                    --><?php //echo $form->label($model,'bid',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
<!--                                    <div class="col-sm-6 col-xs-8">-->
<!--                                        --><?php //echo $form->dropDownList($model,'bid',$brand_arr,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
<!--                                        --><?php //echo $form->error($model,'bid',array('class'=>'help-block'));?>
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <div class="form-group">-->
<!--                                    --><?php //echo $form->label($model,'type',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
<!--                                    <div class="col-sm-6 col-xs-8">-->
<!--                                        --><?php //echo $form->dropDownList($model,'type',$ptype,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
<!--                                        --><?php //echo $form->error($model,'type',array('class'=>'help-block'));?>
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </td>-->
<!--                        </tr>-->
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'constructor',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'constructor', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'constructor',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'action_no',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'action_no', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'action_no',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'action',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'action', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'action',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'acttime',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'acttime', array("class"=>"form-control mod-data","readonly"=>true));?>
                                        <?php echo $form->error($model,'acttime',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'act_reason',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'act_reason', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'act_reason',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'remark',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-8 col-xs-8">
                                        <?php
                                        $this->widget('ext.ueditor.Ueditor', array(
                                            'id'=>'editor',
                                            'model'=>$model,
                                            'attribute'=>'remark',
                                            'UEDITOR_CONFIG'=>array(
                                                'UEDITOR_HOME_URL'=>Yii::app()->baseUrl.'/ueditor/',
                                                'initialFrameWidth'   => 1000,
                                                'initialFrameHeight'  => 200,
                                                'emotionLocalization'=>true,
                                                'pageBreakTag'=>'[page]',
                                                'toolbars'   => array(
                                                    array(
                                                        'source', '|',
                                                        'undo', 'redo', '|',
                                                        'bold', 'itelic', 'underline', 'fontborder', 'strikethrough', 'subscript', 'superscript', 'autotypeset', 'blockquote', 'pasteplain', '|',
                                                        'forecolor', 'backcolor', 'selectall', 'cleardoc', '|',
                                                        'RowSpacingTop', 'RowSpacingBottom', 'lineheight', '|', 'customstyle',
                                                        'paragraph', 'fontfamily', 'fontsize', '|',
                                                        'indent', 'justifyleft', 'justifyright', 'justifycenter','justifyjustify','|',
                                                        'link', 'unlink', '|',
                                                        'horizontal', 'date', 'time', 'spechars', '|',
                                                        'insertimage', 'emotion', 'insertvideo', 'fullscreen'
                                                    ),
                                                ),
                                            ),
                                        ));
                                        ?>
                                        <?php echo $form->error($model,'remark',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr><?php echo !empty($model['id'])?$model['id']:''; ?>
                            <td>
                                <?php echo CHtml::submitButton(!empty($model['id'])?'编辑质保操作记录':'添加质保操作记录',array('class'=>'btn btn-primary center-block'))?>
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
<script>
    $(function(){
        $('body').on('change','select[ng-change="js_get_warranty()"]',function(){
            js_get_warranty(this);
        });
    });
    var js_get_warranty = function(eve){
        var wid = $(eve).val();
        $.ajax({
            type:'post',
            url:'<?php echo $ajax_url;?>',
            data:{ct:'warrantyaction',ac:'getwarranty',id:wid},
            dataType:'json',
            success:function(re){
                console.log(re);
                if(re.state){
                    var msg = JSON.parse(re.msg);
                    $('#warranty_pack_name').val(msg.pack_name);
                    $('#warranty_name').val(msg.name);
                    $('#warranty_telephone').val(msg.telephone);
                    $('#warranty_address').val(msg.address);
                    $('#warranty_storeid').val(msg.store);
                    $('#warranty_carmodel').val(msg.carmodel);
                    $('#warranty_carlicence').val(msg.carlicence);
                    $('#warranty_engineno').val(msg.engineno);
                    $('#warranty_construct_time').val(msg.construct_time);
                }else{
                    $('#warranty_pack_name').val('');
                    $('#warranty_name').val('');
                    $('#warranty_telephone').val('');
                    $('#warranty_address').val('');
                    $('#warranty_storeid').val('');
                    $('#warranty_carmodel').val('');
                    $('#warranty_carlicence').val('');
                    $('#warranty_engineno').val('');
                    $('#warranty_construct_time').val('');
                    show_tip_message(re.msg,null,5000);
                }
            }
        });
    }
</script>