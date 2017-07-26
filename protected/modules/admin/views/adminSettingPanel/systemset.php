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
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/set');?>">参数设置</a>
                    </li>
                    <li  class="active">
                        <a href="javascript:;">系统参数设置</a>
                    </li>
                </ul>
            </h3>
        </div>
        <div class="tab-content mod-content">
            <table class="table table-striped" ng-click="js_link_List()">
                <thead>
                </thead>
                <tbody>

                <tr>
                    <td>
                        <div class="form-group">
                            <span class="col-sm-2 col-xs-3 control-label">控制器操作设置:</span>
                            <div class="col-sm-8 col-xs-8" ng-click="js_controllers_container()">
                                <?php
                                if(isset($config['syssetting']['controllers']) && !empty($config['syssetting']['controllers'])){
                                    foreach ($config['syssetting']['controllers'] as $key=>$_controllers){
                                        ?>
                                        <div class="row" ng-index="<?php echo $key;?>">
                                            <div class="col-xs-11  col-sm-3 mod-double">
                                                <?php echo $form->textField($model,'datavalue[syssetting][controllers]['.$key.'][econtrol]',array('placeholder'=>'控制器操作设置','value'=>$_controllers['econtrol'],'class'=>'form-control'));?>
                                            </div>
                                            <div class="col-xs-11  col-sm-3 mod-double">
                                                <?php echo $form->textField($model,'datavalue[syssetting][controllers]['.$key.'][ccontrol]',array('placeholder'=>'控制器操作中文','value'=>$_controllers['ccontrol'],'class'=>'form-control'));?>
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
                                            <?php echo $form->textField($model,'datavalue[syssetting][controllers][1][econtrol]',array('placeholder'=>'控制器操作设置','class'=>'form-control'));?>
                                        </div>
                                        <div class="col-xs-11  col-sm-3 mod-double">
                                            <?php echo $form->textField($model,'datavalue[syssetting][controllers][1][ccontrol]',array('placeholder'=>'控制器操作中文','class'=>'form-control'));?>
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
                                if(isset($config['syssetting']['actions']) && !empty($config['syssetting']['actions'])){
                                    foreach ($config['syssetting']['actions'] as $key=>$_actions){
                                        ?>
                                        <div class="row" ng-index="<?php echo $key;?>">
                                            <div class="col-xs-11  col-sm-3 mod-double">
                                                <?php echo $form->textField($model,'datavalue[syssetting][actions]['.$key.'][eaction]',array('placeholder'=>'操作设置','value'=>$_actions['eaction'],'class'=>'form-control'));?>
                                            </div>
                                            <div class="col-xs-11  col-sm-3 mod-double">
                                                <?php echo $form->textField($model,'datavalue[syssetting][actions]['.$key.'][caction]',array('placeholder'=>'操作设置中文','value'=>$_actions['caction'],'class'=>'form-control'));?>
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
                                            <?php echo $form->textField($model,'datavalue[syssetting][actions][1][eaction]',array('placeholder'=>'操作设置','class'=>'form-control'));?>
                                        </div>
                                        <div class="col-xs-11  col-sm-3 mod-double">
                                            <?php echo $form->textField($model,'datavalue[syssetting][actions][1][caction]',array('placeholder'=>'操作设置','class'=>'form-control'));?>
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
                <tr>
                    <td>
                        <div class="form-group">
                            <span class="col-sm-2 col-xs-3 control-label">语言:</span>
                            <div class="col-sm-8 col-xs-8" ng-click="js_lang_container()">
                                <?php
                                if(isset($config['syssetting']['lang']) && !empty($config['syssetting']['lang'])){
                                    foreach ($config['syssetting']['lang'] as $key=>$_lang){
                                        ?>
                                        <div class="row" ng-index="<?php echo $key;?>">
                                            <div class="col-xs-11  col-sm-3 mod-double">
                                                <?php echo $form->textField($model,'datavalue[syssetting][lang]['.$key.']',array('placeholder'=>'设置语言','value'=>$_lang,'class'=>'form-control'));?>
                                            </div>
                                            <?php
                                            if($key == 1){
                                                ?>
                                                <a class="icon icon-plus md-tip" ng-click="js_lang_add()" style="margin: 5px;" href="javascript:;" title="添加"></a>
                                            <?php
                                            }else{
                                                ?>
                                                <a class="icon icon-delete md-tip" ng-click="js_lang_delete()" style="margin: 5px;" href="javascript:;" title="删除"></a>
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
                                            <?php echo $form->textField($model,'datavalue[syssetting][lang][1]',array('placeholder'=>'设置语言','class'=>'form-control'));?>
                                        </div>
                                        <a class="icon icon-plus md-tip" ng-click="js_lang_add()" style="margin: 5px;" href="javascript:;" title="添加"></a>
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
        $('body').on('click','a[ng-click="js_controllers_add()"]',function(){
            js_controllers_add();
            return false;
        });
        $('body').on('click','a[ng-click="js_controllers_delete()"]',function(){
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
        $('body').on('click','a[ng-click="js_lang_add()"]',function(){
            js_lang_add();
            return false;
        });
        $('body').on('click','a[ng-click="js_lang_delete()"]',function(){
            js_lang_delete(this);
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
    var js_lang_add = function(){
        var container = $('div[ng-click="js_lang_container()"]');
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
                copynode.find('a').replaceWith('<a class="icon icon-delete md-tip" ng-click="js_lang_delete()" style="margin: 5px;" href="javascript:;" title="删除"></a>');
                container.append(copynode);
            }
        }
        return false;
    };
    var js_lang_delete = function(eve){
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