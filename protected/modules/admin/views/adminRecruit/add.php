<div class="aw-content-wrap">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id . '/' . Yii::app()->controller->id . '/index');?>">招聘信息列表</a>
                    </li>
                    <li class="active">
                        <a data-toggle="tab" href="#add">招聘信息</a>
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
                        'id'=>'recruit_add_form',
                        'method'=>'post',
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
                                        <?php echo $form->label($model,'lang',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                        <div class="col-sm-5 col-xs-8">
                                            <?php echo $form->dropDownList($model,'lang',$langs,array('class'=>'form-control'));?>
                                            <?php echo $form->error($model,'lang',$langs,array('class'=>'form-control'));?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php echo $form->label($model,'employ_name',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                        <div class="col-sm-5 col-xs-8">
                                            <?php echo $form->textField($model, 'employ_name', array("class"=>"form-control"));?>
                                            <?php echo $form->error($model, 'employ_name', array("class"=>"form-control"));?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php echo $form->label($model,'edu_level',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                        <div class="col-sm-5 col-xs-8">
                                            <?php echo $form->textField($model, 'edu_level', array("class"=>"form-control"));?>
                                            <?php echo $form->error($model, 'edu_level', array("class"=>"form-control"));?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php echo $form->label($model,'sex',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                        <div class="col-sm-5 col-xs-8">
                                            <?php echo $form->dropDownList($model,'sex',$model->sex_array,array('class'=>'form-control'));?>
                                            <?php echo $form->error($model,'sex',$model->sex_array,array('class'=>'form-control'));?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php echo $form->label($model,'specialty',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                        <div class="col-sm-5 col-xs-8">
                                            <?php echo $form->textField($model, 'specialty', array("class"=>"form-control"));?>
                                            <?php echo $form->error($model, 'specialty', array("class"=>"form-control"));?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php echo $form->label($model,'employ_length',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                        <div class="col-sm-5 col-xs-8">
                                            <?php echo $form->textField($model, 'employ_length', array("class"=>"form-control"));?>
                                            <?php echo $form->error($model, 'employ_length', array("class"=>"form-control"));?>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php echo $form->label($model,'desc',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                        <div class="col-sm-5 col-xs-8">
                                            <?php
                                            $this->widget('ext.ueditor.Ueditor', array(
                                                    'id'=>'editor',
                                                    'model'=>$model,
                                                    'attribute'=>'desc',
                                                    'UEDITOR_CONFIG'=>array(
                                                        'UEDITOR_HOME_URL'=>Yii::app()->baseUrl.'/ueditor/',
                                                        'initialFrameWidth'   => 945,
                                                        'initialFrameHeight'  => 500,
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
                                                )
                                            );
                                            ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php echo $form->label($model,'enable',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                        <div class="col-sm-5 col-xs-8">
                                            <div class="btn-group mod-btn">
                                                <label type="button" class="btn mod-btn-color">
                                                    <?php echo $form->radioButton($model,"enable",array('value'=>1,'checked'=>true,'uncheckValue'=>null));?>激活
                                                </label>
                                                <label type="button" class="btn mod-btn-color">
                                                    <?php echo $form->radioButton($model,"enable",array('value'=>2,'checked'=>false,'uncheckValue'=>null));?>未激活
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>
                                <?php echo CHtml::submitButton('添加招聘信息',array('class'=>'btn btn-primary center-block'))?>
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
                        'action'=>Yii::app()->createUrl(Yii::app()->controller->id . '/index'),
                        'enableClientValidation'=>false,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>false,
                        ),
                        'htmlOptions'=>array('class'=>'form-horizontal'),
                    )
                );
                ?>
                <div class="form-group">
                    <?php echo $form->label($search,'employ_name',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'employ_name', array("class"=>"form-control"));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'lang',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search, 'lang', $langs, array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'sex',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search, 'sex', $search->sex_array, array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'enable',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search, 'enable', $search->enable_array, array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'ctime',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <div class="row">
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($search, 'ctime_start', array("class"=>"form-control mod-data date-start"));?>
                                <i class="icon icon-date"></i>
                            </div>
                            <span class="mod-symbol col-xs-1 col-sm-1"> - </span>
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($search, 'ctime_end', array("class"=>"form-control mod-data date-end"));?>
                                <i class="icon icon-date"></i>
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