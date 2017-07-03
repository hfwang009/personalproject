<?php
class SuperSlide extends CWidget
{
	/*
	 $('#{$this->container}').slide({ 
			mainCell:'.bd ul', 
			effect:ary[1],
			autoPlay:ary[2],
			trigger:ary[3],
			easing:ary[4],
			delayTime:ary[5],
			mouseOverStop:ary[6],
			pnLoop:ary[7] 
		});
	 */
	//内容ID
	public $container = '';
	
	//$options
	public $options = null;
	
	public function init(){
		
		$this->registerClientScript();
	}
	
	public function registerClientScript(){
		
		$assets = dirname(__FILE__).'/';
		
		$baseUrl = Yii::app()->assetManager->publish($assets);
		
		$cs = Yii::app()->getClientScript();
		
		$cs->registerScriptFile($baseUrl . '/jquery.SuperSlide.2.1.1.js', CClientScript::POS_HEAD);
	}
	
	public function run(){
		$cs = Yii::app()->getClientScript();
		$cs->registerScript(__CLASS__.'#'.$this->container, "$('#{$this->container}').slide(".CJavaScript::encode($this->options).");");
	}
}