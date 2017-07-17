<?php

/**
 * This is the model class for table "{{admin}}".
 *
 * The followings are the available columns in table '{{admin}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $status
 * @property integer $role_id
 * @property integer $province
 * @property integer $city
 * @property integer $area
 * @property integer $created
 */
class Admin extends CActiveRecord
{
    public $confirm_password;
    public $newpassword;
    public $created_start;
    public $created_end;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Admin the static model class
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
		return '{{admin}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, role_id', 'required','message'=>'{attribute}必须填写'),
            array('role_id,created,status','numerical','integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, status, role_id, created,province,city,area,created_start,created_end', 'safe', 'on'=>'search'),
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
            'product'=>array(self::HAS_ONE,'Product','id'),
            'warranty'=>array(self::HAS_ONE,'Warranty','id'),
            'adminlog'=>array(self::HAS_ONE,'AdminLog','id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => '管理员用户名',
			'password' => '密码',
			'status' => '状态',
			'role_id' => '管理员角色ID',
			'created' => '更新时间',
			'newpassword' => '新密码',
            'confirm_password' => '确认密码',
            'province' => '负责省份/直辖市',
            'city' => '负责城市',
            'area' => '负责区县',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('created',$this->created);
		$criteria->compare('prvince',$this->prvince);
		$criteria->compare('city',$this->city);
		$criteria->compare('area',$this->area);
		$criteria->compare('created_start',$this->created_start);
		$criteria->compare('created_end',$this->created_end);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function addAdmin($post){
        if(!empty($_REQUEST['id'])){
            $admin = $this->find("id=:id",array(":id"=>$_REQUEST['id']));
            if(!empty($admin)){
                $admin->attributes = $post["Admin"];
                $admin->created = time();
//                $admin->province = $post['Admin']['province'];
//                $admin->city = $post['Admin']['city'];
//                $admin->area = $post['Admin']['area'];
                if($admin->validate()){
                    if($admin->save()){
                        return true;
                    }
                }else{
                    $this->getErrors();
                }
            }
        }else{
            $model = new Admin();
            $post['Admin']['password'] = md5($post['Admin']['password']);
            $post['Admin']['status'] = 1;
            unset($post['Admin']['confirm_password']);
            $model->attributes = $post['Admin'];
            $model->created = time();
//            $model->province = $post['Admin']['province'];
//            $model->city = $post['Admin']['city'];
//            $model->area = $post['Admin']['area'];
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

    public function getCriteriaCondition($criteria,$condition,$search){
        if(isset($condition['Admin']) && (count(array_filter($condition['Admin'])) > 0 )){
            $search->attributes = $condition['Admin'];
            if (!empty($condition['Admin']['username'])) {
                $criteria->condition .= ' and t.username like "%' . $condition['Admin']['username'] .'%" ';
            }
            if (!empty($condition['Admin']['created_start'])) {
                $criteria->condition .= ' and t.created >= ' . strtotime($condition['Admin']['created_start'] .' 00:00:00');
                $search->created_start = $condition['Admin']['created_start'];
            }
            if (!empty($condition['Admin']['created_end'])) {
                $criteria->condition .= ' and t.created <= ' . strtotime($condition['Admin']['created_end'] .' 23:59:59');
                $search->created_end = $condition['Admin']['created_end'];
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