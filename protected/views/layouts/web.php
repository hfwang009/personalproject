<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">

    <!-- ========== SEO ========== -->
    <title><?php echo (!empty($this->title)?$this->title:'');?></title>
    <meta content="<?php echo (!empty($this->description)?$this->description:'');?>" name="description">
    <meta content="<?php echo (!empty($this->keyword)?$this->title:'');?>" name="keywords">
    <meta content="戈纳美" name="author">

    <!-- ========== FAVICON ========== -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/favicon-apple.png" />
    <link rel="icon" href="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/favicon.png">

    <!-- ========== STYLESHEETS ========== -->
    <link href="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/revolution/css/layers.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/revolution/css/settings.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/revolution/css/navigation.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/css/animate.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/css/famfamfam-flags.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/css/magnific-popup.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/css/owl.carousel.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/css/responsive.css" rel="stylesheet" type="text/css">


    <!-- ========== ICON FONTS ========== -->
    <link href="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/fonts/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/fonts/flaticon.css" rel="stylesheet">

    <!-- ========== GOOGLE FONTS ========== -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900%7cRaleway:400,500,600,700" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php Yii::app()->getClientScript()->registerCoreScript('jquery');?>
    <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/js/layer.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/js/extend/layer.ext.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/daohang-xiahuaxin/js/jquery.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/huandengpian02-chajian/js/min/jquery-v1.10.2.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/huandengpian02-chajian/js/min/modernizr-custom-v2.7.1.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/huandengpian02-chajian/js/min/jquery-finger-v0.1.0.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/huandengpian02-chajian/js/min/flickerplate.min.js" type="text/javascript"></script>
</head>
<body>
<!-- ========== HEADER ========== -->
<header class="fixed">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle mobile_menu_btn" data-toggle="collapse" data-target=".mobile_menu" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo Yii::app()->createUrl('index'); ?>" style="margin-top:-10px">
                <img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/logo/logo.png"  width="132" height="80"  alt="Logo">
            </a>
        </div>
        <nav id="main_menu" class="mobile_menu navbar-collapse" style="margin-top:20px;font-size:16px;">
            <div class="nav99">
                <ul>
                    <li><a href="<?php echo Yii::app()->createUrl('index'); ?>">首页</a><span></span></li>
                    <li><a href="<?php echo Yii::app()->createUrl('brand'); ?>">品牌介绍</a><span></span></li>
                    <li><a href="<?php echo Yii::app()->createUrl('products/respect'); ?>">尊享产品</a><span></span></li>
                    <li><a href="<?php echo Yii::app()->createUrl('news/index'); ?>">市场活动</a><span></span></li>
                    <li><a href="<?php echo Yii::app()->createUrl('warranty/index'); ?>">质保查询</a><span></span></li>
                    <li><a href="<?php echo Yii::app()->createUrl('GroupSupport'); ?>">客户服务</a><span></span></li>
                    <li><a href="<?php echo Yii::app()->createUrl('products/index'); ?>">漆面保护膜</a><span></span></li>
                    <li><a href="<?php echo Yii::app()->createUrl('products/building'); ?>">家居膜/建筑膜</a><span></span></li>
                    <li><a href="<?php echo Yii::app()->createUrl('about'); ?>">联系我们</a><span></span></li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<div class="banner001">
    <img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/shouye/2221.jpg" width="100%" height="300px" />
</div>

<?php echo $content; ?>

