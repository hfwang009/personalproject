<?php

/**
 * This is the model class for table "{{sms_record}}".
 *
 * The followings are the available columns in table '{{sms_record}}':
 * @property integer $id
 * @property integer $type
 * @property string $phone
 * @property string $request_id
 * @property integer $status
 * @property string $model
 * @property string $err_code
 * @property string $msg
 * @property string $ext
 */
class SmsRecord extends CActiveRecord
{
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
			array('type, status', 'numerical', 'integerOnly'=>true),
			array('phone', 'length', 'max'=>13),
			array('request_id, model, err_code, msg', 'length', 'max'=>100),
			array('ext', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, phone, request_id, status, model, err_code, msg, ext', 'safe', 'on'=>'search'),
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
			'type' => 'Type',
			'phone' => 'Phone',
			'request_id' => 'Request',
			'status' => 'Status',
			'model' => 'Model',
			'err_code' => 'Err Code',
			'msg' => 'Msg',
			'ext' => 'Ext',
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
		$criteria->compare('model',$this->model,true);
		$criteria->compare('err_code',$this->err_code,true);
		$criteria->compare('msg',$this->msg,true);
		$criteria->compare('ext',$this->ext,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}