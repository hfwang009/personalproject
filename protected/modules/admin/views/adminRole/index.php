<div class="aw-content-wrap" id="user_list">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#list" data-toggle="tab">角色列表</a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/add');?>">添加角色</a>
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
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'id','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='id')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">ID<span class="glyphicon <?php echo $condition['sortFiled'] == 'id'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'name','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='name')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">角色名称<span class="glyphicon <?php echo $condition['sortFiled'] == 'name'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'mid','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='mid')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">角色型号名称<span class="glyphicon <?php echo $condition['sortFiled'] == 'mid'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'vast','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='vast')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">面积<span class="glyphicon <?php echo $condition['sortFiled'] == 'vast'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'level','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='level')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">工作难度<span class="glyphicon <?php echo $condition['sortFiled'] == 'level'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'costtime','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='costtime')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">耗时<span class="glyphicon <?php echo $condition['sortFiled'] == 'costtime'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'price','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='price')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">价格<span class="glyphicon <?php echo $condition['sortFiled'] == 'price'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>操作</th>
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
                                            <input type="checkbox" value="<?php echo $_model['id'];?>" name="role_id[]">
                                        </td>
                                        <td><?php echo $_model['id'];?></td>
                                        <td><?php echo $_model['name'];?></td>
                                        <td><?php echo !empty($_model['mid'])?$models_data[$_model['mid']]:'--';?></td>
                                        <td><?php echo !empty($_model['vast'])?$sizes[$_model['vast']].'颗星':'--';?></td>
                                        <td><?php echo !empty($_model['level'])?$level[$_model['level']]:'--';?></td>
                                        <td><?php echo !empty($_model['costtime'])?$_model['costtime']:'--';?></td>
                                        <td><?php echo !empty($_model['price'])?$_model['price']:'--';?></td>
                                        <td class="nowrap">
                                            <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/add',array('id'=>$_model['id']));?>" class="icon icon-edit md-tip" title="编辑"></a>
<!--                                            <a href="javascript:;" class="icon icon-delete md-tip" title="删除" ng-model="--><?php //echo $_model['id'];?><!--" ng-click="js_delete()"></a>-->
                                        </td>
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
                    <?php echo $form->label($search,'name',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'name', array("class"=>"form-control"));?>
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
            AWS.ajax_request('<?php echo $ajax_url;?>', 'ct=product&ac=delete&id='+id);
        });
    });
</script>