<div class="aw-content-wrap">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');?>">产品列表</a>
                    </li>
                    <li class="active">
                        <a data-toggle="tab" href="#add">添加产品</a>
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
                                    <?php echo $form->label($model,'mid',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->dropDownList($model,'mid',$models_data,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                                        <?php echo $form->error($model,'mid',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'bid',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->dropDownList($model,'bid',$brand_arr,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                                        <?php echo $form->error($model,'bid',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
<!--                        <tr>-->
<!--                            <td>-->
<!--                                <div class="form-group">-->
<!--                                    --><?php //echo $form->label($model,'type',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
<!--                                    <div class="col-sm-6 col-xs-8">-->
<!--                                        --><?php //echo $form->dropDownList($model,'type',$ptype,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
<!--                                        --><?php //echo $form->error($model,'type',array('class'=>'help-block'));?>
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </td>-->
<!--                        </tr>-->
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'series_number',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'series_number', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'series_number',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'total',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo empty($model['id'])?$form->numberField($model, 'total', array("class"=>"form-control",'ng-click'=>'js_set_current()')):$form->numberField($model, 'total', array("class"=>"form-control",'ng-click'=>'js_change_num()','ng-model'=>$model['id']));?>
                                        <?php echo $form->error($model,'total',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'current_num',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->numberField($model, 'current_num', array("class"=>"form-control",'readonly'=>true));?>
                                        <?php echo $form->error($model,'current_num',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'province',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->dropDownList($model,'province',$provinces,
                                            array(
                                                'empty'=>'-- 请选择  --',
//                                                'ajax' => array(
//                                                    'type' => 'POST',
//                                                    'url' => $ajax_url,
//                                                    'dataType' => 'json',
//                                                    'data' => array('ct'=>'product','ac'=>'getcity','parent' => 'js:this.value'),
//                                                    'success' => 'function(re) {
//                                                if(re.state){
//                                                    $("#Product_city").html(re.html.citys);
//                                                    $("#Product_area").html(re.html.areas);
//                                                    $("#Product_storeid").html(re.html.stores);
//                                                }
//                                             }',
//                                                ),
                                                'class'=>'form-control'));?>
                                        <?php echo $form->error($model,'province',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'city',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->dropDownList($model,'city',$citys,
                                            array(
                                                'empty'=>'-- 请选择  --',
//                                                'ajax' => array(
//                                                    'type' => 'POST',
//                                                    'url' => $ajax_url,
//                                                    'dataType' => 'json',
//                                                    'data' => array('ct'=>'product','ac'=>'getarea','parent' => 'js:this.value'),
//                                                    'success' => 'function(re) {
//                                                if(re.state){
//                                                    $("#Product_area").html(re.html.areas);
//                                                }
//                                             }',
//                                                ),
                                                'class'=>'form-control'
                                                ));?>
                                        <?php echo $form->error($model,'city',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'area',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->dropDownList($model,'area',$areas,
                                            array(
                                                'empty'=>'-- 请选择  --',
                                                'class'=>'form-control',
//                                                'ajax'=>array(
//                                                    'type'=>'POST',
//                                                    'url'=>$ajax_url,
//                                                    'dataType'=>'json',
//                                                    'data'=>array('ct'=>'product','ac'=>'getstore','parent'=>'js:this.value'),
//                                                    'success'=>'function(re){
//                                                if(re.state){
//                                                    $("#Product_storeid").html(re.html.stores);
//                                                }
//                                             }'
//                                                )
                                            )
                                        );?>
                                        <?php echo $form->error($model,'area',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'storeid',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->dropDownList($model, 'storeid',$stores, array("class"=>"form-control",'empty'=>'-- 请选择  --'));?>
                                        <?php echo $form->error($model,'storeid',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'customer',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'customer', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'customer',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'spec',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'spec', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'spec',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'company',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'company', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'company',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'intro',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-8 col-xs-8">
                                        <?php
                                        $this->widget('ext.ueditor.Ueditor', array(
                                            'id'=>'editor',
                                            'model'=>$model,
                                            'attribute'=>'intro',
                                            'UEDITOR_CONFIG'=>array(
                                                'UEDITOR_HOME_URL'=>Yii::app()->baseUrl.'/ueditor/',
                                                'initialFrameWidth'   => 1000,
                                                'initialFrameHeight'  => 200,
                                                'emotionLocalization'=>true,
                                                'pageBreakTag'=>'[page]',
                                                'toolbars'   => array(
                                                    array(
                                                        'source', '|',
                                                        'undo', 'redo', '|',
                                                        'bold', 'itelic', 'underline', 'fontborder', 'strikethrough', 'subscript', 'superscript', 'autotypeset', 'blockquote', 'pasteplain', '|',
                                                        'forecolor', 'backcolor', 'selectall', 'cleardoc', '|',
                                                        'RowSpacingTop', 'RowSpacingBottom', 'lineheight', '|', 'customstyle',
                                                        'paragraph', 'fontfamily', 'fontsize', '|',
                                                        'indent', 'justifyleft', 'justifyright', 'justifycenter','justifyjustify','|',
                                                        'link', 'unlink', '|',
                                                        'horizontal', 'date', 'time', 'spechars', '|',
                                                        'insertimage', 'emotion', 'insertvideo', 'fullscreen'
                                                    ),
                                                ),
                                            ),
                                        ));
                                        ?>
                                        <?php echo $form->error($model,'intro',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr><?php echo !empty($model['id'])?$model['id']:''; ?>
                            <td>
                                <?php echo CHtml::submitButton(!empty($model['id'])?'编辑产品':'添加产品',array('class'=>'btn btn-primary center-block'))?>
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
//        $('body').on('blur','#Product_price',function(){
//            js_check_price(this);
//        });
        $('body').on('blur','input[ng-click="js_change_num()"]',function(){
            js_change_num(this);
        });
        $('body').on('blur','input[ng-click="js_set_current()"]',function(){
            js_set_current(this);
        });

        $('body').on('change','select[name="Product[province]"]',function(){
            js_province_store(this);
        });
        $('body').on('change','select[name="Product[city]"]',function(){
            js_city_store(this);
        });
        $('body').on('change','select[name="Product[area]"]',function(){
            js_area_store(this);
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

    var js_province_store = function(eve){
        var parent = $(eve).val();
        $.ajax({
            url:'<?php echo $ajax_url ?>',
            type:'POST',
            dataType:'json',
            data:{ct:'product',ac:'getcity',parent:parent},
            success:function(re){
                if(re.state){
                    $("#Product_city").html(re.html.citys);
                    $("#Product_area").html(re.html.areas);
                    $("#Product_storeid").html(re.html.stores);
                }
            }
        });
    }

    var js_city_store = function(eve){
        var parent = $(eve).val();
        var _parent = $('#Product_province').val();
        $.ajax({
            url:'<?php echo $ajax_url ?>',
            type:'POST',
            dataType:'json',
            data:{ct:'product',ac:'getarea',parent:parent,_parent:_parent},
            success:function(re){
                if(re.state){
                    $("#Product_area").html(re.html.areas);
                    $("#Product_storeid").html(re.html.stores);
                }
            }
        });
    }

    var js_area_store = function(eve){
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
                    $("#Product_storeid").html(re.html.stores);
                }
            }
        });
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


//    var js_check_price = function(eve){
//        var s = $(eve).val();
//        if(isEmpty(s)){
//            $(eve).val(0.00);
//        }else{
//            var _s = parseFloat(s,2);
//            if(isNaN(_s)){
//                _s = 0.00;
//            }
//            $(eve).val(_s);
//        }
//    }
    var js_set_current = function(eve){
        var total = $(eve).val();
        if(isEmpty(total)||parseInt(total)==0){
            $('#Product_current_num').val(0);
            $('#Product_total').val(0);
        }else{
            $('#Product_current_num').val(parseInt(total));
            $('#Product_total').val(parseInt(total));
        }
    }
    var js_change_num = function(eve){
        var id = $(eve).attr('ng-model');
        var num = $(eve).val();
        var cnum = '<?php echo $model['total']; ?>';
        var ccnum = '<?php echo $model['current_num']; ?>';
        if(isEmpty(id)||isEmpty(num)){
            show_tip_message('参数错误');
            return false;
        }
        $.ajax({
            type:'post',
            url:'<?php echo $ajax_url ?>',
            data:{ct:'product',ac:'change',id:id,num:num},
            dataType:'json',
            success:function(re){
                if(re.state){
                    $('#Product_current_num').val(re.msg);
                }else{
                    $('#Product_total').val(cnum);
                    $('#Product_current_num').val(ccnum);
                    show_tip_message(re.msg);
                }
            }
        });
    }
</script>