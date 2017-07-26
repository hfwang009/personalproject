<div class="banner003">
    <div class="container">
        <a href="#"><img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/shouye/fanhui.png" width="45px" height="40px" style="margin-top:-5px" /></a>
        质保查询 ><a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->id.'/index');?>#shenqing" style="margin-left: 20px;color:#737373;">质保申请</a><a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->id.'/index');?>#cx" style="margin-left: 20px;color:#737373;">质保查询</a>
    </div>
</div>

<div style="background-color: #131629">
    <div class="container">
        <img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/zhibao333.jpg" width="100%" height="auto" />
        <div class="col-md-8" style="margin-left:15%">

            <div class="col-md-12">
                <div class="sidebar">
                    <?php if(!empty($result)){ ?>
<!--                    <aside class="widget">-->
<!---->
<!--                    </aside>-->
                        <table width="100%" border="0">
                            <?php foreach($result as $k=>$_result){ ?>
                                <tr>
                                    <td bgcolor="#e8e8e8" style="color:#333333;padding:30px 250px 10px 250px"><a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->id.'/result',array('id'=>$_result['id'])); ?>"><strong><font color="333333"><?php echo $_result['series_number']; ?></font></strong></a><br><h11><?php echo date('Y-m-d',$_result['ctime']); ?></h11></td>
                                </tr>
                            <?php } ?>
                        </table>
                        <br>
                        <br>
                    <?php }else{ ?>
                        <div class="vbf">
                            <!--<h2 class="form_title"><i class="fa fa-calendar"></i> 提交质保信息申请</h2>-->
                            <div class="form-group">
                                            <span style="line-height: inherit;font-size: 24px;font-weight: bold;">没有相应的质保信息或质保单尚未生成，<br>
                                            请确认填写的联系电话/车牌号/车架号是否正确或耐心等待，谢谢合作！</span>
                                <input type="hidden" name="sec" id="sec" value="4">
                            </div>

                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>
</div>