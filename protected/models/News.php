<?php

/**
 * This is the model class for table "{{news}}".
 *
 * The followings are the available columns in table '{{news}}':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $ctime
 */
class News extends CActiveRecord
{
    public $ctime_start;
    public $ctime_end;
    public $thumb;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
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
		return '{{news}}';
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
			array('id, title, content, ctime', 'safe', 'on'=>'search'),
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
			'ctime' => '添加时间',
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
		$criteria->compare('ctime',$this->ctime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function addNews($post){
        if(!empty($_REQUEST['id'])){
            $news = $this->find("id=:id",array(":id"=>$_REQUEST['id']));
            if(!empty($news)){
                $news->attributes = $post["News"];
                $news->ctime = time();
                if($news->validate()){
                    if($news->save()){
                        return true;
                    }
                }else{
                    $this->getErrors();
                }
            }
        }else{
            $model = new News();
            $model->attributes = $post['News'];
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

    public function getAllNews(){
        $news = RedisInit::getInstance()->get('carproject:news',true);
        if(!$news){
            $news = array();
            $news = CJSON::decode(CJSON::encode($this->findAll()),true);
            $news = $this->__formatThumb($news);
            $second = CRedisUtils::getIntervalSecond();
            RedisInit::getInstance()->set('carproject:news',$news,$second,true);
        }
        return $news;
    }

    public function getNews($current_pageNo,$pagesize,$order){
        $news_model = RedisInit::getInstance()->get('carproject:news:index:'.($current_pageNo-1))?json_decode(RedisInit::getInstance()->get('carproject:news:index:'.($current_pageNo-1)),true):false;
        if(!$news_model){
            $criteria = new CDbCriteria();
            $criteria->order = 'ctime '.$order;
            $model = new CActiveDataProvider('News',array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>$pagesize
                )
            ));
            $_model = $model->getData();
            $_model = json_decode(CJSON::encode($_model),true);
            $pager = $model->getPagination();
            $_model = $this->__formatThumb($_model);
            $news_model['history'] = $_model;
            $news_model['pager'] = $pager;
            $news_model['pageSize'] = array($pager->pageSize);
            $news_model['itemCount'] = array($pager->itemCount);
            $news_model['currentPage'] = array($pager->currentPage);
            $second = CRedisUtils::getIntervalSecond();
            RedisInit::getInstance()->set('carproject:news:index:'.($current_pageNo-1),$news_model,$second,true);
        }else{
            $pager = new CPagination();
            $pager->pageVar = $news_model['pager']['pageVar'];
            $pager->pageSize = $news_model['pageSize'][0];
            $pager->itemCount = $news_model['itemCount'][0];
            $pager->currentPage = $current_pageNo-1;
            $news_model['pager'] = $pager;
        }
        return $news_model;
    }

    public function getCriteriaCondition($criteria,$condition,$search){
        if(isset($condition['News']) && (count(array_filter($condition['News'])) > 0 )){
            $search->attributes = $condition['News'];
            if (!empty($condition['News']['title'])) {
                $criteria->condition .= ' and t.title like "%' . $condition['News']['title'] .'%" ';
            }
            if (!empty($condition['News']['ctime_start'])) {
                $criteria->condition .= ' and t.ctime >= ' . strtotime($condition['News']['ctime_start'] .' 00:00:00');
                $search->ctime_start = $condition['News']['ctime_start'];
            }
            if (!empty($condition['News']['ctime_end'])) {
                $criteria->condition .= ' and t.ctime <= ' . strtotime($condition['News']['ctime_end'] .' 23:59:59');
                $search->ctime_end = $condition['News']['ctime_end'];
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

    private function __formatThumb($news){
        if(!empty($news)){
            foreach($news as $k=>&$v){
                $thumb = $this->__getDetailToImage($v['content']);
                $v['thumb'] = !empty($thumb)?$thumb:'';
            }
        }
        return $news;
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