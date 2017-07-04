<?php

/**
 * This is the model class for table "{{warranty_detail}}".
 *
 * The followings are the available columns in table '{{warranty_detail}}':
 * @property integer $id
 * @property integer $wid
 * @property integer $pid
 * @property integer $num
 * @property integer $current_total
 * @property integer $type
 * @property integer $ctime
 */
class WarrantyDetail extends CActiveRecord
{
    public $ctime_start;
    public $ctime_end;
    public $telephone;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WarrantyDetail the static model class
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
		return '{{warranty_detail}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('wid, pid, num, ctime', 'required'),
			array('wid, pid, num, current_total, ctime', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, wid, pid, num, ctime, current_total,type,telephone', 'safe', 'on'=>'search'),
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
            'warranty'=>array(self::BELONGS_TO,'Warranty','wid'),
            'product'=>array(self::BELONGS_TO,'Product','pid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'wid' => '质保证书编号',
			'pid' => '产品序列号',
			'num' => '质保数量',
			'current_total' => '质保时库存数量',
			'type' => '安装位置',
			'ctime' => '质保时间',
			'telephone' => '手机号码',
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
		$criteria->compare('wid',$this->wid);
		$criteria->compare('pid',$this->pid);
		$criteria->compare('num',$this->num);
		$criteria->compare('current_total',$this->current_total);
		$criteria->compare('type',$this->type);
		$criteria->compare('ctime',$this->ctime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function addDetail($wid,$pid,$num,$current_num,$type){
        $model = new WarrantyDetail();
        $model->wid = $wid;
        $model->pid = $pid;
        $model->num = $num;
        $model->type = $type;
        $model->current_total = $current_num;
        $model->ctime = time();
        if($model->validate()){
            if($model->save()){
                return true;
            }
        }else{
            $model->getErrors();
        }
        return false;
    }

    public function getCriteriaCondition($criteria,$condition,$search){
        if(isset($condition['WarrantyDetail']) && (count(array_filter($condition['WarrantyDetail'])) > 0)){
            $search->attributes = $condition['WarrantyDetail'];
            if (!empty($condition['WarrantyDetail']['wid'])) {
                $criteria->condition .= ' and warranty.series_number LIKE "%' . $condition['WarrantyDetail']['wid'] .'%" ';
            }
            if (!empty($condition['WarrantyDetail']['pid'])) {
                $criteria->condition .= ' and t.pid = "' . $condition['WarrantyDetail']['pid'] .'" ';
            }
            if (!empty($condition['WarrantyDetail']['telephone'])) {
                $criteria->condition .= ' and warranty.telephone = "' . $condition['WarrantyDetail']['telephone'] .'" ';
            }
            if (!empty($condition['WarrantyDetail']['ctime_start'])) {
                $criteria->condition .= ' and t.ctime >= ' . strtotime($condition['WarrantyDetail']['ctime_start'] .' 00:00:00');
                $search->ctime_start = $condition['WarrantyDetail']['ctime_start'];
            }
            if (!empty($condition['WarrantyDetail']['ctime_end'])) {
                $criteria->condition .= ' and t.ctime <= ' . strtotime($condition['WarrantyDetail']['ctime_end'] .' 23:59:59');
                $search->ctime_end = $condition['WarrantyDetail']['ctime_end'];
            }
        }
        $criteria->with = array('warranty','product');
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
}