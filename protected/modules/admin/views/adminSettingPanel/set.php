<div class="aw-content-wrap">
    <?php
    $form = $this->beginWidget("CActiveForm",array(
            'id'=>'settings_form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
            'htmlOptions'=>array('enctype'=>'multipart/form-data'),
        )
    );?>
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');?>">站点信息</a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/filePath');?>">文件存储位置</a>
                    </li>
                    <li class="active">
                        <a href="javascript:;">参数设置</a>
                    </li>
                </ul>
            </h3>
        </div>
        <div class="tab-content mod-content">
            <table class="table table-striped" ng-click="js_link_List()">
                <thead>
                </thead>
                <tbody>
<!--                <tr>-->
<!--                    <td>-->
<!--                        <div class="form-group">-->
<!--                            <span class="col-sm-2 col-xs-3 control-label">面积设置:</span>-->
<!--                            <div class="col-sm-8 col-xs-8" ng-click="js_size_container()">-->
<!--                                --><?php
//                                if(isset($config['setting']['size']) && !empty($config['setting']['size'])){
//                                    foreach ($config['setting']['size'] as $key=>$_size){
//                                        ?>
<!--                                        <div class="row" ng-index="--><?php //echo $key;?><!--">-->
<!--                                            <div class="col-xs-11  col-sm-3 mod-double">-->
<!--                                                --><?php //echo $form->textField($model,'datavalue[setting][size]['.$key.']',array('placeholder'=>'面积设置','value'=>$_size,'class'=>'form-control','onblur'=>'checkInput(this)'));?>
<!--                                            </div>-->
<!--                                            --><?php
//                                            if($key == 1){
//                                                ?>
<!--                                                <a class="icon icon-plus md-tip" ng-click="js_size_add()" style="margin: 5px;" href="javascript:;" title="添加"></a>-->
<!--                                            --><?php
//                                            }else{
//                                                ?>
<!--                                                <a class="icon icon-delete md-tip" ng-click="js_size_delete()" style="margin: 5px;" href="javascript:;" title="删除"></a>-->
<!--                                            --><?php
//                                            }
//                                            ?>
<!--                                        </div>-->
<!--                                    --><?php
//                                    }
//                                }else{
//                                    ?>
<!--                                    <div class="row" ng-index="0">-->
<!--                                        <div class="col-xs-11  col-sm-3 mod-double">-->
<!--                                            --><?php //echo $form->textField($model,'datavalue[setting][size][1]',array('placeholder'=>'面积设置','class'=>'form-control','onblur'=>'checkInput(this)'));?>
<!--                                        </div>-->
<!--                                        <a class="icon icon-plus md-tip" ng-click="js_size_add()" style="margin: 5px;" href="javascript:;" title="添加"></a>-->
<!--                                    </div>-->
<!--                                --><?php
//                                }
//                                ?>
<!--                            </div>-->
<!--                        </div>-->
<!--                    </td>-->
<!--                </tr>-->
<!---->
<!--                <tr>-->
<!--                    <td>-->
<!--                        <div class="form-group">-->
<!--                            <span class="col-sm-2 col-xs-3 control-label">难度设置:</span>-->
<!--                            <div class="col-sm-8 col-xs-8" ng-click="js_level_container()">-->
<!--                                --><?php
//                                if(isset($config['setting']['level']) && !empty($config['setting']['level'])){
//                                    foreach ($config['setting']['level'] as $key=>$_level){
//                                        ?>
<!--                                        <div class="row" ng-index="--><?php //echo $key;?><!--">-->
<!--                                            <div class="col-xs-11  col-sm-3 mod-double">-->
<!--                                                --><?php //echo $form->textField($model,'datavalue[setting][level]['.$key.']',array('placeholder'=>'难度设置','value'=>$_level,'class'=>'form-control'));?>
<!--                                            </div>-->
<!--                                            --><?php
//                                            if($key == 1){
//                                                ?>
<!--                                                <a class="icon icon-plus md-tip" ng-click="js_level_add()" style="margin: 5px;" href="javascript:;" title="添加"></a>-->
<!--                                            --><?php
//                                            }else{
//                                                ?>
<!--                                                <a class="icon icon-delete md-tip" ng-click="js_level_delete()" style="margin: 5px;" href="javascript:;" title="删除"></a>-->
<!--                                            --><?php
//                                            }
//                                            ?>
<!--                                        </div>-->
<!--                                    --><?php
//                                    }
//                                }else{
//                                    ?>
<!--                                    <div class="row" ng-index="0">-->
<!--                                        <div class="col-xs-11  col-sm-3 mod-double">-->
<!--                                            --><?php //echo $form->textField($model,'datavalue[setting][level][1]',array('placeholder'=>'难度设置','class'=>'form-control'));?>
<!--                                        </div>-->
<!--                                        <a class="icon icon-plus md-tip" ng-click="js_level_add()" style="margin: 5px;" href="javascript:;" title="添加"></a>-->
<!--                                    </div>-->
<!--                                --><?php
//                                }
//                                ?>
<!--                            </div>-->
<!--                        </div>-->
<!--                    </td>-->
<!--                </tr>-->

                <tr>
                    <td>
                        <div class="form-group">
                            <span class="col-sm-2 col-xs-3 control-label">控制器操作设置:</span>
                            <div class="col-sm-8 col-xs-8" ng-click="js_controllers_container()">
                                <?php
                                if(isset($config['setting']['controllers']) && !empty($config['setting']['controllers'])){
                                    foreach ($config['setting']['controllers'] as $key=>$_controllers){
                                        ?>
                                        <div class="row" ng-index="<?php echo $key;?>">
                                            <div class="col-xs-11  col-sm-3 mod-double">
                                                <?php echo $form->textField($model,'datavalue[setting][controllers]['.$key.'][econtrol]',array('placeholder'=>'控制器操作设置','value'=>$_controllers['econtrol'],'class'=>'form-control'));?>
                                            </div>
                                            <div class="col-xs-11  col-sm-3 mod-double">
                                                <?php echo $form->textField($model,'datavalue[setting][controllers]['.$key.'][ccontrol]',array('placeholder'=>'控制器操作中文','value'=>$_controllers['ccontrol'],'class'=>'form-control'));?>
                                            </div>
                                            <?php
                                            if($key == 1){
                                                ?>
                                                <a class="icon icon-plus md-tip" ng-click="js_controllers_add()" style="margin: 5px;" href="javascript:;" title="添加"></a>
                                            <?php
                                            }else{
                                                ?>
                                                <a class="icon icon-delete md-tip" ng-click="js_controllers_delete()" style="margin: 5px;" href="javascript:;" title="删除"></a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    <?php
                                    }
                                }else{
                                    ?>
                                    <div class="row" ng-index="0">
                                        <div class="col-xs-11  col-sm-3 mod-double">
                                            <?php echo $form->textField($model,'datavalue[setting][controllers][1][econtrol]',array('placeholder'=>'控制器操作设置','class'=>'form-control'));?>
                                        </div>
                                        <div class="col-xs-11  col-sm-3 mod-double">
                                            <?php echo $form->textField($model,'datavalue[setting][controllers][1][ccontrol]',array('placeholder'=>'控制器操作中文','class'=>'form-control'));?>
                                        </div>
                                        <a class="icon icon-plus md-tip" ng-click="js_controllers_add()" style="margin: 5px;" href="javascript:;" title="添加"></a>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="form-group">
                            <span class="col-sm-2 col-xs-3 control-label">操作设置:</span>
                            <div class="col-sm-8 col-xs-8" ng-click="js_actions_container()">
                                <?php
                                if(isset($config['setting']['actions']) && !empty($config['setting']['actions'])){
                                    foreach ($config['setting']['actions'] as $key=>$_actions){
                                        ?>
                                        <div class="row" ng-index="<?php echo $key;?>">
                                            <div class="col-xs-11  col-sm-3 mod-double">
                                                <?php echo $form->textField($model,'datavalue[setting][actions]['.$key.'][eaction]',array('placeholder'=>'操作设置','value'=>$_actions['eaction'],'class'=>'form-control'));?>
                                            </div>
                                            <div class="col-xs-11  col-sm-3 mod-double">
                                                <?php echo $form->textField($model,'datavalue[setting][actions]['.$key.'][caction]',array('placeholder'=>'操作设置中文','value'=>$_actions['caction'],'class'=>'form-control'));?>
                                            </div>
                                            <?php
                                            if($key == 1){
                                                ?>
                                                <a class="icon icon-plus md-tip" ng-click="js_actions_add()" style="margin: 5px;" href="javascript:;" title="添加"></a>
                                            <?php
                                            }else{
                                                ?>
                                                <a class="icon icon-delete md-tip" ng-click="js_actions_delete()" style="margin: 5px;" href="javascript:;" title="删除"></a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    <?php
                                    }
                                }else{
                                    ?>
                                    <div class="row" ng-index="0">
                                        <div class="col-xs-11  col-sm-3 mod-double">
                                            <?php echo $form->textField($model,'datavalue[setting][actions][1][eaction]',array('placeholder'=>'操作设置','class'=>'form-control'));?>
                                        </div>
                                        <div class="col-xs-11  col-sm-3 mod-double">
                                            <?php echo $form->textField($model,'datavalue[setting][actions][1][caction]',array('placeholder'=>'操作设置','class'=>'form-control'));?>
                                        </div>
                                        <a class="icon icon-plus md-tip" ng-click="js_actions_add()" style="margin: 5px;" href="javascript:;" title="添加"></a>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </td>
                </tr>

<!--                <tr>-->
<!--                    <td>-->
<!--                        <div class="form-group">-->
<!--                            <span class="col-sm-2 col-xs-3 control-label">门店类型:</span>-->
<!--                            <div class="col-sm-8 col-xs-8" ng-click="js_type_container()">-->
<!--                                --><?php
//                                if(isset($config['setting']['type']) && !empty($config['setting']['type'])){
//                                    foreach ($config['setting']['type'] as $key=>$_type){
//                                        ?>
<!--                                        <div class="row" ng-index="--><?php //echo $key;?><!--">-->
<!--                                            <div class="col-xs-11  col-sm-3 mod-double">-->
<!--                                                --><?php //echo $form->textField($model,'datavalue[setting][type]['.$key.']',array('placeholder'=>'门店类型','value'=>$_type,'class'=>'form-control'));?>
<!--                                            </div>-->
<!--                                            --><?php
//                                            if($key == 1){
//                                                ?>
<!--                                                <a class="icon icon-plus md-tip" ng-click="js_type_add()" style="margin: 5px;" href="javascript:;" title="添加"></a>-->
<!--                                            --><?php
//                                            }else{
//                                                ?>
<!--                                                <a class="icon icon-delete md-tip" ng-click="js_type_delete()" style="margin: 5px;" href="javascript:;" title="删除"></a>-->
<!--                                            --><?php
//                                            }
//                                            ?>
<!--                                        </div>-->
<!--                                    --><?php
//                                    }
//                                }else{
//                                    ?>
<!--                                    <div class="row" ng-index="0">-->
<!--                                        <div class="col-xs-11  col-sm-3 mod-double">-->
<!--                                            --><?php //echo $form->textField($model,'datavalue[setting][type][1]',array('placeholder'=>'门店类型','class'=>'form-control'));?>
<!--                                        </div>-->
<!--                                        <a class="icon icon-plus md-tip" ng-click="js_type_add()" style="margin: 5px;" href="javascript:;" title="添加"></a>-->
<!--                                    </div>-->
<!--                                --><?php
//                                }
//                                ?>
<!--                            </div>-->
<!--                        </div>-->
<!--                    </td>-->
<!--                </tr>-->

                <tr>
                    <td>
                        <div class="form-group">
                            <span class="col-sm-2 col-xs-3 control-label">产品位置类型:</span>
                            <div class="col-sm-8 col-xs-8" ng-click="js_ptype_container()">
                                <?php
                                if(isset($config['setting']['ptype']) && !empty($config['setting']['ptype'])){
                                    foreach ($config['setting']['ptype'] as $key=>$_ptype){
                                        ?>
                                        <div class="row" ng-index="<?php echo $key;?>">
                                            <div class="col-xs-11  col-sm-3 mod-double">
                                                <?php echo $form->textField($model,'datavalue[setting][ptype]['.$key.']',array('placeholder'=>'产品位置类型','value'=>$_ptype,'class'=>'form-control'));?>
                                            </div>
                                            <?php
                                            if($key == 1){
                                                ?>
                                                <a class="icon icon-plus md-tip" ng-click="js_ptype_add()" style="margin: 5px;" href="javascript:;" title="添加"></a>
                                            <?php
                                            }else{
                                                ?>
                                                <a class="icon icon-delete md-tip" ng-click="js_ptype_delete()" style="margin: 5px;" href="javascript:;" title="删除"></a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    <?php
                                    }
                                }else{
                                    ?>
                                    <div class="row" ng-index="0">
                                        <div class="col-xs-11  col-sm-3 mod-double">
                                            <?php echo $form->textField($model,'datavalue[setting][ptype][1]',array('placeholder'=>'产品位置类型','class'=>'form-control'));?>
                                        </div>
                                        <a class="icon icon-plus md-tip" ng-click="js_ptype_add()" style="margin: 5px;" href="javascript:;" title="添加"></a>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-content mod-content mod-one-btn">
            <div class="center-block">
                <input type="submit" class="btn btn-primary" value="保存设置">
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>
<script type="text/javascript">
    $(function(){
//        $('body').on('click','a[ng-click="js_size_add()"]',function(){
//            js_size_add();
//            return false;
//        });
//        $('body').on('click','a[ng-click="js_size_delete()"]',function(){
//            js_size_delete(this);
//            return false;
//        });
//        $('body').on('click','a[ng-click="js_level_add()"]',function(){
//            js_level_add();
//            return false;
//        });
//        $('body').on('click','a[ng-click="js_level_delete()"]',function(){
//            js_level_delete(this);
//            return false;
//        });
//        $('body').on('click','a[ng-click="js_type_add()"]',function(){
//            js_type_add();
//            return false;
//        });
//        $('body').on('click','a[ng-click="js_type_delete()"]',function(){
//            js_type_delete(this);
//            return false;
//        });
        $('body').on('click','a[ng-click="js_controllers_add()"]',function(){
            js_controllers_add();
            return false;
        });
        $('body').on('click','a[ng-click="js_controller_delete()"]',function(){
            js_controller_delete(this);
            return false;
        });

        $('body').on('click','a[ng-click="js_actions_add()"]',function(){
            js_actions_add();
            return false;
        });
        $('body').on('click','a[ng-click="js_actions_delete()"]',function(){
            js_actions_delete(this);
            return false;
        });


        $('body').on('click','a[ng-click="js_ptype_add()"]',function(){
            js_ptype_add();
            return false;
        });
        $('body').on('click','a[ng-click="js_ptype_delete()"]',function(){
            js_ptype_delete(this);
            return false;
        });
    });

    var js_controllers_add = function(){
        var container = $('div[ng-click="js_controllers_container()"]');
        if(container.length > 0){
            var chlid = container.children();
            var chlidnode = chlid.length;
            if(chlidnode > 0){
                var index = parseInt(chlid.eq(chlidnode-1).attr('ng-index'))+1;
                var node = chlid.eq(0);
                var copynode = node.clone();
                copynode.find('div[class="tooltip fade top in"]').remove();
                copynode.attr('ng-index',index);
                copynode.find('input').each(function(){
                    var name = $(this).attr('name');
                    var change_name = name.replace('1',index);
                    $(this).attr('name',change_name);
                    var id = $(this).attr('id');
                    var change_id = id.replace('1',index);
                    $(this).attr('id',change_id);
                    $(this).val('');
                });
                copynode.find('a').replaceWith('<a class="icon icon-delete md-tip" ng-click="js_controllers_delete()" style="margin: 5px;" href="javascript:;" title="删除"></a>');
                container.append(copynode);
            }
        }
        return false;
    };
    var js_controller_delete = function(eve){
        $(eve).parent('div[class="row"]').remove();
        return false;
    };

    var js_actions_add = function(){
        var container = $('div[ng-click="js_actions_container()"]');
        if(container.length > 0){
            var chlid = container.children();
            var chlidnode = chlid.length;
            if(chlidnode > 0){
                var index = parseInt(chlid.eq(chlidnode-1).attr('ng-index'))+1;
                var node = chlid.eq(0);
                var copynode = node.clone();
                copynode.find('div[class="tooltip fade top in"]').remove();
                copynode.attr('ng-index',index);
                copynode.find('input').each(function(){
                    var name = $(this).attr('name');
                    var change_name = name.replace('1',index);
                    $(this).attr('name',change_name);
                    var id = $(this).attr('id');
                    var change_id = id.replace('1',index);
                    $(this).attr('id',change_id);
                    $(this).val('');
                });
                copynode.find('a').replaceWith('<a class="icon icon-delete md-tip" ng-click="js_actions_delete()" style="margin: 5px;" href="javascript:;" title="删除"></a>');
                container.append(copynode);
            }
        }
        return false;
    };
    var js_actions_delete = function(eve){
        $(eve).parent('div[class="row"]').remove();
        return false;
    };

    var js_size_add = function(){
        var container = $('div[ng-click="js_size_container()"]');
        if(container.length > 0){
            var chlid = container.children();
            var chlidnode = chlid.length;
            if(chlidnode > 0){
                var index = parseInt(chlid.eq(chlidnode-1).attr('ng-index'))+1;
                var node = chlid.eq(0);
                var copynode = node.clone();
                copynode.find('div[class="tooltip fade top in"]').remove();
                copynode.attr('ng-index',index);
                copynode.find('input').each(function(){
                    var name = $(this).attr('name');
                    var change_name = name.replace('1',index);
                    $(this).attr('name',change_name);
                    var id = $(this).attr('id');
                    var change_id = id.replace('1',index);
                    $(this).attr('id',change_id);
                    $(this).val('');
                });
                copynode.find('a').replaceWith('<a class="icon icon-delete md-tip" ng-click="js_size_delete()" style="margin: 5px;" href="javascript:;" title="删除"></a>');
                container.append(copynode);
            }
        }
        return false;
    };
    var js_size_delete = function(eve){
        $(eve).parent('div[class="row"]').remove();
        return false;
    };
    var js_level_add = function(){
        var container = $('div[ng-click="js_level_container()"]');
        if(container.length > 0){
            var chlid = container.children();
            var chlidnode = chlid.length;
            if(chlidnode > 0){
                var index = parseInt(chlid.eq(chlidnode-1).attr('ng-index'))+1;
                var node = chlid.eq(0);
                var copynode = node.clone();
                copynode.find('div[class="tooltip fade top in"]').remove();
                copynode.attr('ng-index',index);
                copynode.find('input').each(function(){
                    var name = $(this).attr('name');
                    var change_name = name.replace('1',index);
                    $(this).attr('name',change_name);
                    var id = $(this).attr('id');
                    var change_id = id.replace('1',index);
                    $(this).attr('id',change_id);
                    $(this).val('');
                });
                copynode.find('a').replaceWith('<a class="icon icon-delete md-tip" ng-click="js_level_delete()" style="margin: 5px;" href="javascript:;" title="删除"></a>');
                container.append(copynode);
            }
        }
        return false;
    };
    var js_level_delete = function(eve){
        $(eve).parent('div[class="row"]').remove();
        return false;
    };
    var js_type_add = function(){
        var container = $('div[ng-click="js_type_container()"]');
        if(container.length > 0){
            var chlid = container.children();
            var chlidnode = chlid.length;
            if(chlidnode > 0){
                var index = parseInt(chlid.eq(chlidnode-1).attr('ng-index'))+1;
                var node = chlid.eq(0);
                var copynode = node.clone();
                copynode.find('div[class="tooltip fade top in"]').remove();
                copynode.attr('ng-index',index);
                copynode.find('input').each(function(){
                    var name = $(this).attr('name');
                    var change_name = name.replace('1',index);
                    $(this).attr('name',change_name);
                    var id = $(this).attr('id');
                    var change_id = id.replace('1',index);
                    $(this).attr('id',change_id);
                    $(this).val('');
                });
                copynode.find('a').replaceWith('<a class="icon icon-delete md-tip" ng-click="js_type_delete()" style="margin: 5px;" href="javascript:;" title="删除"></a>');
                container.append(copynode);
            }
        }
        return false;
    };
    var js_type_delete = function(eve){
        $(eve).parent('div[class="row"]').remove();
        return false;
    };
    var js_ptype_add = function(){
        var container = $('div[ng-click="js_ptype_container()"]');
        if(container.length > 0){
            var chlid = container.children();
            var chlidnode = chlid.length;
            if(chlidnode > 0){
                var index = parseInt(chlid.eq(chlidnode-1).attr('ng-index'))+1;
                var node = chlid.eq(0);
                var copynode = node.clone();
                copynode.find('div[class="tooltip fade top in"]').remove();
                copynode.attr('ng-index',index);
                copynode.find('input').each(function(){
                    var name = $(this).attr('name');
                    var change_name = name.replace('1',index);
                    $(this).attr('name',change_name);
                    var id = $(this).attr('id');
                    var change_id = id.replace('1',index);
                    $(this).attr('id',change_id);
                    $(this).val('');
                });
                copynode.find('a').replaceWith('<a class="icon icon-delete md-tip" ng-click="js_type_delete()" style="margin: 5px;" href="javascript:;" title="删除"></a>');
                container.append(copynode);
            }
        }
        return false;
    };
    var js_ptype_delete = function(eve){
        $(eve).parent('div[class="row"]').remove();
        return false;
    };
    var checkInput = function(eve){
        var s = $(eve).val();
        if(isEmpty(s)){
            $(eve).val(0);
        }else{
            var _s = parseInt(s);
            if(isNaN(_s)){
                _s = 0;
            }
            $(eve).val(_s);
        }
    }
</script>