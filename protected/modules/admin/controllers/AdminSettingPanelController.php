<?php
class AdminSettingPanelController extends CAdminController{
	public $column = 'setting';
	
	//站点信息
	public function actionIndex(){
		$configModel = Config::model();
		if (!empty($_POST['Config'])) {
			foreach ($_POST['Config']['datavalue'] as $key => &$val) {
                if($key=='group'){
                    $arr = $this->getMulUpload();
                    $val = $this->uploadImage($val,$arr);
                }
				if (is_array($val))
					$val = serialize($val);
				$configModel = Config::model()->findByPk($key);
				if ($configModel) {
					$configModel->var = $key;
					$configModel->datavalue = $val;
				}else {
					$configModel = new Config();
					$configModel->var = $key;
					$configModel->datavalue = $val;
				}
				if($configModel->save()){
					$configModel->success = true;
				}
			}
//		exit;
			$this->cache_write();
		}
		$config = $configModel->getData();
		$this->render('index', array('model'=>$configModel, 'config'=>$config));
	}

	//文件存储位置
	public function actionFilePath() {
		$configModel = Config::model();
		if (!empty($_POST['Config'])) {
			foreach ($_POST['Config']['datavalue'] as $key => $val) {
				if (is_array($val))
					$val = serialize($val);
				$configModel = Config::model()->findByPk($key);
				if ($configModel) {
					$configModel->var = $key;
					$configModel->datavalue = $val;
				}else {
					$configModel = new Config();
					$configModel->var = $key;
					$configModel->datavalue = $val;
				}
				if($configModel->save()){
					$configModel->success = true;
				}
			}
		
			$this->cache_write();
		}
		$config = $configModel->getData();
		$this->render('filepath', array('model'=>$configModel, 'config'=>$config));
	}

    public function actionError(){
        $this->column = '';
        $this->render('error');
    }

    //友情链接
    public function actionSet() {
        if (!empty($_POST['Config'])) {
            foreach ($_POST['Config']['datavalue'] as $key => $val) {
                if (is_array($val))
                    $val = serialize($val);
                $configModel = Config::model()->findByPk($key);
                if ($configModel) {
                    $configModel->var = $key;
                    $configModel->datavalue = $val;
                    $configModel->save();
                }
                else {
                    $configModel = new Config();
                    $configModel->var = $key;
                    $configModel->datavalue = $val;
                    $configModel->save();
                }
            }
            $this->cache_write();
        }

        $model = Config::model();
        $config = $model->getData();

        $this->render('set', array (
            'model' => $model,
            'config'=>$config
        ));
    }

    //友情链接
    public function actionSysSet() {
        if (!empty($_POST['Config'])) {
            foreach ($_POST['Config']['datavalue'] as $key => $val) {
                if (is_array($val))
                    $val = serialize($val);
                $configModel = Config::model()->findByPk($key);
                if ($configModel) {
                    $configModel->var = $key;
                    $configModel->datavalue = $val;
                    $configModel->save();
                }
                else {
                    $configModel = new Config();
                    $configModel->var = $key;
                    $configModel->datavalue = $val;
                    $configModel->save();
                }
            }
            $this->cache_write();
        }

        $model = Config::model();
        $config = $model->getData();

        $this->render('systemset', array (
            'model' => $model,
            'config'=>$config
        ));
    }

    public function actionLogin(){
        $this->render('login');
    }

    //上传网站logo
    public function actionUpload(){
        $state = false;
        $message = '';
        $file = $_FILES['Site'];
        $file_name = $file['name']['logo'];
        $file_size = $file['size']['logo'];
        if(!$this->getImageType($file_name)){
            $message = '仅支持.jpg,.bmp,.gif,.png为后缀名的文件!';
        }elseif($file_size > 2097152){
            $message = '上传图片不能超过2MB';
        }else{
            $imgArr = $this->upladImage('logo','Site','logo');
            if(!($imgArr === array())){
                $state = true;
                $message = $imgArr['src_img'];
            }
        }
        echo CJSON::encode( CUtils::retMessage ( $state, 1, $message ) );
        Yii::app ()->end ();
    }

    //ajax 设置
    public function actionSetting(){
        $ct = Yii::app ()->request->getParam ( 'ct', '-1' );
        $ac = Yii::app ()->request->getParam ( 'ac', '-1' );
        if ($ct == "-1" || $ac == "-1") {
            echo CJSON::encode ( CUtils::retCode ( false, 0, '参数错误' ) );
            Yii::app ()->end ();
        }
        if($ct == "setting" && $ac == "createLink"){
            $this->createLink();
        }else{
            echo CJSON::encode(CUtils::retCode(false, 0, '参数错误'));
            Yii::app ()->end ();
        }
    }

    //上传图片
    private function upload_image($type,$modelName,$modelAttr,$width,$height,&$val){
        $images = $this->uploadImages($type,$modelName,$modelAttr,$width,$height);
        if(!empty($images) && $images !== array()){
            foreach ($images as $key=>$_image){
                if(!empty($_image)){
                    if($type == 'linkImg'){
                        $val['datavalue']['link'][$key]['image'] = $_image['src_img'];
                    }elseif($type == 'partnerImg'){
                        $val['datavalue']['partner'][$key]['image'] = $_image['src_img'];
                    }
                }
            }
        }
    }
	
