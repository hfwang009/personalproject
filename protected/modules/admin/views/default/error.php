<div class="aw-content-wrap">
    <div class="middle-box text-center animated fadeInDown">
        <h1>404</h1>
        <h3 class="font-bold">页面错误！</h3>
        <div class="error-desc">
            抱歉，出现页面错误，请联系管理员~
        </div>
        <input type="hidden" name="sec" id="sec" value="4">
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
                    window.location.href="<?php echo Yii::app()->createUrl('admin/adminSettingPanel/index');?>";
                    return false;
                }
                $('#sec').val(parseInt(s)-1);
            }, 1000);
        }

    });
</script>