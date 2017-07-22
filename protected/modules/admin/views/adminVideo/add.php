<script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/back/js/webuploader.js"></script>
<style type="text/css">
    #Video_pic{
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        visibility: visible;
        opacity: 0;
        cursor: pointer;
    }
    .webuploader-element-invisible {
        clip: rect(1px, 1px, 1px, 1px);
        position: absolute !important;
    }
</style>
<div class="aw-content-wrap">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id . '/' . Yii::app()->controller->id . '/index');?>">企业视频列表</a>
                    </li>
                    <li class="active">
                        <a data-toggle="tab" href="#add">添加企业视频</a>
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
                        'id'=>'video_add_form',
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
                                        <?php echo $form->label($model,'title',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                        <div class="col-sm-5 col-xs-8">
                                            <?php echo $form->textField($model, 'title' ,array("class"=>"form-control","empty"=>"-- 请选择 --"));?>
                                            <?php echo $form->error($model,'title',array('class'=>'help-block'));?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php echo $form->label($model,'lang',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                        <div class="col-sm-5 col-xs-8">
                                            <?php echo $form->dropdownList($model, 'lang' ,$langs,array("class"=>"form-control"));?>
                                            <?php echo $form->error($model,'lang',array('class'=>'help-block'));?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php echo $form->label($model,'thumb',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                        <div class="col-sm-2">
                                            <p>
                                                <img src="<?php echo !empty($model['thumb'])?$model['thumb']:''; ?>" alt="" class="img-polaroid" id="img-polaroid" style="width:260px;height:auto;" />
                                            </p>
                                            <div id="portrait_preview"  data-title="点击上传图片">
                                                        <span class="mod-file">
                                                            <input type="button" class="btn btn-primary" value="点击上传图片">
                                                            <?php
                                                            $this->widget('application.extensions.ajax-fileupload.AjaxFileUpload', array(
                                                                'uploadUrl' => $ajax_url,
                                                                'fileElementId' => 'portrait_preview',
                                                                'fileImgId' => 'img-polaroid',
                                                                'file_hidden_input_id' => 'Video',
                                                                'file_hidden_input_name' => 'Video[thumb]',
                                                                'data'=>array('ct'=>'Video','ac'=>'thumb'),
                                                                'htmlOptions' => array('id'=>'Video_pic','name'=>'Video[thumb]'),
                                                                'value'=>$model['thumb']
                                                            ));
                                                            ?>
                                                        </span>
                                                <?php echo $form->error($model,'thumb',array('class'=>'help-block'));?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php echo $form->label($model,'video',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                        <div class="col-sm-8 col-xs-8">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div id="attachment" class="mod-file">
                                                            <input type="button" class="btn btn-primary" value="上传附件">
                                                        </div>
                                                    </div>
                                                    <span class="mod-symbol col-xs-1 col-sm-1">&#12288;</span>
                                                    <span class="mod-symbol col-xs-1 col-sm-1">&#12288;</span>
                                                    <span class="mod-symbol col-xs-1 col-sm-1">&#12288;</span>
                                                    <div class="col-sm-4">
                                                        <div id="uploadfilename" class="form-control"><?php echo empty($model['video']['file_name'])?'暂未上传':$model['video']['file_name'];?></div>
                                                    </div>
                                                    <div class="col-sm-4" style="height:34px;line-height: 1.42857;padding: 6px 12px;">
                                                        <div style="background-color: #e8ebf0; position: relative; border-radius: 5px; display: inline-block; height: 8px;  margin: 0 10px; overflow: hidden; width: 200px;">
                                                            <div class="data-length pa" id="uploadprogressLen" style="background-color: #feab34; position: absolute; height: 8px; left: 0; top: 0; width:0%;"></div>
                                                        </div>
                                                        <span class="data-extent" id="uploadprogressNum">0%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-11 col-sm-4 mod-double">
                                                    <?php echo $form->textField($model,'video[file_name]',array('placeholder'=>'附件名称','class'=>'form-control','value'=>empty($model['video']['file_name'])?'':$model['video']['file_name']));?>
                                                </div>
                                                <span class="mod-symbol col-xs-1 col-sm-1">&#12288;</span>
                                                <div class="col-xs-11 col-sm-2">
                                                    <?php echo $form->textField($model,'video[file_size]',array('placeholder'=>'附件大小','class'=>'form-control','value'=>empty($model['video']['file_size'])?'':$model['video']['file_size']));?>
                                                </div>
                                                <span class="mod-symbol col-xs-1 col-sm-1">&#12288;</span>
                                                <div class="col-xs-11 col-sm-6">
                                                    <?php echo $form->textField($model,'video[file_path]',array('placeholder'=>'下载地址','class'=>'form-control','value'=>empty($model['video']['file_path'])?'':$model['video']['file_path']));?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-group">
                                        <?php echo $form->label($model,'desc',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                        <div class="col-sm-5 col-xs-8">
                                            <?php echo $form->textArea($model, 'desc' ,array("class"=>"form-control","placeholder"=>"请输入企业视频描述","rows"=>"6"));?>
                                            <?php echo $form->error($model,'desc',array('class'=>'help-block'));?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
							<tr>
	                            <td>
	                                <div class="form-group">
	                                    <?php echo $form->label($model,'show_type',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
	                                    <div class="col-sm-5 col-xs-8">
	                                        <?php echo $form->dropDownList($model,'show_type', $model->show_type_array,array('class'=>'form-control','empty'=>'-- 请选择 --'));?>
	                                        <?php echo $form->error($model,'show_type',array('class'=>'help-block'));?>
	                                    </div>
	                                </div>
	                            </td>
	                        </tr>
                        </tbody>
                        <tfoot>
	                        <tr>
	                            <td>
	                                <?php echo CHtml::submitButton('添加企业视频',array('class'=>'btn btn-primary center-block'))?>
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
                    <?php echo $form->label($search,'title',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'title',array("class"=>"form-control","placeholder"=>"请输入视频名称"));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'lang',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropdownList($search, 'lang',$langs,array("class"=>"form-control"));?>
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
<script type="text/javascript">
    $(function(){
        loadaction('attachment');
    });
    //任务的文件上传
    var loadaction = function(divid){
        var uploader = WebUploader.create({
            pick: {
                id: '#'+divid,
                multiple: false,
            },
            auto: true,
            chunked: true,
            formData: {'ct':'Video','ac':"uploadfile"},
            server: '<?php echo $ajax_url;?>',
            fileNumLimit:50,
            fileSizeLimit:200 * 1024 * 1024,
            fileSingleSizeLimit: 199 * 1024 * 1024,
            accept:{
                title: 'swf',
                extensions: 'swf,mp4,flv',
                mimeTypes: 'application/x-msdownload'
            }
        });
        //当上传文件被加入队列以后触发
        uploader.on("fileQueued",function(file){
            $('#uploadfilename').text(file.name);
        });
        //上传成功后的传入数组
        uploader.onUploadSuccess = function(file,response) {
            if(!response.error && response.result && response.result.uploaded){
                console.log(response.result);
                $('#Video_video_file_name').val(response.result.file_name);
                $('#Video_video_file_size').val(response.result.file_size);
                $('#Video_video_file_path').val(response.result.file_path);
            }
        };
        $("#uploadprogressNum").text(Math.floor(0*100) + "%");
        $("#uploadprogressLen").width(0*100 + "%");
        //上传过程中触发，携带上传进度。
        uploader.on( 'uploadProgress', function( file, percentage ) {
            $("#uploadprogressNum").text(Math.floor(percentage*100) + "%");
            $("#uploadprogressLen").width(percentage*100 + "%");
        });
        //当所有文件上传结束时触发。
        uploader.on("uploadFinished",function(){
            //layer.msg("附件上传结束",{icon:3});

        });
        //上传失败的事件
        uploader.onError = function( code ) {
            console.log("error code =>", code);
            if(code == 'Q_EXCEED_NUM_LIMIT'){
                alert('文件超过最大个数！');
            }else if(code == 'Q_EXCEED_SIZE_LIMIT'){
                alert('文件大小不能超过200M!');
            }else if(code == 'F_DUPLICATE'){
                alert('文件重复！');

            }else if(code == 'F_EXCEED_SIZE'){
                alert('文件大小不能超过199M!');
            }else{
                alert('上传文件类型错误!');
            }
            uploader.stop();
        };
    };
</script>