	private function cache_write() {
		$cacheData = Config::model()->getData();
		$cacheText = "<?php\r\n".
				"return array(\r\n";
		foreach ($cacheData as $key => $val) {
			$cacheText .= "\t'$key' => " . $this->arrayeval($val);
		}
		$cacheText .= "\r\n)\r\n?>";

		$fp = fopen(Yii::app()->basePath . "/config/config.php", "w+");
		fwrite($fp, $cacheText);
		fclose($fp);
	}
	
	private function arrayeval($array, $level = 1) {
		$space = '';
		for ($i = 0; $i <= $level; $i++) {
			$space .= "\t";
		}
		$evaluate = "array\n$space(\n";
		$comma = $space;
		foreach ($array as $key => $val) {
			$key = is_string($key) ? '\''.addcslashes($key, '\'\\').'\'' : $key;
			$val = !is_array($val) && (!preg_match("/^\-?\d+$/", $val) || strlen($val) > 12 || substr($val, 0, 1) == '0') ? '\''.addcslashes($val, '\'\\').'\'' : $val;
			if (is_array($val)) {
				$evaluate .= "$comma$key => ".$this->arrayeval($val, $level+1);
			}
			else {
				$evaluate .= "$comma$key => $val";
				$comma = ",\n$space";
			}
		}
		$evaluate .= "\n$space),\n";
	
		return $evaluate;
	}


    private function getMulUpload(){
        $file = $_FILES['Config'];
        if(empty($file['tmp_name']) || $file['tmp_name'] === array()){
            return;
        }
        $data = array();
        $arr = array();
        foreach($file as $key=>$val){
            switch($key){
                case "name":
                    foreach($file[$key] as $_key=>$_val){
                        if(is_array($val[$_key])){
                            foreach($val[$_key] as $__key=>$__val){
                                $data[$_key][$__key]['name'] = $_val[$__key]['image'];
                            }
                        }
                    }
                    break;
                case "type":
                    foreach($file[$key] as $_key=>$_val){
                        if(is_array($val[$_key])){
                            foreach($val[$_key] as $__key=>$__val){
                                $data[$_key][$__key]['type'] = $_val[$__key]['image'];
                            }
                        }
                    }
                    break;
                case "tmp_name":
                    foreach($file[$key] as $_key=>$_val){
                        if(is_array($val[$_key])){
                            foreach($val[$_key] as $__key=>$__val){
                                $data[$_key][$__key]['tmp_name'] = $_val[$__key]['image'];
                            }
                        }
                    }
                    break;
                case "error":
                    foreach($file[$key] as $_key=>$_val){
                        if(is_array($val[$_key])){
                            foreach($val[$_key] as $__key=>$__val){
                                $data[$_key][$__key]['error'] = $_val[$__key]['image'];
                            }
                        }
                    }
                    break;
                case "size":
                    foreach($file[$key] as $_key=>$_val){
                        if(is_array($val[$_key])){
                            foreach($val[$_key] as $__key=>$__val){
                                $data[$_key][$__key]['size'] = $_val[$__key]['image'];
                            }
                        }
                    }
                    break;
            }
        }
        print_r($data);
        foreach($data as $k=>$v){
            switch($k){
                case "group":
                    foreach($data[$k] as $_k=>$_v){
                        if($_v['error']=='0'){
                            $arr[] = 'Config[group]['.$_k.'][image]';
                        }
                    }
                    break;
            }
        }
        return $arr;
    }

    private function uploadImage($data,$arr){
        if(!empty($arr)){
            foreach($arr as $a=>$b){
                $_file = CUploadedFile::getInstanceByName ( $b );
                if (! empty ( $_file )) {
                    $_name = $_file->name;
                    $_newName = $this->generateFileName ( $_name );
//                    print_r($b);exit;
                    if ($this->_saveMulFile ( $_file, $_newName ,$b)) {
                        if(strpos($b,'group')){
                            preg_match_all("/\d/",$b,$number);
                            $data[$number[0][0]]['image'] = str_replace(Yii::app()->params['conf']['path']['systemfile'], '', Yii::app()->params['conf']['path']['defaultfile']) . $_newName;
                        }
                    } else {
                        return false;
                    }
                }
            }
        }
        return $data;
    }

    private function _saveMulFile($file, $new_name ,$name) {
        if(strpos($name,'group')){
            $savePath = Yii::app()->params['conf']['path']['defaultfile'];
        }elseif(strpos($name,'group')){
            $savePath = Yii::app()->params['conf']['path']['defaultfile'];
        }
        if (file_exists ( $savePath ) == false) {
            @mkdir($savePath,0777);
        }
        $file->saveAs ( $savePath . $new_name );
        return true;
    }

    private function generateFileName($name){
        $path_parts = pathinfo ( $name );
        $extension = $path_parts ['extension'];
        $sha1_name = sha1 ( $name . date ( 'U' ) ) . "." . $extension;
        return $sha1_name;
    }
}