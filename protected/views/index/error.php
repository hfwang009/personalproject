<div style="background-color: #131629;margin-bottom: 100px;margin-top: 100px;">
    <div class="container">
        <div class="col-md-8" style="margin-left:35%">
            <div class="col-md-12">
                <div class="sidebar">
                    <div class="vbf">
                        <!--<h2 class="form_title"><i class="fa fa-calendar"></i> 提交质保信息申请</h2>-->
                        <div class="form-group">
                            <span style="line-height: inherit;font-size: 24px;font-weight: bold;">页面错误请重新访问，谢谢合作！</span>
                            <input type="hidden" name="sec" id="sec" value="4">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        var _selector = $('#sec');
        console.log(_selector);
        if(_selector!=undefined){
            var picTimer = null;
            picTimer = setInterval(function(){
                var s = $('#sec').val();
                if( parseInt(s) == 0){
                    clearInterval(picTimer);
                    window.location.href="<?php echo Yii::app()->createUrl('index/index');?>";
                    return false;
                }
                $('#sec').val(parseInt(s)-1);
            }, 1000);
        }

    });
</script>