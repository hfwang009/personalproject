<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">

        <!-- ========== SEO ========== -->
        <title><?php echo (!empty($this->title)?$this->title:'');?></title>
        <meta content="<?php echo (!empty($this->description)?$this->description:'');?>" name="description">
        <meta content="<?php echo (!empty($this->keyword)?$this->title:'');?>" name="keywords">
        <meta content="" name="author">

        <!-- ========== FAVICON ========== -->
        <link rel="apple-touch-icon-precomposed" href="<?php echo Yii::app()->baseUrl; ?>/statics/front/images/favicon-apple.png" />
        <link rel="icon" href="<?php echo Yii::app()->baseUrl; ?>/statics/front/images/favicon.png">

        <!-- ========== STYLESHEETS ========== -->
        <link href="<?php echo Yii::app()->baseUrl; ?>/statics/front/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo Yii::app()->baseUrl; ?>/statics/front/revolution/css/layers.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->baseUrl; ?>/statics/front/revolution/css/settings.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->baseUrl; ?>/statics/front/revolution/css/navigation.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->baseUrl; ?>/statics/front/css/bootstrap-select.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo Yii::app()->baseUrl; ?>/statics/front/css/animate.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo Yii::app()->baseUrl; ?>/statics/front/css/famfamfam-flags.css" rel="stylesheet" type="text/css">
        <link href="<?php echo Yii::app()->baseUrl; ?>/statics/front/css/magnific-popup.css" rel="stylesheet" type="text/css">
        <link href="<?php echo Yii::app()->baseUrl; ?>/statics/front/css/owl.carousel.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo Yii::app()->baseUrl; ?>/statics/front/css/style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo Yii::app()->baseUrl; ?>/statics/front/css/responsive.css" rel="stylesheet" type="text/css">
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app ()->request->baseUrl;?>/statics/admin/css/common.css" />

        <!-- ========== ICON FONTS ========== -->
        <link href="<?php echo Yii::app()->baseUrl; ?>/statics/front/fonts/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->baseUrl; ?>/statics/front/fonts/flaticon.css" rel="stylesheet">

        <!-- ========== GOOGLE FONTS ========== -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900%7cRaleway:400,500,600,700" rel="stylesheet">
        <?php Yii::app()->getClientScript()->registerCoreScript('jquery');?>
        <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/js/layer.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/js/extend/layer.ext.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="smoothpage" class="wrapper">
            <!-- ========== TOP MENU ========== -->
            <div class="top_menu">
                <div class="container">
                    <div class="welcome_mssg hidden-xs">
                        Welcome to Zante Hotel Hotel
                    </div>
                    <ul class="top_menu_right">
                        <li><i class="fa fa-phone"></i><a href="tel:18475555555"> 1-888-123-4567 </a></li>
                        <li class="email hidden-xxs"><i class="fa fa-envelope-o "></i> <a href="mailto:contact@site.com">contact@site.com</a></li>
                        <li class="language-switcher">
                            <nav class="dropdown">
                                <a href="#" class="dropdown-toggle select" data-hover="dropdown" data-toggle="dropdown">
                                    <i class="famfamfam-flag-gb22 "></i>中文<b class="caret"></b>
                                </a>
                            </nav>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- ========== HEADER ========== -->
            <header class="fixed">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle mobile_menu_btn" data-toggle="collapse" data-target=".mobile_menu" aria-expanded="false">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.html">
                            <img src="<?php echo Yii::app()->baseUrl; ?>/statics/front/images/logo.svg" height="32" alt="Logo">
                        </a>
                    </div>
                    <nav id="main_menu" class="mobile_menu navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo Yii::app()->createUrl('wap/index/index'); ?>">首页</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('wap/help/index'); ?>">关于我们</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('wap/news/index'); ?>">活动资讯</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('wap/store/index'); ?>">门店查询</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('wap/product/index'); ?>">产品报价查询</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('wap/warranty/index'); ?>">质保查询</a></li>
                        </ul>
                    </nav>
                </div>
            </header>

            <!-- =========== PAGE TITLE ========== -->
            <div class="page_title gradient_overlay" style="background: url(<?php echo Yii::app()->baseUrl; ?>/statics/front/images/page_title_bg.jpg);">
                <div class="container">
                    <div class="inner">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <h1>·</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $content; ?>
            <footer>
                <div class="subfooter">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="copyrights">
                                    Copyright &copy; 2017.Company name All rights reserved.<a target="_blank" href="#">汽车贴膜</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </footer>
            </div>

            <!-- ========== BACK TO TOP ========== -->
            <div id="back_to_top">
                <i class="fa fa-angle-up" aria-hidden="true"></i>
            </div>

            <!-- ========== NOTIFICATION ========== -->
            <div id="notification"></div>

    </body>
    <!-- ========== JAVASCRIPT ========== -->
    <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/front/js/jquery.min.js"></script>
    <!---<script type="text/javascript" src="http://ditu.google.cn/maps/api/js?key=AIzaSyBDgMJEPio2qomUKV1iqlIufj4u2NVd3q4"></script>--->
    <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/front/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/front/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/front/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/front/js/jquery.smoothState.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/front/js/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/front/js/morphext.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/front/js/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/front/js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/front/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/front/js/owl.carousel.thumbs.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/front/js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/front/js/jPushMenu.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/front/js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/front/js/countUp.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/front/js/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/front/js/main.js"></script>
    <script type="text/javascript">
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
</html>