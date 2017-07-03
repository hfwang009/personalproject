<?php

Yii::import('application.extensions.upload.Upload');
Yii::import('application.extensions.upload.RemoteUpload');
Yii::import('application.extensions.upload.SavePicToLocal');
/**
 * Description of CImageComponent
 *
 * @author Administrator
 */
class CUploadComponent extends CApplicationComponent
{
	public $iswatermark = true;
	public $watermark_position = 'BR';
	public $isthumb = true;
	public $thumb_width = 100;
	public $thumb_height = 100;
	public $images_url = "";
	public $files_url = "";
	public $video_url = "";
	public $images_path = "";
	public $files_path = "";
	public $video_path = "";
	public $jpeg_quality = 100;

	public function init() {
		$this->images_path = Yii::app()->assetManager->basePath . '/upload/images/' . date("Ymd") . '/';
		$this->files_path = Yii::app()->assetManager->basePath . '/upload/files/' . date("Ymd") . '/';
		$this->video_path = Yii::app()->assetManager->basePath . '/upload/video/' . date("Ymd") . '/';
		$this->images_url = Yii::app()->assetManager->baseUrl . '/upload/images/' . date("Ymd") . '/';
		$this->files_url = Yii::app()->assetManager->baseUrl . '/upload/files/' . date("Ymd") . '/';
		$this->video_url = Yii::app()->assetManager->baseUrl . '/upload/video/' . date("Ymd") . '/';
		parent::init();
	}

    public function load($file, $class='Upload')
    {
        return new $class($file);
    }
    
    public function parse(array $file) {
    	$fileArr = array();
    	if (is_array($file) && !empty($file)) {
    		foreach ($file as $key => $val) {
    			foreach ($val as $_k => $_v) {
    				$fileArr[$_k][$key] = $_v;
    			}
    		}
    	}
    	
    	return $fileArr;
    }
}
?>
