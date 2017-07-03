<div class="aw-content-wrap" id="user_list">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#list" data-toggle="tab">管理员列表</a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/add');?>">添加管理员</a>
                    </li>
                    <li>
                        <a href="#search" data-toggle="tab">搜索</a>
                    </li>
                </ul>
            </h3>
        </div>
        <div class="mod-body tab-content">
            <div id="list" class="tab-pane active">
                <div class="table-responsive">
                    <form method="post" action="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id .'/delete')?>" id="admin_form">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" class="check-all">
                                </th>
                                <th><a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'id','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='id')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">ID<span class="glyphicon <?php echo $condition['sortFiled'] == 'id'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a></th>
                                <th><a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'username','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='username')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">用户名<span class="glyphicon <?php echo $condition['sortFiled'] == 'username'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a></th>
                                <th><a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'status','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='status')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">状态<span class="glyphicon <?php echo $condition['sortFiled'] == 'status'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a></th>
                                <th><a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/' . $this->getAction()->getId(), array_merge($condition,array('sortFiled'=>'created','sortValue'=>(isset($condition['sortFiled']) && $condition['sortFiled']=='created')?($condition['sortValue'] == "asc"?"desc":"asc"):"asc")));?>">更新时间<span class="glyphicon <?php echo $condition['sortFiled'] == 'created'?($condition['sortValue'] == "asc"?"glyphicon-chevron-up":"glyphicon-chevron-down"):'';?>"></span></a></th>
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
                                        <td><?php echo $_model['username'];?></td>
                                        <td>
                                            <?php
                                            if($_model['status'] == '1'){
                                                echo CHtml::htmlButton('冻结',array('class'=>'btn btn-primary','title'=>'点击激活','onclick'=>'AWS.ajax_request("'.$ajax_url.'","ct=admin&ac=changestatus&id='.$_model['id'].'&status=2");'));
                                            }elseif($_model['status'] == '2'){
                                                echo CHtml::htmlButton('正常',array('class'=>'btn btn-danger','title'=>'点击冻结','onclick'=>'AWS.ajax_request("'.$ajax_url.'","ct=admin&ac=changestatus&id='.$_model['id'].'&status=1");'));
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo date("Y-m-d H:i:s",$_model['created']);?></td>
                                        <td>
                                            <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/update',array('id'=>$_model['id']));?>" class="icon icon-draft md-tip" title="修改密码"></a>
                                            <?php if($_model['id']!=1){ ?>
                                                <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/add',array('id'=>$_model['id']));?>" class="icon icon-edit md-tip" title="编辑管理员"></a>
                                                <a href="javascript:;" ng-click="js_delete()" ng-id="<?php echo $_model['id'] ?>" class="icon icon-delete md-tip" title="删除管理员"></a>
                                            <?php } ?>

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
                    <?php echo $form->label($search,'username',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'username', array("class"=>"form-control"));?>
                    </div>
                </div>
                <div class="form-group">
                    <?php echo $form->label($search,'created',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <div class="row">
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($search, 'created_start', array("class"=>"form-control mod-data","readonly"=>true));?>
                            </div>
                            <span class="mod-symbol col-xs-1 col-sm-1"> - </span>
                            <div class="col-sm-6 mod-double">
                                <?php echo $form->textField($search, 'created_end', array("class"=>"form-control mod-data","readonly"=>true));?>
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
    $(function() {
        $('body').on('click', 'a[ng-click="js_delete()"]', function () {
            var id = $(this).attr('ng-id');
            if (isEmpty(id)) {
                show_tip_message('数据错误', null);
                return false;
            }
            $.ajax({
                url: '',
                type: 'get',
                data: {},
                dataType: 'json',
                success: function (re) {
                    if (re.state) {

                    }
                }
            });
            AWS.ajax_request('<?php echo $ajax_url;?>', 'ct=admin&ac=delete&id=' + id);
        });
    });
</script>