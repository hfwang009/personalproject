<div class="aw-content-wrap" id="user_list">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#list" data-toggle="tab">门店列表</a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/add');?>">添加门店</a>
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
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'name','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='name')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">门店名称<span class="glyphicon <?php echo $condition['sortFiled'] == 'name'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'type','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='type')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">门店类型<span class="glyphicon <?php echo $condition['sortFiled'] == 'type'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'provinceid','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='provinceid')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">所在省份<span class="glyphicon <?php echo $condition['sortFiled'] == 'provinceid'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'cityid','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='cityid')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">所在城市<span class="glyphicon <?php echo $condition['sortFiled'] == 'cityid'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'areaid','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='areaid')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">所在区县<span class="glyphicon <?php echo $condition['sortFiled'] == 'areaid'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'telephone','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='telephone')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">联系电话<span class="glyphicon <?php echo $condition['sortFiled'] == 'telephone'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'address','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='address')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">详细地址<span class="glyphicon <?php echo $condition['sortFiled'] == 'address'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
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
                                            <input type="checkbox" value="<?php echo $_model['id'];?>" name="store_id[]">
                                        </td>
                                        <td><?php echo $_model['id'];?></td>
                                        <td><?php echo $_model['name'];?></td>
                                        <td><?php echo !empty($_model['type'])?$type[$_model['type']]:'--';?></td>
                                        <td><?php echo !empty($_model['provinceid'])?$areas[$_model['provinceid']]:'--';?></td>
                                        <td><?php echo !empty($_model['cityid'])?$areas[$_model['cityid']]:'--';?></td>
                                        <td><?php echo !empty($_model['areaid'])?$areas[$_model['areaid']]:'--';?></td>
                                        <td><?php echo !empty($_model['telephone'])?$_model['telephone']:'--';?></td>
                                        <td><?php echo !empty($_model['address'])?$_model['address']:'--';?></td>
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
                        <?php echo $form->error($search,'name',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'provinceid',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search,'provinceid',$provinces,array(
                                'empty'=>'-- 请选择  --',
                                'ajax' => array(
                                    'type' => 'POST',
                                    'url' => $ajax_url,
                                    'dataType' => 'json',
                                    'data' => array('ct'=>'provice','ac'=>'getcity','parent' => 'js:this.value'),
                                    'success' => 'function(re) {
                                if(re.state){
                                    $("#Store_cityid").html(re.html.citys);
                                    $("#Store_areaid").html(re.html.areas);
                                }
                             }',
                                ),
                                'class'=>'form-control'
                            )
                        );?>
                        <?php echo $form->error($search,'provinceid',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'cityid',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search,'cityid',$citys,array(
                            'empty'=>'-- 请选择  --',
                            'ajax' => array(
                                'type' => 'POST',
                                'url' => $ajax_url,
                                'dataType' => 'json',
                                'data' => array('ct'=>'provice','ac'=>'getarea','parent' => 'js:this.value'),
                                'success' => 'function(re) {
                                if(re.state){
                                    $("#Store_areaid").html(re.html.areas);
                                }
                             }',
                            ),
                            'class'=>'form-control'
                            )
                        );?>
                        <?php echo $form->error($search,'cityid',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'areaid',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search,'areaid',$_areas,array('empty'=>'-- 请选择  --', 'class'=>'form-control'));?>
                        <?php echo $form->error($search,'areaid',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'address',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'address', array("class"=>"form-control"));?>
                        <?php echo $form->error($search,'address',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'telephone',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'telephone', array("class"=>"form-control"));?>
                        <?php echo $form->error($search,'telephone',array('class'=>'help-block'));?>
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