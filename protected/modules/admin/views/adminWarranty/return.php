<?php if($type=='showdetail'){ ?>
    <main id="room_page">
        <div class="container" style="width:400px;">
            <div class="col-md-4">
                <div class="sidebar">
                    <aside class="widget">
                        <div class="vbf">
                            <h2 class="form_title" style="text-align: center;font-size: 7px;"><i class="fa fa-calendar"></i>质保单详情</h2>
                            <footer>
                                <div class="inner">
                                    <div class="container" style="width:400px;">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-6 widget">
                                                <address>
                                                    <ul class="address_details">
                                                        <table width="300" border="1" bordercolor="#CCCCCC">
                                                            <tr>
                                                                <td colspan="3"><span class="sub_title_xxs sub_title_xxs sub_title_xxs">NO:<?php echo $result['series_number']; ?></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="21" rowspan="5"><p align="center" class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">贴</p>
                                                                    <p align="center" class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">膜</p>
                                                                </td>
                                                                <td height="27"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">名称</span></div></td>
                                                                <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo !empty($result->pid)?$result->pid:'--'; ?></span></div></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="75"><p align="center" class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">型号</p></td>
                                                                <td width="182"><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo !empty($result->mid)?$result->mid:'--'; ?></span></div></td>
                                                            </tr>
                                                            <tr>
                                                                <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">施工部位</span></div></td>
                                                                <td><div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"><?php echo $result->extension; ?></span></div></td>
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
                                                                <td rowspan="5"><p align="center" class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">用</p>
                                                                    <p align="center" class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">户</p>
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
                                                        </table>
                                                        <p>&nbsp;</p>
                                                    </ul>
                                                </address>
                                            </div>
                                        </div>
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
