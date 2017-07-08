<main id="room_page" style="width:350px;">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar">
                    <aside class="widget">
                        <h4>查询结果</h4>
                        <div class="vbf">
                            <h2 class="form_title"><i class="fa fa-calendar"></i><?php echo $result['status'] == 1?'质保查询展示':'质保查询' ?></h2>
                            <?php if($result['status'] == 1){ ?>
                                <footer>
                                    <div class="inner">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-6 widget">
                                                    <h5 class="STYLE2">ICS智能安全窗材-质保详细</h5>
                                                    <address>
                                                        <ul class="address_details">
                                                            <table width="300" border="1" bordercolor="#CCCCCC">
                                                                <tr>
                                                                    <td colspan="3"><span class="sub_title_xxs sub_title_xxs sub_title_xxs">尊敬的<?php echo $result['name']; ?>先生/女士，感谢你选用一流的ICS</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3"><span class="sub_title_xxs sub_title_xxs sub_title_xxs">NO:<?php echo $result['series_number']; ?></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="21" rowspan="5"><p align="center" class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">贴膜</p>
                                                                    </td>
                                                                    <td height="27"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">名称</span></div></td>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo $result['pid'];?></span></div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="75"><p align="center" class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">型号</p></td>
                                                                    <td width="182"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo $result['mid'];?>
                                                                            </span></div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">施工部位</span></div></td>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo $result['extension'];?></span></div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">施工日期</span></div></td>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo date('Y-m-d',$result['construct_time']); ?></span></div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">质保年限</span></div></td>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo $result['warrantytime']; ?></span></div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td rowspan="5"><p align="center" class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">用户</p>
                                                                    </td>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">姓名</span></div></td>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo $result['name']; ?></span></div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">电话</span></div></td>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo $result['telephone']; ?></span></div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">地址</span></div></td>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo $result['address']; ?></span></div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">车牌号</span></div></td>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo $result['carlicence']; ?></span></div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">车架号<br>（后六位）</span></div></td>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo $result['engineno']; ?></span></div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td rowspan="3"><p align="center" class="sub_title_xxs sub_title_xxs sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">施</p>
                                                                        <p align="center" class="sub_title_xxs sub_title_xxs sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">工</p>
                                                                        <p align="center" class="sub_title_xxs sub_title_xxs sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">店</p>
                                                                    </td>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">名称</span></div></td>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo !empty($result->store)?$result->store->name:'--';; ?></span></div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">电话</span></div></td>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo !empty($result->store)?$result->store->telephone:'--';; ?></span></div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">地址</span></div></td>
                                                                    <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo !empty($result->store)?$result->store->address:'--';; ?></span></div></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3"><p>注意事项： <br>
                                                                            本质保书给予您自安装之日起，在质保年限内，本公司承诺本汽车隔热膜不开裂、不剥落、不起皱且不变形。 <br>
                                                                            为确保品质与效率，请您按照以下正确的保养方法注意保养： </p>
                                                                        <p>1. 安装后7日内，请勿将玻璃摇上或摇下； </p>
                                                                        <p>2. 安装后30天日，请勿用水清理玻璃； </p>
                                                                        <p>3. 请使用潮湿的毛巾海绵擦洗玻璃窗，然后使用柔软的布擦干，禁止使用刷子； </p>
                                                                        <p>4. 不要使用指甲或尖锐物将膜边缘拔开，以免污物进入； </p>
                                                                        <p>5. 禁止粘性标签直接粘至膜上。</p>
                                                                        <p>&nbsp;</p>
                                                                        <p>质保公章</p>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <p>&nbsp;</p>
                                                        </ul>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </footer>
                            <?php }elseif($result['status']!=1){ ?>
                                <footer>
                                    <div class="inner">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-6 widget">
                                                    <h5 class="STYLE2"></h5>
                                                    <div class="form-group">
                                                        <div class="form_select">
                                                            信息提交成功，请耐心等待，<br>
                                                            质保单生成后，客服第一时间短信通知您，谢谢合作！
                                                        </div>
                                                        <input type="hidden" name="sec" id="sec" value="4">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </footer>
                            <?php }elseif(empty($result)){ ?>
                                <footer>
                                    <div class="inner">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-6 widget">
                                                    <h5 class="STYLE2"></h5>
                                                    <div class="form-group">
                                                        <div class="form_select">
                                                            没有相应的质保信息或质保单尚未生成，<br>
                                                            请确认填写的联系电话/车牌号/车架号是否正确或耐心等待，谢谢合作！
                                                        </div>
                                                        <input type="hidden" name="sec" id="sec" value="4">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
<script type="text/javascript">
    $(function(){
        var _selector = $('#sec');
        console.log(_selector);
        if(_selector!=undefined){
            var picTimer = null;
            picTimer = setInterval(function(){
                var s = $('#sec').val();
                if( parseInt(s) == 0){
                    clearInterval(picTimer);
                    window.location.href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.Yii::app()->controller->id.'/index');?>";
                    return false;
                }
                $('#sec').val(parseInt(s)-1);
            }, 1000);
        }

    });
</script>