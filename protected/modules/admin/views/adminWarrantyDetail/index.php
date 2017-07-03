<div class="aw-content-wrap" id="user_list">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#list" data-toggle="tab">质保明细记录列表</a>
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
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'wid','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='wid')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">质保号<span class="glyphicon <?php echo $condition['sortFiled'] == 'wid'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    质保用户名
                                </th>
                                <th>
                                    质保用户电话
                                </th>
                                <th>
                                    质保用户车牌
                                </th>
                                <th>
                                    质保用户车架号
                                </th>
                                <th>
                                    质保申请时间
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'pid','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='pid')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">质保产品<span class="glyphicon <?php echo $condition['sortFiled'] == 'pid'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
                                </th>
                                <th>
                                    质保产品序列号
                                </th>
                                <th>
                                    质保产品总数
                                </th>
                                <th>
                                    质保产品库存
                                </th>
                                <th>
                                    <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'num','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='num')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">质保数量<span class="glyphicon <?php echo $condition['sortFiled'] == 'num'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a>
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
                                        <td><?php echo $_model['id'];?></td>
                                        <td><?php echo !empty($_model->warranty)?$_model->warranty->series_number:'--';?></td>
                                        <td><?php echo !empty($_model->warranty)?$_model->warranty->name:'--';?></td>
                                        <td><?php echo !empty($_model->warranty)?$_model->warranty->telephone:'--';?></td>
                                        <td><?php echo !empty($_model->warranty)?$_model->warranty->carlicence:'--';?></td>
                                        <td><?php echo !empty($_model->warranty)?$_model->warranty->engineno:'--';?></td>
                                        <td><?php echo !empty($_model->warranty)?date('Y-m-d',$_model->warranty->createtime):'--';?></td>
                                        <td><?php echo !empty($_model->product)?$_model->product->name:'--';?></td>
                                        <td><?php echo !empty($_model->product)?$_model->product->series_number:'--';?></td>
                                        <td><?php echo !empty($_model->product)?$_model->product->total:'--';?></td>
                                        <td><?php echo !empty($_model->product)?$_model->current_total:'--';?></td>
                                        <td><?php echo $_model['num'];?></td>
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
                    <?php echo $form->label($search,'wid',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'wid', array("class"=>"form-control"));?>
                        <?php echo $form->error($search,'wid',array('class'=>'help-block'));?>
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
            AWS.ajax_request('<?php echo $ajax_url;?>', 'ct=warranty&ac=delete&id='+id);
        });
    });
</script>