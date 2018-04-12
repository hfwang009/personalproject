<div class="aw-content-wrap" id="user_list">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#list" data-toggle="tab">短信发送列表</a>
                    </li>
                    <li>
                        <a href="#search" data-toggle="tab">搜索</a>
                    </li>
                </ul>
            </h3>
        </div>
        <div class="mod-body tab-content">
            <div class="tab-pane active" id="list">
                <div class="mod-table-foot">
                    <div class="col-sm-4 col-xs-12 form-group">
                        <label class="col-sm-2 col-xm-3 control-label nopadding" style="line-height: 32px;">数量:</label>
                        <div class="col-sm-10 col-xs-9">
                            <input type="text" name="count" id="count" value="<?php echo $count; ?>" class="form-control " disabled="disabled">
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <form method="post" action="<?php echo Yii::app()->createUrl(Yii::app()->controller->id .'/delete')?>" id="brand_form">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" class="check-all">
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id .'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'id','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='id')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">ID<span class="glyphicon <?php echo $condition['sortFiled'] == 'id'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id .'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'type','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='type')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">短信类型<span class="glyphicon <?php echo $condition['sortFiled'] == 'type'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id .'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'phone','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='phone')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">手机号码<span class="glyphicon <?php echo $condition['sortFiled'] == 'phone'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id .'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'status','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='status')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">发送状态<span class="glyphicon <?php echo $condition['sortFiled'] == 'status'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id .'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'sms_code','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='sms_code')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">短信模板编码<span class="glyphicon <?php echo $condition['sortFiled'] == 'sms_code'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id .'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'message','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='message')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">短信发送结果信息<span class="glyphicon <?php echo $condition['sortFiled'] == 'message'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id .'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'ctime','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='ctime')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">调用接口时间<span class="glyphicon <?php echo $condition['sortFiled'] == 'ctime'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id .'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'sendtime','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='sendtime')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">发送时间<span class="glyphicon <?php echo $condition['sortFiled'] == 'sendtime'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                            </tr>
                            </thead>
                            <?php
                            if(!empty($model)){
                                ?>
                                <tbody>
                                <?php
                                foreach ($model as $_model){
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" value="<?php echo $_model['id'];?>" name="store_id[]">
                                        </td>
                                        <td><?php echo $_model['id'];?></td>
                                        <td><?php echo !empty($_model['type'])?$_model->type_arr[$_model['type']]:'--';?></td>
                                        <td><?php echo !empty($_model['phone'])?$_model['phone']:'--';?></td>
                                        <td><?php echo !empty($_model['status'])?$_model->status_arr[$_model['status']]:'--';?></td>
                                        <td><?php echo !empty($_model['sms_code'])?$_model['sms_code']:'--';?></td>
                                        <td><?php echo !empty($_model['message'])?$_model['message']:'--';?></td>
                                        <td><?php echo !empty($_model['ctime'])?date('Y-m-d H:i:s',$_model['ctime']):'--';?></td>
                                        <td><?php echo !empty($_model['sendtime'])?date('Y-m-d H:i:s',$_model['sendtime']):'--';?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </form>
                </div>

                <div class="mod-table-foot">
                    <div class="col-sm-4 col-xs-12">
                        <a class="btn btn-danger" href="javascript:;" onclick="AWS.ajax_post($('#brand_form'));">删除</a>
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        <?php
                        $this->widget('CAdminPager',array(
                                'header'=>'',
                                'pages' => $pager,
                                'maxButtonCount'=>7,
                            )
                        );
                        ?>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="search">
                <?php
                $form = $this->beginWidget("CActiveForm",array(
                        'id'=>'search_form',
                        'method'=>'get',
                        'action'=>Yii::app()->createUrl(Yii::app()->controller->module->id .'/'.Yii::app()->controller->id . '/index'),
                        'enableClientValidation'=>false,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>false,
                        ),
                        'htmlOptions'=>array('class'=>'form-horizontal'),
                    )
                );
                ?>
                <div class="form-group">
                    <?php echo $form->label($search,'type',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search,'type',$search->type_arr,array('empty'=>'-- 请选择  --', 'class'=>'form-control'));?>
                        <?php echo $form->error($search,'type',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'status',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search,'status',$search->status_arr,array('empty'=>'-- 请选择  --', 'class'=>'form-control'));?>
                        <?php echo $form->error($search,'status',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'phone',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'phone', array("class"=>"form-control"));?>
                        <?php echo $form->error($search,'phone',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'sms_code',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'sms_code', array("class"=>"form-control"));?>
                        <?php echo $form->error($search,'sms_code',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'ctime',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <div class="row">
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($search, 'ctime_start', array("class"=>"form-control mod-data","readonly"=>true));?>
                            </div>
                            <span class="mod-symbol col-xs-1 col-sm-1"> - </span>
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($search, 'ctime_end', array("class"=>"form-control mod-data","readonly"=>true));?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'sendtime',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <div class="row">
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($search, 'sendtime_start', array("class"=>"form-control mod-data","readonly"=>true));?>
                            </div>
                            <span class="mod-symbol col-xs-1 col-sm-1"> - </span>
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($search, 'sendtime_end', array("class"=>"form-control mod-data","readonly"=>true));?>
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
        $('body').on('click','a[ng-click="js_delete()"]',function(){
            var id = $(this).attr('ng-model');
            if(isEmpty(id)){
                show_tip_message('数据错误',null);
                return false;
            }
            AWS.ajax_request('<?php echo $ajax_url;?>', 'ct=provice&ac=delete&id='+id);
        });
    });
</script>