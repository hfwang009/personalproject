<div class="aw-content-wrap">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');?>">文章列表</a>
                    </li>
                    <li class="active">
                        <a data-toggle="tab" href="#add">添加文章</a>
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
                                    <?php echo $form->label($model,'title',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'title', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'title',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'content',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-8 col-xs-8">
                                        <?php
                                        $this->widget('ext.ueditor.Ueditor', array(
                                            'id'=>'editor',
                                            'model'=>$model,
                                            'attribute'=>'content',
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
                                <?php echo CHtml::submitButton(!empty($model['id'])?'编辑文章':'添加文章',array('class'=>'btn btn-primary center-block'))?>
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
                    <?php echo $form->label($search,'title',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'title', array("class"=>"form-control"));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'ctime',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <div class="row">
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($search, 'ctime_start', array("class"=>"form-control mod-data"));?>
                            </div>
                            <span class="mod-symbol col-xs-1 col-sm-1"> - </span>
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($search, 'ctime_end', array("class"=>"form-control mod-data"));?>
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
<script type="text/javascript">
    $(function(){
        $('body').on('blur','#Product_price',function(){
            js_check_price(this);
        });
    });
    var js_check_price = function(eve){
        var s = $(eve).val();
        if(isEmpty(s)){
            $(eve).val(0.00);
        }else{
            var _s = parseFloat(s,2);
            if(isNaN(_s)){
                _s = 0.00;
            }
            $(eve).val(_s);
        }
    }
</script>