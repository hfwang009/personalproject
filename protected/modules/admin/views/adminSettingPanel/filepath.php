<div class="aw-content-wrap">
	<?php 
	$form = $this->beginWidget("CActiveForm",array(
			'id'=>'settings_form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions'=>array('enctype'=>'multipart/form-data'),
		)
	);?>	
		<div class="mod">
			<div class="mod-head">
				<h3>
					<ul class="nav nav-tabs">
                        <li>
                            <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');?>">站点信息</a>
                        </li>
                        <li class="active">
                            <a href="javascript:;">文件存储位置</a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/set');?>">参数设置</a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/sysset');?>">系统参数设置</a>
                        </li>
					</ul>
				</h3>
			</div>
			<div class="tab-content mod-content">
				<table class="table table-striped">
					<tbody>
						<tr>
							<td>
								<div class="form-group">
									<div class="col-sm-12 col-xs-8">
									<?php 
									if ($model->success) {
									?>
										<p style="color: red; text-align: center;"><?php echo '更新成功！';?></p>
									<?php 
									}else{  
										echo $form->errorSummary($model); 
									}
									?>	
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="form-group">
									<span class="col-sm-4 col-xs-3 control-label">系统默认路径:</span>
									<div class="col-sm-5 col-xs-8">
										<?php echo $form->textField($model,'datavalue[path][systemfile]',array('class'=>'form-control','value'=>isset($config['path']['systemfile'])?$config['path']['systemfile']:'')); ?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="form-group">
									<span class="col-sm-4 col-xs-3 control-label">默认存储路径:</span>
									<div class="col-sm-5 col-xs-8">
										<?php echo $form->textField($model,'datavalue[path][defaultfile]',array('class'=>'form-control','value'=>isset($config['path']['defaultfile'])?$config['path']['defaultfile']:'')); ?>
									</div>
								</div>
							</td>
						</tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <span class="col-sm-4 col-xs-3 control-label">广告图片存储路径:</span>
                                    <div class="col-sm-5 col-xs-8">
                                        <?php echo $form->textField($model,'datavalue[path][adpic]',array('class'=>'form-control','value'=>isset($config['path']['adpic'])?$config['path']['adpic']:'')); ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <span class="col-sm-4 col-xs-3 control-label">视频图片存储路径:</span>
                                    <div class="col-sm-5 col-xs-8">
                                        <?php echo $form->textField($model,'datavalue[path][videopic]',array('class'=>'form-control','value'=>isset($config['path']['videopic'])?$config['path']['videopic']:'')); ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <span class="col-sm-4 col-xs-3 control-label">视频存储路径:</span>
                                    <div class="col-sm-5 col-xs-8">
                                        <?php echo $form->textField($model,'datavalue[path][videopath]',array('class'=>'form-control','value'=>isset($config['path']['videopath'])?$config['path']['videopath']:'')); ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <span class="col-sm-4 col-xs-3 control-label">文章图片存储路径:</span>
                                    <div class="col-sm-5 col-xs-8">
                                        <?php echo $form->textField($model,'datavalue[path][articleimages]',array('class'=>'form-control','value'=>isset($config['path']['articleimages'])?$config['path']['articleimages']:'')); ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
					</tbody>
				</table>
			</div>

			<div class="tab-content mod-content mod-one-btn">
				<div class="center-block">
					<input type="submit" class="btn btn-primary" value="保存设置">
				</div>
			</div>
		</div>
	<?php $this->endWidget(); ?>
</div>