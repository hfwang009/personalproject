<main id="about_us_page">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="mb30">关于我们</h1>
                <?php echo $this->aboutus; ?>
            </div>
            <?php if(!empty($articles)){ ?>
                <div class="col-md-7" style="margin-top: 25px;">
                    <?php foreach($articles as $article){
                        ?>
                        <article class="latest_post" style="margin-top: 8px;">
                            <div class="details">
                                <h6><a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/detail',array('id'=>$article['id'])); ?>"><?php echo $article['title'] ?></a></h6>
                            </div>
                        </article>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</main>