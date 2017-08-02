<!--<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.3"></script>-->
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=znWEmT2S3gNIjAQyXruEdkpMh8NWH2hN"></script>
<style type="text/css">
    #allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
    #l-map{height:100%;width:78%;float:left;border-right:2px solid #bcbcbc;}
    #r-result{height:100%;width:20%;float:left;}
</style>
<main id="room_page">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar">
                    <aside class="widget" style="width: 100%; height: 500px;margin-bottom:60px;">
                        <h4>地图位置</h4>
                        <div class="vbf" id="allmap">

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
    // 百度地图API功能
    var lat = <?php echo $store['lat']; ?>;
    var lng = <?php echo $store['lng']; ?>;
    var label_text = '<?php echo $store['name']; ?>';
    var address = '地址：'+'<?php echo $store['name']; ?>';
    var telephone = '电话：'+'<?php echo $store['telephone']; ?>';
    var map = new BMap.Map("allmap");
    var point = new BMap.Point(lng, lat);
    map.centerAndZoom(point, 18);	//设置地图中心位置并设置默认的缩放大小
    map.enableScrollWheelZoom();    //启用滚轮放大缩小，默认禁用
    map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用

    map.addControl(new BMap.NavigationControl());  //添加默认缩放平移控件
    map.addControl(new BMap.OverviewMapControl()); //添加默认缩略地图控件
    map.addControl(new BMap.OverviewMapControl({ isOpen: true, anchor: BMAP_ANCHOR_BOTTOM_RIGHT }));   //右下角，打开
    // 额外的地图坐标设置
    var bounds = map.getBounds();
    var sw = bounds.getSouthWest();
    var ne = bounds.getNorthEast();
    var lngSpan = Math.abs(sw.lng - ne.lng);
    var latSpan = Math.abs(ne.lat - sw.lat);
    var _point = new BMap.Point(lng, lat);
    addMarker(_point);

    // 编写自定义函数,创建标注
    function addMarker(point){
        var marker = new BMap.Marker(point);
        marker.addEventListener("click", function(){
            map.openInfoWindow(infoWindow,point); //开启信息窗口
        });
        var label = new BMap.Label(label_text);
        label.setStyle({
            offset:new BMap.Size(30,-5),
            color:'#999',
            fontSize:'12px',
            border:'0',
            backgroundColor:'0.05',
            marginLeft:'15px',
            marginTop:'-10px'
        });
        marker.setLabel(label);
        map.addOverlay(marker);
        var opts = {
            width : 200,     // 信息窗口宽度
            height: 100,     // 信息窗口高度
            title : label_text , // 信息窗口标题
            enableMessage:true,//设置允许信息窗发送短息
            message:"亲耐滴，晚上一起吃个饭吧？戳下面的链接看下地址喔~"
        }
        var infoWindow = new BMap.InfoWindow(address+"<br>"+telephone, opts);  // 创建信息窗口对象
    }

</script>