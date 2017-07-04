<main id="room_page">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar">
                    <aside class="widget">
                        <div class="vbf">
                            <h2 class="form_title"><i class="fa fa-calendar"></i> 质保信息查询</h2>
                            <?php
                            $form = $this->beginWidget("CActiveForm",array(
                                    'id'=>'warranty_form',
                                    'method'=>'POST',
                                    'action'=>Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/search'),
                                    'enableClientValidation'=>false,
                                    'clientOptions'=>array(
                                        'validateOnSubmit'=>true,
                                    ),
                                    'htmlOptions'=>array('class'=>'inner'),
                                )
                            );
                            ?>
                                <div class="form-group">
                                    <div class="form_select">
                                        <?php echo $form->textField($model,'carlicence',array('placeholder'=>'请输入手机号/车配号/发动机号/质保证书编号', 'class'=>'form-control'));?>
                                    </div>
                                </div>

                                <button class="button btn_lg btn_blue btn_full" type="button" id="search_submit">点击查询结果</button>
                                <div class="a_center mt10">
                                    <a href="javascript:;" class="a_b_f" id="search_click">质保信息一键查询</a>
                                </div>
                            <?php $this->endWidget(); ?>
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
        $('body').on('click','#search_submit',function(){
            js_submit_form();
        });
        $('body').on('click','#search_click',function(){
            js_submit_form();
        });
    });
    var js_submit_form = function(){
        var carlicence = $('#Warranty_carlicence').val();
        if(isEmpty(carlicence)){
            show_tip_message('请填写手机号/车牌号/发动机编号！');
            return false;
        }
        $('#warranty_form').submit();
    }
</script>