<?php
/**
 * CJuiDatePicker displays a datepicker.
 *
 * CJuiDatePicker encapsulates the {@link http://jqueryui.com/demos/datepicker/ JUI
 * datepicker} plugin.
 *
 * To use this widget, you may insert the following code in a view:
 * <pre>
 * $this->widget('application.extensions.ajax-fileupload.AjaxFileUpload', array(
 *		'uploadUrl' => Yii::app()->createUrl('users/setting'),
 *		'dataType' => 'text',
 *		'fileElementId' => 'portrait_preview',
 *		'fileImgId' => 'user_photo',
 *      'file_hidden_input_id' => 'user_photo',
 *      'file_hidden_input_name' => 'user_photo',
 *		'data'=>array('ct'=>'user','ac'=>'avatar'),
 *		'htmlOptions' => array('id'=>'UsersInfo_portrait','name'=>'User[portrait]'),
 * )); 
 * </pre>
 *
 */
class AjaxFilesUpload extends CInputWidget{
	public $uploadUrl = '';
	public $dataType = 'json';
	public $fileShowId = '';
	public $fileElementId = '';
	public $fileImgClass = '';
	public $uploadView = '';
	public $file_input_name = '';
	public $file_input_img_name = '';
	public $file_input_img_name_replace = '';
	public $file_input_imgid_name = '';
	public $file_input_imgid_name_replace = '';
	public $file_input_imgid_sure = 0;
	public $file_hidden = array();
	public $isThumb = 0;
	public $data = array();
	public $allowExtention = '.jpg,.bmp,.gif,.png,.jpeg,.swf,.flv'; //允许上传文件的后缀名
	public function run() {
		list($name,$id) = $this->resolveNameID();
		$this->file_input_name = $name;
		if($this->data !== array()){
			$this->data = CJSON::encode($this->data);
		}
		$this->file_input_img_name_replace = 'input_img_name_replace';
		if(!empty($this->file_input_imgid_name)){
			$this->file_input_imgid_sure = 1;
			$this->file_input_imgid_name_replace = 'input_imgid_name_replace';
		}
		$this->renderUploadView();
		$this->buidUploadView();
		$this->registerClientScript();
		$this->createAjaxFileUploadScript();
	}
	public function registerClientScript() {
		$assets = dirname(__FILE__).'/';
		$baseUrl = Yii::app()->assetManager->publish($assets);
		$cs = Yii::app()->getClientScript();
		$cs->registerScriptFile($baseUrl . '/jquery.ajaxfileupload.js', CClientScript::POS_HEAD);
	}
	
	private function createAjaxFileUploadScript() {
		$cs = Yii::app()->getClientScript();
		$cs->registerScript(__CLASS__.'#'.$this->fileElementId,"jQuery('body').on('change', '#{$this->fileElementId}', function(){
			$.ajaxFileUpload(".$this->buildAjaxFileUploadOptions().");
		})");
	}
	private function buildAjaxFileUploadOptions() {
		$js = "{
			url:'{$this->uploadUrl}',
			secureuri:false,
			data:{$this->data},
			fileElementId:'{$this->fileElementId}',
			dataType : '{$this->dataType}',
			success: function(data, status){
				if(data.state){
					var container = $('#{$this->fileShowId}');
					if(container.length > 0){
						var newcontainer = $('{$this->uploadView}');
						newcontainer.find('.{$this->fileImgClass}').attr('src',data.msg.src_img);
						newcontainer.find('.{$this->file_input_img_name_replace}').val(data.msg.src_img);
						container.append(newcontainer);
					}		
				}else{
					alert(data.msg);
				}
			}
		}";
		
		return $js;
	}
	private function renderUploadView() {
		if($this->hasModel())
			echo CHtml::activeFileField($this->model,$this->attribute,$this->htmlOptions);
		else
			echo CHtml::fileField($this->file_input_name,'',$this->htmlOptions);
		if(!empty($this->file_hidden_input_id))
			echo CHtml::hiddenField($this->file_hidden_input_name,$this->value,array('id'=>$this->file_hidden_input_id));
	}
	private function buidUploadView(){
		$this->uploadView = '<div class="col-xs-11 col-sm-3 nopadding">';
		$this->uploadView .= CHtml::hiddenField($this->file_input_img_name,'',array('class'=>$this->file_input_img_name_replace));
		if(!empty($this->file_input_imgid_name)){
			$this->uploadView .= CHtml::hiddenField($this->file_input_imgid_name,'',array('class'=>$this->file_input_imgid_name_replace));
		}
		if($this->file_hidden !== array()){
			foreach ($this->file_hidden as $key=>$_hidden){
				$this->uploadView .= CHtml::tag($key,$_hidden);
			}
		}
		$this->uploadView .= '</div>';
	}
}