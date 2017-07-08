<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/statics/js/laydate/laydate.js"></script>
<main id="room_page">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar">
                    <aside class="widget">
                        <div class="vbf">
                            <h2 class="form_title"><i class="fa fa-calendar"></i> 提交质保信息申请</h2>
                            <?php
                            $form = $this->beginWidget("CActiveForm",array(
                                    'id'=>'warranty_form',
                                    'method'=>'POST',
                                    'action'=>Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/add'),
                                    'enableClientValidation'=>false,
                                    'clientOptions'=>array(
                                        'validateOnSubmit'=>true,
                                    ),
                                    'htmlOptions'=>array('class'=>'inner'),
                                )
                            );
                            ?>
                            <div class="form-group">
                                <div class="form_select">
                                    <?php echo $form->textField($model,'name',array('placeholder'=>'请输入姓名/英文名', 'class'=>'form-control'));?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form_select">
                                    <?php echo $form->textField($model,'telephone',array('placeholder'=>'请输入电话', 'class'=>'form-control'));?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form_select">
                                    <?php echo $form->textField($model,'address',array('placeholder'=>'请输入地址', 'class'=>'form-control'));?>
                                </div>
                            </div>
<!--                            <div class="form-group">-->
<!--                                <div class="form_select">-->
<!--                                    --><?php //echo $form->textField($model,'carlicence',array('placeholder'=>'请输入车牌号', 'class'=>'form-control'));?>
<!--                                </div>-->
<!--                            </div>-->
                            <div class="form-group">
                                <div class="form_select">
                                    <?php echo $form->textField($model,'carmodel',array('placeholder'=>'请输入车辆型号', 'class'=>'form-control'));?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form_select">
                                    <?php echo $form->textField($model,'engineno',array('placeholder'=>'请输入车架号（后六位）', 'class'=>'form-control'));?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form_select">
                                    <?php echo $form->textField($model,'construct_time',array('placeholder'=>'请选择施工时间', 'class'=>'form-control mod-data',"readonly"=>true));?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form_select">
                                    <?php echo $form->dropDownList($model,'provinceid',$provinces,array('empty'=>'请选择省份', 'class'=>'form-control','ng-change'=>'js_change_province()'));?>
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                                <div class="form_select">
                                    <?php echo $form->dropDownList($model,'cityid',$citys,array('empty'=>'请选择城市', 'class'=>'form-control md_noborder_right','ng-change'=>'js_change_city()'));?>
                                </div>
                            </div>
