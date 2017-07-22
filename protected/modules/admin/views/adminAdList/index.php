<div class="aw-content-wrap" id="user_list">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#list" data-toggle="tab">广告列表</a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id . '/' . Yii::app()->controller->id . '/add');?>">添加广告</a>
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
                    <form method="post" action="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id . '/' . Yii::app()->controller->id .'/delete')?>" id="ad_form">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" class="check-all">
                                </th>
                                <th>ID</th>
                                <th>广告标题</th>
                                <th>广告位置</th>
                                <th>媒介类型</th>
                                <th>开始日期</th>
                                <th>结束日期</th>
                                <th>点击数</th>
                                <th>是否开启</th>
                                <th>排序号</th>
                                <th>联系人</th>
                                <th>语言</th>
                                <th>链接打开类型</th>
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
                                            <input type="checkbox" value="<?php echo $_model['ad_id'];?>" name="id[]">
                                        </td>
                                        <td><?php echo $_model['ad_id'];?></td>
                                        <td><?php echo $_model['ad_name'];?></td>
                                        <td><?php echo $search->ad_position_array[$_model['position_id']];?></td>
                                        <td><?php echo $search->media_type_array[$_model['media_type']];?></td>
                                        <td><?php echo date('Y-m-d',$_model['start_time']);?></td>
                                        <td><?php echo date('Y-m-d',$_model['end_time']);?></td>
                                        <td><?php echo $_model['click_count'];?></td>
                                        <td><?php echo CHtml::dropDownList('enabled', $_model['enabled'], array(1=>'开启',2=>'关闭'),array('model-id'=>$_model['ad_id'],'ng-click'=>'js_enabled_click()'));?></td>
                                        <td>
                                            <input class="form-control sort-action" type="text" value="<?php echo $_model['sort_order'];?>" model-id="<?php echo $_model['ad_id'];?>">
                                        </td>
                                        <td><span class="md-tip" title="邮箱:<?php echo $_model['link_email'] .'<br/>手机号:'. $_model['link_phone']?>"><?php echo $_model['link_man'];?></span></td>
                                        <td><?php echo $langs[$_model['lang']] ?></td>
                                        <td><?php echo $search->ad_link_type_array[$_model['ad_link_type']];?></td>
                                        <td class="nowrap">
                                            <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id . '/' . Yii::app()->controller->id . '/add',array('id'=>$_model['ad_id']));?>" class="icon icon-edit md-tip" title="编辑"></a>
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
                        <a class="btn btn-danger" href="javascript:;" onclick="AWS.ajax_post($('#ad_form'));">删除</a>
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
                        'action'=>Yii::app()->createUrl(Yii::app()->controller->module->id . '/' . Yii::app()->controller->id . '/index'),
                        'enableClientValidation'=>false,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>false,
                        ),
                        'htmlOptions'=>array('class'=>'form-horizontal'),
                    )
                );
                ?>
                <div class="form-group">
                    <?php echo $form->label($search,'ad_name',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'ad_name', array("class"=>"form-control"));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'position_id',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search, 'position_id', $search->ad_position_array, array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'lang',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search, 'lang', $langs, array('class'=>'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'media_type',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search, 'media_type', $search->media_type_array, array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'start_time',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <div class="row">
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($search, 'start_time_start', array("class"=>"form-control mod-data date-start"));?>
                                <i class="icon icon-date"></i>
                            </div>
                            <span class="mod-symbol col-xs-1 col-sm-1"> - </span>
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($search, 'start_time_end', array("class"=>"form-control mod-data date-end"));?>
                                <i class="icon icon-date"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'end_time',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <div class="row">
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($search, 'end_time_start', array("class"=>"form-control mod-data date-start"));?>
                                <i class="icon icon-date"></i>
                            </div>
                            <span class="mod-symbol col-xs-1 col-sm-1"> - </span>
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($search, 'end_time_end', array("class"=>"form-control mod-data date-end"));?>
                                <i class="icon icon-date"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'enabled',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <div class="btn-group mod-btn">
                            <label type="button" class="btn mod-btn-color">
                                <?php echo $form->radioButton($search,"enabled",array('value'=>1,'checked'=>true,'uncheckValue'=>null));?>是
                            </label>
                            <label type="button" class="btn mod-btn-color">
                                <?php echo $form->radioButton($search,"enabled",array('value'=>2,'checked'=>false,'uncheckValue'=>null));?>否
                            </label>
                            <label type="button" class="btn mod-btn-color">
                                <?php echo $form->radioButton($search,"enabled",array('value'=>3,'checked'=>false,'uncheckValue'=>null));?>全部
                            </label>

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
        $('body').on('change','select[ng-click="js_enabled_click()"]',function(){
            var id = $(this).attr('model-id');
            if(isEmpty(id)){
                show_tip_message('数据错误');
                return false;
            }
            var status = $(this).val();
            if(isEmpty(status)){
                show_tip_message('数据错误');
                return false;
            }
            AWS.ajax_request("<?php echo $ajax_url;?>","ct=ad&ac=disabled&id="+id+"&status="+status);
        });
        $('body').on('change','.sort-action',function () {
            var sort = $(this).val();
            if(isEmpty(sort)){
                show_tip_message('排序号不能为空',$(this));
                return false;
            }
            var id = $(this).attr('model-id');
            if(isEmpty(id)){
                show_tip_message('数据错误');
                return false;
            }
            if ($(this).val() != ''){
                AWS.ajax_request('<?php echo $ajax_url;?>', 'ct=ad&ac=sort&id='+id+'&sort='+sort);
            }
            return false;
        });
    });
</script>
