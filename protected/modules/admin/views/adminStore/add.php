<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.3"></script>
<div class="aw-content-wrap">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/index');?>">门店列表</a>
                    </li>
                    <li class="active">
                        <a data-toggle="tab" href="javascript:;">添加门店</a>
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
                                    <?php echo $form->label($model,'type',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->dropDownList($model,'type',$type,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                                        <?php echo $form->error($model,'type',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'provinceid',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->dropDownList($model,'provinceid',$provinces,
                                            array(
                                                'empty'=>'-- 请选择  --',
                                                'ajax' => array(
                                                    'type' => 'POST',
                                                    'url' => $ajax_url,
                                                    'dataType' => 'json',
                                                    'data' => array('ct'=>'provice','ac'=>'getcity','parent' => 'js:this.value'),
                                                    'success' => 'function(re) {
                                                if(re.state){
                                                    $("#Store_cityid").html(re.html.citys);
                                                    $("#Store_areaid").html(re.html.areas);
                                                }
                                             }',
                                                ),
                                                'class'=>'form-control'));?>
                                        <?php echo $form->error($model,'provinceid',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'cityid',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->dropDownList($model,'cityid',$citys,
                                            array(
                                                'empty'=>'-- 请选择  --',
                                                'ajax' => array(
                                                    'type' => 'POST',
                                                    'url' => $ajax_url,
                                                    'dataType' => 'json',
                                                    'data' => array('ct'=>'provice','ac'=>'getarea','parent' => 'js:this.value'),
                                                    'success' => 'function(re) {
                                                if(re.state){
                                                    $("#Store_areaid").html(re.html.areas);
                                                }
                                             }',
                                                ),
                                                'class'=>'form-control'));?>
                                        <?php echo $form->error($model,'cityid',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <?php echo $form->label($model,'areaid',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->dropDownList($model,'areaid',$areas,array('empty'=>'-- 请选择  --','class'=>'form-control'));?>
                                        <?php echo $form->error($model,'areaid',array('class'=>'help-block'));?>
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
                                    <?php echo $form->label($model,'telephone',array('class'=>'col-sm-2 col-xs-3 control-label'));?>
                                    <div class="col-sm-6 col-xs-8">
                                        <?php echo $form->textField($model, 'telephone', array("class"=>"form-control"));?>
                                        <?php echo $form->error($model,'telephone',array('class'=>'help-block'));?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php echo $form->hiddenField($model, 'lat', array("class"=>"form-control"));?>
                        <?php echo $form->hiddenField($model, 'lng', array("class"=>"form-control"));?>
                        <div id="container" style="display:none;">
                        </div>
                        </tbody>
                        <tfoot>
                        <tr><?php echo !empty($model['id'])?$model['id']:''; ?>
                            <td>
                                <?php echo CHtml::submitButton(!empty($model['id'])?'编辑门店':'添加门店',array('class'=>'btn btn-primary center-block'))?>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('body').on('blur','#Store_address',function(){
            js_check_address(this);
        });
        $('body').on('blur','#Store_telephone',function(){
            js_check_telephone(this);
        });
    });
    var js_check_address = function(eve){
        var keyword = $(eve).val();
        if(isEmpty(keyword)){
            show_tip_message('请输入详细地址');
            return false;
        }
        var map = new BMap.Map("container");
        map.centerAndZoom("北京", 12);

        var localSearch = new BMap.LocalSearch(map);
        localSearch.enableAutoViewport(); //允许自动调节窗体大小
        localSearch.setSearchCompleteCallback(function (searchResult) {
            var poi = searchResult.getPoi(0);
            if(poi == undefined){
                $('#Store_address').val('')
                show_tip_message('请输入正确的地址');
                return false;
            }else{
                map.centerAndZoom(poi.point, 13);
                $('#Store_lat').val(poi.point.lat);
                $('#Store_lng').val(poi.point.lng);
            }
        });
        localSearch.search(keyword);
    }
    var js_check_telephone = function(eve){
        var s = $(eve).val();
        if(isEmpty(s)){
            $(eve).val('');
            show_tip_message('请输入联系电话');
            return false;
        }else{
            var f,_s;
            var d = s.split('-');
            if(d.length==2){
                _s = s;
                f = checkTel(s);
            }else if(d.length==3){
                _s = s;
                f = checkTel(_s);
            }else{
                _s = parseInt(s);
                if(isNaN(_s)){
                    $(eve).val('');
                    show_tip_message('请输入合法的联系电话');
                    return false
                }
                f = checkTel(_s);
            }
            if(f){
                $(eve).val(_s);
            }else{
                $(eve).val('');
                show_tip_message('请输入合法的联系电话');
                return false;
            }
        }
        return false;
    }
    function checkTel(tel){
        var pattern_phone = /^(0\d{2,3}-)?[1-9]\d{6,7}$/;
        var pattern_telephone = /^(18[0-3|5-9][0-9]{8})|(13[0-9]{9})|(15[0-3|5-9][0-9]{8})|(17[6-8][0-9]{8})$/;
        var pattern_telephone1 = /^([48]00)\-([0-9]{3})\-([0-9]{4})$/ ;
        var pattern_telephone2 = /^([48]00)([0-9]{7})$/ ;
        console.log(pattern_telephone1.test(tel));
        if(pattern_phone.test(tel)||pattern_telephone.test(tel)||pattern_telephone1.test(tel)||pattern_telephone2.test(tel)){
            return true;
        }else{
            return false;
        }
    }
</script>