<main id="room_page">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar">
                    <aside class="widget">
                        <h4>查询结果</h4>
                        <div class="vbf">
                            <h2 class="form_title"><i class="fa fa-calendar"></i> 门店信息查询展示</h2>
                            <?php if(!empty($results)){ ?>
                                <footer>
                                    <?php foreach($results as $result){ ?>
                                    <div class="inner">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-6 widget">
                                                    <h5><a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/map',array('id'=>$result['id'])); ?>"><?php echo $result['name']; ?></a></h5>
                                                    <address>
                                                        <ul class="address_details">
                                                            <li><i class="glyphicon glyphicon-map-marker"></i> <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/map',array('id'=>$result['id'])); ?>"><?php echo $result['address']; ?></a> </li>
                                                            <li><i class="glyphicon glyphicon-phone-alt"></i> 联系电话: <?php echo $result['telephone']; ?> </li>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </footer>
                            <?php }else{ ?>
                                <footer>
                                    没有门店数据
                                </footer>
                            <?php } ?>
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