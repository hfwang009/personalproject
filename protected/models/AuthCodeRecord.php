<?php

/**
 * This is the model class for table "{{auth_code_record}}".
 *
 * The followings are the available columns in table '{{auth_code_record}}':
 * @property string $id
 * @property string $auth_number
 * @property string $auth_type
 * @property string $auth_cate
 * @property string $auth_content
 * @property integer $auth_count
 * @property integer $ctime
 */
class AuthCodeRecord extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AuthCodeRecord the static model class
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
		return '{{auth_code_record}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('auth_number, auth_cate, auth_content, ctime', 'required'),
			array('auth_count, ctime', 'numerical', 'integerOnly'=>true),
			array('auth_number, auth_cate', 'length', 'max'=>255),
			array('auth_type', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, auth_number, auth_type, auth_cate, auth_content, auth_count, ctime', 'safe', 'on'=>'search'),
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
			'auth_number' => 'Auth Number',
			'auth_type' => 'Auth Type',
			'auth_cate' => 'Auth Cate',
			'auth_content' => 'Auth Content',
			'auth_count' => 'Auth Count',
			'ctime' => 'Ctime',
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
		$criteria->compare('auth_number',$this->auth_number,true);
		$criteria->compare('auth_type',$this->auth_type,true);
		$criteria->compare('auth_cate',$this->auth_cate,true);
		$criteria->compare('auth_content',$this->auth_content,true);
		$criteria->compare('auth_count',$this->auth_count);
		$criteria->compare('ctime',$this->ctime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}