<main id="room_page">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar">
                    <aside class="widget">
                        <h4>查询结果</h4>
                        <div class="vbf">
                            <h2 class="form_title"><i class="fa fa-calendar"></i>质保查询</h2>
                            <?php if(!empty($result)){ ?>
                                <footer>
                                    <div class="inner">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-6 widget">
                                                    <h5 class="STYLE2">ICS智能安全窗材-质保查询</h5>
                                                    <div class="latest_posts">
                                                        <?php foreach($result as $k=>$_result){ ?>
                                                            <article class="latest_post">
                                                                <div class="details">
                                                                    <h6><a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/result',array('id'=>$_result['id'])); ?>"><?php echo $_result['carlicence'].':'.$_result['series_number'].'('.(!empty($_result->product)?$_result->product->name:'--').')' ?></a></h6>
                                                                    <span><i class="fa fa-calendar"></i><?php echo date('Y-m-d',$_result['ctime']); ?><a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/result',array('id'=>$_result['id'])); ?>">查看详情</a></span>
                                                                </div>
                                                            </article>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </footer>
                            <?php }else{ ?>
                                <footer>
                                    <div class="inner">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-6 widget">
                                                    <h5 class="STYLE2"></h5>
                                                    <div class="form-group">
                                                        <div class="form_select">
                                                            没有相应的质保信息或质保单尚未生成，<br>
                                                            请确认填写的联系电话/车牌号/车架号是否正确或耐心等待，谢谢合作！
                                                        </div>
                                                        <input type="hidden" name="sec" id="sec" value="4">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </footer>
                            <?php } ?>
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
    $(function(){
        var _selector = $('#sec');
        console.log(_selector);
        if(_selector!=undefined){
            var picTimer = null;
            picTimer = setInterval(function(){
                var s = $('#sec').val();
                if( parseInt(s) == 0){
                    clearInterval(picTimer);
                    window.location.href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index');?>";
                    return false;
                }
                $('#sec').val(parseInt(s)-1);
            }, 1000);
        }

    });
</script>