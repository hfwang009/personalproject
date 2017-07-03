<?php
class CRedisUtils {
	//首页顶部菜单获取
	public static function getFrontMenu(){
		$menu = RedisInit::getInstance()->get('yitucloud.front.menu',true);
		if(!$menu){
			$menu = CRedisUtils::getMenu();
			if($menu !== array()){
				RedisInit::getInstance()->set('yitucloud.front.menu', $menu, 0, true);
			}
		}
		return $menu;
	}
	
	//查找首页的顶部菜单设置
	public static function getMenu($parent = 0){
		$result = array();
		$data = WorkbenchMenu::model()->findAll("disabled = 1 AND parent=:parent",array(":parent"=>$parent));
		if(!empty($data)){
			foreach($data as $key=>$val){
				$result[$val['id']]['id'] = $val['id'];
				$result[$val['id']]['name'] = $val['name'];
				$result[$val['id']]['class'] = $val['class'];
				$result[$val['id']]['selected'] = $val['selected'];
				$result[$val['id']]['link'] = $val['link'];
				$child = CRedisUtils::getMenu($val['id']);
				if(!empty($child)){
					$result[$val['id']]['child'] = $child;
				}
			}
		}
		return $result;
	}
	
	
	//获取当前时间到明天凌晨间隔秒数
	public static function getIntervalSecond(){
		$second = time();
		$time = strtotime(date('Y-m-d',strtotime('+1 day')));
		return $time - $second;
	}
}