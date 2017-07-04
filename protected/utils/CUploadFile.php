<?php
/**
 *      [超级工作室] (C)2014-2025 柏嘉集团科技有限公司.
 */
?>
<?php 

class CUploadFile 
{
	public $id = '';
	
	public $file_path = '';
	
    public $targetDir = '';
    
    public $uploadDir = '';
	
	public $filePath = '';
        
    public $fileName = '';
        
    public $chunk = '';
    
    public $chunks = '';
    
    public $maxFileAge = 18000;
    
    public $cleanupTargetDir = true;
    
    public $path_id = '';
    
    public $file_size = '';
    
    public $ext = '';
    
    public function __construct($files)
    {
    	$this->id = $files['id'];
    	
    	$this->fileName = $this->getFileName($files['name']);
    	
    	$this->uploadDir = $files['uploadDir'];
    	
    	$this->targetDir = $files['targetDir'];
    	
    	$this->file_path = $files['filePath'];
    	$this->chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
    	$this->chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;
    	$this->file_size = $files['size'];
    	
    }
    
	public function upload(){

		$this->filePath = $this->targetDir;
		
		$this->mkdir();
		
		$ext = strrchr($this->fileName,".");
		$file_name = md5($this->fileName) . rand(1000000000,time()) . $ext;
		
		$filePath = $this->filePath . md5($this->fileName).$ext;
		$uploadPath = $this->uploadDir . $file_name;
		
		$this->file_path = $this->file_path . $file_name;
		// Remove old temp files
		if ($this->cleanupTargetDir) {
			if (!is_dir($this->targetDir) || !$dir = opendir($this->targetDir)) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "'.$this->id.'"}');
			}
		
