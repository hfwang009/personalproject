<div class="aw-content-wrap">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');?>">角色列表</a>
                    </li>
                    <li class="active">
                        <a data-toggle="tab" href="#add">添加角色</a>
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
                        'id'=>'brand_add_form',
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
                                    <?php echo $form->label($model,'res',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model,'res',array('readonly'=>true,'onfocus'=>"showMenu(); return false;",'id'=>'select_res','class'=>'form-control'));?>
                                        <?php echo $form->error($model,'res',array('class'=>'help-block'));?>
                                        <?php echo $form->hiddenField($model,'res_ids',array('class'=>'form-control','id'=>'select_ids'));?>
                                    </div>
                                    <div id="menuContent" class="zTreeDemoBackground col-sm-6" style="display:none;position: absolute;">
                                        <ul id="treeDemo" class="ztree" style="width: 333px; margin-top: 0px; position: relative;z-index: 99;"></ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr><?php echo !empty($model['id'])?$model['id']:''; ?>
                            <td>
                                <?php echo CHtml::submitButton(!empty($model['id'])?'编辑角色':'添加角色',array('class'=>'btn btn-primary center-block'))?>
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
                    <?php echo $form->label($search,'name',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                    <div class="col-sm-5 col-xs-8">
                        <?php echo $form->textField($search, 'name', array("class"=>"form-control"));?>
                        <?php echo $form->error($search,'name',array('class'=>'help-block'));?>
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

<link href="<?php echo Yii::app()->request->baseUrl; ?>/statics/ztree/css/demo.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/statics/ztree/css/zTreeStyle.css" rel="stylesheet">
<script src="<?php echo Yii::app()->request->baseUrl; ?>/statics/ztree/js/jquery.ztree.core.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/statics/ztree/js/jquery.ztree.excheck.js"></script>
<script type="text/javascript">
    $(function(){
        getztree();
    });
    function showMenu() {
        console.log(111);
        var Obj = $("#select_res");
        var ObjOffset = $("#select_res").offset();
        console.log(ObjOffset);
        console.log(Obj);
        $("#menuContent").css({left:ObjOffset.left + "px", top:ObjOffset.top + Obj.outerHeight() + "px"}).slideDown("fast");

        $("body").bind("mousedown", onBodyDown);
    }

    function hideMenu() {
        $("#menuContent").fadeOut("fast");
        $("body").unbind("mousedown", onBodyDown);
    }
    function onBodyDown(event) {
        if (!(event.target.id == "menuBtn" || event.target.id == "menuContent" || $(event.target).parents("#menuContent").length>0)) {
            hideMenu();
        }
    }
    function getztree(){
        var setting = {
            check:{
                enable: true
            },
            data: {
                simpleData: {
                    enable: true
                }
            },
            callback: {
                onCheck:onCheck
            }
        };
        var json = '<?php echo $array['json'] ?>';
        if(!isEmpty(json)){
            var zNodes = JSON.parse(json);
            var tree = $.fn.zTree.init($("#treeDemo"), setting, zNodes);
            var _ids = JSON.parse('<?php echo $array["attr_values"] ?>');
            var i = 0, l = _ids.length, node = null;
            console.log(_ids);
            if(!isEmpty(_ids)){
                $('#select_res').val(_ids.join(','));
            }
            for( ; i < l; i ++ ) {
                tree.checkNode( tree.getNodeByParam( 'name',_ids[i] ), true);
            }
        }

        function onCheck(e,treeId,treeNode){
            var treeObj=$.fn.zTree.getZTreeObj("treeDemo"),
                nodes=treeObj.getCheckedNodes(true),
                v="";
            var array=[],_array=[];
            for(var i=0;i<nodes.length;i++){
                var childrenNodes = nodes[i].children;
                if(!childrenNodes||childrenNodes==undefined){
                    array.push(nodes[i].name);
                    _array.push(nodes[i].id);
                    v+=nodes[i].name + ",";
                    //console.log(nodes[i].id); //获取选中节点的值
                }
            }
            var _v = array.join(',');
            var __v = _array.join(',');
            $('#select_res').val(_v);
            $('#select_ids').val(__v);
        }
    }
</script>