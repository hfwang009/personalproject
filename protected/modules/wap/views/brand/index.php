<img src="<?php echo Yii::app()->request->baseUrl ?>/statics/images/banner/dingbu/911.jpg" width="100%" height="200px" />
<main id="about_us_page">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="pinpaigushi">
                    <div class="line_05"style="padding-top:1px">————<span>戈纳美  品牌故事</span>————</div>
                    <div style="width:100%;margin-left:0;color:#737373;line-height:1.8;font-family:'Microsoft Yahei';font-size: 14px;">
                        &#8226;&nbsp;100多年前，亨利·莱斯在设计劳斯莱斯时，一位朋友建议他“生产低价的可靠汽车”。他不这样认为，他希望不计成本生产世界上最好的汽车。100多年后，对完美的不懈追求成为劳斯莱斯汽车背后的发展动力。<br><br>
                        &#8226;&nbsp;
                        劳斯莱斯的故事让戈纳美深受启发，同样对完美也有着不懈追求的戈纳美看到当时市面上出现了大量汽车窗材，然而针对高端车主个性化完美定制需求的窗膜产品却寥寥无几。<br><br>
                        &#8226;&nbsp;“要么不做，要做就做最好的”，这是戈纳美创立伊始怀揣的坚定梦想，从研发设计到生产工艺，从品质追求到定制服务，戈纳美初心不变，砥砺前行。<br><br>
                        &#8226;&nbsp;匠心智慧，铸就卓越品质；尖端科技，定制尊崇未来！戈纳美开创全效智能安全窗材定制新时代。<br><br>


                        <!-- ========== huandengpian ========== -->
                        <div class="flicker-example" data-block-text="false" style="text-align:center">
                            <img src="<?php echo Yii::app()->request->baseUrl ?>/statics/images/banner/gundong/806896769.gif" width="100%">
                        </div>
                        <!-- ========== huandengpian ========== -->
                    </div>
                </div>

                <div class="pinpaixingxiang" id='wh'>
                    <div class="line_05" style="padding-top:30px">————<span>戈纳美  品牌形象</span>————</div>
                    <div class="line_04">经典在于创造，戈纳美耀世登场，尊崇定制</div>
                    <div class="line_04">定位于高端市场，注重高品质品牌形象。</div>
                    <img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/pinpaijieshao007.jpg" width="100%" height="auto" />
                </div>
                <div class="pinpairongyu" id='ry'>
                    <div class="line_05" style="padding-top:30px">————<span>戈纳美  品牌荣誉</span>————</div>
                    <div class="line_04">实力殊荣，共同鉴证</div>
                    <img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/pinpaijieshao003.jpg" width="100%" height="auto" />
                </div>
                <div class="pinpaishipin" id="sp">
                    <div class="line_05" style="padding-top:30px">————<span>戈纳美  品牌视频</span>————</div>
                    <div class="line_04">尊享定制  耀世登场</div><br>
                    <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="100%" height="auto" poster="<?php echo $video['thumb']; ?>" data-setup="{}">
                        <source src="<?php echo Yii::app()->request->hostInfo.$video['video']['file_path']; ?>" type='video/mp4' />
                    </video>
                </div>
                <div class="pinpaihezuohuoban" id='partner'>
                    <div class="line_05" style="padding-top:30px">————<span>戈纳美  合作伙伴</span>————</div>
                    <div class="line_04">劳斯莱斯、宾利、保时捷等众多豪车<br>4S店的共同选择-戈纳美</div>
                    <div class="line_04">越来越多的伙伴与戈纳美一起<br>创造完美的行车生活。</div>
                    <img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/pinpaijieshao009.jpg" width="100%" height="auto" />
                </div>
            </div>
        </div>
        <script>
            var video1=document.getElementById("example_video_1");

            video1.onclick=function(){
                if(video1.paused){
                    video1.play();
                }else{
                    video1.pause();
                }
            }
        </script>
    </div>
</main>
