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
                        <li class="active">
                            <a href="javascript:;">站点信息</a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/filePath');?>">文件存储位置</a>
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
			                        <label for="SiteSettingForm_siteLogoFile" class="col-sm-4 col-xs-3 control-label">站点LOGO</label>
			                        <div class="col-sm-2">
			                     		<p>
			                          		<img id="img-polaroid" class="img-polaroid" style="width: 50px; height: 50px;" src="<?php echo isset($config['site']['logo'])?$config['site']['logo']:'';?>" alt="">
			                   			</p>
                                      	<span class="mod-file" id="portrait_preview">
                                        	<input type="button" value="点击更换LOGO" class="btn btn-primary">
											<?php 
											$this->widget('application.extensions.ajax-fileupload.AjaxFileUpload', array(
												'uploadUrl' => Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/upload'),
												'fileElementId' => 'portrait_preview',
												'fileImgId' => 'img-polaroid',
												'file_hidden_input_id' => 'Config_datavalue_site_logo',
												'file_hidden_input_name' => 'Config[datavalue][site][logo]',
												'data'=>'',
												'htmlOptions' => array('id'=>'Site_logo','name'=>'Site[logo]','class'=>'mod-input-file'),
												'value'=>(isset($config['site']['logo'])?$config['site']['logo']:''),
											)); 
											?>
											<span class="help-block">(像素:256*256)</span>
              							</span>
			                       	</div>
								</div>
	                        </td>
	                    </tr>
						<tr>
							<td>
								<div class="form-group">
									<span class="col-sm-4 col-xs-3 control-label">网站名称:</span>
									<div class="col-sm-5 col-xs-8">
										<?php echo $form->textField($model,'datavalue[site][name]',array('class'=>'form-control','value'=>isset($config['site']['name'])?$config['site']['name']:'')); ?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="form-group">
									<span class="col-sm-4 col-xs-3 control-label">网站标题:</span>
									<div class="col-sm-5 col-xs-8">
									 	<?php echo $form->textField($model,'datavalue[site][title]',array('class'=>'form-control','value'=>isset($config['site']['title'])?$config['site']['title']:'')); ?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="form-group">
									<span class="col-sm-4 col-xs-3 control-label">网站描述:</span>
									<div class="col-sm-5 col-xs-8">
									 	<?php echo $form->textArea($model,'datavalue[site][desc]',array('rows'=>4,'class'=>'form-control textarea','value'=>isset($config['site']['desc'])?$config['site']['desc']:'')); ?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="form-group">
									<span class="col-sm-4 col-xs-3 control-label">网站关键字:</span>
									<div class="col-sm-5 col-xs-8">
									 	<?php echo $form->textArea($model,'datavalue[site][keywords]',array('rows'=>4,'class'=>'form-control textarea','value'=>isset($config['site']['keywords'])?$config['site']['keywords']:'')); ?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="form-group">
									<span class="col-sm-4 col-xs-3 control-label">公司名称</span>
									<div class="col-sm-5 col-xs-8">
										<?php echo $form->textField($model,'datavalue[site][company]',array('size'=>45,'maxlength'=>45, 'class'=>'form-control','value'=>isset($config['site']['company'])?$config['site']['company']:''));?>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="form-group">
									<span class="col-sm-4 col-xs-3 control-label">版权描述</span>
									<div class="col-sm-5 col-xs-8">
										<?php echo $form->textField($model,'datavalue[site][copyright]',array('size'=>300,'maxlength'=>300, 'class'=>'form-control','value'=>isset($config['site']['copyright'])?$config['site']['copyright']:''));?>
									</div>
								</div>
							</td>
						</tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <span class="col-sm-4 col-xs-3 control-label">关于我们</span>
                                    <div class="col-sm-5 col-xs-8">
                                        <?php echo $form->textArea($model,'datavalue[site][aboutus]',array('rows'=>4,'size'=>3000,'maxlength'=>3000, 'class'=>'form-control','value'=>isset($config['site']['aboutus'])?$config['site']['aboutus']:''));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <span class="col-sm-4 col-xs-3 control-label">联系我们</span>
                                    <div class="col-sm-5 col-xs-8">
                                        <?php echo $form->textField($model, 'datavalue[site][siteCallus]', array('placeholder'=>'请输入联系我们的信息','value'=>isset($config['site']['siteCallus'])?$config['site']['siteCallus']:'',"class"=>"form-control"));?>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group">
                                    <span class="col-sm-1 col-xs-3 control-label">合作伙伴:</span>
                                    <div class="col-sm-11 col-xs-8" ng-click="js_group_footer_container()">
                                        <?php
                                        $values = $model->find('var="group"');
                                        $groups = !empty($values)?unserialize($values->datavalue):[];
                                        if(!empty($groups)){
                                            foreach ($groups as $key=>$siteGroupFooters){
                                                ?>
                                                <div class="row" ng-index="<?php echo $key?>">
                                                    <div class="col-sm-4 mod-double">
                                                        <?php echo $form->textField($model,'datavalue[group]['.$key.'][link]',array('placeholder'=>'链接','value'=>$siteGroupFooters['link'],'class'=>'form-control'));?>
                                                    </div>
                                                    <div class="col-sm-2 mod-double">
                                                        <?php echo $form->textField($model, 'datavalue[group]['.$key.'][title]', array('placeholder'=>'名称','value'=>$siteGroupFooters['title'],"class"=>"form-control"));?>
                                                    </div>
                                                    <span class="mod-symbol col-xs-1 col-sm-1"> </span>
                                                    <div class="col-sm-2 mod-double">
                                                        <select  class="form-control" name="Config[datavalue][group][<?php echo $key ?>][enable]" id="Config_datavalue_group_<?php echo $key ?>_enable">
                                                            <option value="0" <?php echo !$siteGroupFooters['enable']?'selected="selected"':''; ?>>不推荐</option>
                                                            <option value="1" <?php echo $siteGroupFooters['enable']?'selected="selected"':''; ?>>推荐</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-1">
                                                <span class="mod-file">
                                                    <input type="button" value="点击上传图片" class="btn btn-primary" name="siteGroupFooters_<?php echo $key ?>_image" id="siteGroupFooters_<?php echo $key ?>_image">
                                                    <?php echo $form->FileField($model,'group['.$key.'][image]',array('exts'=>'png|jpg|bmp|jpeg','class'=>'mod-input-file'));?>
                                                    <?php echo $form->HiddenField($model,'datavalue[group]['.$key.'][image]',array('exts'=>'png|jpg|bmp|jpeg','class'=>'mod-input-file','value'=>$siteGroupFooters['image']));?>
                                                </span>
                                                    </div>
                                                    <span class="mod-symbol col-xs-1 col-sm-1"> </span>
                                                    <div class="col-sm-1 mod-double">
                                                        <?php echo $form->textField($model, 'datavalue[group]['.$key.'][order]', array('placeholder'=>'排序号','value'=>$siteGroupFooters['order'],"class"=>"form-control"));?>
                                                    </div>
                                                    <?php
                                                    if($key == 0){
                                                        ?>
                                                        <a class="icon icon-plus md-tip" ng-click="js_group_footer_add()" style="margin: 5px;" href="javascript:;" data-original-title="添加"></a>
                                                    <?php
                                                    }else{
                                                        ?>
                                                        <a class="icon icon-delete md-tip" ng-click="js_group_footer_delete()" style="margin: 5px;" href="javascript:;" data-original-title="删除"></a>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            <?php
                                            }
                                        }else{
                                            ?>
                                            <div class="row" ng-index="0">
                                                <div class="col-sm-4 mod-double">
                                                    <?php echo $form->textField($model,'datavalue[group][0][link]',array('placeholder'=>'链接','value'=>'','class'=>'form-control',"onblur"=>"createLink(this)"));?>
                                                </div>
                                                <div class="col-sm-2 mod-double">
                                                    <?php echo $form->textField($model, 'datavalue[group][0][title]', array('placeholder'=>'名称','value'=>'',"class"=>"form-control"));?>
                                                </div>
                                                <span class="mod-symbol col-xs-1 col-sm-1"> </span>
                                                <div class="col-sm-2 mod-double">
                                                    <?php echo $form->dropDownList($model, 'datavalue[group][0][enable]', array('0'=>'不推荐','1'=>'推荐'), array('empty'=>'是否推荐',"class"=>"form-control"));?>
                                                </div>
                                                <div class="col-sm-1">
                                                <span class="mod-file">
                                                    <input type="button" value="点击上传图片" class="btn btn-primary" name="siteGroupFooters_0_image" id="siteGroupFooters_0_image">
                                                    <?php echo $form->FileField($model,'group[0][image]',array('exts'=>'png|jpg|bmp|jpeg','class'=>'mod-input-file'));?>
                                                    <?php echo $form->HiddenField($model,'datavalue[group][0][image]',array('exts'=>'png|jpg|bmp|jpeg','class'=>'mod-input-file'));?>
                                                </span>
                                                </div>
                                                <span class="mod-symbol col-xs-1 col-sm-1"> </span>
                                                <div class="col-sm-1 mod-double">
                                                    <?php echo $form->textField($model, 'datavalue[group][0][order]', array('placeholder'=>'排序号','value'=>'',"class"=>"form-control"));?>
                                                </div>
                                                <a class="icon icon-plus md-tip" ng-click="js_group_footer_add()" style="margin: 5px;" href="javascript:;" title="添加"></a>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
					</tbody>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label class='col-sm-2 col-xs-3 control-label' style="margin-left: -20px;">短信设置</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <span class="col-sm-4 col-xs-3 control-label">短信标题</span>
                                    <div class="col-sm-5 col-xs-8">
                                        <?php echo $form->textField($model,'datavalue[phone][signname]',array('size'=>300,'maxlength'=>300, 'class'=>'form-control','value'=>isset($config['phone']['signname'])?$config['phone']['signname']:''));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <span class="col-sm-4 col-xs-3 control-label">短信appkey</span>
                                    <div class="col-sm-5 col-xs-8">
                                        <?php echo $form->textField($model,'datavalue[phone][appkey]',array('size'=>300,'maxlength'=>300, 'class'=>'form-control','value'=>isset($config['phone']['appkey'])?$config['phone']['appkey']:''));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <span class="col-sm-4 col-xs-3 control-label">短信appsecret</span>
                                    <div class="col-sm-5 col-xs-8">
                                        <?php echo $form->textField($model, 'datavalue[phone][secretKey]', array('value'=>isset($config['phone']['secretKey'])?$config['phone']['secretKey']:'',"class"=>"form-control"));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <span class="col-sm-2 col-xs-3 control-label">短信发送设置</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <span class="col-sm-2 col-xs-3 control-label">质保成功短信</span>
                                    <div class="col-sm-3 col-xs-5">
                                        <?php echo $form->textField($model, 'datavalue[phone1][success][code]', array('value'=>isset($config['phone1']['success']['code'])?$config['phone1']['success']['code']:'',"class"=>"form-control",'placeholder'=>'请输入短信编号'));?>
                                    </div>
                                    <div class="col-sm-3 col-xs-5">
                                        <?php echo $form->textField($model, 'datavalue[phone1][success][count]', array('value'=>isset($config['phone1']['success']['count'])?$config['phone1']['success']['count']:'',"class"=>"form-control",'placeholder'=>'请输入短信发送次数'));?>
                                    </div>
                                    <div class="col-sm-3 col-xs-5">
                                        <?php echo $form->textField($model, 'datavalue[phone1][success][time]', array('value'=>isset($config['phone1']['success']['time'])?$config['phone1']['success']['time']:'',"class"=>"form-control",'placeholder'=>'请输入短信发送时间间隔'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <span class="col-sm-2 col-xs-3 control-label">质保失败短信</span>
                                    <div class="col-sm-3 col-xs-5">
                                        <?php echo $form->textField($model, 'datavalue[phone1][fail][code]', array('value'=>isset($config['phone1']['fail']['code'])?$config['phone1']['fail']['code']:'',"class"=>"form-control",'placeholder'=>'请输入短信编号'));?>
                                    </div>
                                    <div class="col-sm-3 col-xs-5">
                                        <?php echo $form->textField($model, 'datavalue[phone1][fail][count]', array('value'=>isset($config['phone1']['fail']['count'])?$config['phone1']['fail']['count']:'',"class"=>"form-control",'placeholder'=>'请输入短信发送次数'));?>
                                    </div>
                                    <div class="col-sm-3 col-xs-5">
                                        <?php echo $form->textField($model, 'datavalue[phone1][fail][time]', array('value'=>isset($config['phone1']['fail']['time'])?$config['phone1']['fail']['time']:'',"class"=>"form-control",'placeholder'=>'请输入短信发送时间间隔'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <span class="col-sm-2 col-xs-3 control-label">发送验证码</span>
                                    <div class="col-sm-3 col-xs-5">
                                        <?php echo $form->textField($model, 'datavalue[phone1][auth][code]', array('value'=>isset($config['phone1']['auth']['code'])?$config['phone1']['auth']['code']:'',"class"=>"form-control",'placeholder'=>'请输入短信编号'));?>
                                    </div>
                                    <div class="col-sm-3 col-xs-5">
                                        <?php echo $form->textField($model, 'datavalue[phone1][auth][count]', array('value'=>isset($config['phone1']['auth']['count'])?$config['phone1']['auth']['count']:'',"class"=>"form-control",'placeholder'=>'请输入短信发送次数'));?>
                                    </div>
                                    <div class="col-sm-3 col-xs-5">
                                        <?php echo $form->textField($model, 'datavalue[phone1][auth][time]', array('value'=>isset($config['phone1']['auth']['count'])?$config['phone1']['auth']['time']:'',"class"=>"form-control",'placeholder'=>'请输入短信发送时间间隔'));?>
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

<script type="text/javascript">
    $(function(){
        $('body').on('click','a[ng-click="js_footer_add()"]',function(){
            js_footer_add();
            return false;
        });
        $('body').on('click','a[ng-click="js_footer_delete()"]',function(){
            js_footer_delete(this);
        });
        $('body').on('click','a[ng-click="js_aboutus_add()"]',function(){
            js_aboutus_add();
            return false;
        });
        $('body').on('click','a[ng-click="js_aboutus_delete()"]',function(){
            js_aboutus_delete(this);
        });
        $('body').on('click','a[ng-click="js_treat_add()"]',function(){
            js_treat_add();
            return false;
        });
        $('body').on('click','a[ng-click="js_treat_delete()"]',function(){
            js_treat_delete(this);
        });
        $('body').on('click','a[ng-click="js_contactus_add()"]',function(){
            js_contactus_add();
            return false;
        });
        $('body').on('click','a[ng-click="js_contactus_delete()"]',function(){
            js_contactus_delete(this);
        });
        $('body').on('click','a[ng-click="js_group_footer_add()"]',function(){
            js_group_footer_add();
            return false;
        });
        $('body').on('click','a[ng-click="js_group_footer_delete()"]',function(){
            js_group_footer_delete(this);
        });
    });
    var js_footer_add = function(){
        var container = $('div[ng-click="js_footer_container()"]');
        if(container.length > 0){
            var chlid = container.children();
            var chlidnode = chlid.length;
            if(chlidnode > 0){
                var node = chlid.eq(0);
                var copynode = node.clone();
                copynode.find('div[class="tooltip fade top in"]').remove();
                copynode.find('input').each(function(){
                    var name = $(this).attr('name');
                    var change_name = name.replace('0',chlidnode);
                    $(this).attr('name',change_name);
                    var id = $(this).attr('id');
                    var change_id = id.replace('0',chlidnode);
                    $(this).attr('id',change_id);
                    $(this).val('');
                });
                copynode.find('a').replaceWith('<a class="icon icon-delete md-tip" ng-click="js_footer_delete()" style="margin: 5px;" href="javascript:;" title="删除"></a>');
                container.append(copynode);
            }
        }
        return false;
    };
    var js_footer_delete = function(eve){
        $(eve).parent('div[class="row"]').remove();
        return false;
    };
    var js_aboutus_add = function(){
        var container = $('div[ng-click="js_footer_aboutus_container()"]');
        if(container.length > 0){
            var chlid = container.children();
            var chlidnode = chlid.length;
            if(chlidnode > 0){
                var node = chlid.eq(0);
                var copynode = node.clone();
                copynode.find('div[class="tooltip fade top in"]').remove();
                copynode.find('input').each(function(){
                    var name = $(this).attr('name');
                    var change_name = name.replace('0',chlidnode);
                    $(this).attr('name',change_name);
                    var id = $(this).attr('id');
                    var change_id = id.replace('0',chlidnode);
                    $(this).attr('id',change_id);
                    $(this).val('');
                });
                copynode.find('a').replaceWith('<a class="icon icon-delete md-tip" ng-click="js_aboutus_delete()" style="margin: 5px;" href="javascript:;" title="删除"></a>');
                chlid.eq(chlidnode-1).after(copynode);
            }
        }
        return false;
    };
    var js_aboutus_delete = function(eve){
        $(eve).parent('div[class="row"]').remove();
        return false;
    };
    var js_treat_add = function(){
        var container = $('div[ng-click="js_footer_treat_container()"]');
        if(container.length > 0){
            var chlid = container.children();
            var chlidnode = chlid.length;
            if(chlidnode > 0){
                var index = parseInt(chlid.eq(chlidnode-1).attr('ng-index'))+1;
                var node = chlid.eq(0);
                var copynode = node.clone();
                copynode.attr('ng-index',index);
                copynode.find('div[class="tooltip fade top in"]').remove();
                copynode.find('input').each(function(){
                    var name = $(this).attr('name');
                    var change_name = name.replace('0',index);
                    $(this).attr('name',change_name);
                    var id = $(this).attr('id');
                    var change_id = id.replace('0',index);
                    $(this).attr('id',change_id);
                    $(this).val('');
                });
                copynode.find('a').replaceWith('<a class="icon icon-delete md-tip" ng-click="js_treat_delete()" style="margin: 5px;" href="javascript:;" title="删除"></a>');
                chlid.eq(chlidnode-1).after(copynode);
            }
        }
        return false;
    };
    var js_treat_delete = function(eve){
        $(eve).parent('div[class="row"]').remove();
        return false;
    };



    var js_contactus_add = function(){
        var container = $('div[ng-click="js_footer_contactus_container()"]');
        if(container.length > 0){
            var chlid = container.children();
            var chlidnode = chlid.length;
            if(chlidnode > 0){
                var index = parseInt(chlid.eq(chlidnode-1).attr('ng-index'))+1;
                var node = chlid.eq(0);
                var copynode = node.clone();
                copynode.attr('ng-index',index);
                //copynode.find('div[class="tooltip fade top in"]').remove();
                copynode.find('input').each(function(){
                    var name = $(this).attr('name');
                    var change_name = name.replace('0',index);
                    $(this).attr('name',change_name);
                    var id = $(this).attr('id');
                    var change_id = id.replace('0',index);
                    $(this).attr('id',change_id);
                    $(this).val('');
                });
                copynode.find("input[type='button']").val('点击上传图片');
                copynode.find('select').each(function(){
                    var name = $(this).attr('name');
                    var change_name = name.replace('0',index);
                    $(this).attr('name',change_name);
                    var id = $(this).attr('id');
                    var change_id = id.replace('0',index);
                    $(this).attr('id',change_id);
                    $(this).val('');
                });
                copynode.find('a').replaceWith('<a class="icon icon-delete md-tip" ng-click="js_contactus_delete()" style="margin: 5px;" href="javascript:;" title="删除"></a>');
                chlid.eq(chlidnode-1).after(copynode);
            }
        }
        return false;
    }
    var js_contactus_delete = function(eve){
        $(eve).parent('div[class="row"]').remove();
        return false;
    }

    var js_group_footer_add = function(){
        var container = $('div[ng-click="js_group_footer_container()"]');
        if(container.length > 0){
            var chlid = container.children();
            var chlidnode = chlid.length;
            console.log(chlidnode);
            if(chlidnode > 0){
                var index = parseInt(chlid.eq(chlidnode-1).attr('ng-index'))+1;
                console.log(index);
                var node = chlid.eq(0);
                var copynode = node.clone();
                copynode.attr('ng-index',index);
                copynode.find('div[class="tooltip fade top in"]').remove();
                copynode.find('input').each(function(){
                    var name = $(this).attr('name');
                    var change_name = name.replace('0',index);
                    $(this).attr('name',change_name);
                    var id = $(this).attr('id');
                    var change_id = id.replace('0',index);
                    $(this).attr('id',change_id);
                    $(this).val('');
                });
                copynode.find("input[type='button']").val('点击上传图片');
                copynode.find('select').each(function(){
                    var name = $(this).attr('name');
                    var change_name = name.replace('0',index);
                    $(this).attr('name',change_name);
                    var id = $(this).attr('id');
                    var change_id = id.replace('0',index);
                    $(this).attr('id',change_id);
                    $(this).val('');
                });
                copynode.find('a').replaceWith('<a class="icon icon-delete md-tip" ng-click="js_corners_delete()" style="margin: 5px;" href="javascript:;" title="删除"></a>');
                chlid.eq(chlidnode-1).after(copynode);
            }
        }
        return false;
    }
    var js_group_footer_delete = function(eve){
        $(eve).parent('div[class="row"]').remove();
        return false;
    }
</script>