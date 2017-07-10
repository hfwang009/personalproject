<?php if($type=='showdetail'){ ?>
    <main id="room_page">
        <div class="container" style="width:400px;">
            <div class="col-md-4">
                <div class="sidebar">
                    <aside class="widget">
                        <div class="vbf">
                            <h2 class="form_title" style="text-align: center;font-size: 7px;margin-left: -60px;"><i class="fa fa-calendar"></i>质保单详情</h2>
                            <footer>
                                <div class="inner">
                                    <div class="col-md-3 col-sm-6 widget" style="width:400px;margin-left: -30px;">
                                        <address>
                                            <ul class="address_details">
                                                <table width="100%" border="1" bordercolor="#CCCCCC">
                                                    <tr>
                                                        <td colspan="4"><span class="sub_title_xxs sub_title_xxs sub_title_xxs">尊敬的&nbsp;<?php echo $result['name']; ?>&nbsp;先生/女士：</br>感谢您选用品质一流的ICS智能安全窗材</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><span class="sub_title_xxs sub_title_xxs sub_title_xxs">电子质保证书编号：<?php echo $result['series_number']; ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="21" rowspan="4"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">贴膜</span></div>  </td>
                                                        <td height="27"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">品牌</span></div></td>
                                                        <td colspan="2"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo $result['pid'];?></span></div></td>
                                                    </tr>

                                                    <tr>
                                                        <td width="75"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">套餐名称</span></div></td>
                                                        <td width="11"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">施工部位</span></div></td>

                                                        <td width="12"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">质保年限</span></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="75"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo $result['mid'];?></span></div></td>
                                                        <td>
                                                            <?php echo $result['extension'];?>                                                                    </td>

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
                                                </table>
                                                <p>&nbsp;</p>
                                            </ul>
                                        </address>
                                    </div>
                                </div>
                            </footer>
                        </div>
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
    </main>
<?php } ?>
