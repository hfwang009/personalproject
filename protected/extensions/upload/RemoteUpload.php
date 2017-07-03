<?php
class RemoteUpload {

	public $iswatermark = true;
	public $isthumb = true;
	public $thumb_width = 100;
	public $thumb_height = 100;
	public $file = '';
	public $remote = '';
	public $file_name = '';

	public function __construct($file) {
		$this->file = $file;
	}

	public function upload(){
		if (empty($this->file))
			return false;
			
		if (empty($this->remote))
			return false;

		$data['upfile'] = "@".$this->file;
		$data['src_name'] = $this->file_name;
		$data['watermark'] = $this->iswatermark;
		$data['thumb'] = $this->isthumb;
		$data['thumb_width'] = $this->thumb_width;
		$data['thumb_height'] = $this->thumb_height;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $this->remote);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$rs = curl_exec($ch);
		curl_close($ch);

		return json_decode($rs, true);
	}
}
?>
