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
class AjaxFileUpload extends CInputWidget{
    public $uploadUrl = "";
    public $dataType = "json";
    public $fileElementId = "";
    public $fileImgId = "";
    public $fileTextId = "";
    public $file_input_name = "";
    public $file_hidden_input_id = "";
    public $file_hidden_input_name = "";
    public $data = array();
    public $allowExtention = '.jpg,.bmp,.gif,.png,.jpeg,.swf,.flv'; //允许上传文件的后缀名
    public function run() {
        list($name,$id) = $this->resolveNameID();
        $this->file_input_name = $name;
        if($this->data !== array()){
            $this->data = CJSON::encode($this->data);
        }
        $this->renderUploadView();
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
        if(!empty($this->file_hidden_input_id)){
            $js = "{
				url:'{$this->uploadUrl}',
				secureuri:false,
				data:{$this->data},
				fileElementId:'{$this->fileElementId}',
				dataType : '{$this->dataType}',
				success: function(data, status){
					if(data.state){
						$('#{$this->fileImgId}').attr('src',data.msg);
						$('#{$this->file_hidden_input_id}').val(data.msg);
                        $('#{$this->fileTextId}').html(data.msg);    
					}else{
						alert(data.msg);
					}
				}
			}";
        }else{
            $js = "{
				url:'{$this->uploadUrl}',
				secureuri:false,
				data:{$this->data},
				fileElementId:'{$this->fileElementId}',
				dataType : '{$this->dataType}',
				success: function(data, status){
					if(data.state){
                        $('#{$this->fileImgId}').attr('src',data.msg);
                    }else{
                       	alert(data.msg);
                    }
              }
			}";
        }
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
}