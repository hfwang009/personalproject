<div class="aw-content-wrap" id="user_list">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#list" data-toggle="tab">质保操作记录列表</a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/' .Yii::app()->controller->id . '/add');?>">添加质保操作记录</a>
                    </li>
                    <li>
                        <a href="#search" data-toggle="tab">搜索</a>
                    </li>
                </ul>
            </h3>
        </div>
        <div class="mod-body tab-content">
            <div class="tab-pane active" id="list">
                <div class="table-responsive">
                    <form method="post" action="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id .'/delete')?>" id="brand_form">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" class="check-all">
                                </th>
                                <th>操作</th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'id','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='id')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">ID<span class="glyphicon <?php echo $condition['sortFiled'] == 'id'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'wid','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='wid')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">质保号<span class="glyphicon <?php echo $condition['sortFiled'] == 'wid'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'actpart','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='actpart')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">质保位置<span class="glyphicon <?php echo $condition['sortFiled'] == 'actpart'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'storeid','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='storeid')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">质保操作门店<span class="glyphicon <?php echo $condition['sortFiled'] == 'storeid'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'constructor','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='constructor')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">操作者<span class="glyphicon <?php echo $condition['sortFiled'] == 'constructor'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'action_no','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='action_no')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">质保操作编号<span class="glyphicon <?php echo $condition['sortFiled'] == 'action_no'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'action','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='action')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">质保操作<span class="glyphicon <?php echo $condition['sortFiled'] == 'action'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'acttime','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='acttime')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">操作时间<span class="glyphicon <?php echo $condition['sortFiled'] == 'acttime'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'act_reason','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='act_reason')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">质保理由<span class="glyphicon <?php echo $condition['sortFiled'] == 'act_reason'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'admin_id','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='admin_id')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">质保操作记录添加者<span class="glyphicon <?php echo $condition['sortFiled'] == 'admin_id'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'ctime','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='ctime')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">质保操作记录添加时间<span class="glyphicon <?php echo $condition['sortFiled'] == 'ctime'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
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
                                            <input type="checkbox" value="<?php echo $_model['id'];?>" name="warrantyact_id[]">
                                        </td>
                                        <td class="nowrap">
                                            <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/add',array('id'=>$_model['id']));?>" class="icon icon-edit md-tip" title="编辑"></a>
<!--                                            <a href="javascript:;" class="icon icon-delete md-tip" title="删除" ng-model="--><?php //echo $_model['id'];?><!--" ng-click="js_delete()"></a>-->
                                        </td>
                                        <td><?php echo $_model['id'];?></td>
                                        <td><?php echo !empty($_model->warranty)?$_model->warranty->series_number:'--';?></td>
                                        <td><?php echo !empty($_model['actpart'])?$ptype[$_model['actpart']]:'--';?></td>
                                        <td><?php echo !empty($_model->warranty->store)?$_model->warranty->store->name:'--';?></td>
                                        <td><?php echo $_model['constructor'];?></td>
                                        <td><?php echo $_model['action_no'];?></td>
                                        <td><?php echo $_model['action'];?></td>
                                        <td><?php echo !empty($_model['acttime'])?date('Y-m-d',$_model['acttime']):'--';?></td>
                                        <td><?php echo !empty($_model['act_reason'])?$_model['act_reason']:'--';?></td>
                                        <td><?php echo !empty($_model->admin)?$_model->admin->username:'--';?></td>
                                        <td><?php echo !empty($_model['ctime'])?date('Y-m-d',$_model['ctime']):'--';?></td>
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
                    <?php echo $form->label($search,'storeid',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search,'storeid',$store_data,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                        <?php echo $form->error($search,'storeid',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'actpart',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search,'actpart',$ptype,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                        <?php echo $form->error($search,'actpart',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'wid',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search,'wid',$warranty_data,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                        <?php echo $form->error($search,'wid',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'constructor',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'constructor', array("class"=>"form-control"));?>
                        <?php echo $form->error($search,'constructor',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'action_no',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'action_no', array("class"=>"form-control"));?>
                        <?php echo $form->error($search,'action_no',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'action',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'action', array("class"=>"form-control"));?>
                        <?php echo $form->error($search,'action',array('class'=>'help-block'));?>
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
                    <?php echo $form->label($search,'acttime',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <div class="row">
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($search, 'acttime_end', array("class"=>"form-control mod-data","readonly"=>true));?>
                            </div>
                            <span class="mod-symbol col-xs-1 col-sm-1"> - </span>
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($search, 'acttime_end', array("class"=>"form-control mod-data","readonly"=>true));?>
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
            AWS.ajax_request('<?php echo $ajax_url;?>', 'ct=warranty&ac=delete&id='+id);
        });
        $('body').on('click','a[ng-click="js_check()"]',function(){
            var id = $(this).attr('ng-model');
            if(isEmpty(id)){
                show_tip_message('数据错误',null);
                return false;
            }
            $.ajax({
                url:'<?php echo $ajax_url;?>',
                type:'post',
                data:{ct:'warranty',ac:'getCheck',id:id},
                dataType:'json',
                success:function(re){
                    layer.open({
                        type: 1,
                        title: "查看",
                        area: ['500px', '600px'], //宽高
                        content: re.html,
                        shadeClose: true,
                        scrollbar: false
                    });
                }
            });
        });
    });
</script>