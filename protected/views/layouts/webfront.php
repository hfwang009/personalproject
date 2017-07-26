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
    <link rel="icon" href="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/images/favicon.png">

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
    <script src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/daohang-xiahuaxin/js/jquery.min.js"></script>
    <![endif]-->
</head>

<body>
<div id="smoothpage" class="wrapper">

    <!-- ========== HEADER ========== -->
    <header class="fixed">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle mobile_menu_btn" data-toggle="collapse" data-target=".mobile_menu" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                    </button>
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
                        <li><a href="<?php echo Yii::app()->createUrl('groupsupport'); ?>">客户服务</a><span></span></li>
                        <li><a href="<?php echo Yii::app()->createUrl('products/index'); ?>">漆面保护膜</a><span></span></li>
                        <li><a href="<?php echo Yii::app()->createUrl('products/building'); ?>">家居膜/建筑膜</a><span></span></li>
                        <li><a href="<?php echo Yii::app()->createUrl('about'); ?>">联系我们</a><span></span></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!-- ========== huandengpian ========== -->

    <!--Basic page styles-->
    <style>
        html {
            font-family: 'Open Sans', Helvetica, Arial, sans-serif;
            background-color: #;
            font-weight: 300;
        }
        body {
            margin: 0px;
            padding: 0px;
        }
        .documentation {
            width: 1100px;
            margin: 0px auto;
            padding: 100px 0px;
        }
        .documentation h3, p {
            text-align: center;
        }
        .documentation h3 {
            margin: 0px 0px 20px 0px;
            font-weight: 300;
            font-size: 2em;
        }
        a, a:visited {
            color: #E54028;
            text-decoration: none;
        }
        a:hover {
            color: #c22d18;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>

    <!--Basic example-->
    <link href="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/huandengpian-chajian/css/flickerplate.css"  type="text/css" rel="stylesheet">
    <div class="flicker-example" data-block-text="false">
        <ul>
            <li data-background="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/huandengpian-chajian/img/field.jpg">
                <div class="flick-title">戈纳美</div>
                <div class="flick-sub-text">我爱戈纳美</div>
            </li>
            <li data-background="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/huandengpian-chajian/img/forest.jpg">
                <div class="flick-title">戈纳美</div>
                <div class="flick-sub-text">我爱戈纳美</div>
            </li>
            <li data-background="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/huandengpian-chajian/img/frozen-water.jpg">
                <div class="flick-title">戈纳美</div>
                <div class="flick-sub-text">我爱戈纳美</div>
            </li>
        </ul>
    </div>

    <!-- ========== huandengpian ========== -->

    <!--<div class="banner001">
     <img src="images/swimming33.jpg" class="img-responsive" alt="Image">
     </div>-->

    <!-- ========== FEATURES ========== -->
</div>

<?php echo $content; ?>

<!-- ========== FOOTER ========== -->
<footer>
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
                        <li><a href="<?php echo Yii::app()->createUrl('groupsupport/index') ?>"><strong>客户服务</strong></a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('groupsupport/index') ?>#zb">十年质保</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('groupsupport/index') ?>#dz">专属定制</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('groupsupport/index') ?>#al">施工案例</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('groupsupport/index') ?>#bz">施工标准</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('groupsupport/index') ?>#xm">选膜标准</a></li>
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
</body>
<!--huandengpian-->
<script src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/huandengpian-chajian/js/min/jquery-v1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/huandengpian-chajian/js/min/modernizr-custom-v2.7.1.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/huandengpian-chajian/js/min/jquery-finger-v0.1.0.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/huandengpian-chajian/js/min/flickerplate.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/daohang-xiahuaxin/js/jquery.min.js"></script>
<!-- ========== JAVASCRIPT ========== -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/js/jquery.min.js"></script>
<!---<script type="text/javascript" src="http://ditu.google.cn/maps/api/js?key=AIzaSyBDgMJEPio2qomUKV1iqlIufj4u2NVd3q4"></script>--->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/js/jquery.smoothState.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/js/moment.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/js/morphext.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/js/owl.carousel.thumbs.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/js/jPushMenu.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/js/countUp.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/js/jquery.countdown.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/js/main.js"></script>

<!--huandengpian-->
<script src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/huandengpian-chajian/js/min/jquery-v1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/huandengpian-chajian/js/min/modernizr-custom-v2.7.1.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/huandengpian-chajian/js/min/jquery-finger-v0.1.0.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/huandengpian-chajian/js/min/flickerplate.min.js" type="text/javascript"></script>
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
        $('.nav88 li').hover(function(){
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
</script>

<!-- ========== BACK TO TOP ========== -->
<div id="back_to_top">
    <i class="fa fa-angle-up" aria-hidden="true"></i>
</div>
</html>