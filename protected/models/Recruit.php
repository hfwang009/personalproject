<?php

/**
 * This is the model class for table "{{recruit}}".
 *
 * The followings are the available columns in table '{{recruit}}':
 * @property integer $id
 * @property string $employ_name
 * @property string $edu_level
 * @property integer $sex
 * @property string $specialty
 * @property string $employ_length
 * @property string $desc
 * @property integer $enable
 * @property integer $isdeleted
 * @property integer $ctime
 * @property integer $lang
 */
class Recruit extends CActiveRecord
{
	public $sex_array;
	public $enable_array;
	public $ctime_start;
	public $ctime_end;
	public function init(){
		$this->sex_array = array('1'=>'男','2'=>'女','3'=>'不限');
		$this->enable_array = array('1'=>'激活','2'=>'未激活');
	}
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Recruit the static model class
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
		return '{{recruit}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('desc', 'required', 'message'=>'{attribute}必须填写！'),
			array('sex, enable, isdeleted, ctime', 'numerical', 'integerOnly'=>true, 'message'=>'{attribute}必须为数字！'),
			array('employ_name, specialty', 'length', 'max'=>200, 'tooLong' =>'{attribute}长度不能大于200个字节！'),
			array('edu_level, employ_length', 'length', 'max'=>100, 'tooLong' =>'{attribute}长度不能大于100个字节！'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employ_name, edu_level, sex, specialty, employ_length, desc, enable, isdeleted, ctime, lang', 'safe', 'on'=>'search'),
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
			'employ_name' => '职位名称',
			'edu_level' => '学历',
			'sex' => '性别',
			'specialty' => '专业',
			'employ_length' => '工作年限',
			'desc' => '任职要求',
			'enable' => '是否激活',
			'isdeleted' => '是否删除',
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
		$criteria->compare('employ_name',$this->employ_name,true);
		$criteria->compare('edu_level',$this->edu_level,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('specialty',$this->specialty,true);
		$criteria->compare('employ_length',$this->employ_length,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('enable',$this->enable);
		$criteria->compare('isdeleted',$this->isdeleted);
		$criteria->compare('ctime',$this->ctime);
        $criteria->compare('lang',$this->lang);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getCriteriaCondition($criteria,$condition,$search){
        $criteria->condition = 't.isdeleted = 1';
        if (isset($_GET['Recruit']) && count(array_filter($_GET['Recruit'])) > 0) {
            $search->attributes = $_GET['Recruit'];
            if (!empty($condition['Recruit']['employ_name'])) {
                $criteria->condition .= ' and t.employ_name like "%' . $condition['Recruit']['employ_name'] . '%"';
            }
            if (!empty($condition['Recruit']['lang'])) {
                $criteria->condition .= ' and t.lang = "' . $condition['Recruit']['lang'] . '"';
            }
            if (isset($condition['Recruit']['sex']) && $condition['Recruit']['sex'] != "" ){
                $criteria->condition .= ' and t.sex = ' . $condition['Recruit']['sex'];
            }
            if (isset($condition['Recruit']['enable']) && $condition['Recruit']['enable'] != "" ){
                $criteria->condition .= ' and t.enable = ' . $condition['Recruit']['enable'];
            }
            if(!empty($condition['Recruit']['ctime_start'])) {
                $criteria->condition .= ' and t.ctime >= ' . strtotime($condition['Recruit']['ctime_start']);
            }
            if(!empty($condition['Recruit']['ctime_end'])) {
                $criteria->condition .= ' and t.ctime <= ' . strtotime($condition['Recruit']['ctime_end']);
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