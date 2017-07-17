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
<main id="room_page">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar">
                    <aside class="widget">
                        <h4>查询结果</h4>
                        <div class="vbf">
                            <h2 class="form_title"><i class="fa fa-calendar"></i>产品报价查询展示</h2>
                            <footer>
<!--                                <div class="inner">-->
<!--                                    <div class="container">-->
<!--                                        <div class="row">-->
<!--                                            <div class="col-md-3 col-sm-6 widget">-->
<!--                                                <h5>贴膜报价-车型明细</h5>-->
<!--                                                <address>-->
<!--                                                    <ul class="address_details">-->
<!--                                                        <li>品牌：--><?php //echo !empty($brand)?$brand['name']:'--'; ?><!--</li>-->
<!--                                                        <li>型号：--><?php //echo !empty($car)?$car['name']:'--'; ?><!--</li>-->
<!--                                                        <li>前档：--><?php //echo $ftype_name; ?><!--</li>-->
<!--                                                        <li>车身：--><?php //echo $btype_name; ?><!--</li>-->
<!--                                                </address>-->
<!--                                            </div>-->
<!---->
<!--                                        </div> </div></div>-->

                                <div class="inner">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-6 widget">
                                                <h5 class="STYLE2">您选择的隔热膜报价如下：</h5>
                                                <address>
                                                    <ul class="address_details">
                                                        <li>
                                                            <?php echo $results['intro'] ?>
                                                        </li>
<!--                                                        <table width="300" border="1">-->
<!--                                                            <tr>-->
<!--                                                                <td align="center">区分</td>-->
<!--                                                                <td align="center">膜型号</td>-->
<!--                                                                <td align="center">面积</td>-->
<!--                                                                <td align="center"><p>施工<br>-->
<!--                                                                        难度</p>-->
<!--                                                                </td>-->
<!--                                                                <td align="center"><p>施工<br>-->
<!--                                                                        时间</p>-->
<!--                                                                </td>-->
<!--                                                                <td align="center">价格</td>-->
<!--                                                            </tr>-->
<!--                                                            --><?php //if($results){ ?>
<!--                                                                --><?php //foreach($results as $result){ ?>
<!--                                                                    <tr>-->
<!--                                                                        <td align="center"><p>--><?php //echo $result['type']; ?><!--<br>-->
<!--                                                                                报价</p>-->
<!--                                                                        </td>-->
<!--                                                                        <td align="center">--><?php //echo $result['name']; ?><!--</td>-->
<!--                                                                        <td align="center">--><?php //echo $result['vast'] ?><!--</td>-->
<!--                                                                        <td align="center">--><?php //echo $result['level'] ?><!--</td>-->
<!--                                                                        <td align="center">--><?php //echo $result['costtime'] ?><!--</td>-->
<!--                                                                        <td align="center">--><?php //echo $result['price'] ?><!--</td>-->
<!--                                                                    </tr>-->
<!--                                                                --><?php //} ?>
<!--                                                            --><?php //} ?>
<!--                                                        </table>-->
<!--                                                        <table width="300" border="1">-->
<!--                                                            <tr>-->
<!--                                                                <td><div align="right"><span class="STYLE1">合计：--><?php //echo $sum; ?><!--</span></div></td>-->
<!--                                                            </tr>-->
<!--                                                        </table>-->
<!--                                                        <p>&nbsp;</p>-->
<!--                                                        <li> <span class="STYLE1">报价说明：</span><br>-->
<!--                                                            本报价已含威固膜施工费；原已贴膜车辆换贴威固膜的，施工店可另收取全车旧膜除胶费600元-5座车、800元-7座车。-->
<!--                                                            *车身报价说明：上述车身报价不包含前挡，仅指侧窗及后挡部位全部贴膜的施工价格；-->
<!--                                                            *后挡收费说明：后挡按车身报价的40%收取；-->
<!--                                                            *天窗收费标准：上述车身报价不包含天窗施工；-->
<!--                                                            小型天窗（不超过一个侧窗面积），按车身报价15%收取；-->
<!--                                                            中型天窗（不超过两个侧窗面积），按车身报价30%收取；-->
<!--                                                            大型天窗（超过两个侧窗面积），按车身报价50%收取。</li>-->
<!--                                                        <li><span class="STYLE1">侧窗收费标准：</span><br>-->
<!--                                                            1.侧窗全贴总收费标准：-->
<!--                                                            非全车贴威固膜，总侧窗收费按该型号车身报价80%收取；-->
<!--                                                            全车贴威固膜时，总侧窗收费按该型号车身报价60%收取；-->
<!--                                                            2.单片侧窗收费标准：-->
<!--                                                            依据侧窗个数与面积，按上述侧窗总收费进行比例折算处理；-->
<!--                                                            以四侧窗车型为例，单片侧窗收费标准如下：-->
<!--                                                            非全车贴威固，单片侧窗价格为车身报价的20%；-->
<!--                                                            全车贴威固膜，单片侧窗价格为车身报价的15%。</li>-->
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </footer>

                        </div>
                    </aside>
                    <aside class="widget">
                        <h4>联系客服</h4>
                        <div class="help">
                            <?php echo $this->callus; ?>
                        </div>
                    </aside>
<!--                    <aside class="widget">-->
<!--                        <h4>资讯</h4>-->
<!--                        --><?php //if(!empty($news)){ ?>
<!--                            <div class="latest_posts">-->
<!--                                --><?php //foreach($news as $_news){ ?>
<!--                                    <article class="latest_post">-->
<!--                                        <figure>-->
<!--                                            <a href="--><?php //echo Yii::app()->createUrl('news/detail',array('id'=>$_news['id'])); ?><!--" class="hover_effect h_link h_blue">-->
<!--                                                <img src="--><?php //echo !empty($_news['thumb'])?Yii::app()->baseUrl.$_news['thumb']:Yii::app()->baseUrl.'/statics/front/images/blog/thumb1.jpg'; ?><!--" height="60" width="120" alt="Image">-->
<!--                                            </a>-->
<!--                                        </figure>-->
<!--                                        <div class="details">-->
<!--                                            <h6><a href="--><?php //echo Yii::app()->createUrl('news/detail',array('id'=>$_news['id'])); ?><!--">--><?php //echo $_news['title'] ?><!--</a></h6>-->
<!--                                            <span><i class="fa fa-calendar"></i>--><?php //echo !empty($_news['ctime'])?date('d/m/Y',$_news['ctime']):''; ?><!--</span>-->
<!--                                        </div>-->
<!--                                    </article>-->
<!--                                --><?php //} ?>
<!--                            </div>-->
<!--                        --><?php //}else{ ?>
<!--                            <div class="latest_posts">-->
<!--                                没有资讯-->
<!--                            </div>-->
<!--                        --><?php //} ?>
<!--                    </aside>-->
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