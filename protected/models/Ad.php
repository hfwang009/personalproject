<?php

/**
 * This is the model class for table "{{ad}}".
 *
 * The followings are the available columns in table '{{ad}}':
 * @property string $ad_id
 * @property string $position_id
 * @property integer $media_type
 * @property string $ad_name
 * @property string $ad_link
 * @property string $ad_code
 * @property integer $start_time
 * @property integer $end_time
 * @property integer $ad_link_type
 * @property integer $sort_order
 * @property string $link_man
 * @property string $link_email
 * @property string $link_phone
 * @property integer $click_count
 * @property integer $enabled
 * @property integer $lang
 *
 * The followings are the available model relations:
 * @property AdPosition $position
 */
class Ad extends CActiveRecord
{
    public $ad_img = null;
    public $ad_flash = null;
    public $ad_text = null;
    public $ad_thumb = null;
    public $ad_video = null;
    public $ad_link_img = null;
    public $ad_link_font = null;
    public $ad_link_video = null;
    public $media_type_array;
    public $ad_position_array;
    public $ad_link_type_array;
    public $start_time_start;
    public $start_time_end;
    public $end_time_start;
    public $end_time_end;
    public $outer_link;
    public $outer_code;


    public function init(){
//        $this->media_type_array = array(1=>'图片', 2=>'Flash', 3=>'代码', 4=>'文字', 5=>'视频');
        $this->media_type_array = array(1=>'图片');
        $this->ad_position_array = $this->getPosition();
        $this->ad_link_type_array = array(1=>'当前标签页打开',2=>'新建标签页打开');
    }
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Ad the static model class
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
        return "{{ad}}";
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('position_id, ad_code, ad_link_type', 'required', 'message'=>'{attribute}必须填写！'),
            array('media_type, sort_order, click_count, enabled', 'numerical', 'integerOnly'=>true, 'message'=>'{attribute}必须为数字！'),
            array('position_id, link_phone', 'length', 'max'=>11, 'tooLong' =>'{attribute}长度不能大于11个字节！'),
            array('ad_name, link_man, link_email', 'length', 'max'=>60, 'tooLong' =>'{attribute}长度不能大于60个字节！'),
            array('ad_link', 'length', 'max'=>255, 'tooLong' =>'{attribute}长度不能大于255个字节！'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('ad_id, position_id, media_type, ad_name, ad_link, ad_code, start_time, end_time, sort_order, link_man, link_email, link_phone, click_count, enabled, lang', 'safe', 'on'=>'search'),
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
            'position' => array(self::BELONGS_TO, 'AdPosition', 'position_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'ad_id' => 'Ad',
            'position_id' => '广告位置',
            'media_type' => '媒介类型',
            'ad_name' => '广告标题',
            'ad_link' => '广告链接',
            'ad_code' => '广告代码',
            'ad_img' => '上传广告图片',
            'ad_flash' => '上传Flash文件',
            'ad_text' => '广告内容',
            'ad_thumb' => '上传视频缩略图',
            'ad_video' => '上传视频文件',
            'ad_link_img' => '广告链接',
            'ad_link_font' => '广告链接',
            'ad_link_video' => '广告链接',
            'start_time' => '开始日期',
            'end_time' => '结束日期',
            'sort_order' => '排序号',
            'ad_link_type' => '链接打开方式',
            'link_man' => '广告联系人',
            'link_email' => '联系人Email',
            'link_phone' => '联系电话',
            'click_count' => '点击数',
            'enabled' => '是否开启',
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

        $criteria->compare('ad_id',$this->ad_id,true);
        $criteria->compare('position_id',$this->position_id,true);
        $criteria->compare('media_type',$this->media_type);
        $criteria->compare('ad_name',$this->ad_name,true);
        $criteria->compare('ad_link',$this->ad_link,true);
        $criteria->compare('ad_code',$this->ad_code,true);
        $criteria->compare('start_time',$this->start_time);
        $criteria->compare('end_time',$this->end_time);
        $criteria->compare('sort_order',$this->sort_order,true);
        $criteria->compare('link_man',$this->link_man,true);
        $criteria->compare('ad_link_type',$this->ad_link_type,true);
        $criteria->compare('link_email',$this->link_email,true);
        $criteria->compare('link_phone',$this->link_phone,true);
        $criteria->compare('click_count',$this->click_count);
        $criteria->compare('enabled',$this->enabled);
        $criteria->compare('lang',$this->lang);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    private function getPosition() {
        $positionList = array();
        $model = AdPosition::model()->findAll();
        if(!empty($model)){
            foreach ($model as $key => $val) {
                $positionList[$val['position_id']] =  $val['position_name'] . ' [ ' . $val['ad_width'] . 'x' . $val['ad_height'] . ' ]';
            }
        }
        return $positionList;
    }

    public function getCriteriaCondition($criteria,$condition,$search){
        $criteria->condition = 1;
        if (isset($_GET['Ad']) && count(array_filter($_GET['Ad'])) > 0) {
            $search->attributes = $_GET['Ad'];
            if (!empty($condition['Ad']['name'])) {
                $criteria->condition .= ' and name like "%' . $condition['Ad']['name'] . '%"';
            }
            if (!empty($condition['Ad']['lang'])) {
                $criteria->condition .= ' and lang = "' . $condition['Ad']['lang'] . '"';
            }
            if (isset($condition['Ad']['position_id']) && $condition['Ad']['position_id'] != "" ){
                $criteria->condition .= ' and position_id = ' . $condition['Ad']['position_id'];
            }
            if (isset($condition['Ad']['media_type']) && $condition['Ad']['media_type'] != "" ){
                $criteria->condition .= ' and media_type = ' . $condition['Ad']['media_type'];
            }
            if(!empty($condition['Ad']['start_time_start'])) {
                $criteria->condition .= ' and start_time >= ' . strtotime($condition['Ad']['start_time_start']);
            }
            if(!empty($condition['Ad']['start_time_end'])) {
                $criteria->condition .= ' and start_time <= ' . strtotime($condition['Ad']['start_time_end']);
            }
            if(!empty($condition['Ad']['end_time_start'])) {
                $criteria->condition .= ' and end_time >= ' . strtotime($condition['Ad']['end_time_start']);
            }
            if(!empty($condition['Ad']['end_time_end'])) {
                $criteria->condition .= ' and end_time <= ' . strtotime($condition['Ad']['end_time_end']);
            }
            if (isset($condition['Ad']['enabled']) && $condition['Ad']['enabled'] != "" && $condition['Ad']['enabled'] != 3  ){
                $criteria->condition .= ' and enabled = ' . $condition['Ad']['enabled'];
            }
        }
        if(empty($condition['sortFiled']) || empty($condition['sortValue'])){
            $condition['sortFiled'] = 'position_id';
            $condition['sortValue'] = 'asc';
        }
        $criteria->order = "t." . $condition['sortFiled'] . " " . $condition['sortValue'];
        return array(
            $criteria,
            $condition,
            $search
        );
    }
}