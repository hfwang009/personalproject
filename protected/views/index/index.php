<script type="text/javascript" src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<link rel="stylesheet" href="http://vjs.zencdn.net/5.8.8/video-js.css"/>
<style>
    .g-side3{position:static;float: left;}
    .clsfx{*zoom:1;}
    .clsfx:after{content:"";display:block;clear:both;}
    .show_demo_left{float:left;}
    .show_demo_left .listabs{width:220px;height:42px;background-color:#e6e6e6;font:normal 22px/42px "Microsoft Yahei","微软雅黑";color:#637085;text-align:left;text-indent:15px;}
    .g-box3 .g-main3{padding-left:0;}
    .helpPage .cntBox{padding:0;float:right;width:854px;}
    .sd-ul{border-top: 1px solid #e4e4e4;}
    .sd-ul .showli{height:48px;line-height:48px;box-sizing:border-box;border-bottom: 1px solid #e4e4e4;padding:3px 0;}
    .like{display: block;color: #232629;text-align: left;text-indent: 6px;font-size: 14px;line-height:42px;height:100%;width:220px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;}
    .like:hover,.showli.active .like{color:#ff8200;background-color:#f1f3f6;}
    .flashplayer{font-size: 24px;line-height: 45px;text-align: center;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;padding: 0 12px;margin-bottom: 12px;}
    .video-js{background-color:#f2f1ed;padding: 10px 0;box-sizing: content-box;}
</style>
<div class="container" style="background:#252c48;width:100%;text-align: center;padding-left: 200px;margin-top:20px;">
    <div class="main_title mt_wave a_center" style="font-siez:16p;float:left;margin-left:220px;margin-top:20px;">
        <h1>质保快速查询<img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/dayuhao.png"  width="25px" /></h1>
        <h11>Quality Assurance Query &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h11>
    </div>
    <div class="col-md-4">
        <div class="vbf" style="margin:10px 0px 0 0px">
            <form class="inner" id="search_form" action="<?php echo Yii::app()->createUrl('warranty/search'); ?>" method="POST"><div class="form-group">
                    <div class="form_select">
                        <input placeholder="请输入手机号/车架号（后六位）/质保证书编号" class="form-control" name="Warranty[carlicence]" id="Warranty_carlicence" type="text" maxlength="500" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-2" style="margin:28px 0 0 0">
        <button class="button btn_lg btn_blue btn_full" type="button" id="search_submit" onclick="submitSearch()">点击查询结果</button>
    </div>
</div>

<!-- ========== BLOG ========== -->

<div class="container">
    <table width="100%" border="0" style="margin-top:30px" >
        <tr>
            <td><a href="javascript:;"><img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/shouye/01.jpg"  width="285" height="200" style="margin-right:0px" /></a></td>
            <td><a href="javascript:;"><img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/shouye/02.jpg"  width="285" height="200" style="margin-right:10px" /></a></td>
            <td><a href="javascript:;"><img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/shouye/03.jpg"  width="285" height="200" style="margin-right:10px" /></a></td>
            <td><a href="javascript:;"><img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/shouye/04.jpg"  width="285" height="200" style="margin-right:10px" /></a></td>
        </tr>
</div>

<tr>
    <td>
        <div class="nav88">
            <ul>
                <li><a href="javascript:;">>耀世登场&nbsp;&nbsp;定制尊崇<br />戈纳美-品牌故事<span></span></a></li>
    </td>
    <td>
        <div class="nav88">
            <ul>
                <li><a href="javascript:;">>创新智慧&nbsp;&nbsp;科技随行<br />戈纳美-新近科技<span></span></a></li>
            </ul>
        </div>
    </td>
    <td>
        <div class="nav88">
            <ul>
                <li><a href="javascript:;">>专属定制&nbsp;&nbsp;懂你所需<br />戈纳美-客户 服务<span></span></a></li>
            </ul>
        </div>
    </td>
    <td>
        <div class="nav88">
            <ul>
                <li><a href="javascript:;">>全面展开&nbsp;&nbsp;引爆市场<br />戈纳美-市场活动<span></span></a></li>
            </ul>
        </div>
    </td>
</tr>
</table>

<div class="main_title mt_wave a_center" style="margin-top:30px">
    <a href="javascript:;" >
        <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="1160" height="600" poster="<?php echo $video['thumb']; ?>" data-setup="{}">
            <source src="<?php echo Yii::app()->request->hostInfo.$video['video']['file_path']; ?>" type='video/mp4' />
        </video>
    </a>
    <img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/shouye/hezuohuoban01.jpg" width="100%" height="auto" />
</div>
<script>
    function submitSearch(){
        $('#search_form').submit();
    }
    var video1=document.getElementById("example_video_1");

    video1.onclick=function(){
        if(video1.paused){
            video1.play();
        }else{
            video1.pause();
        }
    }
</script>