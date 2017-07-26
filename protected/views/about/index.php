<div class="banner003">
    <div class="container">
        <a href="#"><img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/shouye/fanhui.png" width="45px" height="40px" style="margin-top:-5px" /></a>
        联系我们 ><a href="#lx" style="margin-left: 20px;color:#737373;">联系我们</a><a href="#zp" style="margin-left: 20px;color:#737373;">招聘信息</a><a href="#fk" style="margin-left: 20px;color:#737373;">反馈信息</a>
    </div>
</div>
<div style="background-color: #e8e8e8">
    <!--tupianqiehuan-->
    <div class="container" style="background-color: #fff">
        <img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/lianxiwomen.jpg" width="100%" height="auto" id='lx' />
        <br>
        <br>
        <table width="100%" border="0">
            <tr>
                <td>
                    <!--引用百度地图API-->
                    <style type="text/css">
                        html,body{margin:0;padding:0;}
                        .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
                        .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
                    </style>
                    <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
                    <body>
                    <!--百度地图容器-->
                    <div style="width:100%;height:550px;border:#ccc solid 1px;" id="dituContent"></div>
                    </body>
                    <script type="text/javascript">
                        //创建和初始化地图函数：
                        function initMap(){
                            createMap();//创建地图
                            setMapEvent();//设置地图事件
                            addMapControl();//向地图添加控件
                        }

                        //创建地图函数：
                        function createMap(){
                            var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
                            var point = new BMap.Point(121.547988,31.282581);//定义一个中心点坐标
                            map.centerAndZoom(point,18);//设定地图的中心点和坐标并将地图显示在地图容器中
                            window.map = map;//将map变量存储在全局
                        }

                        //地图事件设置函数：
                        function setMapEvent(){
                            map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
                            map.enableScrollWheelZoom();//启用地图滚轮放大缩小
                            map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
                            map.enableKeyboard();//启用键盘上下左右键移动地图
                        }

                        //地图控件添加函数：
                        function addMapControl(){
                            //向地图中添加缩放控件
                            var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
                            map.addControl(ctrl_nav);
                            //向地图中添加缩略图控件
                            var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
                            map.addControl(ctrl_ove);
                            //向地图中添加比例尺控件
                            var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
                            map.addControl(ctrl_sca);
                        }


                        initMap();//创建和初始化地图
                    </script>
                </td>
            </tr>
        </table>
        <div class="lianxiwome">
            <img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/lianxi001.jpg" width="100%" height="auto" />
            <img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/zhaopin001.jpg" width="100%" height="auto" />
        </div>
        <div class="zhaopinxinxi" id='zp'>
            <div class="col-md-12 col-sm-12 widget" style="text-align: center;margin-left: 50px;">
                <?php if(!empty($recruits)){ ?>
                    <?php foreach($recruits as $key=>$val){?>
                        <div style="float: left;border: 1px solid #d8d8d8;">
                            <div align="left" style="border:1px solid #d8d8d8;width:100%">
                                <div align="left" style="">
                                    <div align="center" style="width:500px;height:auto;text-align=:center;padding:20px 50px;color:#737373;font-size:18px;font-weight:600;"><?php echo $val['employ_name']; ?></div>
                                    <div align="left" style="border-bottom:1px solid #d8d8d8;width:100%">
                                    </div>
                                </div>
                            </div>
                            <div align="left" style="border:1px solid #d8d8d8;width:100%">
                                <div style="width:500px;height:auto;text-align=:center;padding:20px 50px;color:#737373;line-height:26px;">
                                    <strong>岗位职责：</strong><br>
                                    <div>
                                        <?php echo $val['desc']; ?>
                                    </div>
                                </div>
                                <div align="left" style="border:1px solid #d8d8d8;width:100%">
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php }else{ ?>
                    <div style="background-color: #131629">
                        <div class="container" style="margin-top: 50px;margin-bottom: 50px;background-color: #fff;">
                            <div class="col-md-8" style="margin-left:17%">
                                <div class="sidebar">
                                    <div class="vbf">
                                        <div class="form-group">
                                        <span style="line-height: inherit;font-size: 24px;font-weight: bold;">暂时没有招聘岗位，<br>
                                        我们在必要时会对外招聘，敬请期待！</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

        <div class="yijianfankui" >
            <img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/yijianfankui.jpg" width="100%" height="auto"  id='fk'/>
            <div class="col-md-8" style="margin-left:17%">
                <div class="sidebar">
                    <aside class="widget">
                        <div class="vbf">
                            <?php
                            $form = $this->beginWidget("CActiveForm",array(
                                'id'=>'message_add_form',
                                'action'=>Yii::app()->createUrl('about/add'),
                                'method'=>'post',
                                'enableClientValidation'=>true,
                                'clientOptions'=>array(
                                    'validateOnSubmit'=>true,
                                ),
                                'htmlOptions'=>array('enctype'=>'multipart/form-data'),
                            ));
                            ?>
                            <div class="form-group">
                                <div class="form_select">
                                    <?php echo $form->dropDownList($messageModel,'type',$messageModel->type_arr,array('class'=>'form-control','empty'=>'请选择称谓'));?>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="form_select">
                                    <?php echo $form->textField($messageModel,'name',array('class'=>'form-control','placeholder'=>'姓名*'));?>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="form_select">
                                    <?php echo $form->textField($messageModel,'telephone',array('class'=>'form-control','placeholder'=>'电话*'));?>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="form_select">
                                    <?php echo $form->textField($messageModel,'address',array('class'=>'form-control','placeholder'=>'地址*'));?>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="form_select">
                                    <?php echo $form->textarea($messageModel,'message',array('class'=>'form-control','placeholder'=>'描述你的建议*','rows'=>50));?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form_select" style="position: relative;">
                                    <?php echo $form->textField($messageModel,'authcode',array('class'=>'form-control','placeholder'=>'请输入验证码','style'=>'width:85%;float:left;'));?>
                                    <span style="float: right;margin-top: 5px;">
                                        <button type="button" class="btn btn-primary" id="sendauthcode">获取验证码</button>
                                    </span>
                                </div>
                            </div>
                            <br>
                            <button class="button btn_lg btn_blue btn_full" type="button" id="message_submit">提交建议反馈</button>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <?php $this->endWidget(); ?>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copyrights" align="left" style="border-top:1px dotted #202741;width:100%">
</div>
<br>
<br>
<script>
    $(function(){
        $('body').on('blur','#Message_telephone',function(){
            js_check_telephone(this);
        });
        $('body').on('click','#sendauthcode',function(){
            js_send_authcode(this);
        });
        $('body').on('click','#message_submit',function(){
            js_submit_form();
        });
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
    var js_submit_form = function(){
        var type = $('#Message_type').val();
        if(isEmpty(type)){
            show_tip_message('请填写称谓！');
            return false;
        }
        var name = $('#Message_name').val();
        if(isEmpty(name)){
            show_tip_message('请填写姓名！');
            return false;
        }
        var telephone = $('#Message_telephone').val();
        if(isEmpty(telephone)){
            show_tip_message('请填写手机号！');
            return false;
        }
        var address = $('#Message_address').val();
        if(isEmpty(address)){
            show_tip_message('请填写联系地址！');
            return false;
        }
        var authcode = $('#Message_authcode').val();
        if(isEmpty(authcode)){
            show_tip_message('请输入验证码！');
            return false;
        }
        authcode = $('#Message_authcode').val();
        if(isEmpty(authcode)){
            show_tip_message('请填写验证码！');
            return false;
        }else{
            $.ajax({
                type:'post',
                url:'<?php echo Yii::app()->createUrl('warranty/setting'); ?>',
                data:{ct:'warranty',ac:'checkAuth',authcode:authcode,telephone:telephone},
                dataType:'json',
                success:function(re){
                    if(re.state!=true){
                        show_tip_message(re.msg);
                        return false;
                    }else{
                        $('#message_add_form').submit();
                    }
                }
            });
        }
    }
    var js_send_authcode  =function(eve){
        var telephone = $('#Message_telephone').val();
        if(isEmpty(telephone)){
            show_tip_message('请输入手机号码');
            return false;
        }
        var $sendCode = $(eve);
        $sendCode.attr('disabled','disabled');
        $.ajax({
            type:'post',
            url:'<?php echo Yii::app()->createUrl('warranty/setting'); ?>',
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
</script>