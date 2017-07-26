<div style="background-color: #131629">
    <div class="container" style="background-color: #fff">
        <img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/zhantinghuodong.jpg" width="100%" height="auto" />
        <div class="col-md-12">
            <div style="font-size:22px;color:#737373;text-align:center;"><strong><?php echo $detail['title']; ?></strong></div><br>
            <div style="font-size:12px;margin-top:-15px;color:#737373;text-align:center;"><?php echo !empty($detail['ctime'])?date('Y-m-d',$detail['ctime']):''; ?></div><br>
            <div class="copyrights" align="left" style="border-top:1px solid #d1d1d1;width:98%;margin:-10px 20px 10px 0px"></div>
            <div style="font-size:14px;color:#737373;width:98%;">
                <?php echo !empty($detail['content'])?$detail['content']:''; ?>
                <img src="<?php echo Yii::app()->request->baseUrl ?>/statics/webfront/images/zhantinghuodong001.jpg" width="100%" height="auto" align="middle" />
            </div>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>