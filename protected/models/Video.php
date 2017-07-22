<?php

/**
 * This is the model class for table "{{video}}".
 *
 * The followings are the available columns in table '{{video}}':
 * @property string $id
 * @property string $title
 * @property string $thumb
 * @property string $video
 * @property string $desc
 * @property string $show_type
 * @property string $is_deleted
 * @property integer $ctime
 * @property integer $mtime
 * @property integer $lang
 */
class Video extends CActiveRecord
{
    public $show_type_array;
    public $ctime_start;
    public $ctime_end;

    public function init(){
        $this->show_type_array = array('1'=>'默认显示','2'=>'首页推荐');
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Video the static model class
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
        return '{{video}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, thumb, video, desc, show_type, ctime, mtime', 'required', 'message'=>'{attribute}必须填写！'),
            array('show_type, ctime, mtime', 'numerical', 'integerOnly'=>true, 'message'=>'{attribute}必须是整数'),
            array('title, thumb, video', 'length', 'max'=>255, 'tooLong' =>'{attribute}长度不能大于255个字节！'),
            array('desc', 'length', 'max'=>1000, 'tooLong' =>'{attribute}长度不能大于1000个字节！'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, thumb, video, desc, show_type, ctime, mtime, is_deleted, lang', 'safe', 'on'=>'search'),
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
            'thumb' => '缩略图',
            'video' => '视频',
            'desc' => '描述',
            'show_type' => '显示方式',
            'is_deleted' => '是否删除',
            'ctime' => '添加时间',
            'mtime' => '更新时间',
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

        $criteria->compare('id',$this->id,true);
        $criteria->compare('title',$this->title,true);
        $criteria->compare('thumb',$this->thumb,true);
        $criteria->compare('video',$this->video,true);
        $criteria->compare('desc',$this->desc,true);
        $criteria->compare('show_type',$this->show_type,true);
        $criteria->compare('is_deleted',$this->is_deleted);
        $criteria->compare('ctime',$this->ctime);
        $criteria->compare('mtime',$this->mtime);
        $criteria->compare('lang',$this->lang);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public function getCriteriaCondition($criteria,$condition,$search){
        $criteria->condition = ' is_deleted = "1" ';
        if(isset($_GET['Video'])&&count(array_filter($_GET['Video']))>0){
            $search->attributes = $_GET['Video'];
            if(isset($_GET['Video']['title'])&&!empty($_GET['Video']['title'])){
                $criteria->condition .= ' AND title LIKE "%'.$_GET['Video']['title'].'%"';
                $search['title'] = $_GET['Video']['title'];
            }
            if(isset($_GET['Video']['lang'])&&!empty($_GET['Video']['lang'])){
                $criteria->condition .= ' AND lang = "'.$_GET['Video']['lang'].'"';
                $search['lang'] = $_GET['Video']['lang'];
            }
            if(isset($_GET['Video']['ctime_start'])&&!empty($_GET['Video']['ctime_start'])){
                $criteria->condition .= ' AND ctime >='.intval(strtotime($_GET['Video']['ctime_start']));
                $search['ctime_start'] = $_GET['Video']['ctime_start'];
            }

            if(isset($_GET['Video']['ctime_end'])&&!empty($_GET['Video']['ctime_end'])){
                $criteria->condition .= ' AND ctime <='.intval(strtotime($_GET['Video']['ctime_end']));
                $search['ctime_end'] = $_GET['Video']['ctime_end'];
            }
        }
        if(empty($condition['sortFiled']) || empty($condition['sortValue'])){
            $condition['sortFiled'] = 'ctime';
            $condition['sortValue'] = 'desc';
        }
        $criteria->order = "t." . $condition['sortFiled'] . " " . $condition['sortValue'];
        return array(
            $criteria,
            $condition,
            $search
        );
    }
}