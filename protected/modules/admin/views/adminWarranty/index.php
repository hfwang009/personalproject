<div class="aw-content-wrap" id="user_list">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#list" data-toggle="tab">质保记录列表</a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/' .Yii::app()->controller->id . '/add');?>">添加质保记录</a>
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
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'series_number','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='series_number')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">质保号<span class="glyphicon <?php echo $condition['sortFiled'] == 'series_number'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'name','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='name')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">质保用户姓名<span class="glyphicon <?php echo $condition['sortFiled'] == 'name'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'mid','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='mid')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">型号<span class="glyphicon <?php echo $condition['sortFiled'] == 'mid'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'pid','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='pid')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">产品名称<span class="glyphicon <?php echo $condition['sortFiled'] == 'pid'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'storeid','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='storeid')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">质保门店<span class="glyphicon <?php echo $condition['sortFiled'] == 'storeid'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'telephone','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='telephone')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">联系电话<span class="glyphicon <?php echo $condition['sortFiled'] == 'telephone'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'carmodel','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='carmodel')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">车型<span class="glyphicon <?php echo $condition['sortFiled'] == 'carmodel'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'carlicence','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='carlicence')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">车牌号码<span class="glyphicon <?php echo $condition['sortFiled'] == 'carlicence'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'engineno','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='engineno')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">发动机编号<span class="glyphicon <?php echo $condition['sortFiled'] == 'engineno'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'constructor','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='constructor')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">施工人<span class="glyphicon <?php echo $condition['sortFiled'] == 'constructor'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'guide','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='guide')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">导购<span class="glyphicon <?php echo $condition['sortFiled'] == 'guide'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'construct_time','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='construct_time')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">施工时间<span class="glyphicon <?php echo $condition['sortFiled'] == 'construct_time'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'status','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='status')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">质保状态<span class="glyphicon <?php echo $condition['sortFiled'] == 'status'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'create_user','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='create_user')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">质保管理员<span class="glyphicon <?php echo $condition['sortFiled'] == 'create_user'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'createtime','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='createtime')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">质保申请时间<span class="glyphicon <?php echo $condition['sortFiled'] == 'createtime'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'ctime','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='ctime')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">质保时间<span class="glyphicon <?php echo $condition['sortFiled'] == 'ctime'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
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
                                            <input type="checkbox" value="<?php echo $_model['id'];?>" name="warranty_id[]">
                                        </td>
                                        <td class="nowrap">
                                            <?php if($_model['status']==1){ ?>
                                                <a href="javascript:;" class="icon icon-verify md-tip" title="查看" ng-model="<?php echo $_model['id'];?>" ng-click="js_check()"></a>
                                            <?php } ?>
                                            <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/add',array('id'=>$_model['id']));?>" class="icon icon-edit md-tip" title="编辑"></a>
                                            <a href="javascript:;" class="icon icon-delete md-tip" title="删除" ng-model="<?php echo $_model['id'];?>" ng-click="js_delete()"></a>
                                        </td>
                                        <td><?php echo $_model['id'];?></td>
                                        <td><?php echo $_model['series_number'];?></td>
                                        <td><?php echo $_model['name'];?></td>
                                        <td><?php echo $_model['mid'];?></td>
                                        <td><?php echo $_model['pid'];?></td>
                                        <td><?php echo !empty($_model->store)?$_model->store->name:'--';?></td>
                                        <td><?php echo $_model['telephone'];?></td>
                                        <td><?php echo !empty($_model['carmodel'])?$_model['carmodel']:'--';?></td>
                                        <td><?php echo !empty($_model['carlicence'])?$_model['carlicence']:'--';?></td>
                                        <td><?php echo !empty($_model['engineno'])?$_model['engineno']:'--';?></td>
                                        <td><?php echo !empty($_model['constructor'])?$_model['constructor']:'--';?></td>
                                        <td><?php echo !empty($_model['guide'])?$_model['guide']:'--';?></td>
                                        <td><?php echo !empty($_model['construct_time'])?date('Y-m-d',$_model['construct_time']):'--';?></td>
                                        <td>
                                            <?php
                                            if($_model['status']==1){
                                                echo CHtml::htmlButton('通过',array('class'=>'btn btn-success'));
                                            }elseif($_model['status']==2){
                                                echo CHtml::htmlButton('驳回',array('class'=>'btn btn-danger'));
                                            }else{
                                                echo CHtml::htmlButton('待审核',array('class'=>'btn btn-danger'));
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo  !empty($_model->admin)?$_model->admin->username:'--';?></td>
                                        <td><?php echo !empty($_model['createtime'])?date('Y-m-d',$_model['createtime']):'--';?></td>
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
                    <?php echo $form->label($search,'telephone',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'telephone', array("class"=>"form-control"));?>
                        <?php echo $form->error($search,'telephone',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'carmodel',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'carmodel', array("class"=>"form-control"));?>
                        <?php echo $form->error($search,'carmodel',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'carlicence',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'carlicence', array("class"=>"form-control"));?>
                        <?php echo $form->error($search,'carlicence',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'engineno',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'engineno', array("class"=>"form-control"));?>
                        <?php echo $form->error($search,'engineno',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'series_number',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'series_number', array("class"=>"form-control"));?>
                        <?php echo $form->error($search,'series_number',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'mid',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search,'mid',$models_data,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                        <?php echo $form->error($search,'mid',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'pid',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search,'pid',$product_data,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                        <?php echo $form->error($search,'pid',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'status',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search,'status',$search->status_arr,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                        <?php echo $form->error($search,'status',array('class'=>'help-block'));?>
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