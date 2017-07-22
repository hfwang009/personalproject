<style>
    #UsersInfo_portrait{
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        visibility: visible;
        opacity: 0;
        cursor: pointer;
    }
    #flash_portrait{
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        visibility: visible;
        opacity: 0;
        cursor: pointer;
    }
    #thumb_portrait{
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        visibility: visible;
        opacity: 0;
        cursor: pointer;
    }
    #video_portrait{
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        visibility: visible;
        opacity: 0;
        cursor: pointer;
    }

    li::after, div::after, ul::after {
        clear: both;
        content: "";
        display: table;
    }
</style>
<div class="aw-content-wrap">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id . '/' . Yii::app()->controller->id . '/index');?>">广告列表</a>
                    </li>
                    <li class="active">
                        <a data-toggle="tab" href="#add">添加广告</a>
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
                        'id'=>'article_add_form',
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
                                    <?php echo $form->label($model,'ad_name',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-5 col-xs-8">
                                        <?php echo $form->textField($model, 'ad_name', array("class"=>"form-control"));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'position_id',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-5 col-xs-8">
                                        <?php echo $form->dropDownList($model,'position_id',$model->ad_position_array,array("empty"=>"选择广告位置",'class'=>'form-control'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'lang',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-5 col-xs-8">
                                        <?php echo $form->dropDownList($model,'lang',$langs,array('class'=>'form-control'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'media_type',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-5 col-xs-8">
                                        <?php echo $form->dropDownList($model,'media_type',$model->media_type_array,array('class'=>'form-control','onChange'=>'var type = $(this).val();if($("#meta_type_"+type).is(":hidden")){$("tbody[id^=\"meta_type_\"]").hide();$("#meta_type_"+type).show();}return false;'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tbody id="meta_type_1">
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'ad_link',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                    	<div class="row">
                                    		<div class="col-sm-10 col-xs-8">
                                    			<?php echo $form->textField($model, 'ad_link', array("class"=>"form-control"));?>
<!--                                        		--><?php //echo $form->hiddenField($model, 'outer_link');?>
<!--                                        		--><?php //echo $form->hiddenField($model, 'outer_code');?>
                                        	</div>
                                        	<div class="col-sm-2 col-xs-8">
<!--                                        		<a class="btn btn-primary" href="javascript:;" ng-click="js_create_link()">生成统计链接</a>-->
                                        	</div>
                                        </div>	
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'ad_img',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-2">
                                        <p>
                                            <img src="<?php echo !empty($model['ad_code'])?$model['ad_code']:''; ?>" alt="" class="img-polaroid" id="img-polaroid" style="width:260px;height:auto;" />
<!--                                            --><?php //echo $form->hiddenField($model,'ad_img',array("id"=>'img_hidden_input'));?>
                                        </p>
                                        <div id="portrait_preview"  data-title="点击上传图片">
                                        	<span class="mod-file">
                                            	<input type="button" class="btn btn-primary" value="点击上传图片">
                                              	<?php
                                                $this->widget('application.extensions.ajax-fileupload.AjaxFileUpload', array(
                                                    'uploadUrl' => Yii::app()->createUrl(Yii::app()->controller->module->id . '/' . Yii::app()->controller->id . '/uploadImage'),
                                                    'fileElementId' => 'portrait_preview',
                                                    'fileImgId' => 'img-polaroid',
                                                    'file_hidden_input_id' => 'img_hidden_input',
                                                    'file_hidden_input_name' => 'Ad[ad_code]',
                                                    'data'=>array('media_type'=>'1','ac'=>'avatar'),
                                                    'htmlOptions' => array('id'=>'UsersInfo_portrait','name'=>'upload'),
                                                    'value'=>!empty($model['ad_code'])?$model['ad_code']:''
                                                ));
                                          		?>
                                        	</span>                        
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'start_time',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-2 col-xs-8">
                                        <?php echo $form->textField($model, 'start_time', array("class"=>"form-control mod-data date-start"));?>
                                        <i class="icon icon-date"></i>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'end_time',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-2 col-xs-8">
                                        <?php echo $form->textField($model, 'end_time', array("class"=>"form-control mod-data date-start"));?>
                                        <i class="icon icon-date"></i>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'sort_order',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-2 col-xs-8">
                                        <?php echo $form->textField($model, 'sort_order', array("class"=>"form-control"));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'ad_link_type',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-5 col-xs-8">
                                        <?php echo $form->dropDownList($model,'ad_link_type',$model->ad_link_type_array,array('class'=>'form-control'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'link_man',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-5 col-xs-8">
                                        <?php echo $form->textField($model, 'link_man', array("class"=>"form-control"));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'link_email',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-5 col-xs-8">
                                        <?php echo $form->textField($model, 'link_email', array("class"=>"form-control"));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'link_phone',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-5 col-xs-8">
                                        <?php echo $form->textField($model, 'link_phone', array("class"=>"form-control"));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'enabled',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-5 col-xs-8">
                                        <div class="btn-group mod-btn">
                                            <label type="button" class="btn mod-btn-color">
                                                <?php echo $form->radioButton($model,"enabled",array('value'=>1,'checked'=>true,'uncheckValue'=>null));?>是
                                            </label>
                                            <label type="button" class="btn mod-btn-color">
                                                <?php echo $form->radioButton($model,"enabled",array('value'=>2,'checked'=>false,'uncheckValue'=>null));?>否
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
                                <?php echo CHtml::submitButton('添加广告',array('class'=>'btn btn-primary center-block'))?>
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
                        'action'=>Yii::app()->createUrl(Yii::app()->controller->module->id . '/' . Yii::app()->controller->id . '/index'),
                        'enableClientValidation'=>false,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>false,
                        ),
                        'htmlOptions'=>array('class'=>'form-horizontal'),
                    )
                );
                ?>
                <div class="form-group">
                    <?php echo $form->label($model,'ad_name',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($model, 'ad_name', array("class"=>"form-control"));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model,'position_id',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($model, 'position_id', $model->ad_position_array, array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model,'lang',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($model, 'lang', $langs, array('class'=>'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model,'media_type',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($model, 'media_type', $model->media_type_array, array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model,'start_time',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <div class="row">
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($model, 'start_time_start', array("class"=>"form-control mod-data date-start"));?>
                                <i class="icon icon-date"></i>
                            </div>
                            <span class="mod-symbol col-xs-1 col-sm-1"> - </span>
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($model, 'start_time_end', array("class"=>"form-control mod-data date-end"));?>
                                <i class="icon icon-date"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model,'end_time',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <div class="row">
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($model, 'end_time_start', array("class"=>"form-control mod-data date-start"));?>
                                <i class="icon icon-date"></i>
                            </div>
                            <span class="mod-symbol col-xs-1 col-sm-1"> - </span>
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($model, 'end_time_end', array("class"=>"form-control mod-data date-end"));?>
                                <i class="icon icon-date"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($model,'enabled',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <div class="btn-group mod-btn">
                            <label type="button" class="btn mod-btn-color">
                                <?php echo $form->radioButton($model,"enabled",array('value'=>1,'checked'=>true,'uncheckValue'=>null));?>是
                            </label>
                            <label type="button" class="btn mod-btn-color">
                                <?php echo $form->radioButton($model,"enabled",array('value'=>2,'checked'=>false,'uncheckValue'=>null));?>否
                            </label>
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