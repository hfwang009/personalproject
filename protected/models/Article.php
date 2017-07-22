<?php

/**
 * This is the model class for table "{{article}}".
 *
 * The followings are the available columns in table '{{article}}':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $images
 * @property integer $ctime
 * @property integer $lang
 */
class Article extends CActiveRecord
{
    public $ctime_start;
    public $ctime_end;
    public $thumb;
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Article the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{article}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, content, ctime', 'required','message'=>'{attribute}参数必须填写！'),
            array('ctime', 'numerical', 'integerOnly'=>true),
            array('title', 'length', 'max'=>20000000),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, content, ctime, images, lang', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => '标题',
            'content' => '内容',
            'images' => '文章图片集合',
            'ctime' => '添加时间',
            'lang' => '语言',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('title',$this->title,true);
        $criteria->compare('content',$this->content,true);
        $criteria->compare('images',$this->images,true);
        $criteria->compare('ctime',$this->ctime);
        $criteria->compare('lang',$this->lang);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public function addArticle($post){
        if(!empty($_REQUEST['id'])){
            $article = $this->find("id=:id",array(":id"=>$_REQUEST['id']));
            if(!empty($article)){
                $article->attributes = $post["Article"];
                $article->images = $post["Article"]['images'];
                $article->lang = $post["Article"]['lang'];
                $article->ctime = time();
                if($article->validate()){
                    if($article->save()){
                        return true;
                    }
                }else{
                    $this->getErrors();
                }
            }
        }else{
            $model = new Article();
            $model->attributes = $post['Article'];
            $model->images = $post["Article"]['images'];
            $model->lang = $post["Article"]['lang'];
            $model->ctime = time();
            if($model->validate()){
                if($model->save()){
                    return true;
                }
            }else{
                $this->getErrors();
            }
        }
        return false;
    }

    public function getAllArticle(){
        $article = RedisInit::getInstance()->get('carproject:article',true);
        if(!$article){
            $article = array();
            $article = CJSON::decode(CJSON::encode($this->findAll()),true);
            $article = $this->__formatThumb($article);
            $second = CRedisUtils::getIntervalSecond();
            RedisInit::getInstance()->set('carproject:article',$article,$second,true);
        }
        return $article;
    }

    public function getArticle($current_pageNo,$pagesize,$order){
        $article_model = RedisInit::getInstance()->get('carproject:article:index:'.($current_pageNo-1))?json_decode(RedisInit::getInstance()->get('carproject:article:index:'.($current_pageNo-1)),true):false;
        if(!$article_model){
            $criteria = new CDbCriteria();
            $criteria->order = 'ctime '.$order;
            $model = new CActiveDataProvider('Article',array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>$pagesize
                )
            ));
            $_model = $model->getData();
            $_model = json_decode(CJSON::encode($_model),true);
            $pager = $model->getPagination();
            $_model = $this->__formatThumb($_model);
            $article_model['history'] = $_model;
            $article_model['pager'] = $pager;
            $article_model['pageSize'] = array($pager->pageSize);
            $article_model['itemCount'] = array($pager->itemCount);
            $article_model['currentPage'] = array($pager->currentPage);
            $second = CRedisUtils::getIntervalSecond();
            RedisInit::getInstance()->set('carproject:article:index:'.($current_pageNo-1),$article_model,$second,true);
        }else{
            $pager = new CPagination();
            $pager->pageVar = $article_model['pager']['pageVar'];
            $pager->pageSize = $article_model['pageSize'][0];
            $pager->itemCount = $article_model['itemCount'][0];
            $pager->currentPage = $current_pageNo-1;
            $article_model['pager'] = $pager;
        }
        return $article_model;
    }

    public function getArticle1(){
        $model = RedisInit::getInstance()->get('carproject:article:index')?json_decode(RedisInit::getInstance()->get('carproject:article:index'),true):false;
        if(!$model){
            $criteria = new CDbCriteria();
            $model = $this->findAll($criteria);
            $model = json_decode(CJSON::encode($model),true);
            $model = $this->__formatThumb($model);
            $second = CRedisUtils::getIntervalSecond();
            RedisInit::getInstance()->set('carproject:article:index',$model,$second,true);
        }
        return $model;
    }

    public function getCriteriaCondition($criteria,$condition,$search){
        if(isset($condition['Article']) && (count(array_filter($condition['Article'])) > 0 )){
            $search->attributes = $condition['Article'];
            if (!empty($condition['Article']['title'])) {
                $criteria->condition .= ' and t.title like "%' . $condition['Article']['title'] .'%" ';
            }
            if (!empty($condition['Article']['lang'])) {
                $criteria->condition .= ' and t.lang = "' . $condition['Article']['lang'] .'" ';
            }
            if (!empty($condition['Article']['ctime_start'])) {
                $criteria->condition .= ' and t.ctime >= ' . strtotime($condition['Article']['ctime_start'] .' 00:00:00');
                $search->ctime_start = $condition['Article']['ctime_start'];
            }
            if (!empty($condition['Article']['ctime_end'])) {
                $criteria->condition .= ' and t.ctime <= ' . strtotime($condition['Article']['ctime_end'] .' 23:59:59');
                $search->ctime_end = $condition['Article']['ctime_end'];
            }
        }
        if(empty($condition['sortFiled']) || empty($condition['sortValue'])){
            $condition['sortFiled'] = 'id';
            $condition['sortValue'] = 'desc';
        }
        $criteria->order = "t." . $condition['sortFiled'] . " " . $condition['sortValue'];
        return array(
            $criteria,
            $condition,
            $search
        );
    }

    private function __formatThumb($article){
        if(!empty($article)){
            foreach($article as $k=>&$v){
                $thumb = $this->__getDetailToImage($v['content']);
                $v['thumb'] = !empty($thumb)?$thumb:'';
            }
        }
        return $article;
    }

    //获取内容中图片
    private function __getDetailToImage($detail){
        $imgSrcArray = array();
        $new_arr = '';
        preg_match_all('/<img(.*?) src=[\'\"]+(.*?)[\'\"]+(.*?)[\/]?>/i',$detail,$imgSrcArray);
        if($imgSrcArray !== array() && !empty($imgSrcArray[2])){
            $new_arr = $imgSrcArray[2][0];
        }
        return $new_arr;
    }
}