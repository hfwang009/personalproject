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

    /**
     * 格式化用户质保详情数据（已废弃）
     */
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

    /**
     * 格式化用户质保详情数据（目前使用中）
     */
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

    /*
     * 添加后台管理员的操作日志，列表和setting操作没有统计进去
     * */
    public static function addAdminLog($controller,$action,$request,$adminid){
        $control_arr = Yii::app()->params['conf']['syssetting']['controller'];
        $act_arr = Yii::app()->params['conf']['syssetting']['action'];
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

    /*
     * 发送手机短信（阿里云短信服务。阿里内部与阿里大于竞争的另一短信接口，目前再试用当中）
     * */

    public static function sendMsg($phone, $data, $type){
        $config = Yii::app()->params['conf']['phone'];
//        require_once(dirname(__FILE__).'/protected/extensions/aliyunMsg/aliyun-php-sdk-core/Autoloader/Autoloader.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'aliyunMsg'.DIRECTORY_SEPARATOR.'aliyun-php-sdk-core'.DIRECTORY_SEPARATOR.'Autoloader'.DIRECTORY_SEPARATOR.'Autoloader.php');
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
     * 发送手机短信（阿里大于短信服务，已废弃。未来可能会被重新使用）
     */
    public static function sendSms($phone, $data, $type){
        $config = Yii::app()->params['conf']['phone'];
        $config['appkey'] = '24515502';
        $config['secretKey'] = '632a8a9927f7f3e551a95b7074b64080';
        $config['signname'] = '可观';
        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'Dayu'.DIRECTORY_SEPARATOR.'TopSdk.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'Dayu'.DIRECTORY_SEPARATOR.'top'.DIRECTORY_SEPARATOR.'TopClient.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'Dayu'.DIRECTORY_SEPARATOR.'top'.DIRECTORY_SEPARATOR.'ResultSet.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'Dayu'.DIRECTORY_SEPARATOR.'top'.DIRECTORY_SEPARATOR.'RequestCheckUtil.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'Dayu'.DIRECTORY_SEPARATOR.'top'.DIRECTORY_SEPARATOR.'TopLogger.php');
//        require_once(Yii::app()->basePath.DIRECTORY_SEPARATOR.'extensions'.DIRECTORY_SEPARATOR.'Dayu'.DIRECTORY_SEPARATOR.'top'.DIRECTORY_SEPARATOR.'request'.DIRECTORY_SEPARATOR.'AlibabaAliqinFcSmsNumSendRequest.php');
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

    /*
     * 发送手机短信的统一入口
     * @params: post  array   格式必须是这种二维数组$post['warranty'][]，是发送的短信的参数
     * @params: type  string  发送短信的类型，必须与站点设置中类型一一对应
     * @params: warranty  array  发送短信的相关数据数组
     * */
    public static function sendSnsMsg($post,$type='auth',$warranty=false){
        $message = array('status'=>false,'msg'=>'');
        switch($type){
            //发送质保成功/失败后的通知短信
            case 'success':
            case 'fail':
                $message = CUtils::sendMessage($post,$warranty,$type);
                break;
            //发送前台用户提交质保的验证吗信息
            case 'auth':
                $message = CUtils::sendPhoneCode($post['Warranty']['phone']);
                break;
        }
        return $message;
    }

    //发送质保成功/失败后的通知短信
    public static function sendMessage($post,$warranty=false,$type=false){
        $message = array('status'=>false,'msg'=>'发送质保通知失败！');
        if(!in_array($post['Warranty']['status'],array(0,1,2))){
            return false;
        }
        if($post['Warranty']['status']==1&&empty($warranty)){
            return false;
        }
        if(!empty($warranty)&&$warranty['is_send']==1){
            return true;
        }
        $config = Yii::app()->params['conf']['phone1'];
        $setting = $config[$type];
        switch($post['Warranty']['status']){
            case 1:
                $smsData = array(
                    'phone' => $post['Warranty']['telephone'],
                    'param' => array('name' => $post['Warranty']['name'],'number'=>$warranty['series_number']),
                    'type' => $config['success']['code']
                );
                break;
            case 2:
            case 0:
                $smsData = array(
                    'phone' => $post['Warranty']['telephone'],
                    'param' => array('name' => $post['Warranty']['name']),
                    'type' => $config['fail']['code']
                );
                break;
        }
        $rs = CUtils::sendMsg($smsData['phone'], $smsData['param'], $smsData['type']);
        if($rs->Code=='OK'){
            //记录发送的短信，记录发送短信的相关状态后台可以补发（需要新增字段来判断是否发送短信）
//            $msgid = $rs->RequestId;
//            $bizid = $rs->BizId;
//            $_message = $rs->Message;
            $message['status'] = true;
            $message['msg'] = '发送质保通知成功！';
            if($post['Warranty']['status']==1){
                $warranty->is_send = 1;
                $warranty->save();
            }
        }
        CUtils::addMsgLog($type,$post['Warranty']['telephone'],$setting['code'],$rs);
        return $message;
    }

    //发送前台用户提交质保的验证吗信息
    public static function sendPhoneCode($phone,$type='auth'){
        $message = array('status'=>false,'msg'=>'验证码发送失败');
        $flag = false;
        $config = Yii::app()->params['conf']['phone1'];
        $setting = $config[$type];
        $res = AuthCodeRecord::model()->find('auth_number="'.$phone.'" AND auth_type="phone" AND auth_cate="'.$setting['code'].'"');
        $verify = rand(100000, 999999);
        if(!empty($res)){
            if(date('Ymd') == date('Ymd',$res['ctime'])){
                if($res['auth_count'] < $setting['count']){
                    //发送添加
                    $res->auth_content = $verify;
                    $res->auth_count = $res['auth_count']+1;
                    $res->ctime = time();
                    if($res->save()){
                        $flag = true;
                    }
                }else{
                    //提示错误
                    $message['msg'] = '同一个手机号每天最多只能发送' . $setting['count'] . '次验证码。';
                }
            }elseif(date('Ymd') > date('Ymd',$res['ctime'])){
                //发送清零
                $res->auth_content = $verify;
                $res->auth_count = 1;
                $res->ctime = time();
                if($res->save()){
                    $flag = true;
                }
            }
        }else{
            //发送添加
            $model = new AuthCodeRecord();
            $model->auth_number = $phone;
            $model->auth_type = 'phone';
            $model->auth_cate = $setting['code'];
            $model->auth_content = $verify;
            $model->auth_count = 1;
            $model->ctime = time();
            if($model->save()){
                $flag = true;
            }
        }
        if($flag){
            $time = $setting['time']/60;
            $data = array('numb' => strval($verify));
            $result = CUtils::sendMsg($phone, $data, $setting['code']);
            if($result->Code=='OK'){
                //记录发送的短信，记录发送短信的相关状态后台可以补发（需要新增字段来判断是否发送短信）
//            $msgid = $result->RequestId;
//            $bizid = $result->BizId;
//            $message = $result->Message;

                $message['status'] = true;
                $message['msg'] = '验证码发送成功';
            }

            CUtils::addMsgLog($type,$phone,$setting['code'],$result);
        }
        return $message;
    }

    /*
     * 为所有的发送短信操作添加日志记录
     * */
    public static function addMsgLog($type,$phone,$code,$result){
        $record['type'] = $type;
        $record['phone'] = $phone;
        $record['sms_code'] = $code;
        $record['request_id'] = $result->RequestId;
        $record['status'] = $result->Code=='OK'?1:2;
        $record['ctime'] = time();
        $record['sendtime'] = $result->Code=='OK'?time():null;
        $record['bizid'] = !empty($result->BizId)?$result->BizId:'';
        $record['code'] = $result->Code;
        $record['message'] = $result->Message;
        $record['ext'] = base64_encode(serialize(CUtils::object_to_array($result)));
        $model = new SmsRecord();
        $model->attributes = $record;
        $model->type = $record['type'];
        $model->ctime = $record['ctime'];
        $model->sendtime = $record['sendtime'];
        if($model->validate()){
            if($model->save()){
                return true;
            }
        }else{
            $model->getErrors();
        }
        return true;
    }


    /*
     * 获取当前访问ip方法1
     * */
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

    /*
     * 获取当前访问ip方法2
     * 获取客户端ip地址
     * 注意:如果你想要把ip记录到服务器上,请在写库时先检查一下ip的数据是否安全
     * */
    public static function getUserIp1(){
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        }
        elseif (getenv('HTTP_X_FORWARDED_FOR')) { //获取客户端用代理服务器访问时的真实ip 地址
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        }
        elseif (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        }
        elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');
        }
        elseif (getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
        }
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }


    /*
     * 获取当前访问ip方法3
     * */
    public static function getIp(){
        $onlineip='';
        if(getenv('HTTP_CLIENT_IP')&&strcasecmp(getenv('HTTP_CLIENT_IP'),'unknown')){
            $onlineip=getenv('HTTP_CLIENT_IP');
        } elseif(getenv('HTTP_X_FORWARDED_FOR')&&strcasecmp(getenv('HTTP_X_FORWARDED_FOR'),'unknown')){
            $onlineip=getenv('HTTP_X_FORWARDED_FOR');
        } elseif(getenv('REMOTE_ADDR')&&strcasecmp(getenv('REMOTE_ADDR'),'unknown')){
            $onlineip=getenv('REMOTE_ADDR');
        } elseif(isset($_SERVER['REMOTE_ADDR'])&&$_SERVER['REMOTE_ADDR']&&strcasecmp($_SERVER['REMOTE_ADDR'],'unknown')){
            $onlineip=$_SERVER['REMOTE_ADDR'];
        }
        return $onlineip;
    }

    /*
    * 将汉字转换为拼音
    * */
    public static function getPyName($res){
        $pcountry = '';
        $pcity = '';
        $pprovince = '';
        if($res){
            $country = $res['country'];
            $province = $res['province'];
            $city = $res['city'];
            $py = new PinYin();
            $pcountry = $py->getAllPY($country);
            $pprovince = $py->getAllPY($province);
            $pcity = $py->getAllPY($city);
        }
        return array(
            $pcountry,
            $pcity,
            $pprovince
        );
    }

    /*
     * 获取城市信息api
     * 通过用户的访问ip查询用户地区信息的首选方法（在新浪网ip查用户地区信息接口正常的时候使用）
     * */
    public static function getLocation($ip){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip=".$ip);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
        $str = curl_exec($curl);
        curl_close($curl);
        if($str==-2){
            $res = CUtils::getAddressData($ip);
            $tmp['country'] = '';
            $tmp['province'] = $res[0];
            $tmp['city'] = $res[1];
            $str = json_encode($tmp);
        }
        return $str;
    }

    /*
    * 通过用户的访问ip查询用户地区信息的备选方法（在新浪网ip查用户地区信息接口异常的时候使用）
    * */
    public static function getAddressData($ip){
        Yii::import('application.extensions.getIp.IpLocation');
        $ip_data = new IpLocation('qqwry.dat');
        $address = $ip_data->getlocation($ip);
        if(!empty($address['country'])||!empty($address['area'])){
            $country = !empty($address['country'])?iconv("gbk","utf-8",$address['country']):'';
            $area = !empty($address['area'])?iconv("gbk","utf-8",$address['area']):'';
        }else{
            $res = CUtils::getLocation($ip);
            $country = !empty($res['country'])?$res['country']:'';
            $city = !empty($res['country'])?$res['province']:'';
            $area = !empty($res['country'])?$res['city']:'';
        }

        return array(
            $country,
            $area
        );
    }

    /*
     * 测试mongodb
     * */
    public static function TestMongoDb(){
//        phpinfo();exit;
        $uri = "mongodb://192.168.0.100:27017";
        $client = new MongoDb\Driver\Manager($uri);
//        $client = new MongoClient($uri);
//        print_r($client);
//        $query = new MongoCode()
//        $client = new MongoClient($uri);
        $client = new Mongo($uri);
        print_r($client);

        $db = $client->test;
        print_r($db);
        $collection = $db->person;
        print_r($collection);

        $count = $collection->count();

        $collections = $collection->find()->snapshot();

        print_r($count);
        print_r($collections);
        foreach($collections as $k=>$v){
            echo $k;
            var_dump($v);
        }
        exit;
    }

    /*
     * 测试阿里大于的短信接口
     * */
    public static function TestSmsMsg(){
        CUtils::sendSms('13992891749',array('name'=>'张小辉','number'=>'1234567890'),'SMS_73500002');exit;
    }


    /**
     * 数组 转 对象
     *
     * @param array $arr 数组
     * @return object
     */
    public static function array_to_object($arr) {
        if (gettype($arr) != 'array') {
            return;
        }
        foreach ($arr as $k => $v) {
            if (gettype($v) == 'array' || getType($v) == 'object') {
                $arr[$k] = (object)CUtils::array_to_object($v);
            }
        }

        return (object)$arr;
    }

    /**
     * 对象 转 数组
     *
     * @param object $obj 对象
     * @return array
     */
    public static function object_to_array($obj) {
        $obj = (array)$obj;
        foreach ($obj as $k => $v) {
            if (gettype($v) == 'resource') {
                return;
            }
            if (gettype($v) == 'object' || gettype($v) == 'array') {
                $obj[$k] = (array)CUtils::object_to_array($v);
            }
        }

        return $obj;
    }

    //设置上传路径
    public static function setUplodaPath($type){
        $path = Yii::app()->params['conf']['path'];
        switch ($type){
            case 'logo':
                Yii::app()->upload->images_path = $path['defaultfile'];
                Yii::app()->upload->images_url = Yii::app()->baseUrl . str_replace($path['systemfile'], '', $path['defaultfile']);
                break;
            case 'news':
                Yii::app()->upload->images_path = $path['newspath'];
                Yii::app()->upload->images_url = Yii::app()->baseUrl . str_replace($path['systemfile'], '', $path['newspath']);
                break;
            case 'videopic':
                Yii::app()->upload->images_path = $path['videopic'];
                Yii::app()->upload->images_url = Yii::app()->baseUrl . str_replace($path['systemfile'], '', $path['videopic']);
                break;
            case 'articleimages':
                Yii::app()->upload->images_path = $path['articleimages'];
                Yii::app()->upload->images_url = Yii::app()->baseUrl . str_replace($path['systemfile'], '', $path['articleimages']);
                break;
            default:
                Yii::app()->upload->images_path = $path['defaultfile'];
                Yii::app()->upload->images_url = Yii::app()->baseUrl . str_replace($path['systemfile'], '', $path['defaultfile']);
                break;
        }
    }

    public static function getImageType($filename){
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

    public static function upladImage($type,$modelName,$modelAttr="",$width=0,$height=0,$iswatermark=false,$isthumb=false,$thumb_width=100,$thumb_height=100){
        $imgArr = array();
        if(!empty($_FILES[$modelName]['tmp_name'][$modelAttr])){
            $cutils = new CUtils();
            $cutils->setUplodaPath($type);
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
                    //$image->image_resize = true;
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

    /**
     * 字符截取 支持UTF8/GBK
     * @param $string
     * @param $length
     * @param $dot
     */
    public static function str_cut($string, $length, $dot = '...', $charset = 'utf-8') {
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


    /*移动端判断*/
    public static function isMobile()
    {
        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
        {
            return true;
        }
        // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if (isset ($_SERVER['HTTP_VIA']))
        {
            // 找不到为flase,否则为true
            return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
        }
        // 脑残法，判断手机发送的客户端标志,兼容性有待提高
        if (isset ($_SERVER['HTTP_USER_AGENT']))
        {
            $clientkeywords = array ('nokia',
                'sony',
                'ericsson',
                'mot',
                'samsung',
                'htc',
                'sgh',
                'lg',
                'sharp',
                'sie-',
                'philips',
                'panasonic',
                'alcatel',
                'lenovo',
                'iphone',
                'ipod',
                'blackberry',
                'meizu',
                'android',
                'netfront',
                'symbian',
                'ucweb',
                'windowsce',
                'palm',
                'operamini',
                'operamobi',
                'openwave',
                'nexusone',
                'cldc',
                'midp',
                'wap',
                'mobile'
            );
            // 从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
            {
                return true;
            }
        }
        // 协议法，因为有可能不准确，放到最后判断
        if (isset ($_SERVER['HTTP_ACCEPT']))
        {
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html'))))
            {
                return true;
            }
        }
        return false;
    }
}