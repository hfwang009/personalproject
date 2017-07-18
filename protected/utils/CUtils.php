<?php
/**
 *      [迷你云] (C)2009-2012 南京恒为网络科技.
 *   软件仅供研究与学习使用，如需商用，请访问www.miniyun.cn获得授权
 * 
 */
?>
<?php

class CUtils {
	public static function getFormatTime($time, $format = "Y-m-d H:i:s") {
		$language = Yii::app ()->getLanguage ();
		if ($language && $language == 'en') {
			$format = $format == "Y-m-d H:i:s" ? "m/d/Y h:iA" : "Y-m-d H:i:s";
		}
		
		$data = Yii::t ( 'front_common', 'cutil_just_a_minute_ago' );
		$time = ( int ) $time;
		$now = time ();
		$ctime = $now - $time;
		if ($ctime >= 0) {
			if (($ctime - 3600) < 0) {
				if ($ctime > 60) {
					$data = ( int ) ($ctime / 60);
					$data === 0 ? $data = Yii::t ( 'front_common', 'cutil_just_a_minute_ago', array (
							'{how}' => '0' 
					) ) : $data = Yii::t ( 'front_common', 'cutil_minute_ago', array (
							'{how}' => $data 
					) );
				} else {
					$data = Yii::t ( 'front_common', 'cutil_second_ago', array (
							'{how}' => $ctime 
					) );
				}
			} else if (($ctime - 86400) < 0) {
				$data = ( int ) ($ctime / 3600);
				$data === 0 ? $data = Yii::t ( 'front_common', 'cutil_hour_ago', array (
						'{how}' => '1' 
				) ) : $data = Yii::t ( 'front_common', 'cutil_hour_ago', array (
						'{how}' => $data 
				) );
			} else if (($ctime - 259200) < 0) {
				$data = ( int ) ($ctime / 86400);
				$data === 0 ? $data = Yii::t ( 'front_common', 'cutil_day_ago', array (
						'{how}' => '1' 
				) ) : $data = Yii::t ( 'front_common', 'cutil_day_ago', array (
						'{how}' => $data 
				) );
				;
			} else {
				$data = date ( $format, $time );
			}
		} else {
			$data = date ( $format, $time );
		}
		
		return $data;
	}
	public static function genRandomString($length = 64) {
		$characters = "0123456789QWERTYUIASDFGHJKLZXCVBNM:abcdefghijklmnopqrstuvwxyz!@#[]|";
		$string = "";
		for($p = 0; $p < $length; $p ++) {
			$string .= $characters [mt_rand ( 0, strlen ( $characters ) - 1 )];
		}
		return $string;
	}
	public static function genRandomPassword($length = 64){
		$characters = "0123456789QWERTYUIASDFGHJKLZXCVBNMabcdefghijklmnopqrstuvwxyz";
		$string = "";
		for($p = 0; $p < $length; $p ++) {
			$string .= $characters [mt_rand ( 0, strlen ( $characters ) - 1 )];
		}
		return $string;
	}
	public static function genRandomNumber($length = 64){
		$characters = "0123456789";
		$string = "";
		for($p = 0; $p < $length; $p ++) {
			$string .= $characters [mt_rand ( 0, strlen ( $characters ) - 1 )];
		}
		return $string;
	}
	public static function retMessage($state, $code, $message, $html = null) {
		$ret = Array ();
		$ret ['state'] = $state;
		$ret ['code'] = $code;
		$ret ['msg'] = $message;
		$ret ['html'] = $html;
		return $ret;
	}
	public static function retCode($state, $code, $message, $href = null) {
		$ret = Array ();
		$ret ['state'] = $state;
		$ret ['code'] = $code;
		$ret ['msg'] = $message;
		$ret ['href'] = $href;
		return $ret;
	}
	const LEN_TIME = 14;
	public static function random_string($length = 40) {
		static $str = "abcdefghijklmnopqrstuvwxyz0123456789";
		$rand = "";
		if ($length > CUtils::LEN_TIME)
			$length -= CUtils::LEN_TIME;
		
		for($i = 0; $i < $length; $i ++) {
			$rand .= $str [mt_rand () % strlen ( $str )];
		}
		
		$t = microtime ( true ) * 10000;
		$rand .= sprintf ( "%014.0f", $t );
		return $rand;
	}
	public static function output($file_path, $ctype, $file_name) {
		$size = filesize ( $file_path );
		Header ( "Content-type: $ctype" );
		Header ( "Cache-Control: public" );
		Header ( "Content-length: " . $size );
		$encoded_filename = urlencode ( $file_name );
		$encoded_filename = str_replace ( "+", "%20", $encoded_filename );
		$ua = isset ( $_SERVER ["HTTP_USER_AGENT"] ) ? $_SERVER ["HTTP_USER_AGENT"] : NULL;
		if (preg_match ( "/MSIE/", $ua )) {
			header ( 'Content-Disposition: attachment; filename="' . $encoded_filename . '"' );
		} elseif (preg_match ( "/Firefox\/8.0/", $ua )) {
			header ( 'Content-Disposition: attachment; filename="' . $file_name . '"' );
		} else if (preg_match ( "/Firefox/", $ua )) {
			header ( 'Content-Disposition: attachment; filename*="utf8\'\'' . $file_name . '"' );
		} else {
			header ( 'Content-Disposition: attachment; filename="' . $file_name . '"' );
		}
		$fp = fopen ( $file_path, "rb" );
		if (isset ( $_SERVER ['HTTP_RANGE'] ) && ($_SERVER ['HTTP_RANGE'] != "") && preg_match ( "/^bytes=([0-9]+)-/i", $_SERVER ['HTTP_RANGE'], $match ) && ($match [1] < $size)) {
			$range = $match [1];
			fseek ( $fp, $range );
			header ( "HTTP/1.1 206 Partial Content" );
			header ( "Last-Modified: " . gmdate ( "D, d M Y H:i:s", filemtime ( $file_path ) ) . " GMT" );
			header ( "Accept-Ranges: bytes" );
			$rangesize = ($size - $range) > 0 ? ($size - $range) : 0;
			header ( "Content-Length:" . $rangesize );
			header ( "Content-Range: bytes " . $range . '-' . ($size - 1) . "/" . $size );
		} else {
			header ( "Content-Length: $size" );
			header ( "Accept-Ranges: bytes" );
			$range = 0;
			header ( "Content-Range: bytes " . $range . '-' . ($size - 1) . "/" . $size );
		}
		set_time_limit ( 0 );
		$dstStream = fopen ( 'php://output', 'wb' );
		$chunksize = 4096;
		$offset = $range;
		while ( ! feof ( $fp ) && $offset < $size ) {
			$offset += stream_copy_to_stream ( $fp, $dstStream, $chunksize, $offset );
		}
		fclose ( $dstStream );
		fclose ( $fp );
		exit ();
	}
	public static function outContent($filePath, $contentType, $fileName, $forceDownload = true) {
		$options = array ();
		$options ['saveName'] = $fileName;
		$options ['mimeType'] = $contentType;
		$options ['terminate'] = false;
		if (self::xSendFile ( $filePath, $options )) {
			return true;
		}
		$dataObj = Yii::app ()->data;
		$size = $dataObj->size ( $filePath );
		Header("Content-type:$contentType");
		Header ( "Cache-Control: public" );
		Header ( "Content-length: " . $size );
		$encodedFileName = urlencode ( $fileName );
		$encodedFileName = str_replace ( "+", "%20", $encodedFileName );
		$ua = isset ( $_SERVER ["HTTP_USER_AGENT"] ) ? $_SERVER ["HTTP_USER_AGENT"] : NULL;
		if ($forceDownload) {
			if (preg_match ( "/MSIE/", $ua )) {
				header ( 'Content-Disposition: attachment; filename="' . $encodedFileName . '"' );
			} elseif (preg_match ( "/Firefox\/8.0/", $ua )) {
				header ( 'Content-Disposition: attachment; filename="' . $fileName . '"' );
			} else if (preg_match ( "/Firefox/", $ua )) {
				header ( 'Content-Disposition: attachment; filename*="utf8\'\'' . $fileName . '"' );
			} else {
				header ( 'Content-Disposition: attachment; filename="' . $fileName . '"' );
			}
		}
		if (isset ( $_SERVER ['HTTP_RANGE'] ) && ($_SERVER ['HTTP_RANGE'] != "") && preg_match ( "/^bytes=([0-9]+)-/i", $_SERVER ['HTTP_RANGE'], $match ) && ($match [1] < $size)) {
			$range = $match [1];
			header ( "HTTP/1.1 206 Partial Content" );
			header ( "Last-Modified: " . gmdate ( "D, d M Y H:i:s", $dataObj->mtime ( $filePath ) ) . " GMT" );
			header ( "Accept-Ranges: bytes" );
			$rangeSize = ($size - $range) > 0 ? ($size - $range) : 0;
			header ( "Content-Length:" . $rangeSize );
			header ( "Content-Range: bytes " . $range . '-' . ($size - 1) . "/" . $size );
		} else {
			header ( "Content-Length: $size" );
			header ( "Accept-Ranges: bytes" );
			$range = 0;
			header ( "Content-Range: bytes " . $range . '-' . ($size - 1) . "/" . $size );
		}
		return $dataObj->render_contents ( $filePath, "", 0 );
	}
	public static function getParamApp(){
		$app = array();
		$options = Options::model()->findAll('option_name = "site_copyright" or option_name = "site_footers" or option_name = "site_title" or option_name = "site_keywords" or option_name = "site_desc" or option_name = "site_corners"');
		if(!empty($options)){
			foreach ($options as $_option){
				$app[$_option['option_name']] = $_option['option_value'];
			}
		}
		Yii::app ()->params ["app"] = $app;
	}
	
