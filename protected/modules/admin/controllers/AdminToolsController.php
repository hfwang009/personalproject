<?php
class AdminToolsController extends CAdminController{
    public $column = 'tools';
    public $data;

    public function init(){
        //获取加载页面时存在的redis缓存的keys
        $this->data= $this->constructRedisData();
    }

    public function actionIndex(){
//        print_r(RedisInit::getInstance()->keys('carproject*'));exit;
        //将缓存数据排序为固定顺序，方便操作
        $ajax_url = $this->createUrl('setting');
        $this->render('index',array(
            'flush_data'=>$this->data,
            'ajax_url'=>$ajax_url
        ));
    }

    //获取格式化的redis数据
    private function constructRedisData(){
        $redis_keys = RedisInit::getInstance()->keys('carproject*');
        $flush_array = array();
        //获取所有redis的keys,可以执行一次全部清除
        $flush_array['all']['data'] = $redis_keys;
        $flush_array['all']['flush_name'] = '项目所有缓存';
        if(!empty($redis_keys)){
            foreach($redis_keys as $keys){
                $arr = explode(':',$keys);
                if($arr[1] == 'news'){
                    $flush_array['news']['flush_name'] = '项目资讯缓存';
                    $flush_array['news']['data'][] = $keys;
                }elseif($arr[1] == 'article'){
                    $flush_array['article']['flush_name'] = '项目文章缓存';
                    $flush_array['article']['data'][] = $keys;
                }
            }
        }
        $flush_array = $this->formatData($flush_array);
        return $flush_array;
    }

    private function formatData($data){
        $res = array();
        $arr = array('all','news','article');
        foreach($arr as $val){
            if(!isset($data[$val])){
                $res[$val]['data'] = array();
                switch($val){
                    case 'all':
                        $res[$val]['flush_name'] = '项目所有缓存';
                        break;
                    case 'news':
                        $res[$val]['flush_name'] = '项目资讯缓存';
                        break;
                    case 'article':
                        $res[$val]['flush_name'] = '项目文章缓存';
                        break;
                }
            }else{
                $res[$val] = $data[$val];
            }
        }
        return $res;
    }

    public function actionSetting(){
        $ct = Yii::app ()->request->getParam ( 'ct', '-1' );
        $ac = Yii::app ()->request->getParam ( 'ac', '-1' );
        if ($ct == "-1" || $ac == "-1") {
            echo CJSON::encode ( CUtils::retCode ( false, 0, '参数错误' ) );
            Yii::app ()->end ();
        }
        if($ct == "redis" && $ac == "flush"){
            $this->flush();
        }else{
            echo CJSON::encode(CUtils::retCode(false, 0, '参数错误'));
            Yii::app ()->end ();
        }
    }

    public function flush(){
        $state = false;
        $code = 0;
        $message = '清理缓存失败';
        $href = Yii::app()->request->urlReferrer;
        if(Yii::app()->request->isPostRequest){
            $type = $_POST['type'];
            if(!empty($type)){
//                $flush = $this->constructRedisData();
                $flush = $this->data;
                $redis_keys = $flush[$type]['data'];
                if(!empty($redis_keys)){
                    foreach($redis_keys as $key=>$keys){
                        RedisInit::getInstance()->del($keys);
                    }
                    $state = true;
                    $message = '清除缓存成功';
                }else{
                    $message = '没有缓存数据无法清理';
                }
            }else{
                $message = '数据获取失败';
            }
        }else{
            $message = '数据传输错误';
        }
        echo CJSON::encode(CUtils::retCode($state,$code,$message,$href));
        Yii::app()->end();
    }
}