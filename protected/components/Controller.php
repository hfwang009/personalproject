<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	public $column = '';

    public $title = '';

    public $keyword = '';

    public $description = '';

    public $client_flag = false;

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout='//';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu=array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs=array();

    public $news;
    public $callus;
    public $aboutus;

    /*
     * @var 全局变量$language
     */
    public $language = 'zn';

    /**
     * 
     * 格式化数组输出
     * @param unknown_type $vars
     * @param unknown_type $label
     * @param unknown_type $return
     */
    function dump($vars, $label = '', $return = false) {
        if (ini_get ( 'html_errors' )) {
            $content = "<pre>\n";
            if ($label != '') {
                $content .= "<strong>{$label} :</strong>\n";
            }
            $content .= htmlspecialchars ( print_r ( $vars, true ) );
            $content .= "\n</pre>\n";
        } else {
            $content = $label . " :\n" . print_r ( $vars, true );
        }
        if ($return) {
            return $content;
        }
        echo $content;
        return null;
    }

    public function init(){
        $news = News::model()->getAllNews();
        shuffle($news);
        $this->news = count($news)>=5?array_slice($news,0,5):$news;
        $this->aboutus = Yii::app()->params['conf']['site']['aboutus'];
        $this->callus = Yii::app()->params['conf']['site']['siteCallus'];
        return $this->news;
    }
    
    /**
	 *
	 *
	 * 跳转信息提示
	 * 
	 * @param unknown_type $url        	
	 * @param unknown_type $message        	
	 * @param unknown_type $status        	
	 * @param unknown_type $time        	
	 * @author hwy
	 */
	public function redirect_message($url = false, $message = '成功', $status = 'success', $view = '_show') {
		$this->layout = '//';
		$this->column = 'app';
		if($status == 'success') {
			if (is_array ( $url )) {
				$route = isset ( $url [0] ) ? $url [0] : '';
				$url = $this->createUrl ( $route, array_splice ( $url, 1 ) );
			}
			if ($url) {
				$url = "window.location.href='" . $url . "';";
			}else {
				$url = "history.back();";
			}
		}elseif($status == 'close'){
			$url = "window.opener=null;window.open('','_self');window.close();";
		}elseif($status == 'return'){
			if ($url) {
				$url = "window.location.href='" . $url . "';";
			}else {
				$url = "window.location.href='" . Yii::app()->request->urlReferrer . "';";
			}
		}
		$this->render ( '../redirect/' . $view, array (
				'message' => $message,
				'url' => $url,
		) );
	}
    
    /**
	 * 字符截取 支持UTF8/GBK
	 * @param $string
	 * @param $length
	 * @param $dot
	 */
	public function str_cut($string, $length, $dot = '...', $charset = 'utf-8') {
		$strlen = strlen($string);
		if($strlen <= $length) return $string;
		$string = str_replace(array(' ','&nbsp;', '&amp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;'), array('∵',' ', '&', '"', "'", '“', '”', '—', '<', '>', '·', '…'), $string);
		$strcut = '';
		if(strtolower($charset) == 'utf-8') {
			$length = intval($length-strlen($dot)-$length/3);
			$n = $tn = $noc = 0;
			while($n < strlen($string)) {
				$t = ord($string[$n]);
				if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
					$tn = 1; $n++; $noc++;
				} elseif(194 <= $t && $t <= 223) {
					$tn = 2; $n += 2; $noc += 2;
				} elseif(224 <= $t && $t <= 239) {
					$tn = 3; $n += 3; $noc += 2;
				} elseif(240 <= $t && $t <= 247) {
					$tn = 4; $n += 4; $noc += 2;
				} elseif(248 <= $t && $t <= 251) {
					$tn = 5; $n += 5; $noc += 2;
				} elseif($t == 252 || $t == 253) {
					$tn = 6; $n += 6; $noc += 2;
				} else {
					$n++;
				}
				if($noc >= $length) {
					break;
				}
			}
			if($noc > $length) {
				$n -= $tn;
			}
			$strcut = substr($string, 0, $n);
			$strcut = str_replace(array('∵', '&', '"', "'", '“', '”', '—', '<', '>', '·', '…'), array(' ', '&amp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;'), $strcut);
		} else {
			$dotlen = strlen($dot);
			$maxi = $length - $dotlen - 1;
			$current_str = '';
			$search_arr = array('&',' ', '"', "'", '“', '”', '—', '<', '>', '·', '…','∵');
			$replace_arr = array('&amp;','&nbsp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;',' ');
			$search_flip = array_flip($search_arr);
			for ($i = 0; $i < $maxi; $i++) {
				$current_str = ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
				if (in_array($current_str, $search_arr)) {
					$key = $search_flip[$current_str];
					$current_str = str_replace($search_arr[$key], $replace_arr[$key], $current_str);
				}
				$strcut .= $current_str;
			}
		}
		return $strcut.$dot;
	}
    
    /**
     * 跳转到某个页面,并提示.
     *
     * @param String $msg
     * @param String $url
     * @return String 返回一个javascript 代码。
     */
    public function alertgo($msg, $url = '', $js = '', $js_run = false) {
        $script = '';
        if (!headers_sent ()) {
            header("Content-type: text/html; charset=utf-8"); 
        }
        $script .= "<script language='javascript'>" . chr ( 13 );
        if (trim ( $msg ) != "") {
            $script .= "alert('" . $msg . "');" . chr ( 13 );
        }
        if (trim ( $url ) != "") {
            $script .= "location.href='" . $url . "'" . chr ( 13 );
        }
        $script .= "</" . "script>" . chr ( 13 );
        if ($js_run) {
            $script = $js . chr ( 13 ) . $script;
        }
        print $script;
        exit ();
    }
    
    protected function getImageType($filename){
    	$mime_types = array(
    			'gif'  => 'image/gif',
    			'ief'  => 'image/ief',
    			'jpe'  => 'image/jpeg',
    			'jpeg' => 'image/jpeg',
    			'jpg'  => 'image/jpeg',
    			'jfif' => 'image/pipeg',
    			'bmp'  => 'image/bmp',
    			'png'  => 'image/png',
    	);
    	$ext = explode('.',$filename);
    	$ext = strtolower(array_pop($ext));
    	if (array_key_exists($ext, $mime_types)) {
    		return $mime_types[$ext];
    	}
    	return false;
    }
    //单个图片上传
    protected function upladImage($type,$modelName,$modelAttr="",$width=0,$height=0,$iswatermark=false,$isthumb=false,$thumb_width=100,$thumb_height=100){
    	$imgArr = array();
    	if(!empty($_FILES[$modelName]['tmp_name'][$modelAttr])){
    		$this->setUplodaPath($type);
    		$upfile = Yii::app()->upload->parse($_FILES[$modelName]);
    		$image = Yii::app()->upload->load($upfile[$modelAttr]);
    		if ($image->file_is_image) {
    			if ($image->uploaded) {
    				$image->jpeg_quality = Yii::app()->upload->jpeg_quality;
    				if ($iswatermark) {
    					$image->image_watermark = Yii::app()->assetManager->basePath . '/watermark/watermark.png';
    					$image->image_watermark_position = Yii::app()->upload->watermark_position;
    				}
    				$image->file_new_name_body = time();
    				$image->image_resize = false;
    				if (intval($width) > 0) {
	    				$image->image_resize = true;
    					$image->image_x = $width;
    				}else{
    					$image->image_ratio_x = true;
    				}
    				if (intval($height) > 0) {
    					$image->image_y = $height;
    				}else{
    					$image->image_ratio_y = true;
    				}
    				$image->Process(Yii::app()->upload->images_path);
    				if ($image->processed) {
    					$imgArr = array('src_img' => Yii::app()->upload->images_url . $image->file_dst_name);
    					//Create thumb image
    					if ($isthumb) {
    						if ($iswatermark) {
    							$image->image_watermark = Yii::app()->assetManager->basePath . '/watermark/watermark_thumb.png';
    							$image->image_watermark_position = Yii::app()->upload->watermark_position;
    						}
    						$image->image_convert = $image->file_dst_name_ext;
    						$image->file_new_name_body = "thumb_" . $image->file_dst_name_body;
    						$image->image_resize = true;
    						if (intval($thumb_width) > 0) {
    							$image->image_x = $thumb_width;
    						}else{
    							$image->image_ratio_x = true;
    						}
    						if (intval($thumb_height) > 0) {
    							$image->image_y = $thumb_height;
    						}else{
    							$image->image_ratio_y = true;
    						}
    						$image->Process(Yii::app()->upload->images_path);
    						if ($image->processed)
    							$imgArr['thumb_img'] = Yii::app()->upload->images_url . $image->file_dst_name;
    					}
    				}
    			}
    		}
    	}
    	return $imgArr;
    }
    //多个图片上传
    protected function uploadImages($type,$modelName,$modelAttr="",$width=0,$height=0,$iswatermark=false,$isthumb=false,$thumb_width=100,$thumb_height=100){
    	$imgArr = array();
    	if(!empty($_FILES[$modelName]['tmp_name'][$modelAttr])){
    		$this->setUplodaPath($type);
    		$upfile = $this->getUploadFiles($_FILES[$modelName],$modelAttr);
    		foreach ($upfile as $_key => $_val) {
    			$temp = array();
    			$image = Yii::app()->upload->load($_val);
    			if ($image->file_is_image) {
    				if ($image->uploaded) {
    					$image->jpeg_quality = Yii::app()->upload->jpeg_quality;
    					if ($iswatermark) {
    						$image->image_watermark = Yii::app()->assetManager->basePath . '/watermark/watermark.png';
    						$image->image_watermark_position = Yii::app()->upload->watermark_position;
    					}
    					$image->file_new_name_body = time();
    					$image->image_resize = true;
    					if (intval($width) > 0) {
    						$image->image_x = $width;
    					}else{
    						$image->image_ratio_x = true;
    					}
    					if (intval($height) > 0) {
    						$image->image_y = $height;
    					}else{
    						$image->image_ratio_y = true;
    					}
    					$image->Process(Yii::app()->upload->images_path);
    					if ($image->processed) {
    						$temp = array('src_img' => Yii::app()->upload->images_url . $image->file_dst_name);;
    						//Create thumb image
    						if ($isthumb) {
    							if ($iswatermark) {
    								$image->image_watermark = Yii::app()->assetManager->basePath . '/watermark/watermark_thumb.png';
    								$image->image_watermark_position = Yii::app()->upload->watermark_position;
    							}
    							$image->image_convert = $image->file_dst_name_ext;
    							$image->file_new_name_body = "thumb_" . $image->file_dst_name_body;
    							$image->image_resize = true;
    							if (intval($thumb_width) > 0) {
    								$image->image_x = $thumb_width;
    							}else{
    								$image->image_ratio_x = true;
    							}
    							if (intval($thumb_height) > 0) {
    								$image->image_y = $thumb_height;
    							}else{
    								$image->image_ratio_y = true;
    							}
    							$image->Process(Yii::app()->upload->images_path);
    							if ($image->processed)

    								$temp['thumb_img'] = Yii::app()->upload->images_url . $image->file_dst_name;
    						}
    					}
    				}
    			}
    			$imgArr[] = $temp;
    		}
    	}
    	return $imgArr;
    }
    //多图片上传文件获取
    protected function getUploadFiles($files,$attr){
    	$fileArr = array();
    	if (is_array($files) && !empty($files)) {
    		foreach ($files as $key => $val) {
    			foreach ($val as $_k => $_v) {
    				if($_k == $attr){
    					foreach ($_v as $m=>$_a){
	    					$fileArr[$m][$key] = $_a;
    					}	
	    			}
    			}	
    		}
    	}
    	return $fileArr;
    }
    //设置上传路径
    protected function setUplodaPath($type){
    	$path = Yii::app()->params['conf']['path'];
    	switch ($type){
    		case 'logo':
    			Yii::app()->upload->images_path = $path['defaultfile'];
    			Yii::app()->upload->images_url = Yii::app()->baseUrl . '/' . str_replace($path['systemfile'], '', $path['defaultfile']);
    			break;
    		default:
    			Yii::app()->upload->images_path = $path['defaultfile'];
    			Yii::app()->upload->images_url = Yii::app()->baseUrl . '/' . str_replace($path['systemfile'], '', $path['defaultfile']);
    			break;
    	}
    }
    
    /**
     * 对 MYSQL LIKE 的内容进行转义
     *
     * @access      public
     * @param       string      string  内容
     * @return      string
     */
    public function mysql_like_quote($str)
    {
    	return strtr($str, array("\\\\" => "\\\\\\\\", '_' => '\_', '%' => '\%', "\'" => "\\\\\'"));
    }

    /**
     * 友好的时间显示
     *
     * @param int    $sTime 待显示的时间
     * @param string $type  类型. normal | mohu | full | ymd | other
     * @param string $alt   已失效
     * @return string
     */
    public function friendlyDate($sTime,$type = 'normal',$alt = 'false') {
    	if (!$sTime)
    		return '';
    	//sTime=源时间，cTime=当前时间，dTime=时间差
    	$cTime      =   time();
    	$dTime      =   $cTime - $sTime;
    	$dDay       =   intval(date("z",$cTime)) - intval(date("z",$sTime));
    	//$dDay     =   intval($dTime/3600/24);
    	$dYear      =   intval(date("Y",$cTime)) - intval(date("Y",$sTime));
    	//normal：n秒前，n分钟前，n小时前，日期
    	if($type=='normal'){
    		if( $dTime < 60 ){
    			if($dTime < 10){
    				return '刚刚';    //by yangjs
    			}else{
    				return intval(floor($dTime / 10) * 10)."秒前";
    			}
    		}elseif( $dTime < 3600 ){
    			return intval($dTime/60)."分钟前";
    			//今天的数据.年份相同.日期相同.
    		}elseif( $dYear==0 && $dDay == 0  ){
    			//return intval($dTime/3600)."小时前";
    			return '今天'.date('H:i',$sTime);
    		}elseif($dYear==0){
    			return date("m月d日 H:i",$sTime);
    		}else{
    			return date("Y-m-d H:i",$sTime);
    		}
    	}elseif($type=='mohu'){
    		if( $dTime < 60 ){
    			return $dTime."秒前";
    		}elseif( $dTime < 3600 ){
    			return intval($dTime/60)."分钟前";
    		}elseif( $dTime >= 3600 && $dDay == 0  ){
    			return intval($dTime/3600)."小时前";
    		}elseif( $dDay > 0 && $dDay<=7 ){
    			return intval($dDay)."天前";
    		}elseif( $dDay > 7 &&  $dDay <= 30 ){
    			return intval($dDay/7) . '周前';
    		}elseif( $dDay > 30 ){
    			return intval($dDay/30) . '个月前';
    		}
    		//full: Y-m-d , H:i:s
    	}elseif($type=='full'){
    		return date("Y-m-d , H:i:s",$sTime);
    	}elseif($type=='ymd'){
    		return date("Y-m-d",$sTime);
    	}elseif($type=='day'){
    		if( $dYear==0 && $dDay == 0  ){
    			//return intval($dTime/3600)."小时前";
    			return '今天'.date('H:i',$sTime);
    		}elseif($dYear==0){
    			return date("m月d日 H:i",$sTime);
    		}else{
    			return date("Y-m-d H:i",$sTime);
    		}
    	}else{
    		if( $dTime < 60 ){
    			return $dTime."秒前";
    		}elseif( $dTime < 3600 ){
    			return intval($dTime/60)."分钟前";
    		}elseif( $dTime >= 3600 && $dDay == 0  ){
    			return intval($dTime/3600)."小时前";
    		}elseif($dYear==0){
    			return date("Y-m-d H:i:s",$sTime);
    		}else{
    			return date("Y-m-d H:i:s",$sTime);
    		}
    	}
    }
    
    function jsonDecode ($json){
    	$json = str_replace(array("\\", "\""), array("&#92;", "&#34;"), $json);
    	$parts = preg_split('@("[^"]*")|([[]{},:])|s@is', $json, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
    	foreach ($parts as $index => $part){
	    	if (strlen($part) == 1){
		    	switch ($part){
		    		case "[":
		    		case "{":
		            	$parts[$index] = "array(";
		               	break;
		         	case "]":
		          	case "}":
		             	$parts[$index] = ")";
		              	break;
		         	case ":":
		           		$parts[$index] = "=>";
		              	break;
		         	case ",":
		              	break;
		          	default:
		              	return null;
		    	}
		    }else{
		    	if ((substr($part, 0, 1) != '"') || (substr($part, -1, 1) != '"')){
		    		return null;
		    	}
		    }
	    }
	    $json = str_replace(array("&#92;", "&#34;", "$"), array("\\", "\"", "\$"), implode("", $parts));
    	return eval("return $json;");
    }

    //分词系统
    public function analysis_keyword($string){
        if(empty($string)){
            return array();
        }
        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'Phpanalysis'.DIRECTORY_SEPARATOR.'Phpanalysis.php');
        $pa = new PhpAnalysis();
        $pa->SetSource($string);

        //设置分词属性
        $pa->resultType = 2;
        $pa->differMax  = true;

        $pa->StartAnalysis();

        //获取你想要的结果
        $result = explode(',', $pa->GetFinallyResult(','));
        $result = array_unique($result);

        foreach ($result as $key => $keyword)
        {
            if (!$this->check_stop_keyword($keyword))
            {
                unset($result[$key]);
            }
            else
            {
                $result[$key] = trim($keyword);
            }
        }
        return $result;
    }

    public function check_stop_keyword($keyword)
    {
        $keyword = trim($keyword);

        if ($keyword == '')
        {
            return false;
        }

        if ($this->cjk_strlen($keyword) == 1)
        {
            return false;
        }

        if (strstr($keyword, '了') OR strstr($keyword, '的') OR strstr($keyword, '有'))
        {
            return false;
        }

        $stop_words_list = array(
            '末', '啊', '阿', '哎', '哎呀', '哎哟', '唉', '俺',
            '俺们', '按', '按照', '吧', '吧哒', '把', '被', '本',
            '本着', '比', '比方', '比如', '鄙人', '彼', '彼此', '边',
            '别', '别说', '并', '并且', '不比', '不成', '不单', '不但',
            '不独', '不管', '不光', '不过', '不仅', '不拘', '不论', '不怕',
            '不然', '不如', '不特', '不惟', '不问', '不只', '朝', '朝着',
            '趁', '趁着', '乘', '冲', '除', '除此之外', '除非', '此',
            '此间', '此外', '从', '从而', '打', '待', '但', '但是',
            '当', '当着', '到', '得', '等', '等等', '地', '第',
            '叮咚', '对', '对于', '多', '多少', '而', '而况', '而且',
            '而是', '而外', '而言', '而已', '尔后', '反过来', '反过来说',
            '反之', '非但', '非徒', '否则', '嘎', '嘎登', '该', '赶', '个',
            '各', '各个', '各位', '各种', '各自', '给', '根据', '跟', '故',
            '故此', '固然', '关于', '管', '归', '果然', '果真', '过', '哈',
            '哈哈', '呵', '和', '何', '何处', '何况', '何时', '嘿', '哼', '哼唷',
            '呼哧', '乎', '哗', '还是', '换句话说', '换言之', '或', '或是', '或者',
            '及', '及其', '及至', '即', '即便', '即或', '即令', '即若', '即使', '几',
            '几时', '己', '既', '既然', '既是', '继而', '加之', '假如', '假若', '假使',
            '鉴于', '将', '较', '较之', '叫', '接着', '结果', '借', '紧接着', '进而',
            '尽', '尽管', '经', '经过', '就', '就是', '就是说', '据', '具体地说',
            '具体说来', '开始', '开外', '靠', '咳', '可', '可见', '可是', '可以',
            '况且', '啦', '来', '来着', '离', '例如', '哩', '连', '连同', '两者',
            '临', '另', '另外', '另一方面', '论', '嘛', '吗', '慢说', '漫说', '冒',
            '么', '每', '每当', '们', '莫若', '某', '某个', '某些', '拿', '哪',
            '哪边', '哪儿', '哪个', '哪里', '哪年', '哪怕', '哪天', '哪些',
            '哪样', '那', '那边', '那儿', '那个', '那会儿', '那里', '那么',
            '那么些', '那么样', '那时', '那些', '那样', '乃', '乃至', '呢',
            '能', '你', '你们', '您', '宁', '宁可', '宁肯', '宁愿', '哦',
            '呕', '啪达', '旁人', '呸', '凭', '凭借', '其', '其次', '其二',
            '其他', '其它', '其一', '其余', '其中', '起', '起见', '起见',
            '岂但', '恰恰相反', '前后', '前者', '且', '然而', '然后', '然则',
            '让', '人家', '任', '任何', '任凭', '如', '如此', '如果', '如何',
            '如其', '如若', '如上所述', '若', '若非', '若是', '啥', '上下',
            '尚且', '设若', '设使', '甚而', '甚么', '甚至', '省得', '时候',
            '什么', '什么样', '使得', '是', '首先', '谁', '谁知', '顺',
            '顺着',  '虽', '虽然', '虽说', '虽则', '随', '随着', '所', '所以',
            '他', '他们', '他人', '它', '它们', '她', '她们', '倘', '倘或', '倘然',
            '倘若', '倘使', '腾', '替', '通过', '同', '同时', '哇', '万一', '往',
            '望', '为', '为何', '为什么', '为着', '喂', '嗡嗡', '我', '我们', '呜',
            '呜呼', '乌乎', '无论', '无宁', '毋宁', '嘻', '吓', '相对而言', '像',
            '向', '向着', '嘘', '呀', '焉', '沿', '沿着', '要', '要不', '要不然',
            '要不是', '要么', '要是', '也', '也罢', '也好', '一', '一般', '一旦',
            '一方面', '一来', '一切', '一样', '一则', '依', '依照', '矣', '以',
            '以便', '以及', '以免', '以至', '以至于', '以致', '抑或', '因',
            '因此', '因而', '因为', '哟', '用', '由', '由此可见', '由于', '又',
            '于', '于是', '于是乎', '与', '与此同时', '与否', '与其', '越是', '云云',
            '哉', '再说', '再者', '在', '在下', '咱', '咱们', '则', '怎', '怎么',
            '怎么办', '怎么样', '怎样', '咋', '照', '照着', '者', '这', '这边', '这儿',
            '这个', '这会儿', '这就是说', '这里', '这么', '这么点儿', '这么些',
            '这么样', '这时', '这些', '这样', '正如', '吱', '之', '之类', '之所以',
            '之一', '只是', '只限', '只要', '至', '至于', '诸位', '着', '着呢', '自',
            '自从', '自个儿', '自各儿', '自己', '自家', '自身', '综上所述', '总而言之',
            '总之', '纵', '纵令', '纵然', '纵使', '遵照', '作为', '兮', '呃', '呗', '咚',
            '咦', '喏', '啐', '喔唷', '嗬', '嗯', '嗳',
            'a\'s', 'able', 'about', 'above', 'according', 'accordingly', 'across', 'actually',
            'after', 'afterwards', 'again', 'against', 'ain\'t', 'all', 'allow', 'allows',
            'almost', 'alone', 'along', 'already', 'also', 'although', 'always', 'am',
            'among', 'amongst', 'an', 'and', 'another', 'any', 'anybody', 'anyhow',
            'anyone', 'anything', 'anyway', 'anyways', 'anywhere', 'apart', 'appear', 'appreciate',
            'appropriate', 'are', 'aren\'t', 'around', 'as', 'aside', 'ask', 'asking',
            'associated', 'at', 'available', 'away', 'awfully', 'be', 'became', 'because',
            'become', 'becomes', 'becoming', 'been', 'before', 'beforehand', 'behind', 'being',
            'believe', 'below', 'beside', 'besides', 'best', 'better', 'between', 'beyond',
            'both', 'brief', 'but', 'by', 'c\'mon', 'c\'s', 'came', 'can',
            'can\'t', 'cannot', 'cant', 'cause', 'causes', 'certain', 'certainly', 'changes',
            'clearly', 'co', 'com', 'come', 'comes', 'concerning', 'consequently', 'consider',
            'considering', 'contain', 'containing', 'contains', 'corresponding', 'could', 'couldn\'t', 'course',
            'currently', 'definitely', 'described', 'despite', 'did', 'didn\'t', 'different', 'do',
            'does', 'doesn\'t', 'doing', 'don\'t', 'done', 'down', 'downwards', 'during',
            'each', 'edu', 'eg', 'eight', 'either', 'else', 'elsewhere', 'enough',
            'entirely', 'especially', 'et', 'etc', 'even', 'ever', 'every', 'everybody',
            'everyone', 'everything', 'everywhere', 'ex', 'exactly', 'example', 'except', 'far',
            'few', 'fifth', 'first', 'five', 'followed', 'following', 'follows', 'for',
            'former', 'formerly', 'forth', 'four', 'from', 'further', 'furthermore', 'get',
            'gets', 'getting', 'given', 'gives', 'go', 'goes', 'going', 'gone',
            'got', 'gotten', 'greetings', 'had', 'hadn\'t', 'happens', 'hardly', 'has',
            'hasn\'t', 'have', 'haven\'t', 'having', 'he', 'he\'s', 'hello', 'help',
            'hence', 'her', 'here', 'here\'s', 'hereafter', 'hereby', 'herein', 'hereupon',
            'hers', 'herself', 'hi', 'him', 'himself', 'his', 'hither', 'hopefully',
            'how', 'howbeit', 'however', 'i\'d', 'i\'ll', 'i\'m', 'i\'ve', 'ie',
            'if', 'ignored', 'immediate', 'in', 'inasmuch', 'inc', 'indeed', 'indicate',
            'indicated', 'indicates', 'inner', 'insofar', 'instead', 'into', 'inward', 'is',
            'isn\'t', 'it', 'it\'d', 'it\'ll', 'it\'s', 'its', 'itself', 'just',
            'keep', 'keeps', 'kept', 'know', 'known', 'knows', 'last', 'lately',
            'later', 'latter', 'latterly', 'least', 'less', 'lest', 'let', 'let\'s',
            'like', 'liked', 'likely', 'little', 'look', 'looking', 'looks', 'ltd',
            'mainly', 'many', 'may', 'maybe', 'me', 'mean', 'meanwhile', 'merely',
            'might', 'more', 'moreover', 'most', 'mostly', 'much', 'must', 'my',
            'myself', 'name', 'namely', 'nd', 'near', 'nearly', 'necessary', 'need',
            'needs', 'neither', 'never', 'nevertheless', 'new', 'next', 'nine', 'no',
            'nobody', 'non', 'none', 'noone', 'nor', 'normally', 'not', 'nothing',
            'novel', 'now', 'nowhere', 'obviously', 'of', 'off', 'often', 'oh',
            'ok', 'okay', 'old', 'on', 'once', 'one', 'ones', 'only',
            'onto', 'or', 'other', 'others', 'otherwise', 'ought', 'our', 'ours',
            'ourselves', 'out', 'outside', 'over', 'overall', 'own', 'particular', 'particularly',
            'per', 'perhaps', 'placed', 'please', 'plus', 'possible', 'presumably', 'probably',
            'provides', 'que', 'quite', 'qv', 'rather', 'rd', 're', 'really',
            'reasonably', 'regarding', 'regardless', 'regards', 'relatively', 'respectively', 'right', 'said',
            'same', 'saw', 'say', 'saying', 'says', 'second', 'secondly', 'see',
            'seeing', 'seem', 'seemed', 'seeming', 'seems', 'seen', 'self', 'selves',
            'sensible', 'sent', 'serious', 'seriously', 'seven', 'several', 'shall', 'she',
            'should', 'shouldn\'t', 'since', 'six', 'so', 'some', 'somebody', 'somehow',
            'someone', 'something', 'sometime', 'sometimes', 'somewhat', 'somewhere', 'soon', 'sorry',
            'specified', 'specify', 'specifying', 'still', 'sub', 'such', 'sup', 'sure',
            't\'s', 'take', 'taken', 'tell', 'tends', 'th', 'than', 'thank',
            'thanks', 'thanx', 'that', 'that\'s', 'thats', 'the', 'their', 'theirs',
            'them', 'themselves', 'then', 'thence', 'there', 'there\'s', 'thereafter', 'thereby',
            'therefore', 'therein', 'theres', 'thereupon', 'these', 'they', 'they\'d', 'they\'ll',
            'they\'re', 'they\'ve', 'think', 'third', 'this', 'thorough', 'thoroughly', 'those',
            'though', 'three', 'through', 'throughout', 'thru', 'thus', 'to', 'together',
            'too', 'took', 'toward', 'towards', 'tried', 'tries', 'truly', 'try',
            'trying', 'twice', 'two', 'un', 'under', 'unfortunately', 'unless', 'unlikely',
            'until', 'unto', 'up', 'upon', 'us', 'use', 'used', 'useful',
            'uses', 'using', 'usually', 'value', 'various', 'very', 'via', 'viz',
            'vs', 'want', 'wants', 'was', 'wasn\'t', 'way', 'we', 'we\'d',
            'we\'ll', 'we\'re', 'we\'ve', 'welcome', 'well', 'went', 'were', 'weren\'t',
            'what', 'what\'s', 'whatever', 'when', 'whence', 'whenever', 'where', 'where\'s',
            'whereafter', 'whereas', 'whereby', 'wherein', 'whereupon', 'wherever', 'whether', 'which',
            'while', 'whither', 'who', 'who\'s', 'whoever', 'whole', 'whom', 'whose',
            'why', 'will', 'willing', 'wish', 'with', 'within', 'without', 'won\'t',
            'wonder', 'would', 'wouldn\'t', 'yes', 'yet', 'you', 'you\'d', 'you\'ll',
            'you\'re', 'you\'ve', 'your', 'yours', 'yourself', 'yourselves', 'zero'
        );

        if (in_array($keyword, $stop_words_list))
        {
            return false;
        }

        return true;
    }

    /**
     * 双字节语言版 strlen
     *
     * 使用方法同 strlen()
     *
     * @param  string
     * @param  string
     * @return string
     */
    public function cjk_strlen($string, $charset = 'UTF-8')
    {
        if (function_exists('mb_strlen'))
        {
            return mb_strlen($string, $charset);
        }
        else
        {
            return iconv_strlen($string, $charset);
        }
    }

    /*
     * 优化seo
     * */
    public function opertmize_seo($title,$desc = null,$flag = true ,$ini = true,$is_analysis = true){
        $titles = Yii::app()->params['conf']['site']['title'];
        $keywords = Yii::app()->params['conf']['site']['keywords'];
        $descriptions = Yii::app()->params['conf']['site']['desc'];

        $this->title = $ini?(($flag?$title.' - ':$title).$titles):($flag?$title.' - ':$title);
        if($is_analysis){
            $keys = $this->analysis_keyword($title);
            $this->keyword = $ini?((!empty($keys)?($flag?implode(',',$keys).',':implode(',',$keys)):'').$keywords):(!empty($keys)?($flag?implode(',',$keys).',':implode(',',$keys)):'');
        }
        $this->description = $ini?(strip_tags($desc).$descriptions):strip_tags($desc);
        ltrim(ltrim(ltrim($this->title),'-'));
    }

    //是否客户端获取
    public function isClient(){
        $flag = false;
        $Agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : "";
        if(strpos($Agent,'Safari/537.36/SSC') !== false){
            $flag = true;
        }
        return $flag;
    }

    //判断手机/座机号码
    public function judgePhone($tele){
        $key = '';
//        $pattern_email = "/^[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/";
        $pattern_phone = "/^(0\d{2,3}-)?[1-9]\d{6,7}$/";
        $pattern_telephone = "/^(18[0-3|5-9][0-9]{8})|(13[0-9]{9})|(15[0-3|5-9][0-9]{8})|(17[6-8][0-9]{8})$/";
        if((preg_match($pattern_phone,$tele)!==false)||(preg_match($pattern_telephone,$tele)!==false)){
            return true;
        }
        return false;
    }

    public function FilterXss($str){
        $purifier = new CHtmlPurifier();
        $str = $purifier->purify($str);
        return $str;
    }
}
