<div class="aw-content-wrap" id="user_list">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#list" data-toggle="tab">产品列表</a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/add');?>">添加产品</a>
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
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'customer','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='customer')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">客户<span class="glyphicon <?php echo $condition['sortFiled'] == 'customer'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'storeid','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='storeid')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">门店<span class="glyphicon <?php echo $condition['sortFiled'] == 'storeid'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'name','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='name')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">产品名称<span class="glyphicon <?php echo $condition['sortFiled'] == 'name'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'mid','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='mid')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">产品型号名称<span class="glyphicon <?php echo $condition['sortFiled'] == 'mid'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'series_number','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='series_number')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">序列号<span class="glyphicon <?php echo $condition['sortFiled'] == 'series_number'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'bid','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='bid')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">产品品牌<span class="glyphicon <?php echo $condition['sortFiled'] == 'bid'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'spec','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='spec')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">规格<span class="glyphicon <?php echo $condition['sortFiled'] == 'spec'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'company','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='company')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">单位<span class="glyphicon <?php echo $condition['sortFiled'] == 'company'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'total','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='total')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">数量<span class="glyphicon <?php echo $condition['sortFiled'] == 'total'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'current_num','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='current_num')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">剩余数量<span class="glyphicon <?php echo $condition['sortFiled'] == 'current_num'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'udpatetime','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='udpatetime')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">最后出库时间<span class="glyphicon <?php echo $condition['sortFiled'] == 'udpatetime'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'create_user','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='create_user')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">操作人员<span class="glyphicon <?php echo $condition['sortFiled'] == 'create_user'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'ctime','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='ctime')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">添加时间<span class="glyphicon <?php echo $condition['sortFiled'] == 'ctime'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
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
                                            <input type="checkbox" value="<?php echo $_model['id'];?>" name="product_id[]">
                                        </td>
                                        <td><?php echo $_model['id'];?></td>
                                        <td><?php echo !empty($_model['customer'])?$_model['customer']:'--';?></td>
                                        <td><?php echo !empty($_model->store)?$_model->store->name:'--';?></td>
                                        <td><?php echo $_model['name'];?></td>
                                        <td><?php echo !empty($_model['mid'])?$models_data[$_model['mid']]:'--';?></td>
                                        <td><?php echo $_model['series_number'];?></td>
                                        <td><?php echo !empty($_model->brand)?$_model->brand->name:'--';?></td>
                                        <td><?php echo !empty($_model['spec'])?$_model['spec']:'--';?></td>
                                        <td><?php echo !empty($_model['company'])?$_model['company']:'--';?></td>
                                        <td><?php echo $_model['total'];?></td>
                                        <td><?php echo $_model['current_num'];?></td>
                                        <td><?php echo !empty($_model['udpatetime'])?date('Y-m-d H:i:s',$_model['udpatetime']):'--';?></td>
                                        <td><?php echo !empty($_model->admin)?$_model->admin->username:'--';?></td>
                                        <td><?php echo !empty($_model['ctime'])?date('Y-m-d H:i:s',$_model['ctime']):'--';?></td>
                                        <td class="nowrap">
                                            <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/add',array('id'=>$_model['id']));?>" class="icon icon-edit md-tip" title="编辑"></a>
                                            <a href="javascript:;" class="icon icon-verify md-tip" title="备注" ng-model="<?php echo $_model['id'];?>" ng-click="js_remark()"></a>
                                            <a href="javascript:;" class="icon icon-delete md-tip" title="删除" ng-model="<?php echo $_model['id'];?>" ng-click="js_delete()"></a>
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
                    <?php echo $form->label($search,'series_number',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'series_number', array("class"=>"form-control"));?>
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
                    <?php echo $form->label($search,'bid',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search,'bid',$brand_arr,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                        <?php echo $form->error($search,'bid',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'province1',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search,'province1',$provinces,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                        <?php echo $form->error($search,'province1',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'city1',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search,'city1',$citys,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                        <?php echo $form->error($search,'city1',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'area1',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search,'area1',$areas,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                        <?php echo $form->error($search,'area1',array('class'=>'help-block'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'storeid1',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search,'storeid1',$stores,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                        <?php echo $form->error($search,'storeid1',array('class'=>'help-block'));?>
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
        $('body').on('click','a[ng-click="js_remark()"]',function(){
            var id = $(this).attr('ng-model');
            if(isEmpty(id)){
                show_tip_message('数据错误',null);
                return false;
            }
            $.ajax({
                url:'<?php echo $ajax_url;?>',
                type:'post',
                data:{ct:'product',ac:'remarkShow',id:id},
                dataType:'json',
                success:function(re){
                    layer.open({
                        type: 1,
                        title: "添加备注",
                        area: ['500px', '550px'], //宽高
                        content: re.html,
                        btn: ['确定','取消'],
                        yes: function(index, layero){
                            add_remark();
                        },
                        cancel: function(index){
                            layer.close(index)
                        },
                        closeBtn: 1,
                        shadeClose: true
                    });
                }
            });
        });
        $('body').on('change','select[name="Product[province1]"]',function(){
            _js_province_store(this);
        });
        $('body').on('change','select[name="Product[city1]"]',function(){
            _js_city_store(this);
        });
        $('body').on('change','select[name="Product[area1]"]',function(){
            _js_area_store(this);
        });
    });
    var add_remark  =function(){
        var id = $('#product_ids').val();
        var remarks = $('#product_remarks').val();
        $.ajax({
            type : "POST",
            url : "<?php echo $ajax_url;?>",
            dataType : "json",
            data : {'ct':'product','ac':'addRemark','id':id,'remarks':remarks},
            success : function(f) {
                if(f.state){
                    show_return_message(f.msg, f.href);
                }else{
                    show_tip_message(f.msg);
                }
            },
            error : function(j) {
                show_tip_message('请求错误',null);
            }
        });
        return false;
    }

    var _js_province_store = function(eve){
        var parent = $(eve).val();
        $.ajax({
            url:'<?php echo $ajax_url ?>',
            type:'POST',
            dataType:'json',
            data:{ct:'product',ac:'getcity',parent:parent},
            success:function(re){
                if(re.state){
                    $("#Product_city1").html(re.html.citys);
                    $("#Product_area1").html(re.html.areas);
                    $("#Product_storeid1").html(re.html.stores);
                }
            }
        });
    }

    var _js_city_store = function(eve){
        var parent = $(eve).val();
        var _parent = $('#Product_province').val();
        $.ajax({
            url:'<?php echo $ajax_url ?>',
            type:'POST',
            dataType:'json',
            data:{ct:'product',ac:'getarea',parent:parent,_parent:_parent},
            success:function(re){
                if(re.state){
                    $("#Product_area1").html(re.html.areas);
                    $("#Product_storeid1").html(re.html.stores);
                }
            }
        });
    }

    var _js_area_store = function(eve){
        var parent = $(eve).val();
        var _parent = $('#Product_city').val();
        var __parent = $('#Product_province').val();
        $.ajax({
            url:'<?php echo $ajax_url ?>',
            type:'POST',
            dataType:'json',
            data:{ct:'product',ac:'getstore',parent:parent,_parent:_parent,__parent:__parent},
            success:function(re){
                if(re.state){
                    $("#Product_storeid1").html(re.html.stores);
                }
            }
        });
    }
</script>