	/**
	 * 站内消息a链接补全
	 * @param string $content
	 * @return string $string
	 */
	public static function linkCompletion($content,$link){
		$string = '';
		$pattern = '/<a(.*?)href=(.*?)>/i';
		$string = preg_replace('/<a(.*?)href="(.*?)">/i','<a\\1href="'.$link.'\\2">',$content);
		return $string;
	}
	/**
	 * 站内图片src链接补全
	 * @param string $rlink
	 * @param string $link
	 * @return string $string
	 */
	public static function srcCompletion($rlink,$link){
		$string = $link . $rlink;
		return $string;
	}
	
	public static function curl_post($data,$post_url){
		if(empty($data)){
			return null;
		}
		if(isset($data['act']) && ($data['act'] == "drawcs1" || $data['act'] == "onload2" || $data['act'] == "downpdfall")){
			$data = http_build_query($data);
		}
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $post_url);
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_REFERER, Yii::app ()->request->hostInfo );
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data);
		$rs = curl_exec ( $ch );
		if($rs === false) {
			return curl_error($ch);
		}
		curl_close ( $ch );
		return $rs;
	}
    public static function genRandomTsString($length = 64) {
        $characters = "0123456789QWERTYUIASDFGHJKLZXCVBNMabcdefghijklmnopqrstuvwxyz-|";
        $string = "";
        for($p = 0; $p < $length; $p ++) {
            $string .= $characters [mt_rand ( 0, strlen ( $characters ) - 1 )];
        }
        return $string;
    }
    //加密函数
    public static function passport_encrypt($txt, $key) {
        srand((double)microtime() * 1000000);
        $encrypt_key = md5(rand(0, 32000));
        $ctr = 0;
        $tmp = '';
        for($i = 0;$i < strlen($txt); $i++) {
            $ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
            $tmp .= $encrypt_key[$ctr].($txt[$i] ^ $encrypt_key[$ctr++]);
        }
        return urlencode(base64_encode(self::passport_key($tmp, $key)));
    }
    //加密解密key生成
    public static function passport_key($txt, $encrypt_key) {
        $encrypt_key = md5($encrypt_key);
        $ctr = 0;
        $tmp = '';
        for($i = 0; $i < strlen($txt); $i++) {
            $ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
            $tmp .= $txt[$i] ^ $encrypt_key[$ctr++];
        }
        return $tmp;
    }
    public static function formatUploadSize($data){
        $size = 0;
        if(!empty($data)){
            if(!floor($data/1024)){
                $size = $data.'bytes';
            }elseif(floor($data/1024)&&!floor($data/1024/1024)){
                $size = round($data/1024,2).'KB';
            }elseif(floor($data/1024/1024)&&!floor($data/1024/1024/1024)){
                $size = round($data/1024/1024,2).'MB';
            }elseif(floor($data/1024/1024/1024)){
                $size = round(floor($data/1024/1024/1024),2).'GB';
            }
        }
        return $size;
    }
    public static function getConditionString($start,$end){
        $string = '';
        if(!empty($start)&&!empty($end)){
            $string = '('.$start.'--'.$end.')';
        }elseif(empty($start)&&!empty($end)){
            $string = '(--'.$end.')';
        }elseif(!empty($start)&&empty($end)){
            $string = '('.$start.'--)';
        }
        return $string;
    }

    /**
     * 获取用户资料完善度
     *
     */
    public static function getUserPerfect($item) {
        $score = 0;
        if (! empty ( $item ['user_name'] )) {
            $score += 2;
        }
        if (! empty ( $item ['user_nick'] )) {
            $score += 3;
        }
        if (! empty ( $item ['user_phone'] )) {
            $score += 3;
        }
        if (! empty ( $item ['user_email'] )) {
            $score += 3;
        }
        if (! empty ( $item ['user_avatar'] )) {
            $score += 2;
        }
        if (! empty ( $item ['user_sex'] )) {
            $score += 2;
        }
        if (! empty ( $item ['user_birthday'] )) {
            $score += 2;
        }
        if (! empty ( $item ['qq'] )) {
            $score += 3;
        }
        if (! empty ( $item ['weixin'] )) {
            $score += 3;
        }
        if (! empty ( $item ['weibo'] )) {
            $score += 3;
        }
        if (! empty ( $item ['user_signature'] )) {
            $score += 3;
        }
        if (! empty ( $item ['user_label'] )) {
            $score += 3;
        }
        if (! empty ( $item ['user_region'] )) {
            $score += 3;
        }
        if (! empty ( $item ['business'] )) {
            $score += 3;
        }
        if (! empty ( $item ['position'] )) {
            $score += 3;
        }
        if (! empty ( $item ['industry'] )) {
            $score += 3;
        }
        if (! empty ( $item ['university'] )) {
            $score += 3;
        }
        if (! empty ( $item ['education'] )) {
            $score += 3;
        }
        if (! empty ( $item ['achieve'] )) {
            $score += 3;
        }
        if (! empty ( $item ['personal_auth'] )) {
            $score += 30;
        }
        if (! empty ( $item ['email_rules'] )) {
            $score += 9;
        }
        if (! empty ( $item ['phone_rules'] )) {
            $score += 9;
        }
        return $score;
    }

    //判断手机/座机号码
    public static function judgePhone($tele){
        if(!empty($tele)){
            $pattern_phone = "/^(0\d{2,3}-)?[1-9]\d{6,7}$/";
            $pattern_telephone = "/^(18[0-3|5-9][0-9]{8})|(13[0-9]{9})|(15[0-3|5-9][0-9]{8})|(17[6-8][0-9]{8})$/";
            if((preg_match($pattern_phone,$tele,$data)!=false&&!empty($data))||(preg_match($pattern_telephone,$tele,$_data)!=false&&!empty($_data))){
                return true;
            }
        }
        $key = '';
//        $pattern_email = "/^[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/";
        return false;
    }

    //后台更新权限的时候更新后台当前登录用户的权限
    public static function updatePrivilieges($rid,$id){
        $privilieges = Role::model()->findByPk($rid)->privilege;
        $privilieges = (!empty($privilieges)&&$privilieges!=='all_allow')?unserialize($privilieges):((!empty($privilieges)&&$privilieges=='all_allow')?array('all_allow'):array());
        $second = CRedisUtils::getIntervalSecond();
        RedisInit::getInstance()->set('carprojectadmin:privilieges:'.$id,$privilieges,$second,true);
    }

    /**
     * 验证用户访问是否手机注册
     * @return bool 是否正确
     */
    public static function is_mobile_request(){
        $_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';
        $mobile_browser = '0';
        if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i', strtolower($_SERVER['HTTP_USER_AGENT']))){
            $mobile_browser++;
        }
        if((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false)){
            $mobile_browser++;
        }
        if(isset($_SERVER['HTTP_X_WAP_PROFILE'])){
            $mobile_browser++;
        }
        if(isset($_SERVER['HTTP_PROFILE'])){
            $mobile_browser++;
        }
        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
        $mobile_agents = array(
            'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
            'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
            'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
            'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
            'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
            'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
            'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
            'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
            'wapr','webc','winw','winw','xda','xda-'
        );
        if(in_array($mobile_ua, $mobile_agents)){
            $mobile_browser++;
        }
        if(strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false){
            $mobile_browser++;
        }
        // Pre-final check to reset everything if the user is on Windows
        if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') !== false){
            $mobile_browser=0;
        }
        // But WP7 is also Windows, with a slightly different characteristic
        if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone') !== false){
            $mobile_browser++;
        }
        if($mobile_browser>0){
            return true;
        }else{
            return false;
        }
    }


    public static function shortUrl($url){
        $base32 = array (
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h',
            'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p',
            'q', 'r', 's', 't', 'u', 'v', 'w', 'x',
            'y', 'z', '0', '1', '2', '3', '4', '5'
        );

        $hex = md5($url);
        $hexLength = strlen($hex);
        $subHexLen = $hexLength / 8;

        $output = array();
        for ($i = 0; $i < $subHexLen; $i++) {
            //每循环一次取到8位
            $subHex = substr ($hex, $i * 8, 8);
            $int = 0x3FFFFFFF & (1 * ('0x'.$subHex));
            $out = '';

            for ($j = 0; $j < 6; $j++) {
                $val = 0x0000001F & $int;
                $out .= $base32[$val];
                $int = $int >> 5;
            }

            $output[] = $out;
        }

        return $output;
    }


    public static function shortUrl2($url){
        $result = sprintf("%u",crc32($url));
        $show = '';
        while($result  >0){
            $s = $result % 62;
            if($s > 35){
                $s=chr($s+61);
            }elseif($s>9 && $s<=35){
                $s=chr($s+55);
            }
            $show .= $s;
            $result = floor($result / 62);
        }

        return $show;
    }

     /**
     * 记忆文本域输入的换行符
     * @param unknown $content
     * @return unknown
     */
    public static function formatTxtarea($content){
        $content = preg_replace('/\n|\r\n/i','&#13;&#10;',$content);
        return $content;
    }

    /**
     * 手机验证验证码
     */
    public static function validVerify($uname, $verify, $type){
        $message = array('status'=>false,'msg'=>'验证码错误');
        if(empty($uname) || empty($verify) || empty($type)){
            return $message;
        }
        $config = Yii::app()->params['conf']['phone1'];
        $setting = $config[$type];
        $res = AuthCodeRecord::model()->find('auth_number = "'.$uname.'" AND auth_type="phone" AND auth_cate="'.$setting['code'].'" AND auth_content="'.$verify.'"');
        $now = time();
        if(!empty($res)){
            if($now - $res['ctime'] < $setting['time']){
                $message['status'] = true;
                $message['msg'] = '验证码正确';
            }else{
                $message['msg'] = '验证码失效，请重新发送';
            }
        }
        return $message;
    }

    public static function formatdata($result){
        $products = Product::model()->getProductData();
        $models = Models::model()->getModelData();
        $ptype = Yii::app()->params['conf']['setting']['ptype'];

        //格式化产品数据
        $_pids = !empty($result['pid'])?explode(',',$result['pid']):array();
        $_pids = array_unique($_pids);
        $_products = array();
        foreach($_pids as $a=>$b){
            if(isset($products[$b])){
                $_products[] = $products[$b];
            }
        }
        $_products = array_unique($_products);
        $result['pid'] = !empty($_products)?implode('+',$_products):'--';

        //格式化型号数据
        $_mids = !empty($result['mid'])?explode(',',$result['mid']):array();
        $_mids = array_unique($_mids);
        $_models = array();
        foreach($_mids as $c=>$d){
            if(isset($models[$d])){
                $_models[] = $models[$d];
            }
        }
        $_models = array_unique($_models);
        $result['mid'] = !empty($_models)?implode('+',$_models):'--';

        //格式化位置数据
        $tmp = $result->extension;
        $extensions = !empty($tmp)?unserialize(base64_decode($tmp)):array();
        $types = array();
        if(!empty($extensions)){
            foreach($extensions as $extension){
                $types[] = $ptype[$extension['type']];
            }
        }
        $types = array_unique($types);
        $result->extension = !empty($types)?implode('+',$types):'--';

        $warrantytime = isset($result['warrantytime'])?$result['warrantytime']:'';
        $_arr = !empty($warrantytime)?array_unique(explode(',',$warrantytime)):array();
        $result['warrantytime'] = implode(',',$_arr);

        return $result;
    }

    public static function formatdata1($result){
        $products = Product::model()->getProductData();
//        $models = Models::model()->getModelData();
        $ptype = Yii::app()->params['conf']['setting']['ptype'];

//        $_pids = !empty($result['pid'])?explode(',',$result['pid']):array();
//        $_pids = array_unique($_pids);
//        $_products = array();
//        foreach($_pids as $a=>$b){
//            if(isset($products[$b])){
//                $_products []= $products[$b];
//            }
//        }
//        $_products = array_unique($_products);
//        $result['mid'] =!empty($_products)?implode('+',$_products):'--';

        $_pids = !empty($result['pid'])?explode(',',$result['pid']):array();
//        $_pids = array_unique($_pids);
        $_products = '';
        foreach($_pids as $a=>$b){
            if(isset($products[$b])){
                $tmp = '';
                $tmp = $a<count($_pids)-1?'style="border-bottom: solid  #a1b1c1 1px;border-collapse:collapse;"':'';
                $_products .= '<div align="center" '.$tmp.'><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">'.$products[$b].'</span></div>';
            }
        }
        $result['mid'] = $_products;

        //格式化产品数据
        $_pids = !empty($result['pid'])?explode(',',$result['pid']):array();
        $_pids = array_unique($_pids);
        $_products1 = array();
        foreach($_pids as $a=>$b){
            $bproduct = Product::model()->getProductBrand($b);
            if(!empty($bproduct->brand)){
                $_products1[] = $bproduct->brand->name;
            }
        }
        $_products1 = array_unique($_products1);
        $result['pid'] = !empty($_products1)?implode('+',$_products1):'--';

        //格式化型号数据
//        $_mids = !empty($result['mid'])?explode(',',$result['mid']):array();
//        $_mids = array_unique($_mids);
//        $_models = array();
//        foreach($_mids as $c=>$d){
//            if(isset($models[$d])){
//                $_models[] = $models[$d];
//            }
//        }
//        $_models = array_unique($_models);
//        $result['mid'] = !empty($_models)?implode('+',$_models):'--';

        //格式化位置数据
        $tmp = $result->extension;
        $extensions = !empty($tmp)?unserialize(base64_decode($tmp)):array();
        $string = '';
        if(!empty($extensions)){
            foreach($extensions as $k=>$extension){
                $tmp = '';
                $tmp = $k<count($extensions)-1?'style="border-bottom: solid  #a1b1c1 1px;border-collapse:collapse;"':'';
                $string .= '<div align="center" '.$tmp.'><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">'.$ptype[$extension['type']].'</span></div>';
            }
        }else{
            $string = '<div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"></span></div>';
        }
        $result->extension = $string;

        $warrantytime = isset($result['warrantytime'])?$result['warrantytime']:'';
        $_arr = !empty($warrantytime)?explode(',',$warrantytime):array();
        $string1 = '';
        if(!empty($_arr)){
            foreach($_arr as $k=>$warranty){
                $tmp = '';
                $tmp = $k<count($_arr)-1?'style="border-bottom: solid  #a1b1c1 1px;border-collapse:collapse;"':'';
                $string1 .= '<div align="center" '.$tmp.'><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5">'.$warranty.'</span></div>';
            }
        }else{
            $string1 = '<div align="center"><span class="sub_title_xxs sub_title_xxs sub_title_xxs STYLE5"></span></div>';
        }
        $result['warrantytime'] = $string1;

        return $result;
    }

    public static function addAdminLog($controller,$action,$request,$adminid){
        $control_arr = Yii::app()->params['conf']['setting']['controller'];
        $act_arr = Yii::app()->params['conf']['setting']['action'];
        if($action=='setting'||$action=='index'||empty($request)){
            return true;
        }
        $logmodel = new AdminLog();
        $logmodel->controller = $controller;
        $logmodel->action = $action;
        $logmodel->control = $control_arr[$controller];
        $logmodel->act = $action=='add'&&(!empty($request)&&!empty($request['id']))?'编辑':$act_arr[$action];
        $logmodel->ip = CUtils::getUserIp();
        $logmodel->admin_id = $adminid;
        $logmodel->ctime = time();
        if($logmodel->validate()){
            $logmodel->save();
        }
        return true;
    }

    public static function getUserIp(){
        $ip=false;
        if(!empty($_SERVER["HTTP_CLIENT_IP"])){
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
            if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
            for ($i = 0; $i < count($ips); $i++) {
                if (!eregi ("^(10│172.16│192.168).", $ips[$i])) {
                    $ip = $ips[$i];
                    break;
                }
            }
        }
        return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
    }

    public static function addMsgLog(){

    }

    public static function sendMsg($phone, $data, $type){
        $config = Yii::app()->params['conf']['phone'];
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'aliyun-php-sdk-core'.DIRECTORY_SEPARATOR.'Regions'.DIRECTORY_SEPARATOR.'ProductDomain.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'aliyun-php-sdk-core'.DIRECTORY_SEPARATOR.'Regions'.DIRECTORY_SEPARATOR.'Endpoint.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'aliyun-php-sdk-core'.DIRECTORY_SEPARATOR.'Regions'.DIRECTORY_SEPARATOR.'EndpointProvider.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'aliyun-php-sdk-core'.DIRECTORY_SEPARATOR.'Profile'.DIRECTORY_SEPARATOR.'IClientProfile.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'aliyun-php-sdk-core'.DIRECTORY_SEPARATOR.'Profile'.DIRECTORY_SEPARATOR.'DefaultProfile.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'aliyun-php-sdk-core'.DIRECTORY_SEPARATOR.'IAcsClient.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'aliyun-php-sdk-core'.DIRECTORY_SEPARATOR.'DefaultAcsClient.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'aliyun-php-sdk-core'.DIRECTORY_SEPARATOR.'AcsRequest.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'aliyun-php-sdk-core'.DIRECTORY_SEPARATOR.'RpcAcsRequest.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'aliyun-php-sdk-core'.DIRECTORY_SEPARATOR.'Exception'.DIRECTORY_SEPARATOR.'ClientException.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'aliyun-php-sdk-core'.DIRECTORY_SEPARATOR.'Autoloader'.DIRECTORY_SEPARATOR.'Autoloader.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'aliyun-php-sdk-core'.DIRECTORY_SEPARATOR.'Auth'.DIRECTORY_SEPARATOR.'Credential.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'aliyun-php-sdk-core'.DIRECTORY_SEPARATOR.'Auth'.DIRECTORY_SEPARATOR.'ISigner.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'aliyun-php-sdk-core'.DIRECTORY_SEPARATOR.'Auth'.DIRECTORY_SEPARATOR.'ShaHmac1Signer.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'aliyun-php-sdk-core'.DIRECTORY_SEPARATOR.'Http'.DIRECTORY_SEPARATOR.'HttpResponse.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'aliyun-php-sdk-core'.DIRECTORY_SEPARATOR.'Http'.DIRECTORY_SEPARATOR.'HttpHelper.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'aliyun-php-sdk-core'.DIRECTORY_SEPARATOR.'Regions'.DIRECTORY_SEPARATOR.'EndpointProvider.php');

        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'aliyun-php-sdk-core'.DIRECTORY_SEPARATOR.'Config.php');
        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'aliyun-php-sdk-core'.DIRECTORY_SEPARATOR.'Regions'.DIRECTORY_SEPARATOR.'EndpointConfig.php');
        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'Dysmsapi'.DIRECTORY_SEPARATOR.'Request'.DIRECTORY_SEPARATOR.'V20170525'.DIRECTORY_SEPARATOR.'SendSmsRequest.php');

        $accessKeyId = strval($config['appkey']);
        $accessKeySecret = $config['secretKey'];
        //短信API产品名
        $product = "Dysmsapi";
        //短信API产品域名
        $domain = "dysmsapi.aliyuncs.com";
        //暂时不支持多Region
        $region = "cn-hangzhou";

        //初始化访问的acsCleint
        $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);
        DefaultProfile::addEndpoint("cn-hangzhou", "cn-hangzhou", $product, $domain);
        $acsClient= new DefaultAcsClient($profile);

        $request = new Dysmsapi\Request\V20170525\SendSmsRequest;
        //必填-短信接收号码
        $request->setPhoneNumbers($phone);
        //必填-短信签名
        $request->setSignName($config['signname']);
        //必填-短信模板Code
        $request->setTemplateCode($type);
        //选填-假如模板中存在变量需要替换则为必填(JSON格式)
        $request->setTemplateParam(json_encode($data));
        //选填-发送短信流水号
