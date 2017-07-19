<?php

/**
 * This is the model class for table "{{sms_record}}".
 *
 * The followings are the available columns in table '{{sms_record}}':
 * @property integer $id
 * @property string $type
 * @property string $phone
 * @property string $request_id
 * @property integer $status
 * @property string $bizid
 * @property string $code
 * @property string $message
 * @property string $sms_code
 * @property string $ext
 * @property integer $ctime
 * @property integer $sendtime
 */
class SmsRecord extends CActiveRecord
{
    public $sendtime_start;
    public $sendtime_end;
    public $ctime_start;
    public $ctime_end;
    public $type_arr = array('auth'=>'验证码','success'=>'质保成功','fail'=>'质保失败');
    public $status_arr = array(1=>'成功',2=>'失败');
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SmsRecord the static model class
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
		return '{{sms_record}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'numerical', 'integerOnly'=>true),
			array('phone', 'length', 'max'=>13),
			array('request_id, bizid, code, message, sms_code', 'length', 'max'=>100),
			array('ext', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, phone, request_id, status, bizid, code, message, sms_code, ext, ctime, sendtime', 'safe', 'on'=>'search'),
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
			'type' => '短信类型',
			'phone' => '电话号码',
			'request_id' => '短信请求id',
			'status' => '发送状态',
			'bizid' => 'Bizid',
			'code' => '返回值',
			'message' => '返回信息',
			'sms_code' => '短信模板编码',
			'ext' => '具体信息',
			'ctime' => '调用接口时间',
			'sendtime' => '发送信息',
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
		$criteria->compare('type',$this->type);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('request_id',$this->request_id,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('bizid',$this->bizid,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('sms_code',$this->sms_code,true);
		$criteria->compare('ext',$this->ext,true);
		$criteria->compare('ctime',$this->ctime,true);
		$criteria->compare('sendtime',$this->sendtime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getCriteriaCondition($criteria,$condition,$search){
        if(isset($condition['SmsRecord']) && (count(array_filter($condition['SmsRecord'])) > 0 )){
            $search->attributes = $condition['SmsRecord'];
            if (!empty($condition['SmsRecord']['type'])) {
                $criteria->condition .= ' and t.type = "' . $condition['SmsRecord']['type'] .'" ';
            }
            if (!empty($condition['SmsRecord']['status'])) {
                $criteria->condition .= ' and t.status = "' . $condition['SmsRecord']['status'] .'" ';
            }
            if (!empty($condition['SmsRecord']['sms_code'])) {
                $criteria->condition .= ' and t.sms_code like "%' . $condition['SmsRecord']['sms_code'] .'%" ';
            }
            if (!empty($condition['SmsRecord']['phone'])) {
                $criteria->condition .= ' and t.phone like "%' . $condition['SmsRecord']['phone'] .'%" ';
            }
            if (!empty($condition['SmsRecord']['ctime_start'])) {
                $criteria->condition .= ' and t.ctime >= ' . strtotime($condition['SmsRecord']['ctime_start'] .' 00:00:00');
                $search->ctime_start = $condition['SmsRecord']['ctime_start'];
            }
            if (!empty($condition['SmsRecord']['ctime_end'])) {
                $criteria->condition .= ' and t.ctime <= ' . strtotime($condition['SmsRecord']['ctime_end'] .' 23:59:59');
                $search->ctime_end = $condition['SmsRecord']['ctime_end'];
            }
            if (!empty($condition['SmsRecord']['sendtime_start'])) {
                $criteria->condition .= ' and t.sendtime >= ' . strtotime($condition['SmsRecord']['sendtime_start'] .' 00:00:00');
                $search->ctime_start = $condition['SmsRecord']['sendtime_start'];
            }
            if (!empty($condition['SmsRecord']['sendtime_end'])) {
                $criteria->condition .= ' and t.sendtime <= ' . strtotime($condition['SmsRecord']['sendtime_end'] .' 23:59:59');
                $search->ctime_end = $condition['SmsRecord']['sendtime_end'];
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
}