<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=znWEmT2S3gNIjAQyXruEdkpMh8NWH2hN"></script>
<style type="text/css">
    body, html {width: 100%;height: 100%; margin:0;font-family:"微软雅黑";}
    #l-map{height: 220px;width:100%;}
    #r-result,#r-result table{width:100%;}
    .nav { width: 100%; height: 2em; line-height: 2em; background: #EDEDED; border: 1px solid #ADADAD;}
    .nav .nav-inner{ width: 30%; margin-left: 35%;}
    .nav .nav-sub { float: left; width: 33%;}
    .nav .nav-sub a { text-decoration: none; }
    .nav .nav-sub a i { display: inline-block; background: url("http://webmap1.map.bdstatic.com/wolfman/static/common/images/ui3/mo_banner_ba37b5d.png")}
    .nav .nav-sub a.bus i { background-position: -1px -192px; position: relative; top: 2px; width: 13px; height: 16px;}
    .nav .nav-sub a.driver i { background-position: -29px -194px; width: 15px; height: 14px;}
    .nav .nav-sub a.walk i { background-position: -102px -189px; width: 16px; height: 18px;}
    .nav .nav-sub a.bus.cur i { background-position: -15px -192px; }
    .nav .nav-sub a.driver.cur i { background-position: -45px -194px; }
    .nav .nav-sub a.walk.cur i { background-position: -120px -189px;}
    .show { display:block;}
    .hide { display: none;}
    input { font-family: "micrsoft yahei"; width: 80%; height: 2em; font-size: 1em; line-height: 2em; border: 0px; outline: 0px; padding: .2em 1em; margin: 0em 10%;}
    .btn-group { width: 100%; border-top: 1px solid #DDD; border-bottom: 2px solid #DDD;}
    button {width: 32%; text-align: center; border: 0; border-radius: 0; background-color: inherit; height: 44px; line-height: 44px; font-size: 15px;}
</style>
<main id="room_page">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar">
                    <aside class="widget" style="width: 100%;margin-bottom:60px;">
                        <h4>地图导航</h4>
                        <div id="search">
                            起点位置：<input type="text" id="start" placeholder="正在定位您的位置..." style="border-bottom: 1px solid #DDD; "/>
                            终点位置：<input type="text" id="end" value="<?php echo $store['address'] ?>" readonly="true" />
                            <input type="hidden" id="start_point"/>
                            <input type="hidden" id="end_point" value="<?php echo $store['lng'].','.$store['lat'] ?>"/>
                            <input type="hidden" id="start_location"/>
                            <div class="btn-group">
                                <button id="bus-search">公交</button>
                                <button id="driver-search">驾车</button>
                                <button id="walk-search">步行</button>
                            </div>
                        </div>
                        <div id="showMap" class="show">
                            <div class="nav">
                                <div class="nav-inner">
                                    <div class="nav-sub"><a href="javascript:;" class="bus"><i></i></a></div>
                                    <div class="nav-sub"><a href="javascript:;" class="driver cur"><i></i></a></div>
                                    <div class="nav-sub"><a href="javascript:;" class="walk"><i></i></a></div>
                                </div>
                            </div>
                            <div id="l-map"></div>
                            <div id="r-result"></div>
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
    var geolocation = new BMap.Geolocation();
    geolocation.getCurrentPosition(function(r){
        if(this.getStatus() == BMAP_STATUS_SUCCESS){
            var aaa,bbb;
            var point = r.point;
            var y = point.lat; //经度
            var x = point.lng; //纬度
            var ggPoint = new BMap.Point(x,y);
            //转换坐标
            var convertor = new BMap.Convertor();
            var pointArr = [];
            pointArr.push(ggPoint);
            convertor.translate(pointArr, 1, 5, translateCallback);

        }else {
            $("#start").attr("placeholder","请输入您的当前位置")
            alert('无法定位到您的当前位置，导航失败，请手动输入您的当前位置！'+this.getStatus());
        }
    },{enableHighAccuracy: true});

    $(".nav .nav-sub a").click(function(){
        $(".nav .nav-sub a").removeClass('cur');
        $(this).addClass('cur');
        searchRoute();
    });

    $("#bus-search,#driver-search,#walk-search").click(function(){
        var id = $(this).attr("id");
        $(".nav .nav-sub a").removeClass('cur');
        if(id == "bus-search"){
            $(".nav .nav-sub a.bus").addClass('cur');
        }else if(id == "driver-search"){
            $(".nav .nav-sub a.driver").addClass('cur');
        }else if(id == "walk-search"){
            $(".nav .nav-sub a.walk").addClass('cur');
        }
        showMap();
    });
//    $('#start').on('blur',function(){
//        js_reload_path(this);
//    });

//    $('body').delegate('click','',function(){
//
//    });
});
    var translateCallback = function (data){
        if(data.status === 0) {
            var ep = $("#end_point").val().split(",");
            var map = new BMap.Map("l-map");
            var point = new BMap.Point(ep[0], ep[1]);
            map.centerAndZoom(point, 18);

            //data.points[0]为坐标对象，转换为str弹出显示测试
            var str = JSON.stringify(data.points[0]);
            //纬度为x
            var slng = data.points[0]['lng'];
            //经度为y
            var slat = data.points[0]['lat'];
            //输出经纬度
            $('#start_point').val(slng + "," + slat);

            var _point = new BMap.Point(slng,slat);
    //        var _point = new BMap.Point(x,y);
            var mk = new BMap.Marker(_point);
            map.addOverlay(mk);
            map.panTo(_point);

            setLocation(_point);
            showMap();
        }
    }

    var setLocation = function (point){
        // 定位对象
        var geoc = new BMap.Geocoder();
        geoc.getLocation(point, function(rs){
            var addComp = rs.addressComponents;
            var result = addComp.province + addComp.city + addComp.district + addComp.street + addComp.streetNumber+'号';
            $("#start").val(result).attr('readonly',true);
            $("#start_location").val(result);
            searchRoute();
        });
    }

    function showMap(){
        $("#srarch").removeClass('show').addClass('hide').hide();
        $("#showMap").removeClass('hide').addClass('show').show();
        searchRoute();
    }

    function searchRoute(){
        map = new BMap.Map("l-map");
        var cur = $(".nav .nav-sub a.cur");
        var type = "";

        if(cur.hasClass('bus')){
            type = "bus";
        }else if(cur.hasClass('driver')){
            type = "driver";
        }else if(cur.hasClass('walk')){
            type = "walk";
        }else{
            type = "driver";
        }

        var s_;
        var e_;

        var sl = $("#start_location").val();
        var s = $("#start").val();
        var sp = $("#start_point").val();
        var e = $("#end").val();
        var ep = $("#end_point").val();

        if(s != sl){// 如果用户修改了地址（与定位的位置不一致）则使用地址搜索
            s_ = s;
            e_ = e;
        }else if(sp){// 否则使用坐标搜索
            var ps = sp.split(",");
            var pe = ep.split(",");
            s_ = new BMap.Point(ps[0], ps[1]);
            e_ = new BMap.Point(pe[0], pe[1]);
        }

        if(type == "bus"){
            var transit = new BMap.TransitRoute(map, {renderOptions: {map: map, panel: "r-result", autoViewport: true,enableDragging : true},onResultsHtmlSet : function(){$("#r-result").show()}  });
            transit.search(s_, e_);
            console.log(transit);
        }else if(type == "driver"){
            var driving = new BMap.DrivingRoute(map, {renderOptions: {map: map, panel: "r-result", autoViewport: true,enableDragging : true},onResultsHtmlSet : function(){$("#r-result").show()}  });
            driving.search(s_, e_);
            console.log(driving);
        }else if(type == "walk"){
            var walking = new BMap.WalkingRoute(map, {renderOptions: {map: map, panel: "r-result", autoViewport: true,enableDragging : true},onResultsHtmlSet : function(){$("#r-result").show()}  });
            walking.search(s_, e_);
            console.log(walking);
        }
    }

    var js_reload_path = function(eve){
        var keyword = $(eve).val();
        if(isEmpty(keyword)){
            show_tip_message('请输入详细的起点地址');
            return false;
        }
        var map = new BMap.Map("l-map");

        var localSearch = new BMap.LocalSearch(map);
        localSearch.enableAutoViewport(); //允许自动调节窗体大小
        localSearch.setSearchCompleteCallback(function (searchResult) {
            var poi = searchResult.getPoi(0);
            if(poi == undefined){
                $('#start').val('');
                show_tip_message('请输入正确的起点地址');
                return false;
            }else{
                var ep = $("#end_point").val().split(",");
                var point = new BMap.Point(ep[0], ep[1]);
                map.centerAndZoom(point, 18);

                var _point = new BMap.Point(poi.point.lng,poi.point.lat);
                var mk = new BMap.Marker(_point);
                map.addOverlay(mk);
                map.panTo(_point);
                showMap();
            }
        });
        localSearch.search(keyword);
    }
</script>