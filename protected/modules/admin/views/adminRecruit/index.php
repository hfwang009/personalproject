<div class="aw-content-wrap" id="user_list">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#list" data-toggle="tab">招聘信息列表</a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id . '/' . Yii::app()->controller->id . '/add');?>">添加招聘信息</a>
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
                    <form method="post" action="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id . '/' . Yii::app()->controller->id .'/delete')?>" id="recruit_form">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" class="check-all">
                                </th>
                                <th>ID</th>
                                <th>语言</th>
                                <th>职位名称</th>
                                <th>学历</th>
                                <th>性别</th>
                                <th>专业</th>
                                <th>工作年限</th>
                                <th>是否激活</th>
                                <th>添加时间</th>
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
                                            <input type="checkbox" value="<?php echo $_model['id'];?>" name="id[]">
                                        </td>
                                        <td><?php echo $_model['id'];?></td>
                                        <td><?php echo !empty($_model['lang'])?$langs[$_model['lang']]:'--';?></td>
                                        <td><?php echo $_model['employ_name'];?></td>
                                        <td><?php echo $_model['edu_level'];?></td>
                                        <td><?php echo $search->sex_array[$_model['sex']];?></td>
                                        <td><?php echo $_model['specialty'];?></td>
                                        <td><?php echo $_model['employ_length'];?></td>
                                        <td>
                                            <?php
                                            if($_model['enable'] == 1){
                                                echo CHtml::htmlButton($search->enable_array[$_model['enable']],array('class'=>'btn btn-primary','title'=>'点击关闭','onclick'=>'AWS.ajax_request("'.$ajax_url.'","ct=recruit&ac=enable&id='.$_model['id'].'&status=2");'));
                                            }elseif($_model['enable'] == 2){
                                                echo CHtml::htmlButton($search->enable_array[$_model['enable']],array('class'=>'btn btn-danger','title'=>'点击激活','onclick'=>'AWS.ajax_request("'.$ajax_url.'","ct=recruit&ac=enable&id='.$_model['id'].'&status=1");'));
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo date('Y-m-d H:i:s',$_model['ctime']);?></td>
                                        <td class="nowrap">
                                            <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id . '/' . Yii::app()->controller->id . '/add',array('id'=>$_model['id']));?>" class="icon icon-edit md-tip" title="编辑"></a>
<!--                                            <a href="javascript:;" class="icon icon-delete md-tip" title="删除" ng-click="js_delete_click()" ng-id="--><?php //echo $_model['id']; ?><!--" ></a>-->
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
                        <a class="btn btn-danger" href="javascript:;" onclick="AWS.ajax_post($('#recruit_form'));">删除</a>
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
                        'action'=>Yii::app()->createUrl(Yii::app()->controller->module->id . '/' .Yii::app()->controller->id . '/index'),
                        'enableClientValidation'=>false,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>false,
                        ),
                        'htmlOptions'=>array('class'=>'form-horizontal'),
                    )
                );
                ?>
                <div class="form-group">
                    <?php echo $form->label($search,'employ_name',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'employ_name', array("class"=>"form-control"));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'lang',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search, 'lang', $langs, array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'sex',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search, 'sex', $search->sex_array, array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'enable',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->dropDownList($search, 'enable', $search->enable_array, array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'ctime',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <div class="row">
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($search, 'ctime_start', array("class"=>"form-control mod-data date-start"));?>
                                <i class="icon icon-date"></i>
                            </div>
                            <span class="mod-symbol col-xs-1 col-sm-1"> - </span>
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($search, 'ctime_end', array("class"=>"form-control mod-data date-end"));?>
                                <i class="icon icon-date"></i>
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
        $('body').on('click','a[ng-click="js_delete_click()"]',function(){
            var path = '<?php echo $ajax_url ?>';
            var id = $(this).attr('ng-id');
            AWS.ajax_request(path,"ct=recruit&ac=delete&id="+id);
        });
    });
</script>
