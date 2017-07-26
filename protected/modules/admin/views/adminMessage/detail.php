<div class="aw-content-wrap">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');?>">反馈列表</a>
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
                        'action'=>Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index'),
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                        ),
                        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
                    ));
                    ?>
                    <input type="hidden" value="<?php echo !empty($model['id'])?$model['id']:''; ?>" name="id">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'name',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'name', array("class"=>"form-control",'disabled'=>true));?>
                                        <?php echo $form->error($model,'name',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'type',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->dropdownList($model, 'type', $model->type_arr, array("class"=>"form-control",'disabled'=>true));?>
                                        <?php echo $form->error($model,'type',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'telephone',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'telephone', array("class"=>"form-control",'disabled'=>true));?>
                                        <?php echo $form->error($model,'telephone',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'address',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'address', array("class"=>"form-control",'disabled'=>true));?>
                                        <?php echo $form->error($model,'address',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'message',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textarea($model, 'message', array("class"=>"form-control",'rows'=>20,'disabled'=>true));?>
                                        <?php echo $form->error($model,'message',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr><?php echo !empty($model['id'])?$model['id']:''; ?>
                            <td>
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