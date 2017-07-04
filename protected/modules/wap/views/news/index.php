<!-- =========== MAIN ========== -->
<main id="room_page">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar">
                    <aside class="widget">
                        <h4>活动资讯</h4>
                        <?php if(!empty($model)){ ?>
                            <div class="latest_posts">
                                <?php foreach($model as $_model){
                                    ?>
                                    <article class="latest_post">
                                        <figure>
                                            <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/detail',array('id'=>$_model['id'])); ?>" class="hover_effect h_link h_blue">
                                                <img src="<?php echo !empty($_model['thumb'])?Yii::app()->baseUrl.$_model['thumb']:Yii::app()->baseUrl.'/statics/front/images/blog/thumb1.jpg'; ?>" height="60" width="120" alt="Image">
                                            </a>
                                        </figure>
                                        <div class="details">
                                            <h6><a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/detail',array('id'=>$_model['id'])); ?>"><?php echo $_model['title'] ?></a></h6>
                                            <span><i class="fa fa-calendar"></i><?php echo !empty($_model['ctime'])?date('d/m/Y',$_model['ctime']):''; ?></span>
                                        </div>
                                    </article>
                                <?php } ?>
                            </div>
                        <?php }else{ ?>
                            <div class="latest_posts">
                                没有活动资讯
                            </div>
                        <?php } ?>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</main>