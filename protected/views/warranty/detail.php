<div style="background-color: #131629">
    <div class="container" style="background-color: #fff">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/statics/webfront/images/zhibao333.jpg" width="100%" height="auto" />

        <div class="container">
            <div class="row">
                <div class="sidebar">
                    <aside class="widget">
                        <h4 style="margin-left:15%">电子质保证书</h4>
                        <div class="vbf">
                            <!--<h2 class="form_title"><i class="fa fa-calendar"></i>质保查询展示</h2>-->
                            <footer>
                                <div id="ddd">
                                    <div class="col-md-11" style="margin-left:2%">
                                        <footer>
                                            <div style="background:url(<?php echo Yii::app()->request->baseUrl; ?>/statics/front/images/zhibaozhengshu-beijingse.jpg)">
                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/statics/front/images/zhibaozhengshu-toubu.png" width="100%" height="auto" />
                                                <div class="inner">

                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-10 col-sm-10 widget">
                                                                <?php if($result['status'] == 1){ ?>
                                                                <!--<h5 class="STYLE2">ICS智能安全窗材-质保证书</h5>-->
                                                                <address>
                                                                    <ul class="address_details">
                                                                        <table width="100%" border="1" bordercolor="#CCCCCC" >
                                                                            <tr>
                                                                                <td colspan="4"><span class="sub_title_xxs sub_title_xxs sub_title_xxs">&nbsp;&nbsp;&nbsp;&nbsp;尊敬的&nbsp;<?php echo $result['name']; ?>&nbsp;先生/女士：</br>&nbsp;&nbsp;&nbsp;&nbsp;感谢您选用ICS智能安全窗材</span></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="4"><span class="sub_title_xxs sub_title_xxs sub_title_xxs">&nbsp;&nbsp;&nbsp;&nbsp;电子质保证书编号：<?php echo $result['series_number']; ?></span></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td width="19" rowspan="5"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">贴膜</span></div>  </td>
                                                                                <td height="25"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">品牌</span></div></td>
                                                                                <td colspan="2"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">ICS</span></div></td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td width="69"><div align="center">套餐名称</div></td>
                                                                                <td width="94"><div align="center">xx套餐</div></td>
                                                                            </tr>
                                                                            <td><div align="center">施工部位</div></td>
                                                                            <td colspan="2"><div align="center">质保年限</div></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <?php echo $result['extension'];?></td>
                                                                                <td><?php echo $result['warrantytime'];?></td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">施工日期</span></div></td>
                                                                                <td colspan="2"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo date('Y-m-d',$result['construct_time']); ?></span></div></td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td rowspan="5"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">用户</span></div></td>
                                                                                <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">姓名</span></div></td>
                                                                                <td colspan="2"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo $result['name']; ?></span></div></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">电话</span></div></td>
                                                                                <td colspan="2"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo $result['telephone']; ?></span></div></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">地址</span></div></td>
                                                                                <td colspan="2"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo $result['address']; ?></span></div></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">车型</span></div></td>
                                                                                <td colspan="2"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo $result['carmodel']; ?></span></div></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">车架号<br>（后六位）</span></div></td>
                                                                                <td colspan="2"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo $result['engineno']; ?></span></div></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td rowspan="3"><p align="center" class="sub_title_xxs sub_title_xxs sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">施</p>
                                                                                    <p align="center" class="sub_title_xxs sub_title_xxs sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">工</p>
                                                                                    <p align="center" class="sub_title_xxs sub_title_xxs sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">店</p>                                                                    </td>
                                                                                <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">名称</span></div></td>
                                                                                <td colspan="2"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo !empty($result->store)?$result->store->name:'--';; ?></span></div></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">电话</span></div></td>
                                                                                <td colspan="2"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo !empty($result->store)?$result->store->telephone:'--';; ?></span></div></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">地址</span></div></td>
                                                                                <td colspan="2"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo !empty($result->store)?$result->store->address:'--';; ?></span></div></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="4">
                                                                                    <div style="padding:13px">
                                                                                        注意事项：<br />
                                                                                        本质保书给予您自安装之日起，在质保年限内，本公司承诺ICS智能安全窗材不开裂，不剥落，不起皱且不变形。
                                                                                        为确保品质与效率，请您按照以下正确的保养方法注意保养：<br />
                                                                                        1. 安装后7日内，请勿将玻璃摇上或摇下；<br />
                                                                                        2. 安装后30天日，请勿用水清理玻璃；<br />
                                                                                        3. 请使用潮湿的毛巾海绵擦洗玻璃窗，然后使用柔软的布擦干，禁止使用刷子；<br />
                                                                                        4. 不要使用指甲或尖锐物将膜边缘拔开，以免污物进入；<br />
                                                                                        5. 禁止粘性标签直接粘至膜上。<br />
                                                                                    </div>
                                                                                    <div style="float:right;margin:10px 0 12px 0;">
                                                                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/statics/admin/img/gongzhang.png" width="100%" height="auto" margin-right="-120" /></div>                                                          </td>
                                                                            </tr>
                                                                        </table>
                                                                        <p>&nbsp;</p>
                                                                    </ul>
                                                                </address>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                            </footer>
                        </div>
                </div>

                <br>
                <br>
            </div>
        </div>
        <div class="container" style="text-align:center;color:#616161">
<!--            <input type="button" onClick=" a()" value="打印-电子质保证书"/>-->
        </div>
        <br>
        <br>
    </div>
</div>