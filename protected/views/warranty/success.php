<div class="banner003">
    <div class="container">
        <a href="#"><img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/shouye/fanhui.png" width="45px" height="40px" style="margin-top:-5px" /></a>
        质保查询 ><a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->id.'/index');?>#shenqing" style="margin-left: 20px;color:#737373;">质保申请</a><a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->id.'/index');?>#cx" style="margin-left: 20px;color:#737373;">质保查询</a>
    </div>
</div>
<div style="background-color: #131629">
    <div class="container" style="margin-top: 50px;margin-bottom: 50px;">
        <div class="col-md-8" style="margin-left:17%">
            <div class="sidebar">
                <div class="vbf">
                    <!--<h2 class="form_title"><i class="fa fa-calendar"></i> 提交质保信息申请</h2>-->
                    <div class="form-group">
                        <span style="line-height: inherit;font-size: 24px;font-weight: bold;">信息提交成功，请耐心等待，<br>
                        质保单生成后，客服第一时间短信通知您，谢谢合作！</span>
                        <input type="hidden" name="sec" id="sec" value="4">
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>


<script type="text/javascript">
    $(function(){
        var picTimer = null;
        picTimer = setInterval(function(){
            var s = $('#sec').val();
            if( parseInt(s) == 0){
                clearInterval(picTimer);
                window.location.href="<?php echo Yii::app()->createUrl(Yii::app()->controller->id.'/index');?>";
                return false;
            }
            $('#sec').val(parseInt(s)-1);
        }, 1000);
    });
</script>