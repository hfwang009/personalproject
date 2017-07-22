<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<meta name="renderer" content="webkit" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="blank" />
<meta name="format-detection" content="telephone=no" />
<title>车辆产品-管理员后台</title>
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app ()->request->baseUrl;?>/statics/admin/css/bootstrap.css" />
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app ()->request->baseUrl;?>/statics/admin/css/icon.css" />
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app ()->request->baseUrl;?>/statics/admin/css/common.css" />
<?php Yii::app()->getClientScript()->registerCoreScript('jquery');?>
<script src="<?php echo Yii::app ()->request->baseUrl;?>/statics/admin/js/global.js" type="text/javascript"></script>
<script src="<?php echo Yii::app ()->request->baseUrl;?>/statics/admin/js/jquery.form.js" type="text/javascript"></script>
<script src="<?php echo Yii::app ()->request->baseUrl;?>/statics/admin/js/framework.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/js/layer.js"></script>
<script type="text/javascript" src="<?php echo Yii::app ()->request->baseUrl;?>/statics/js/extend/layer.ext.js"></script>
<script src="<?php echo Yii::app ()->request->baseUrl;?>/statics/admin/js/aws_admin.js" type="text/javascript"></script>
</head>
<?php 
$controller = Yii::app()->controller->id;
?>
<body>
	<div class="aw-header">
		<button class="btn btn-sm mod-head-btn pull-left">
	        <i class="icon icon-bar"></i>
	    </button>
		<div class="pull-left" style="width:200px;"><img src="<?php echo Yii::app ()->request->baseUrl;?>/statics/admin/img/logo-black1.png"></div>
		<div class="mod-header-user">
			<ul class="pull-right">
				<li class="dropdown username">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<?php echo Yii::app()->user->name;?>
						<span class="caret"></span>
					</a>

					<ul class="dropdown-menu pull-right mod-user">
                        <li>
                            <a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.'adminUser/updatePass',array('id'=>Yii::app()->user->id)); ?>">
                                <i class="icon icon-format"></i>
                                修改密码
                            </a>
                        </li>
						<li>
							<a href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.'Login/logout'); ?>">
								<i class="icon icon-logout"></i>
								退出
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div id="aw-side" class="aw-side ps-container">
		<div class="mod">
			<div class="mod-message">
				<div class="message">
					<a title="车辆产品前台" href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.'help/index'); ?>" class="btn btn-sm">
						<i class="icon icon-home"></i>
					</a>
                    <a title="修改密码" href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.'adminUser/updatePass',array('id'=>Yii::app()->user->id)); ?>" class="btn btn-sm">
                        <i class="icon icon-format"></i>
                    </a>
					<a title="退出" href="<?php echo Yii::app()->createUrl(Yii::app()->controller->module->id.'/'.'Login/logout'); ?>" class="btn btn-sm">
						<i class="icon icon-logout"></i>
					</a>
				</div>
			</div>
			<?php 
			$menu = Yii::app()->params['menu']['app'];
			?>
			<ul class="mod-bar">
				<?php 
				foreach ($menu as $_menu){
				?>
				<li>
					<a class="icon <?php echo $_menu['icon'];?><?php echo $this->column == $_menu['column']?' active':'';?>" href="javascript:;">
						<span><?php echo $_menu['subject'];?></span>
					</a>
					<?php 
					if(isset($_menu['submenu']) && !empty($_menu['submenu'])){
					?>
					<ul<?php echo $this->column == $_menu['column']?'':' class="hide"';?>>
						<?php 
						foreach ($_menu['submenu'] as $_submenu){
						?>
						<li>
							<a<?php echo (isset($_submenu['controller']) && $_submenu['controller'] == $controller)?' class="active"':'';?> href="<?php echo Yii::app()->createUrl($_submenu['link']);?>">
								<span><?php echo $_submenu['subject'];?></span>
							</a>
						</li>
						<?php 
						}
						?>
					</ul>
					<?php 
					}
					?>
				</li>
				<?php 
				}
				?>
			</ul>
		</div>
		<div class="ps-scrollbar-x-rail" style="width: 235px; display: none; left: 0px; bottom: 3px;">
			<div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
		</div>
		<div class="ps-scrollbar-y-rail" style="top: 0px; height: 453px; display: inherit; right: 0px;">
			<div class="ps-scrollbar-y" style="top: 0px; height: 254px;"></div>
		</div>
	</div>
	<?php echo $content; ?>
	<div class="aw-footer">
		<p>
			Copyright &copy; 2015 Powered by <a target="blank" href="javascript:;">车辆产品</a>
		</p>
	</div>
	<div id="aw-ajax-box" class="aw-ajax-box"></div>
	<script type="text/javascript">
	var show_return_message = function(msg,href,time,icon){
		var data = {'icon':1,'time':1000};
		if(typeof(time) != 'undefined' && time != ''){
			data.time = time;
		}
		if(typeof(icon) != 'undefined' && icon != ''){
			data.icon = icon;
		}
		if(typeof(href) == 'undefined' || href == ''){
			href = window.location.href;
		}
		layer.msg(msg, data,function(){
				window.location.href = href;
			}
		);
		return false;
	};
	var show_tip_message = function(msg,eve,time,icon){
		var data = {'icon':5,'time':1000};
		if(typeof(time) != 'undefined' && time != ''){
			data.time = time;
		}
		if(typeof(icon) != 'undefined' && icon != ''){
			data.icon = icon;
		}
		layer.msg(msg,data, function(){
				if(typeof(eve) != 'undefined' && eve != null){
			    	eve.focus();
				}	
			}
		);
		return false;  
	}
	var isEmpty = function(val){
		if(typeof(val) == 'undefined' || val == ''){
			return true;
		}
		return false;
	};
    var js_check_telephone = function(eve){
        var s = $(eve).val();
        if(isEmpty(s)){
            $(eve).val('');
            show_tip_message('请输入联系电话');
            return false;
        }else{
            var f,_s;
            var d = s.split('-');
            if(d.length==2){
                _s = s;
                f = checkTel(s);
            }else if(d.length==3){
                _s = s;
                f = checkTel(_s);
            }else{
                _s = parseInt(s);
                if(isNaN(_s)){
                    $(eve).val('');
                    show_tip_message('请输入合法的联系电话');
                    return false
                }
                f = checkTel(_s);
            }
            if(f){
                $(eve).val(_s);
            }else{
                $(eve).val('');
                show_tip_message('请输入合法的联系电话');
                return false;
            }
        }
        return false;
    }
    function checkTel(tel){
        var pattern_phone = /^(0\d{2,3}-)?[1-9]\d{6,7}$/;
        var pattern_telephone = /^(18[0-3|5-9][0-9]{8})|(13[0-9]{9})|(15[0-3|5-9][0-9]{8})|(17[6-8][0-9]{8})$/;
        var pattern_telephone1 = /^([48]00)\-([0-9]{3})\-([0-9]{4})$/ ;
        var pattern_telephone2 = /^([48]00)([0-9]{7})$/ ;
        if(pattern_phone.test(tel)||pattern_telephone.test(tel)||pattern_telephone1.test(tel)||pattern_telephone2.test(tel)){
            return true;
        }else{
            return false;
        }
    }
	</script>
</body>
</html>