//        $request->setOutId("1234");

        //发起访问请求
        $acsResponse = $acsClient->getAcsResponse($request);
        return $acsResponse;
    }

    /**
     * 发送手机短信（阿里大于短信服务，已废弃）
     */
    public static function sendSms($phone, $data, $type){
        $config = Yii::app()->params['conf']['phone'];
        $config['appkey'] = '24515502';
        $config['secretKey'] = '632a8a9927f7f3e551a95b7074b64080';
        $config['signname'] = '可观';
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'Dayu'.DIRECTORY_SEPARATOR.'TopSdk.php');
        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'Dayu'.DIRECTORY_SEPARATOR.'top'.DIRECTORY_SEPARATOR.'TopClient.php');
        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'Dayu'.DIRECTORY_SEPARATOR.'top'.DIRECTORY_SEPARATOR.'ResultSet.php');
        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'Dayu'.DIRECTORY_SEPARATOR.'top'.DIRECTORY_SEPARATOR.'RequestCheckUtil.php');
        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'Dayu'.DIRECTORY_SEPARATOR.'top'.DIRECTORY_SEPARATOR.'TopLogger.php');
        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'Dayu'.DIRECTORY_SEPARATOR.'top'.DIRECTORY_SEPARATOR.'request'.DIRECTORY_SEPARATOR.'AlibabaAliqinFcSmsNumSendRequest.php');
        $c = new \TopClient;
        $c->appkey = strval($config['appkey']);
        $c->secretKey = $config['secretKey'];
        $req = new \AlibabaAliqinFcSmsNumSendRequest;
        $req->setExtend('ICS');
        $req->setSmsType("normal");
        $req->setSmsParam(json_encode($data));
        $req->setSmsFreeSignName($config['signname']);
        $req->setRecNum($phone);
        $req->setSmsTemplateCode($type);
        $res = $c->execute($req);
//        print_r($res);exit;
        return $res;
    }
}