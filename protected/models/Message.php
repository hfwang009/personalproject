<?php

/**
 * This is the model class for table "{{message}}".
 *
 * The followings are the available columns in table '{{message}}':
 * @property integer $id
 * @property integer $type
 * @property string $name
 * @property string $telephone
 * @property string $address
 * @property string $message
 * @property integer $ctime
 */
class Message extends CActiveRecord
{
    public $type_arr;
    public $authcode;
    public $ctime_start;
    public $ctime_end;
    public function init(){
        $this->type_arr  = array(
            '1'=>'先生',
            '2'=>'女士',
            '3'=>'公司',
        );
    }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Message the static model class
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
		return '{{message}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, type, ctime', 'numerical', 'integerOnly'=>true),
			array('name, address', 'length', 'max'=>500),
			array('telephone', 'length', 'max'=>13),
			array('message', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, name, telephone, address, message, ctime', 'safe', 'on'=>'search'),
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
			'type' => '称谓',
			'name' => '名称',
			'telephone' => '电话',
			'address' => '地址',
			'message' => '消息',
			'ctime' => '创建时间',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('ctime',$this->ctime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getCriteriaCondition($criteria,$condition,$search){
        if(isset($condition['Message']) && (count(array_filter($condition['Message'])) > 0 )){
            $search->attributes = $condition['Message'];
            if (!empty($condition['Message']['name'])) {
                $criteria->condition .= ' and t.name like "%' . $condition['Message']['name'] .'%" ';
            }
            if (!empty($condition['Message']['telephone'])) {
                $criteria->condition .= ' and t.telephone like "%' . $condition['Message']['telephone'] .'%" ';
            }
            if (!empty($condition['Message']['ctime_start'])) {
                $criteria->condition .= ' and t.ctime >= ' . strtotime($condition['Message']['ctime_start'] .' 00:00:00');
                $search->ctime_start = $condition['Message']['ctime_start'];
            }
            if (!empty($condition['Message']['ctime_end'])) {
                $criteria->condition .= ' and t.ctime <= ' . strtotime($condition['Message']['ctime_end'] .' 23:59:59');
                $search->ctime_end = $condition['Message']['ctime_end'];
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

    public function addMessage($post){
        if(!empty($_REQUEST['id'])){
            $message = $this->find("id=:id",array(":id"=>$_REQUEST['id']));
            if(!empty($message)){
                $message->attributes = $post["Message"];
                $message->name = $post["Message"]['name'];
                $message->type = $post["Message"]['type'];
                $message->telephone = $post["Message"]['telephone'];
                $message->address = $post["Message"]['address'];
                $message->message = $post["Message"]['message'];
                $message->ctime = time();
                if($message->validate()){
                    if($message->save()){
                        return true;
                    }
                }else{
                    $this->getErrors();
                }
            }
        }else{
            $model = new Message();
            $model->attributes = $post['Message'];
            $model->name = $post["Message"]['name'];
            $model->type = $post["Message"]['type'];
            $model->telephone = $post["Message"]['telephone'];
            $model->address = $post["Message"]['address'];
            $model->message = $post["Message"]['message'];
            $model->ctime = time();
            if($model->validate()){
                if($model->save()){
                    return true;
                }
            }else{
                var_dump($this->getErrors());exit;
                $this->getErrors();
            }
        }
        return false;
    }
}