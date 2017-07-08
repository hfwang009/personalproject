<div class="aw-content-wrap">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');?>">质保记录列表</a>
                    </li>
                    <li class="active">
                        <a data-toggle="tab" href="#add"><?php echo !empty($model['id'])?'审核质保记录':'添加质保记录'; ?></a>
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
                        'id'=>'warranty_add_form',
                        'method'=>'POST',
                        'action'=>Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/add'),
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                        ),
                        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
                    ));
                    ?>
                    <table class="table table-striped">
                        <tbody>
                        <input type="hidden" value="<?php echo !empty($model['id'])?$model['id']:''; ?>" name="id">
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label class='col-sm-2 col-xs-3 control-label' style="margin-left: -20px;">质保序列号</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'series_number',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'series_number', array("class"=>"form-control","readonly"=>true));?>
                                        <?php echo $form->error($model,'series_number',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                            <td>
                                <div class="form-group" style="margin-bottom: 0px;">
                                    <label class='col-sm-2 col-xs-3 control-label' style="margin-left: -20px;">质保产品</label>
                                    <?php echo CHtml::Button('添加产品',array('class'=>'btn btn-primary center-block','id'=>'add_button'))?>
                                </div>
                                <table id="productlist" class="table table-striped">

                                    <?php
                                    if(!empty($products)){
                                        foreach ($products as $key=>$val){
                                            ?>
                                            <tbody id="product<?php echo $key;?>" ng-index="<?php echo $key;?>">
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label class='col-sm-2 col-xs-3 control-label title-label' style="margin-left: -10px;">产品信息</label>
                                                        <?php if($key!=0){ ?>
                                                            <input type="button" class="btn btn-primary center-block" value="删除产品" ng-click="js_product_delete()" ng-id="product<?php echo $key;?>" >
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 col-xs-3 control-label">产品序列号</label>
                                                        <div class="col-sm-6 col-xs-8">
                                                            <input type="text" class="form-control product_product" name="product[<?php echo $key;?>][series_number]" id="product_<?php echo $key;?>_series_number" onblur="js_get_model(this)" ng-id="<?php echo $key;?>" value="<?php echo $val['series_number'] ?>">
                                                            <input type="hidden" class="form-control" name="product[<?php echo $key;?>][pid]" id="product_<?php echo $key;?>_pid" value="<?php echo $val['pid'] ?>" >
                                                            <input type="hidden" class="form-control" name="product[<?php echo $key;?>][mid]" id="product_<?php echo $key;?>_mid" value="<?php echo $val['mid'] ?>" >
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label class='col-sm-2 col-xs-3 control-label'>所属型号</label>
                                                        <div class="col-sm-6 col-xs-8">
                                                            <input type="text" value="<?php echo $val['model'] ?>" id="product_<?php echo $key;?>_model" name="product[<?php echo $key;?>][model]" class="form-control" readonly="readonly">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label class='col-sm-2 col-xs-3 control-label'>所属品牌</label>
                                                        <div class="col-sm-6 col-xs-8">
                                                            <input type="text" value="<?php echo $val['brand']; ?>"  id="product_<?php echo $key;?>_brand" name="product[<?php echo $key;?>][brand]" class="form-control" readonly="readonly">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label class='col-sm-2 col-xs-3 control-label'>产品名称</label>
                                                        <div class="col-sm-6 col-xs-8">
                                                            <input type="text" value="<?php echo $val['name']; ?>"  id="product_<?php echo $key;?>_name" name="product[<?php echo $key;?>][name]" class="form-control" readonly="readonly">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label class='col-sm-2 col-xs-3 control-label'>产品库存数量</label>
                                                        <div class="col-sm-6 col-xs-8">
                                                            <input type="text" value="<?php echo $val['current_num']; ?>"  id="product_<?php echo $key;?>_current_num" name="product[<?php echo $key;?>][current_num]" class="form-control" readonly="readonly">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label class='col-sm-2 col-xs-3 control-label'>产品安装位置</label>
                                                        <div class="col-sm-6 col-xs-8">
                                                            <select class="form-control product_type" id="product_<?php echo $key;?>_type" name="product[<?php echo $key;?>][type]">
                                                                <option value=""> --请选择-- </option>
                                                                <?php foreach($ptypes as $pk=>$ptype){ ?>
                                                                    <option value="<?php echo $pk; ?>" <?php echo $pk==$val['type']?'selected="selected"':'' ?>><?php echo $ptype;?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 col-xs-3 control-label">质保数量</label>
                                                        <div class="col-sm-6 col-xs-8">
                                                            <input type="number" class="form-control product_num" onblur='checkNum(this)' id="product_<?php echo $key;?>_num" name="product[<?php echo $key;?>][num]" ng-pid="<?php echo $key;?>"  value="<?php echo $val['num'] ?>">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 col-xs-3 control-label">质保周期</label>
                                                        <div class="col-sm-6 col-xs-8">
                                                            <input type="text" class="form-control product_warrantytime" name="product[<?php echo $key;?>][warrantytime]" id="product_<?php echo $key;?>_warrantytime" value="<?php echo $val['warrantytime'] ?>">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        <?php
                                        }
                                    }else{
                                        ?>
                                        <tbody id="product0" ng-index="0">
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label class='col-sm-2 col-xs-3 control-label title-label' style="margin-left: -10px;">产品信息</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label class="col-sm-2 col-xs-3 control-label">产品序列号</label>
                                                    <div class="col-sm-6 col-xs-8">
                                                        <input type="text" class="form-control product_product" name="product[0][series_number]" id="product_0_series_number" onblur="js_get_model(this)" ng-id="0">
                                                        <input type="hidden" class="form-control" name="product[0][pid]" id="product_0_pid" >
                                                        <input type="hidden" class="form-control" name="product[0][mid]" id="product_0_mid" >
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label class='col-sm-2 col-xs-3 control-label'>所属型号</label>
                                                    <div class="col-sm-6 col-xs-8">
                                                        <input type="text" value="<?php echo !empty($mname)?$mname:''; ?>" id="product_0_model" name="product[0][model]" class="form-control" readonly="readonly">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label class='col-sm-2 col-xs-3 control-label'>所属品牌</label>
                                                    <div class="col-sm-6 col-xs-8">
                                                        <input type="text" value="<?php echo !empty($brand)?$brand:''; ?>"  id="product_0_brand" name="product[0][brand]" class="form-control" readonly="readonly">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label class='col-sm-2 col-xs-3 control-label'>产品名称</label>
                                                    <div class="col-sm-6 col-xs-8">
                                                        <input type="text" value="<?php echo !empty($product)?$product['name']:''; ?>"  id="product_0_name" name="product[0][name]" class="form-control" readonly="readonly">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label class='col-sm-2 col-xs-3 control-label'>产品库存数量</label>
                                                    <div class="col-sm-6 col-xs-8">
                                                        <input type="text" value="<?php echo !empty($product)?$product['current_num']:''; ?>"  id="product_0_current_num" name="product[0][current_num]" class="form-control" readonly="readonly">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label class='col-sm-2 col-xs-3 control-label'>产品安装位置</label>
                                                    <div class="col-sm-6 col-xs-8">
<!--                                                        <input type="text" value="--><?php //echo !empty($product)?$product['type']:''; ?><!--"  class="form-control">-->
                                                        <select class="form-control product_type" id="product_0_type" name="product[0][type]">
                                                            <option value=""> --请选择-- </option>
                                                            <?php foreach($ptypes as $pk=>$ptype){ ?>
                                                                <option value="<?php echo $pk; ?>"><?php echo $ptype;?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label class="col-sm-2 col-xs-3 control-label">质保数量</label>
                                                    <div class="col-sm-6 col-xs-8">
                                                        <input type="number" class="form-control product_num" onblur='checkNum(this)' id="product_0_num" name="product[0][num]" ng-pid="0">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label class="col-sm-2 col-xs-3 control-label">质保周期</label>
                                                    <div class="col-sm-6 col-xs-8">
                                                        <input type="text" class="form-control product_warrantytime" name="product[0][warrantytime]" id="product_0_warrantytime">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label class='col-sm-2 col-xs-3 control-label' style="margin-left: -20px;">用户信息</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'name',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'name', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'name',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'telephone',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'telephone', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'telephone',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'address',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'address', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'address',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'carmodel',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'carmodel', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'carmodel',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'carlicence',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'carlicence', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'carlicence',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'engineno',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'engineno', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'engineno',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'storeid',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->dropDownList($model,'storeid',$stores,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                                        <?php echo $form->error($model,'storeid',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'constructor',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'constructor', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'constructor',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'guide',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'guide', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'guide',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'construct_time',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'construct_time', array("class"=>"form-control mod-data","readonly"=>true));?>
                                        <?php echo $form->error($model,'construct_time',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label class='col-sm-2 col-xs-3 control-label' style="margin-left: -20px;">审核意见</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label class="col-sm-2 col-xs-3 control-label">操作管理员</label>
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" value="<?php echo $admin['username'] ?>" class="form-control" name="adminname" readonly="readonly">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'status',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->dropDownList($model,'status',$model->status_arr,array('class'=>'form-control','onchange'=>'checkStatus(this)'));?>
                                        <?php echo $form->error($model,'status',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <div class="form-group check">-->
<!--                                    --><?php //echo $form->label($model,'status',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
<!--                                    <div class="col-sm-5 col-xs-8">-->
<!--                                        <div class="btn-group mod-btn">-->
<!--                                            <label type="button" class="btn mod-btn-color" Onclick='checkStatus(this)'>-->
<!--                                                --><?php //echo $form->radioButton($model,"status",array('value'=>0,'uncheckValue'=>null));?><!--待审核-->
<!--                                            </label>-->
<!--                                            <label type="button" class="btn mod-btn-color" Onclick='checkStatus(this)'>-->
<!--                                                --><?php //echo $form->radioButton($model,"status",array('value'=>1,'uncheckValue'=>null));?><!--通过-->
<!--                                            </label>-->
<!--                                            <label type="button" class="btn mod-btn-color" Onclick='checkStatus(this)'>-->
<!--                                                --><?php //echo $form->radioButton($model,"status",array('value'=>2,'uncheckValue'=>null));?><!--驳回-->
<!--                                            </label>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </td>-->
<!--                        </tr>-->
                        <tr class="refuse-reason <?php echo $model['status']==2?'':'hide' ?>">
                            <td>
                                <div class="form-group reason <?php echo $model['status']==2?'':'hide' ?>">
                                    <?php echo $form->label($model,'refuse_reason',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6">
                                        <?php echo $form->textArea($model,"refuse_reason",array("class"=>"form-control",'maxlength'=>"200")) ?>
                                    </div>
                                    <div class="col-sm-3 control-label error text-danger">最多只能填写200个汉字</div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr><?php echo !empty($model['id'])?$model['id']:''; ?>
                            <td>
                                <?php echo CHtml::Button(!empty($model['id'])?'编辑质保记录':'添加质保记录',array('class'=>'btn btn-primary center-block','id'=>'submitbutton'))?>
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
        $('body').on('blur','#Product_price',function(){
            js_check_price(this);
        });
        $('body').on('click','#submitbutton',function(){
            js_submit_form();
        });
        $('body').on('blur','#Warranty_telephone',function(){
            js_check_telephone(this);
        });
        $('body').on('click','#add_button',function(){
            js_add_product();
        });
        $('body').on('click','input[ng-click="js_product_delete()"]',function(){
            js_delete_product(this);
        });
    });

    function js_get_model(eve){
        var product = $(eve).val();
        var id = $(eve).attr('ng-id');
        console.log(id);
        if(isEmpty(product)){
            show_tip_message('请输入产品序列号');
            return false;
        }
        $.ajax({
            type:'post',
            url:'<?php echo $ajax_url;?>',
            data:{ct:'warranty',ac:'getmodel',id:product},
            dataType:'json',
            success:function(re){
                console.log(re);
                if(re.state){
                    var msg = JSON.parse(re.msg);
                    console.log(msg.product.id);
                    $('#product_'+id+'_num').attr('ng-pid',msg.product.id);
                    $('#product_'+id+'_pid').val(msg.product.id);
                    $('#product_'+id+'_mid').val(msg.product.mid);
                    $('#product_'+id+'_model').val(msg.model);
                    $('#product_'+id+'_brand').val(msg.brand);
                    $('#product_'+id+'_name').val(msg.product.name);
                    $('#product_'+id+'_current_num').val(msg.product.current_num);
                    $('#product_'+id+'_type').val('');
                    $('#product_'+id+'_num').val('');
                    $('#product_'+id+'_warrantytime').val('');
                }else{
                    $('#product_'+id+'_num').attr('ng-pid','');
                    $('#product_'+id+'_pid').val('');
                    $('#product_'+id+'_mid').val('');
                    $('#product_'+id+'_model').val('');
                    $('#product_'+id+'_brand').val('');
                    $('#product_'+id+'_name').val('');
                    $('#product_'+id+'_current_num').val('');
                    $('#product_'+id+'_type').val('');
                    $('#product_'+id+'_num').val('');
                    $('#product_'+id+'_warrantytime').val('');
                    show_tip_message(re.msg,null,5000);
                }
            }
        });
    }

    var js_add_product = function(){
        var container = $('#productlist');
        console.log();
        if(container.length > 0){
            var chlid = container.children();
            var chlidnode = chlid.length;
            console.log(chlid);
            if(chlidnode > 0){
                var index = parseInt(chlid.eq(chlidnode-1).attr('ng-index'))+1;
                console.log(index);
                var node = chlid.eq(0);
                var copynode = node.clone();
//                copynode.find('div[class="tooltip fade top in"]').remove();
                copynode.attr('ng-index',index);
                copynode.attr('id','product'+index);
                copynode.find('input').each(function(){
                    var name = $(this).attr('name');
                    var change_name = name.replace('0',index);
                    $(this).attr('name',change_name);
                    var id = $(this).attr('id');
                    var change_id = id.replace('0',index);
                    var nid = $(this).attr('ng-id');
                    if(!isEmpty(nid)){
                        $(this).attr('ng-id',index);
                    }
                    $(this).attr('id',change_id);
                    $(this).val('');
                });
                copynode.find('select').each(function(){
                    var name = $(this).attr('name');
                    var change_name = name.replace('0',index);
                    $(this).attr('name',change_name);
                    var id = $(this).attr('id');
                    var change_id = id.replace('0',index);
                    $(this).attr('id',change_id);
                    $(this).val('');
                });
                copynode.find('.title-label').after('<input type="button" class="btn btn-primary center-block" value="删除产品" ng-click="js_product_delete()" ng-id="product'+index+'" >');
                container.append(copynode);
            }
        }
        return false;
    };
    var js_delete_product = function(eve){
        var id = $(eve).attr('ng-id');
        console.log(id);
        $('#'+id).remove();
        return false;
    };

    function checkStatus(eve){
        var typeValue = $(eve).val();
        switch (parseInt(typeValue)) {
            case 0:
            case 1:
                $('.reason').addClass('hide');
                $('.refuse-reason').addClass('hide');
                $("textarea[name='Warranty[refuse_reason]']").val('');
                break;
            case 2 :
                $('.reason').removeClass('hide');
                $('.refuse-reason').removeClass('hide');
                break;
        }
    }
    var js_submit_form = function(){
        var name = $('#Warranty_name').val();
        if(isEmpty(name)){
            show_tip_message('没有输入用户名！');
            return false;
        }
        var telephone = $('#Warranty_telephone').val();
        if(isEmpty(telephone)){
            show_tip_message('没有输入用户电话号码！');
            return false;
        }
//        var carlicence = $('#Warranty_carlicence').val();
//        if(isEmpty(carlicence)){
//            show_tip_message('没有输入车牌号！');
//            return false;
//        }
        var carmodel = $('#Warranty_carmodel').val();
        if(isEmpty(carmodel)){
            show_tip_message('没有输入车辆型号！');
            return false;
        }
        var engineno = $('#Warranty_engineno').val();
        if(isEmpty(engineno)){
            show_tip_message('没有输入发动机号！');
            return false;
        }
        if(engineno.length>6){
            $('#Warranty_engineno').val('');
            show_tip_message('请输入发动机号的最后6位！');
            return false;
        }
        var storeid = $('#Warranty_storeid').val();
        if(isEmpty(storeid)){
            show_tip_message('没有选择门店！');
            return false;
        }
        $('.product_num').each(function(i,item){
            if(isEmpty($(item).val())){
                show_tip_message('产品的质保数量不能为0！');
                return false;
            }
        });

        $('.product_type').each(function(i,item){
            if(isEmpty($(item).val())){
                show_tip_message('质保产品的安装位置没有选择！');
                return false;
            }
        });
        $('.product_warrantytime').each(function(i,item){
            if(isEmpty($(item).val())){
                show_tip_message('质保产品的质保周期没有设置！');
                return false;
            }
        });
        $('.product_product').each(function(i,item){
            if(isEmpty($(item).val())){
                show_tip_message('没有选择质保产品！');
                return false;
            }
        });
//        var num = $('#Warranty_num').val();
//        if(parseInt(num)==0){
//            show_tip_message('质保数量不能为0！');
//            return false;
//        }
//
//        if(isEmpty(pid)||isEmpty(mid)){
//            show_tip_message('没有选择产品！');
//            return false;
//        }
//        var warrantytime = $('#Warranty_warrantytime').val();
//        if(isEmpty(warrantytime)){
//            show_tip_message('没有设置质保周期！');
//            return false;
//        }
        var status = $('#Warranty_status').val();
//        var status =$('input:radio[name="status"]:checked').val();
//        var checkedstatus = $('div.check div .checked');
//        var status = checkedstatus.find('input[name="Warranty[status]"]').val();
//        console.log(checkedstatus);
        if(parseInt(status)==2){
            var reasonValue = $('textarea[name="Warranty[refuse_reason]"]').val();
            if(reasonValue == "undefined" || reasonValue == ""){
                show_tip_message('请填写未通过的理由！');
                return false;
            }
            if(reasonValue.length>200){
                show_tip_message('您填写的理由超过了200个汉字');
                return false;
            }
        }
        $('#warranty_add_form').submit();
    }
    var js_check_price = function(eve){
        var s = $(eve).val();
        if(isEmpty(s)){
            $(eve).val(0.00);
        }else{
            var _s = parseFloat(s,2);
            if(isNaN(_s)){
                _s = 0.00;
            }
            $(eve).val(_s);
        }
    }

    function checkNum(eve){
        var pid = $(eve).attr('ng-pid');
        var num = $(eve).val();
        if(isEmpty(pid)||isEmpty(num)){
            show_tip_message('没有选中产品');
            return false;
        }
        $.ajax({
            type:'post',
            url:'<?php echo $ajax_url;?>',
            data:{ct:'warranty',ac:'checkNum',id:pid,num:num},
            dataType:'json',
            success:function(re){
                if(re.state){
                    $('#Warranty_num').val(num);
                }else{
                    show_tip_message(re.msg,null,5000);
                    $('#Warranty_num').val(0);
                }
            }
        });
    }
</script>