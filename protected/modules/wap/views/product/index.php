<!-- =========== MAIN ========== -->
<main id="room_page">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar">
                    <aside class="widget">
                        <div class="vbf">
                            <h2 class="form_title"><i class="fa fa-calendar"></i> 产品型号查询</h2>
                            <?php
                            $form = $this->beginWidget("CActiveForm",array(
                                    'id'=>'product_form',
                                    'method'=>'POST',
                                    'action'=>Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id . '/result'),
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
                                    <?php echo $form->dropDownList($model,'bid',$packages,array('empty'=>'请选择套餐', 'class'=>'form-control','ng-change'=>'js_change_brand()'));?>
                                </div>
                            </div>

<!--                            <div class="form-group">-->
<!--                                <div class="form_select">-->
<!--                                    --><?php //echo $form->dropDownList($model,'mid',$models,array('empty'=>'请选择车型', 'class'=>'form-control','ng-change'=>'js_change_model()'));?>
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">-->
<!--                                <div class="form_select">-->
<!--                                    --><?php //echo $form->dropDownList($model,'ftype',$ftype,array('empty'=>'请选择-前档', 'class'=>'form-control'));?>
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">-->
<!--                                <div class="form_select">-->
<!--                                    --><?php //echo $form->dropDownList($model,'btype',$btype,array('empty'=>'请选择-车身', 'class'=>'form-control'));?>
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">-->
<!--                                <div class="form_select">-->
<!--                                    --><?php //echo $form->textField($model,'price_start',array('placeholder'=>'初始价格', 'class'=>'form-control','onkeyup'=>'check_price(this)'));?>
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">-->
<!--                                <div class="form_select">-->
<!--                                    --><?php //echo $form->textField($model,'price_end',array('placeholder'=>'封顶价格', 'class'=>'form-control','onkeyup'=>'check_price(this)'));?>
<!--                                </div>-->
<!--                            </div>-->

                            <button class="button btn_lg btn_blue btn_full" type="button" id="search_submit">点击查询结果</button>
                            <div class="a_center mt10">
                                <a href="javascript:;" class="a_b_f" id="search_click">产品报价信息一键查询</a>
                            </div>
                            <?php $this->endWidget();?>
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
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
    var url = '<?php echo $ajax_url; ?>';
    $(function(){
        $('body').on('change','select[ng-change="js_change_brand()"]',function(){
            js_change_brand(this);
        });
        $('body').on('change','select[ng-change="js_change_model()"]',function(){
            js_change_model(this);
        });
        $('body').on('click','#search_submit',function(){
            js_submit_form();
        });
        $('body').on('click','#search_click',function(){
            js_submit_form();
        });
    });
    var js_submit_form = function(){
        var bid = $('#Product_bid').val();
//        var mid = $('#Product_mid').val();
//        var ftype = $('#Product_ftype').val();
//        var btype = $('#Product_btype').val();
        if(isEmpty(bid)){
            show_tip_message('请选择套餐');
            return false;
        }
        $('#product_form').submit();
    }
    var js_change_brand = function(eve){
        var brand = $(eve).val();
        if(!isEmpty(brand)){
            $.ajax({
                type:'post',
                url:url,
                data:{ct:'product',ac:'getModel',brand:brand},
                dataType:'json',
                success:function(re){
                    if(re.state==true){
                        clearSelect(0);
                        if(!isEmpty(re.msg)){
                            $('#Product_mid').append(re.msg);
                        }
                    }else{
                        clearSelect(0);
                    }
                },
                error:function(er){

                }
            });
        }else{
            clearSelect(0);
        }
    }
    var js_change_model = function(eve){
        var model = $(eve).val();
        if(!isEmpty(model)){
            $.ajax({
                type:'post',
                url:url,
                data:{ct:'product',ac:'getTypes',model:model},
                dataType:'json',
                success:function(re){
                    if(re.state==true){
                        clearSelect(1);
                        if(!isEmpty(re.msg)){
                            var obj = JSON.parse(re.msg);
                            $('#Product_ftype').append(obj.ftype);
                            $('#Product_btype').append(obj.btype);
                        }
                    }else{
                        clearSelect(1);
                    }
                },
                error:function(er){

                }
            });
        }else{
            clearSelect(1);
        }
    }
    function check_price(eve){
        var s = $(eve).val();
        if(isEmpty(s)){
            $(eve).val(0);
        }else{
            var _s = parseInt(s);
            if(isNaN(_s)){
                _s = 0;
            }
            $(eve).val(_s);
        }
    }
    function clearSelect(i){
        if(i===0){
            $('#Product_mid').empty().append('<option value="">请选择车型</option>');
            $("button[data-id='Product_mid']").attr('title','请选择车型');
            $("button[data-id='Product_mid']").find('.filter-option').text('请选择车型');
        }
        $('#Product_ftype').empty().append('<option value="">请选择-前挡</option>');
        $("button[data-id='Product_ftype']").attr('title','请选择-前挡');
        $("button[data-id='Product_ftype']").find('.filter-option').text('请选择-前挡');
        $('#Product_btype').empty().append('<option value="">请选择-车身</option>');
        $("button[data-id='Product_btype']").attr('title','请选择-车身');
        $("button[data-id='Product_btype']").find('.filter-option').text('请选择-车身');
    }
</script>