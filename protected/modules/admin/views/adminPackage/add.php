<div class="aw-content-wrap">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');?>">套餐列表</a>
                    </li>
                    <li class="active">
                        <a data-toggle="tab" href="#add">添加套餐</a>
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
                    <input type="hidden" value="<?php echo !empty($model['id'])?$model['id']:''; ?>" name="id">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'name',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'name', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'name',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                        <td>
                            <div class="form-group">
                                <?php echo $form->label($model,'ename',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                <div class="col-sm-6 col-xs-8">
                                    <?php echo $form->textField($model, 'ename', array("class"=>"form-control"));?>
                                    <?php echo $form->error($model,'ename',array('class'=>'help-block'));?>
                                </div>
                            </div>
                        </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'intro',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-8 col-xs-8">
                                        <?php
                                        $this->widget('ext.ueditor.Ueditor', array(
                                            'id'=>'editor',
                                            'model'=>$model,
                                            'attribute'=>'intro',
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
                                        <?php echo $form->error($model,'intro',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'eintro',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-8 col-xs-8">
                                        <?php
                                        $this->widget('ext.ueditor.Ueditor', array(
                                            'id'=>'editor',
                                            'model'=>$model,
                                            'attribute'=>'eintro',
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
                                        <?php echo $form->error($model,'intro',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr><?php echo !empty($model['id'])?$model['id']:''; ?>
                            <td>
                                <?php echo CHtml::submitButton(!empty($model['id'])?'编辑套餐':'添加套餐',array('class'=>'btn btn-primary center-block'))?>
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
                    <?php echo $form->label($search,'name',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'name', array("class"=>"form-control"));?>
                        <?php echo $form->error($search,'name',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'ename',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'ename', array("class"=>"form-control"));?>
                        <?php echo $form->error($search,'ename',array('class'=>'help-block'));?>
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