			while (($file = readdir($dir)) !== false) {
				$tmpfilePath = $this->targetDir . DIRECTORY_SEPARATOR . $file;
		
				// If temp file is current file proceed to the next
				if ($tmpfilePath == "{$filePath}_{$this->chunk}.part" || $tmpfilePath == "{$filePath}_{$this->chunk}.parttmp") {
					continue;
				}
		
				// Remove temp file if it is older than the max age and is not the current file
				if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $this->maxFileAge)) {
					@unlink($tmpfilePath);
				}
			}
			closedir($dir);
		}


		// Open temp file
		if (!$out = @fopen("{$filePath}_{$this->chunk}.parttmp", "wb")) {
			die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed000 to open output stream."}, "id" : "'.$this->id.'"}');
		}

		if (!empty($_FILES)) {
			if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "'.$this->id.'"}');
			}

			// Read binary input stream and append it to temp file
			if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open output stream."}, "id" : "'.$this->id.'"}');
			}
		} else {
			if (!$in = @fopen("php://input", "rb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open output stream."}, "id" : "'.$this->id.'"}');
			}
		}
		
		while ($buff = fread($in, 4096)) {
			fwrite($out, $buff);
		}
		
		@fclose($out);
		@fclose($in);
		
		rename("{$filePath}_{$this->chunk}.parttmp", "{$filePath}_{$this->chunk}.part");
		
		$index = 0;
		$done = true;
		for( $index = 0; $index < $this->chunks; $index++ ) {
			if ( !file_exists("{$filePath}_{$index}.part") ) {
				$done = false;
				break;
			}
		}
		if ( $done ) {
			if (!$out = @fopen($uploadPath, "wb")) {
				die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "'.$this->id.'"}');
			}
		
			if ( flock($out, LOCK_EX) ) {
				for( $index = 0; $index < $this->chunks; $index++ ) {
					if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
						break;
					}
		
					while ($buff = fread($in, 4096)) {
						fwrite($out, $buff);
					}
		
					@fclose($in);
					@unlink("{$filePath}_{$index}.part");
				}
		
				flock($out, LOCK_UN);
			}
			@fclose($out);
			$result = $this->getFileInfo();
		}else{
			$result = array('uploaded'=>false);
		}
		
		// Return Success JSON-RPC response
		return array("jsonrpc"=>"2.0","result"=>$result,"id"=>$this->id);
	}
	
	// Create target dir
	public function mkdir(){
		if (!file_exists($this->filePath)) {
			@mkdir($this->filePath,0777,true);
		}
		if (!file_exists($this->uploadDir)) {
			@mkdir($this->uploadDir,0777,true);
		}
	}
	
	public function mime_content_type() {
		$filename = $this->fileName;
		$path = $this->uploadDir;
		
        $mime_types = array(
        	'dwg'=>'application/acad',
            'txt'  => 'text/plain',
            'htm'  => 'text/html',
            'html' => 'text/html',
            'php'  => 'text/html',
            'css'  => 'text/css',
            'js'   => 'application/javascript',
            'json' => 'application/json',
            'xml'  => 'application/xml',
            'swf'  => 'application/x-shockwave-flash',
            'flv'  => 'video/x-flv',
            'bmp'  => 'image/bmp',
            'cod'  => 'image/cis-cod',
            'gif'  => 'image/gif',
            'ief'  => 'image/ief',
            'jpe'  => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'jpg'  => 'image/jpeg',
            'jfif' => 'image/pipeg',
            'svg'  => 'image/svg+xml',
            'tif'  => 'image/tiff',
            'tiff' => 'image/tiff',
            'ras'  => 'image/x-cmu-raster',
            'cmx'  => 'image/x-cmx',
            'ico'  => 'image/x-icon',
            'png'  => 'image/png',
            'pnm'  => 'image/x-portable-anymap',
            'pbm'  => 'image/x-portable-bitmap',
            'pgm'  => 'image/x-portable-graymap',
            'ppm'  => 'image/x-portable-pixmap',
            'rgb'  => 'image/x-rgb',
            'xbm'  => 'image/x-xbitmap',
            'xpm'  => 'image/x-xpixmap',
            'xwd'  => 'image/x-xwindowdump',
            'svgz' => 'image/svg+xml',
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            'exe' => 'application/x-msdownload',
            'msi' => 'application/x-msdownload',
            'cab' => 'application/vnd.ms-cab-compressed',
            'au'   => 'audio/basic',
            'snd'  => 'audio/basic',
            'mid'  => 'audio/mid',
            'rmi'  => 'audio/mid',
            'mp3'  => 'audio/mpeg',
            'aif'  => 'audio/x-aiff',
            'aifc' => 'audio/x-aiff',
            'aiff' => 'audio/x-aiff',
            'm3u'  => 'audio/x-mpegurl',
            'ra'   => 'audio/x-pn-realaudio',
            'ram'  => 'audio/x-pn-realaudio',
            'wav'  => 'audio/x-wav',
            'ape'  => 'audio/x-monkeys-audio',
            'wma'  => 'audio/x-ms-wma',
            'wvx'  => 'audio/x-ms-wvx',
            'mp4'   => 'video/mp4',
            'qt'    => 'video/quicktime',
            'mov'   => 'video/quicktime',
            '3gp'   => 'video/3gpp',
            'wmv'   => 'video/x-ms-wmv',
            'avi'   => 'video/x-msvideo',
            'mp2'   => 'video/mpeg',
            'mpa'   => 'video/mpeg',
            'mpe'   => 'video/mpeg',
            'mpeg'  => 'video/mpeg',
            'mpg'   => 'video/mpeg',
            'mpv2'  => 'video/mpeg',
            'mov'   => 'video/quicktime',
            'qt'    => 'video/quicktime',
            'lsf'   => 'video/x-la-asf',
            'lsx'   => 'video/x-la-asf',
            'asf'   => 'video/x-ms-asf',
            'asr'   => 'video/x-ms-asf',
            'asx'   => 'video/x-ms-asf',
            'avi'   => 'video/x-msvideo',
            'movie' => 'video/x-sgi-movie',
            'rmvb'  => 'video/vnd.rn-realvideo',
            'rm'    => 'video/vnd.rn-realvideo',
            'viv'   => 'video/vnd.vivo',
            'vivo'  => 'video/vnd.vivo',
            'pdf' => 'application/pdf',
            'psd' => 'image/vnd.adobe.photoshop',
            'ai'  => 'application/postscript',
            'eps' => 'application/postscript',
            'ps'  => 'application/postscript',
            'doc'  => 'application/msword',
            'docx' => 'application/msword',
            'rtf'  => 'application/rtf',
            'xls'  => 'application/msexcel',
            'xlsx' => 'application/msexcel',
            'ppt'  => 'application/mspowerpoint',
            'pptx' => 'application/mspowerpoint',
            'odt' => 'application/vnd.oasis.opendocument.text',
            'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
            'apk' => 'application/vnd.android.package-archive',
        );
        $ext = explode('.',$filename);
        $ext = strtolower(array_pop($ext));
        $this->ext = $ext;
        if (array_key_exists($ext, $mime_types)) {
            return $mime_types[$ext];
        }
        elseif (function_exists('finfo_open') && !empty($path)) {
            $fileInfo = finfo_open(FILEINFO_MIME);
            $mimeType = finfo_file($fileInfo, $path);
            finfo_close($fileInfo);
            return $mimeType;
        }
        else {
            return 'application/octet-stream';
        }
	} 
	
	public function getFileName($file_name){
		if (!empty($file_name)) {
			$fileName = $file_name;
		} elseif (!empty($_FILES)) {
			$fileName = $_FILES["file"]["name"];
		} else {
			$fileName = uniqid("file_");
		}
		return $fileName;
	}
	
	public function getFileInfo(){
		$info = array();
		$info['uploaded']  = true;
		$info['file_name'] = $this->fileName;
		$info['file_path'] = $this->file_path;
		$info['file_size'] = $this->file_size;
		$info['mime_type'] = $this->mime_content_type();
		return $info;
	}
}
?>