<!-- ========== FOOTER ========== -->
<footer>
    <div class="copyrights" align="left" style="border-top:1px dotted #102741;width:100%"></div>
    <div class="inner">
        <div class="container">
            <div class="row">

                <div class="col-md-1 col-sm-1 widget">

                    <ul class="useful_links">
                        <li><a href="<?php echo Yii::app()->createUrl('index') ?>"><strong>首页</strong></a></li>
                    </ul>
                </div>
                <div class="col-md-1 col-sm-1 widget">
                    <ul class="useful_links">
                        <li><a href="<?php echo Yii::app()->createUrl('brand/index') ?>"><strong>品牌介绍</strong></a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('brand/index') ?>#story">品牌故事</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('brand/index') ?>#wh">品牌文化</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('brand/index') ?>#ry">品牌荣誉</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('brand/index') ?>#sp">品牌视频</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('brand/index') ?>#partner">合作伙伴</a></li>
                    </ul>
                </div>
                <div class="col-md-1 col-sm-1 widget">
                    <ul class="useful_links">
                        <li><a href="<?php echo Yii::app()->createUrl('products/respect') ?>"><strong>尊享产品</strong></a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('products/respect') ?>#tx">产品特性</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('products/respect') ?>#ke">领先科技</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('products/respect') ?>#sc">严苛生产</a></li>
                    </ul>
                </div>
                <div class="col-md-1 col-sm-1 widget">
                    <ul class="useful_links">
                        <li><a href="<?php echo Yii::app()->createUrl('news/index') ?>"><strong>市场活动</strong></a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('news/index') ?>#cs">防爆测试</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('news/index') ?>#zt">展厅活动</a></li>
                    </ul>
                </div>
                <div class="col-md-1 col-sm-1 widget">
                    <ul class="useful_links">
                        <li><a href="<?php echo Yii::app()->createUrl('warranty/index') ?>"><strong>质保查询</strong></a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('warranty/index#shenqing') ?>">质保申请</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('warranty/index#cx') ?>">质保查询</a></li>
                    </ul>
                </div>
                <div class="col-md-1 col-sm-1 widget">
                    <ul class="useful_links">
                        <li><a href="<?php echo Yii::app()->createUrl('GroupSupport/index') ?>"><strong>客户服务</strong></a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('GroupSupport/index') ?>#zb">十年质保</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('GroupSupport/index') ?>#dz">专属定制</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('GroupSupport/index') ?>#al">施工案例</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('GroupSupport/index') ?>#bz">施工标准</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('GroupSupport/index') ?>#xm">选膜标准</a></li>
                    </ul>
                </div>
                <div class="col-md-1 col-sm-1 widget">
                    <ul class="useful_links">
                        <li><a href="<?php echo Yii::app()->createUrl('products/index') ?>"><strong>漆面保护膜</strong></a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('products/index') ?>#zs">产品展示</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('products/index') ?>#fx">案例分享</a></li>
                    </ul>
                </div>
                <div class="col-md-1 col-sm-1 widget">
                    <ul class="useful_links">
                        <li><a href="<?php echo Yii::app()->createUrl('products/building') ?>"><strong>家居膜建筑膜</strong></a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('products/building') ?>#zs">产品展示</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('products/building') ?>#al">案例分析</a></li>
                    </ul>
                </div>
                <div class="col-md-1 col-sm-1 widget">
                    <ul class="useful_links">
                        <li><a href="<?php echo Yii::app()->createUrl('about/index') ?>"><strong>关于我们</strong></a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('about/index') ?>#lx">联系我们</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('about/index') ?>#zp">招聘信息</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('about/index') ?>#fk">建议反馈</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="subfooter">
        <div class="container">
            <div class="row">

                <div class="copyrights" align="left" style="border-top:1px dotted #202741;width:97%">
                    Copyright &copy; 2017.GLASS MATE.com 保留所有版权<br />
                    上海傲邦汽车用品有限公司 版权所有/抄袭必究 &nbsp;&nbsp;沪ICP备17029997号
                    <div style="float:right;">
                        <!--weixintanhcuang-->
                        <div id="wxImg" style="display:none;height:0px;back-ground:#;position:absolute;">
                            <style type="text/css">
                                h2.pos_abs
                                {
                                    position:absolute;
                                    left:-30px;
                                    top:-100px
                                }
                            </style>

                            <h2 class="pos_abs"><img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/shouye/weixin001.jpg" style="left:10px;top:-50px;paddding:0px;" /></h2>
                        </div>
                        <a href="javascript:void(0)" onMouseOut="hideImg()"  onmouseover="showImg()"><img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/shouye/weixin.jpg" width="51" height="auto"/></a>
                        <script type="text/javascript">
                            function  showImg(){
                                document.getElementById("wxImg").style.display='block';
                            }
                            function hideImg(){
                                document.getElementById("wxImg").style.display='none';
                            }
                        </script>
                        <!--weixintanhcuang-->
                        <a href="#" >
                            <img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/shouye/weibo.jpg" width="51" height="auto"/>
                        </a>
                    </div>
                </div>
                <br />
            </div>
        </div>
    </div>
</footer>
<script>
    $(function(){
        $('.nav99 li').hover(function(){
            $('span',this).stop().css('height','20px');
            $('span',this).animate({
                left:'0',
                width:'100%',
                right:'0'
            },200);
        },function(){
            $('span',this).stop().animate({
                left:'50%',
                width:'0'
            },200);
        });
        $('.flicker-example').flicker();
    });
    var show_return_message = function(msg,href,time,icon){
        var data = {'icon':1,'time':1000};
        if(typeof(time) != 'undefined' && time != ''){
            data.time = time;
        }
        if(typeof(icon) != 'undefined' && icon != ''){
            data.icon = icon;
        }
        if(typeof(href) == 'undefined' || href == ''){
            href = window.location.href;
        }
        layer.msg(msg, data,function(){
                window.location.href = href;
            }
        );
        return false;
    };
    var show_tip_message = function(msg,eve,time,icon){
        var data = {'icon':5,'time':1000};
        if(typeof(time) != 'undefined' && time != ''){
            data.time = time;
        }
        if(typeof(icon) != 'undefined' && icon != ''){
            data.icon = icon;
        }
        layer.msg(msg,data, function(){
                if(typeof(eve) != 'undefined' && eve != null){
                    eve.focus();
                }
            }
        );
        return false;
    }
    var isEmpty = function(val){
        if(typeof(val) == 'undefined' || val == ''){
            return true;
        }
        return false;
    };
</script>