<!--                            <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">-->
<!--                                <div class="form_select">-->
<!--                                    --><?php //echo $form->dropDownList($model,'areaid',$areas,array('empty'=>'请选择区县', 'class'=>'form-control','ng-change'=>'js_change_area()'));?>
<!--                                </div>-->
<!--                            </div>-->
                            <div class="form-group">
                                <div class="form_select">
                                    <?php echo $form->dropDownList($model,'storeid',$store,array('empty'=>'请选择4S店', 'class'=>'form-control'));?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form_select" style="position: relative;">
                                    <input type="text" name="Warranty[authcode]" id="Warranty_authcode" class="form-control" style="width:70%;float:left;" placeholder="请输入验证码">
                                    <span style="float: right;margin-top: 5px;">
                                        <button type="button" class="btn btn-primary" id="sendauthcode">获取验证码</button>
                                    </span>
                                </div>
                            </div>
                            <button class="button btn_lg btn_blue btn_full" type="button" id="add_submit">提交质保申请</button>
                            <?php $this->endWidget(); ?>
                        </div>
                    </aside>
                    <aside class="widget">
                        <h4>联系信息</h4>
                        <div class="help">
                            <?php echo $this->callus; ?>
                        </div>
                    </aside>
                    <aside class="widget">
                        <h4>资讯</h4>
                        <?php if(!empty($news)){ ?>
                            <div class="latest_posts">
                                <?php foreach($news as $_news){ ?>
                                    <article class="latest_post">
                                        <figure>
                                            <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.'news/detail',array('id'=>$_news['id'])); ?>" class="hover_effect h_link h_blue">
                                                <img src="<?php echo !empty($_news['thumb'])?Yii::app()->baseUrl.$_news['thumb']:Yii::app()->baseUrl.'/statics/front/images/blog/thumb1.jpg'; ?>" height="60" width="120" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="details">
                                            <h6><a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.'news/detail',array('id'=>$_news['id'])); ?>"><?php echo $_news['title'] ?></a></h6>
                                            <span><i class="fa fa-calendar"></i><?php echo !empty($_news['ctime'])?date('d/m/Y',$_news['ctime']):''; ?></span>
                                        </div>
                                    </article>
                                <?php } ?>
                            </div>
                        <?php }else{ ?>
                            <div class="latest_posts">
                                没有资讯
                            </div>
                        <?php } ?>
                    </aside>
                </div>

                <!-- ========== BACK TO TOP ========== -->
                <div id="back_to_top">
                    <i class="fa fa-angle-up" aria-hidden="true"></i>
                </div>

                <!-- ========== NOTIFICATION ========== -->
                <div id="notification"></div>

            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
    var url = '<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/store/setting'); ?>';
    $(function(){
        $('body').on('blur','#Warranty_telephone',function(){
            js_check_telephone(this);
        });
        $('body').on('click','#sendauthcode',function(){
            js_send_authcode(this);
        });
        $('body').on('blur','#Warranty_engineno',function(){
            var engineno = $(this).val();
            if(engineno.length!=6){
                $('#Warranty_engineno').val('');
                show_tip_message('请填写发动机编号的后六位！');
                return false;
            }
        });
        $('body').on('click','#add_submit',function(){
            js_submit_form();
        });
        $('body').on('change','select[ng-change="js_change_province()"]',function(){
            js_change_province(this);
        });
        $('body').on('change','select[ng-change="js_change_city()"]',function(){
            js_change_city(this);
        });
        $('body').on('change','select[ng-change="js_change_area()"]',function(){
            js_change_area(this);
        });
        var date1={
            elem: '#Warranty_construct_time',
            event: 'focus',
            format: 'YYYY-MM-DD',
            choose:function(datas){
                date1.start = datas;
            }
        }
        laydate(date1);
    });
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
        if(pattern_phone.test(tel)||pattern_telephone.test(tel)||pattern_telephone1.test(tel)||pattern_telephone2.test(tel)){
            return true;
        }else{
            return false;
        }
    }
    var getStore = function(province,city,area){
        $.ajax({
            type:'post',
            url:'<?php echo $ajax_url ?>',
            data:{ct:'warranty',ac:'getSore',province:province,city:city,area:area},
            dataType:'json',
            success:function(e){
                if(e.state==true){
                    _clearSelect();
                    if(!isEmpty(e.msg)){
                        $('#Warranty_storeid').append(e.msg);
                    }
                }else{
                    _clearSelect();
                }
            },
            error:function(err){

            }
        });
    }

    var js_change_province = function(eve){
        var province = $(eve).val();
        var city = '';
        var area = '';
        if(!isEmpty(province)){
            $.ajax({
                type:'post',
                url:url,
                data:{ct:'Store',ac:'getCity',province:province},
                dataType:'json',
                success:function(re){
                    if(re.state==true){
                        clearSelect(0);
                        if(!isEmpty(re.html)){
                            $('#Warranty_cityid').append(re.html.citys);
                        }
                    }else{
                        clearSelect(0);
                    }
                },
                error:function(er){

                }
            });
        }else{
            clearSelect(0);
        }
        getStore(province,city,area);
    }
    var js_change_city = function(eve){
        var province = $('#Warranty_provinceid').val();
        var city = $(eve).val();
        var area = '';
        if(!isEmpty(city)){
            $.ajax({
                type:'post',
                url:url,
                data:{ct:'Store',ac:'getArea',city:city},
                dataType:'json',
                success:function(re){
                    if(re.state==true){
                        clearSelect(1);
                        if(!isEmpty(re.html)){
                            $('#Warranty_areaid').append(re.html.areas);
                        }
                    }else{
                        clearSelect(1);
                    }
                },
                error:function(er){

                }
            });
        }else{
            clearSelect(1);
        }
        getStore(province,city,area);
    }

    var js_change_area = function(eve){
        var province = $('#Warranty_provinceid').val();
        var city = $('#Warranty_cityid').val();
        var area = $(eve).val();
        if(isEmpty(area)){
            clearSelect(1);
        }
        getStore(province,city,area);
    }

    var js_submit_form = function(){
        var name = $('#Warranty_name').val();
        if(isEmpty(name)){
            show_tip_message('请填写姓名！');
            return false;
        }
        var telephone = $('#Warranty_telephone').val();
        if(isEmpty(telephone)){
            show_tip_message('请填写手机号！');
            return false;
        }
        var address = $('#Warranty_address').val();
        if(isEmpty(address)){
            show_tip_message('请填写联系地址！');
            return false;
        }
//        var carlicence = $('#Warranty_carlicence').val();
//        if(isEmpty(carlicence)){
//            show_tip_message('请填写车牌号！');
//            return false;
//        }
        var carmodel = $('#Warranty_carmodel').val();
        if(isEmpty(carmodel)){
            show_tip_message('请填写车辆型号！');
            return false;
        }
        var authcode = $('#Warranty_authcode').val();
        if(isEmpty(authcode)){
            show_tip_message('请输入验证码！');
            return false;
        }
        var engineno = $('#Warranty_engineno').val();
        if(isEmpty(engineno)){
            show_tip_message('请填写发动机编号！');
            return false;
        }
        if(engineno.length!=6){
            $('#Warranty_engineno').val('');
            show_tip_message('请填写发动机编号的后六位！');
            return false;
        }
        var construct_time = $('#Warranty_construct_time').val();
        if(isEmpty(construct_time)){
            show_tip_message('请选择质保时间！');
            return false;
        }
        var storeid = $('#Warranty_storeid').val();
        if(isEmpty(storeid)){
            show_tip_message('请选择4S门店！');
            return false;
        }
        var authcode = $('#Warranty_authcode').val();
        if(isEmpty(authcode)){
            show_tip_message('请填写验证码！');
            return false;
        }else{
            $.ajax({
                type:'post',
                url:'<?php echo $ajax_url; ?>',
                data:{ct:'warranty',ac:'checkAuth',authcode:authcode,telephone:telephone},
                dataType:'json',
                success:function(re){
                    if(re.state!=true){
                        show_tip_message(re.msg);
                        return false;
                    }else{
                        $.ajax({
                            type:'post',
                            url:'<?php echo $ajax_url; ?>',
                            data:{ct:'warranty',ac:'checkWarranty',name:name,telephone:telephone,engineno:engineno,carmodel:carmodel},
                            dataType:'json',
                            success:function(re){
                                if(re.state==true){
                                    $('#warranty_form').submit();
                                }else{
                                    show_tip_message(re.msg);
                                    return false;
                                }
                            },
                            error:function(er){

                            }
                        });
                    }
                }
            });
        }
    }
    var js_send_authcode  =function(eve){
        var telephone = $('#Warranty_telephone').val();
        if(isEmpty(telephone)){
            show_tip_message('请输入手机号码');
            return false;
        }
        var $sendCode = $(eve);
        $sendCode.attr('disabled','disabled');
        $.ajax({
            type:'post',
            url:'<?php echo $ajax_url; ?>',
            data:{ct:'warranty',ac:'sendauthcode',telephone:telephone},
            dataType:'json',
            success:function(re){
                if(re.state==true){
                    sendCode($sendCode);
                    show_tip_message(re.msg,null,2000,1);
                }else{
                    show_tip_message(re.msg);
                    $sendCode.removeAttr('disabled');
                }
            },
            error:function(er){

            }
        });
        return false;
    }
    var curTime = 60;
    var timer = null;
    var sendCode = function(obj){
        curTime--;
        obj.text(curTime + 'S后重发');
        timer = setInterval(function () {
            curTime--;
            if (curTime == 0) {
                obj.text('获取验证码');
                obj.removeAttr('disabled');
                curTime = 60;
                clearInterval(timer);
            } else {
                obj.text(curTime + 'S后重发');
            }

        }, 1000);
    };
    function clearSelect(i){
        if(i===0){
            $('#Warranty_cityid').empty().append('<option value="">请选择城市</option>');
            $("button[data-id='Warranty_cityid']").attr('title','请选择城市');
            $("button[data-id='Warranty_cityid']").find('.filter-option').text('请选择城市');
        }
        $('#Warranty_areaid').empty().append('<option value="">请选择区县</option>');
        $("button[data-id='Warranty_areaid']").attr('title','请选择区县');
        $("button[data-id='Warranty_areaid']").find('.filter-option').text('请选择区县');
    }
    function _clearSelect(){
        $('#Warranty_storeid').empty().append('<option value="">请选择4S店</option>');
        $("button[data-id='Warranty_storeid']").attr('title','请选择4S店');
        $("button[data-id='Warranty_storeid']").find('.filter-option').text('请选择4S店');
    }
</script>