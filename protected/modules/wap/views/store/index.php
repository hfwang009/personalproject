<main id="room_page">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar">
                    <aside class="widget">
                        <div class="vbf">
                            <h2 class="form_title"><i class="fa fa-calendar"></i> 4S店信息查询</h2>
                            <?php
                            $form = $this->beginWidget("CActiveForm",array(
                                    'id'=>'store_form',
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
<!--                                <div class="form-group">-->
<!--                                    <div class="form_select">-->
<!--                                        --><?php //echo $form->dropDownList($model,'type',$types,array('empty'=>'请选择经销商类别', 'class'=>'form-control'));?>
<!--                                    </div>-->
<!--                                </div>-->

                                <div class="form-group">
                                    <div class="form_select">
                                        <?php echo $form->dropDownList($model,'provinceid',$provinces,array('empty'=>'请选择省份', 'class'=>'form-control','ng-change'=>'js_change_province()'));?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                                    <div class="form_select">
                                        <?php echo $form->dropDownList($model,'cityid',$citys,array('empty'=>'请选择城市', 'class'=>'form-control md_noborder_right','ng-change'=>'js_change_city()'));?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12 nopadding">
                                    <div class="form_select">
                                        <?php echo $form->dropDownList($model,'areaid',$areas,array('empty'=>'请选择区县', 'class'=>'form-control'));?>
                                    </div>
                                </div>

                                <button class="button btn_lg btn_blue btn_full" type="button" id="search_submit">点击查询结果</button>
                                <div class="a_center mt10">
                                    <a href="javascript:;" class="a_b_f" id="search_click">门店地址地图信息一键查询</a>
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
    var url = '<?php echo $ajax_url; ?>';
    $(function(){
        $('body').on('change','select[ng-change="js_change_province()"]',function(){
            js_change_province(this);
        });
        $('body').on('change','select[ng-change="js_change_city()"]',function(){
            js_change_city(this);
        });
        $('body').on('click','#search_submit',function(){
            js_submit_form();
        });
        $('body').on('click','#search_click',function(){
            js_submit_form();
        });
    });
    var js_submit_form = function(){
        var type = $('#Store_type').val();
        var provinceid = $('#Store_provinceid').val();
        var cityid = $('#Store_cityid').val();
        var areaid = $('#Store_areaid').val();
        if(isEmpty(provinceid)){
            show_tip_message('请选择门店所属在省份');
            return false;
        }
        $('#store_form').submit();
    }
    var js_change_province = function(eve){
        var province = $(eve).val();
        if(!isEmpty(province)){
            $.ajax({
                type:'post',
                url:url,
                data:{ct:'Store',ac:'getCity',province:province},
                dataType:'json',
                success:function(re){
                    if(re.state==true){
                        clearSelect(0);
                        if(!isEmpty(re.html)){
                            $('#Store_cityid').append(re.html.citys);
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
    var js_change_city = function(eve){
        var city = $(eve).val();
        if(!isEmpty(city)){
            $.ajax({
                type:'post',
                url:url,
                data:{ct:'Store',ac:'getArea',city:city},
                dataType:'json',
                success:function(re){
                    if(re.state==true){
                        clearSelect(1);
                        if(!isEmpty(re.html)){
                            $('#Store_areaid').append(re.html.areas);
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
    function CreateUl($obj,msg){


    }
    function clearSelect(i){
        if(i===0){
            $('#Store_cityid').empty().append('<option value="">请选择城市</option>');
            $("button[data-id='Store_cityid']").attr('title','请选择城市');
            $("button[data-id='Store_cityid']").find('.filter-option').text('请选择城市');
        }
        $('#Store_areaid').empty().append('<option value="">请选择区县</option>');
        $("button[data-id='Store_areaid']").attr('title','请选择区县');
        $("button[data-id='Store_areaid']").find('.filter-option').text('请选择区县');
    }
</script>