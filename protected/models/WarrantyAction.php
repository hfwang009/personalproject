<?php

/**
 * This is the model class for table "{{warranty_action}}".
 *
 * The followings are the available columns in table '{{warranty_action}}':
 * @property integer $id
 * @property integer $wid
 * @property integer $acttime
 * @property string $action
 * @property string $action_no
 * @property integer $actpart
 * @property integer $storeid
 * @property string $constructor
 * @property string $act_reason
 * @property string $remark
 */
class WarrantyAction extends CActiveRecord
{
    public $ctime_start;
    public $ctime_end;
    public $acttime_start;
    public $acttime_end;
    public $carmodel;
    public $mid;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WarrantyAction the static model class
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
		return '{{warranty_action}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('wid, storeid, actpart, constructor, acttime, action', 'required', 'message'=>'{attribute}必须填写！'),
			array('wid, actpart, storeid', 'numerical', 'integerOnly'=>true),
			array('action, action_no, constructor, act_reason', 'length', 'max'=>300),
			array('remark', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, wid, acttime, action, action_no, actpart, storeid, constructor, act_reason, remark, admin_id, ctime', 'safe', 'on'=>'search'),
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
            'warranty'=>array(self::BELONGS_TO,'Warranty','wid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'wid' => '质保单号',
			'acttime' => '质保施工时间',
			'action' => '质保行为',
			'action_no' => '质保行为编号',
			'actpart' => '施工部位',
			'storeid' => '施工门店',
			'constructor' => '施工人员',
			'act_reason' => '质保原因',
			'remark' => '备注',
            'admin_id'=>'管理员',
            'ctime'=>'添加记录时间',
            'mid'=>'型号',
            'carmodel'=>'车型',
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
		$criteria->compare('acttime',$this->acttime);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('action_no',$this->action_no,true);
		$criteria->compare('actpart',$this->actpart);
		$criteria->compare('storeid',$this->storeid);
		$criteria->compare('constructor',$this->constructor,true);
		$criteria->compare('act_reason',$this->act_reason,true);
		$criteria->compare('remark',$this->remark,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function addWarrantyAction($post){
        if(!empty($_REQUEST['id'])){
            $waction = $this->find("id=:id",array(":id"=>$_REQUEST['id']));
            if(!empty($waction)){
                $waction->attributes = $post["WarrantyAction"];
                $waction->ctime = $post["WarrantyAction"]['ctime'];
                $waction->admin_id = $post["WarrantyAction"]['admin_id'];
                if($waction->validate()){
                    if($waction->save()){
                        return true;
                    }
                }else{
                    $this->getErrors();
                }
            }
        }else{
            $model = new WarrantyAction();
            $model->attributes = $post['WarrantyAction'];
            $model->ctime = $post["WarrantyAction"]['ctime'];
            $model->admin_id = $post["WarrantyAction"]['admin_id'];
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

    public function getActionData($id){
        $criteria = new CDbCriteria();
        $criteria->condition = 't.id="'.$id.'"';
        $criteria->with = array('admin','warranty'=>array('with'=>'store'));
        $action = $this->find($criteria);
        return $action;
    }

    public function getCriteriaCondition($criteria,$condition,$search){
        if(isset($condition['WarrantyAction']) && (count(array_filter($condition['WarrantyAction'])) > 0 )){
            $search->attributes = $condition['WarrantyAction'];
            if (!empty($condition['WarrantyAction']['storeid'])) {
                $criteria->condition .= ' and t.storeid = "' . $condition['WarrantyAction']['storeid'] .'" ';
            }
            if (!empty($condition['WarrantyAction']['actpart'])) {
                $criteria->condition .= ' and t.actpart = "' . $condition['WarrantyAction']['actpart'] .'" ';
            }
            if (!empty($condition['WarrantyAction']['wid'])) {
                $criteria->condition .= ' and t.wid = "' . $condition['WarrantyAction']['wid'] .'" ';
            }
            if (!empty($condition['WarrantyAction']['mid'])) {
                $criteria->condition .= ' and warranty.mid like "%' . $condition['WarrantyAction']['mid'] .'%" ';
            }
            if (!empty($condition['WarrantyAction']['carmodel'])) {
                $criteria->condition .= ' and warranty.carmodel like "%' . $condition['WarrantyAction']['carmodel'] .'%" ';
            }
            if (!empty($condition['WarrantyAction']['constructor'])) {
                $criteria->condition .= ' and t.constructor like "%' . $condition['WarrantyAction']['constructor'] .'%" ';
            }
            if (!empty($condition['WarrantyAction']['action_no'])) {
                $criteria->condition .= ' and t.action_no like "%' . $condition['WarrantyAction']['action_no'] .'%" ';
            }
            if (!empty($condition['WarrantyAction']['action'])) {
                $criteria->condition .= ' and t.action like "%' . $condition['WarrantyAction']['action'] .'%" ';
            }
            if (!empty($condition['WarrantyAction']['acttime_start'])) {
                $criteria->condition .= ' and t.acttime >= ' . strtotime($condition['WarrantyAction']['acttime_start'] .' 00:00:00');
                $search->ctime_start = $condition['WarrantyAction']['acttime_start'];
            }
            if (!empty($condition['WarrantyAction']['acttime_end'])) {
                $criteria->condition .= ' and t.acttime <= ' . strtotime($condition['WarrantyAction']['acttime_end'] .' 23:59:59');
                $search->ctime_end = $condition['WarrantyAction']['acttime_end'];
            }
            if (!empty($condition['WarrantyAction']['ctime_start'])) {
                $criteria->condition .= ' and t.ctime >= ' . strtotime($condition['WarrantyAction']['ctime_start'] .' 00:00:00');
                $search->ctime_start = $condition['WarrantyAction']['ctime_start'];
            }
            if (!empty($condition['WarrantyAction']['ctime_end'])) {
                $criteria->condition .= ' and t.ctime <= ' . strtotime($condition['WarrantyAction']['ctime_end'] .' 23:59:59');
                $search->ctime_end = $condition['WarrantyAction']['ctime_end'];
            }
        }
        if(empty($condition['sortFiled']) || empty($condition['sortValue'])){
            $condition['sortFiled'] = 'id';
            $condition['sortValue'] = 'desc';
        }
        $criteria->order = "t." . $condition['sortFiled'] . " " . $condition['sortValue'];
        $criteria->with = array('admin','warranty'=>array('with'=>'store'));
        return array(
            $criteria,
            $condition,
            $search
        );
    }
}