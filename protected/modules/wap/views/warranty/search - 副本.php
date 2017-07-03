<main id="room_page">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar">
                    <aside class="widget">
                        <h4>查询结果</h4>
                        <div class="vbf">
                            <h2 class="form_title"><i class="fa fa-calendar"></i>质保查询展示</h2>

                            <footer>
                                <div class="inner">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-6 widget">
                                                <h5>质保-车型明细</h5>
                                                <address>
                                                    <ul class="address_details">
                                                        <li>品牌：<?php echo $brand; ?></li>
                                                        <li>型号：<?php echo $car; ?></li>
                                                        <li>车牌号码：<?php echo $carlicence; ?></li>
                                                        <li>发动机编号：<?php echo $engineno; ?></li>
                                                </address>
                                            </div>
                                        </div> </div></div>

                                <div class="inner">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-6 widget">
                                                <h5 class="STYLE2">您选择的隔热膜质保如下：</h5>

                                                <address>
                                                    <ul class="address_details">
                                                        <table width="308" border="1">
                                                            <tr>
                                                                <td width="32" align="center">区分</td>
                                                                <td width="76" align="center">膜型号</td>
<!--                                                                <td width="49" align="center">面积</td>-->
<!--                                                                <td width="75" align="center"><p>施工<br>-->
<!--                                                                        时间</p>                                            </td>-->
                                                                <td width="55" align="center"><p>质保<br>
                                                                        时间</p>                                            </td>
                                                            </tr>
                                                            <?php if($results){ ?>
                                                                <?php foreach($results as $result){
                                                                    ?>
                                                                    <tr>
                                                                        <td align="center"><p><?php echo $result['type']; ?><br>
                                                                                报价</p>                                            </td>
                                                                        <td align="center"><?php echo $result['mname']; ?></td>
<!--                                                                        <td align="center">--><?php //echo $result['vast']; ?><!--</td>-->
<!--                                                                        <td align="center">--><?php //echo date('Ymd',$result['starttime']); ?><!--</td>-->
                                                                        <td align="center"><p><?php echo $result['warrantytime']; ?><br>
                                                                                <?php echo date('Ymd',$result['endtime']); ?></p>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </table>
                                                        <p>&nbsp;</p>
                                                        <li> <span class="STYLE1">质保说明：</span><br>
                                                            本报价已含威固膜施工费；原已贴膜车辆换贴威固膜的，施工店可另收取全车旧膜除胶费600元-5座车、800元-7座车。
                                                            *车身报价说明：上述车身报价不包含前挡，仅指侧窗及后挡部位全部贴膜的施工价格；
                                                            *后挡收费说明：后挡按车身报价的40%收取；
                                                            *天窗收费标准：上述车身报价不包含天窗施工；
                                                            小型天窗（不超过一个侧窗面积），按车身报价15%收取；
                                                            中型天窗（不超过两个侧窗面积），按车身报价30%收取；
                                                            大型天窗（超过两个侧窗面积），按车身报价50%收取。</li>

                                                </address>
                                            </div>

                                        </div> </div></div>
                            </footer>

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
                                            <a href="<?php echo Yii::app()->createUrl('news/detail',array('id'=>$_news['id'])); ?>" class="hover_effect h_link h_blue">
                                                <img src="<?php echo !empty($_news['thumb'])?Yii::app()->baseUrl.$_news['thumb']:Yii::app()->baseUrl.'/statics/front/images/blog/thumb1.jpg'; ?>" height="60" width="120" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="details">
                                            <h6><a href="<?php echo Yii::app()->createUrl('news/detail',array('id'=>$_news['id'])); ?>"><?php echo $_news['title'] ?></a></h6>
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