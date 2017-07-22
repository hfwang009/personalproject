<?php

/**
 * This is the model class for table "{{admin_log}}".
 *
 * The followings are the available columns in table '{{admin_log}}':
 * @property integer $id
 * @property string $controller
 * @property string $action
 * @property string $control
 * @property string $act
 * @property string $ip
 * @property integer $admin_id
 * @property integer $ctime
 */
class AdminLog extends CActiveRecord
{
    public $ctime_start;
    public $ctime_end;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AdminLog the static model class
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
		return '{{admin_log}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('controller,action', 'required'),
			array('id, admin_id, ctime', 'numerical', 'integerOnly'=>true),
			array('controller, action, control, act', 'length', 'max'=>100),
			array('ip', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, controller, action, control, act, ip, admin_id, ctime', 'safe', 'on'=>'search'),
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
            'admin'=>array(self::BELONGS_TO,'Admin','admin_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'controller' => '控制器',
			'action' => '方法',
			'control' => '控制',
			'act' => '操作',
			'ip' => '操作者ip',
			'admin_id' => '操作者id',
			'ctime' => '操作时间',
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
		$criteria->compare('controller',$this->controller,true);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('control',$this->control,true);
		$criteria->compare('act',$this->act,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('admin_id',$this->admin_id);
		$criteria->compare('ctime',$this->ctime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function addLog($post){
        if(!empty($_REQUEST['id'])){
            $log = $this->find("id=:id",array(":id"=>$_REQUEST['id']));
            if(!empty($log)){
                $log->attributes = $post["AdminLog"];
                $log->ctime = time();
                if($log->validate()){
                    if($log->save()){
                        return true;
                    }
                }else{
                    $this->getErrors();
                }
            }
        }else{
            $model = new AdminLog();
            $model->attributes = $post['AdminLog'];
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

    public function getCriteriaCondition($criteria,$condition,$search){
        if(isset($condition['AdminLog']) && (count(array_filter($condition['AdminLog'])) > 0 ||$condition['AdminLog']['status'] == '0')){
            $search->attributes = $condition['AdminLog'];
            if (!empty($condition['AdminLog']['admin_id'])) {
                $criteria->condition .= ' and t.admin_id = "' . $condition['AdminLog']['admin_id'] .'" ';
            }

            if (!empty($condition['AdminLog']['ctime_start'])) {
                $criteria->condition .= ' and t.ctime >= ' . strtotime($condition['AdminLog']['ctime_start'] .' 00:00:00');
                $search->ctime_start = $condition['AdminLog']['ctime_start'];
            }
            if (!empty($condition['AdminLog']['ctime_end'])) {
                $criteria->condition .= ' and t.ctime <= ' . strtotime($condition['AdminLog']['ctime_end'] .' 23:59:59');
                $search->ctime_end = $condition['AdminLog']['ctime_end'];
            }
        }
        $criteria->with = array('admin');
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