<div class="aw-content-wrap">
    <div class="mod">
        <div class="mod-head">
            <h3>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="javascript:;">缓存清理工具</a>
                    </li>
                </ul>
            </h3>
        </div>
        <div class="tab-content mod-content">
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td>
                        <div class="form-group">
                            <div class="col-sm-12 col-xs-8" id="result">
                            </div>
                        </div>
                    </td>
                </tr>
                <?php foreach($flush_data as $key=>$flush){?>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="col-sm-7 col-xs-3 control-label"><?php echo $flush['flush_name']; ?></label>
                                <div class="col-sm-3 col-xs-8">
                                    <div class="row">
                                        <div class="col-xs-11 col-sm-1">
                                            <a title="点击清理缓存" class="btn btn-primary" href="javascript:;" ng-click="js_flush_redis()" ng-type="<?php echo $key ?>">清理缓存</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
//        var timeout = setTimeout(flush_redis(eve),3000);
        $('body').on('click','a[ng-click="js_flush_redis()"]',function(){
//            $(this).attr('disabled',true);
            flush_redis(this);
            return false;
        });
    });

    var flush_redis = function(eve){
        var type = $(eve).attr('ng-type');
        $.ajax({
            type : "POST",
            url : "<?php echo $ajax_url;?>",
            dataType : "json",
            data : {'ct':'redis','ac':'flush','type':type},
            success : function(f) {
                if(f.state){
                    $("#result").html('<p style="color: red; text-align: center;">'+ f.msg+'</p>');
                    show_return_message(f.msg, f.href,3000,1);
                }else{
                    show_tip_message(f.msg);
                }
            },
            error : function(j) {
                show_tip_message('请求错误',null);
            }
        });
    }
</script>