<div class="banner003">
    <div class="container">
        <a href="#"><img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/shouye/fanhui.png" width="45px" height="40px" style="margin-top:-5px" /></a>
        &nbsp;&nbsp;&nbsp;&nbsp;市场活动 &nbsp;&nbsp;&nbsp;&nbsp;>防爆测试&nbsp;&nbsp;&nbsp;&nbsp;<a href="#test">展厅活动</a>
        市场活动 ><a href="#cs" style="margin-left: 20px;color:#737373;">防爆测试</a><a href="#zt" style="margin-left: 20px;color:#737373;">展厅活动</a>
    </div>
</div>
<div style="background-color: #e8e8e8">
    <div class="container" style="background-color: #fff">
        <img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/fangbaoceshi.jpg" width="100%" height="auto"  id='cs'/>

        <br>
        <br>
        <!-- ========== neirong========== -->
        <!--tupianqiehuan-->
        <div class="container">
            <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/tupianqiehuan-chajian/carousel.css">
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/tupianqiehuan-chajian/js/jquery-1.12.0.js"></script>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/tupianqiehuan-chajian/js/carousel.js"></script>


            <div class="container" style="margin-left:0px">
                <div class="pictureSlider poster-main" data-setting='{"width":1100,"height":270,"posterWidth":640,"posterHeight":270,"scale":0.8,"autoPlay":true,"delay":2000,"speed":300}'>
                    <div class="poster-btn poster-prev-btn"></div>
                    <ul class="poster-list">
                        <li class="poster-item"><a href="#"><img src="https://unsplash.it/640/270?image=1014" width="100%" height="100%"></a></li>
                        <li class="poster-item"><a href="#"><img src="https://unsplash.it/640/270?image=1013" width="100%" height="100%"></a></li>
                        <li class="poster-item"><a href="#"><img src="https://unsplash.it/640/270?image=1012" width="100%" height="100%"></a></li>
                        <li class="poster-item"><a href="#"><img src="https://unsplash.it/640/270?image=1011" width="100%" height="100%"></a></li>
                        <li class="poster-item"><a href="#"><img src="https://unsplash.it/640/270?image=1010" width="100%" height="100%"></a></li>
                        <li class="poster-item"><a href="#"><img src="https://unsplash.it/640/270?image=1009" width="100%" height="100%"></a></li>
                        <li class="poster-item"><a href="#"><img src="https://unsplash.it/640/270?image=1008" width="100%" height="100%"></a></li>
                        <li class="poster-item"><a href="#"><img src="https://unsplash.it/640/270?image=1006" width="100%" height="100%"></a></li>
                    </ul>
                    <div class="poster-btn poster-next-btn"></div>
                </div>
            </div>
            <br>
            <br>
            <div style="text-align:center;margin-right:30px" >戈纳美重庆店防爆测试</div>
            <script>
                $(function(){
                    Carousel.init($(".pictureSlider"));
                });
            </script>
        </div>

        <img id="test" src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/zhantinghuodong.jpg" width="100%" height="auto" />
        <div class="col-md-9 nav77"  id='zt'>

            <?php if(!empty($model)){ ?>
                <?php foreach($model as $k=>$v){ ?>
                    <div style="margin-left:150px;margin-top:50px;" >
                        <div style="width: 300px;">
                            <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->id.'/detail',array('id'=>$v['id'])); ?>"><img src="<?php echo !empty($v['thumb'])?$v['thumb']:Yii::app()->request->baseUrl.'/statics/webfront/images/zhantinghuodong001.jpg' ?>" width="320" height="210" /></a>
                        </div>
                        <div style="float: left;">
                            <div style="font-size:18px;padding-left:20px;color:#737373"><strong><a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->id.'/detail',array('id'=>$v['id'])); ?>"><?php echo $v['title']; ?></a></strong></div><br>
                            <div style="font-size:12px;padding-left:20px;margin-top:-15px;color:#737373"><?php echo date('Y-m-d',$v['ctime']); ?></div><br>
                            <div class="copyrights" align="left" style="border-top:1px solid #d1d1d1;width:95%;margin:-10px 20px 10px 20px"></div>
                            <div style="font-size:14px;padding-left:20px;color:#737373">
                                <?php echo CUtils::str_cut(strip_tags($v['content']),300); ?>
                            </div>
                            <div style="float:right;color:#737373;margin-top:25px;"><a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->id.'/detail',array('id'=>$v['id'])); ?>"><font color="b38756">详情</font></a></div>
                        </div>
                    </div>
                    <div class="copyrights" align="left" style="border-top:1px solid #d1d1d1;width:100%;margin-left:150px;margin-top:50px;"></div>
                <?php } ?>
            <?php }else{ ?>

            <?php } ?>
            <br>
            <img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/yema.jpg" width="100%" height="auto" />
        </div>
    </div>
</div>