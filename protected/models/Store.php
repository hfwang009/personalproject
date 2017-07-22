<?php

/**
 * This is the model class for table "{{store}}".
 *
 * The followings are the available columns in table '{{store}}':
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property integer $provinceid
 * @property integer $cityid
 * @property integer $areaid
 * @property string $address
 * @property string $telephone
 * @property string $lat
 * @property string $lng
 * @property string $eaddress
 * @property string $ename
 */
class Store extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Store the static model class
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
		return '{{store}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, provinceid, cityid,telephone,address', 'required','message'=>'{attribute}必须填写！'),
			array('type, provinceid, cityid,areaid', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20000000),
			array('address', 'length', 'max'=>20000000),
			array('telephone, lat, lng', 'length', 'max'=>25),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, type, provinceid, cityid,areaid, address, telephone, lat, lng, ename, eaddress', 'safe', 'on'=>'search'),
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
            'warranty'=>array(self::HAS_ONE,'Warranty','id'),
            'product'=>array(self::HAS_ONE,'Product','id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => '门店名称',
			'type' => '门店类型',
			'provinceid' => '所在省份',
			'cityid' => '所在城市',
			'areaid' => '所在区县',
			'address' => '详细地址',
			'telephone' => '联系电话',
			'lat' => '经度',
			'lng' => '维度',
            'ename' => '英文门店名称',
            'eaddress' => '英文详细地址',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('provinceid',$this->provinceid);
		$criteria->compare('cityid',$this->cityid);
		$criteria->compare('areaid',$this->cityid);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('lat',$this->lat,true);
		$criteria->compare('lng',$this->lng,true);
        $criteria->compare('ename',$this->ename);
        $criteria->compare('eaddress',$this->eaddress);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getStore(){
        return CHtml::listData($this->findAll(),'id','name');
    }

    public function addStore($post){
        if(!empty($_REQUEST['id'])){
            $store = $this->find("id=:id",array(":id"=>$_REQUEST['id']));
            if(!empty($store)){
                $store->attributes = $post["Store"];
                $store->ename = $post["Store"]['ename'];
                $store->eaddress = $post["Store"]['eaddress'];
                if($store->validate()){
                    if($store->save()){
                        return true;
                    }
                }else{
                    $this->getErrors();
                }
            }
        }else{
            $model = new Store();
            $model->attributes = $post['Store'];
            $model->ename = $post["Store"]['ename'];
            $model->eaddress = $post["Store"]['eaddress'];
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

    public function getStoresByParams($type,$provinceid,$cityid,$areaid){
        $result = array();
        $criteria = new CDbCriteria();
        $criteria->condition = 1;
        if(!empty($type)){
            $criteria->condition.= ' AND type="'.$type.'"';
        }
        if(!empty($provinceid)&&!empty($cityid)&&!empty($areaid)){
            $criteria->condition.= ' AND areaid="'.$areaid.'"';
        }elseif(!empty($provinceid)&&!empty($cityid)&&empty($areaid)){
            $criteria->condition.= ' AND cityid="'.$cityid.'"';
        }elseif(!empty($provinceid)&&empty($cityid)&&empty($areaid)){
            $criteria->condition.= ' AND provinceid="'.$provinceid.'"';
        }
        $result = $this->findAll($criteria);
        return $result;
    }

    public function getCriteriaCondition($criteria,$condition,$search){
        if(isset($condition['Store']) && (count(array_filter($condition['Store'])) > 0 )){
            $search->attributes = $condition['Store'];
            if (!empty($condition['Store']['name'])) {
                $criteria->condition .= ' and t.name like "%' . $condition['Store']['name'] .'%" ';
            }
            if (!empty($condition['Store']['ename'])) {
                $criteria->condition .= ' and t.ename like "%' . $condition['Store']['ename'] .'%" ';
            }
            if (!empty($condition['Store']['provinceid'])&&empty($condition['Store']['cityid'])) {
                $criteria->condition .= ' and t.provinceid = "' . $condition['Store']['provinceid'] .'" ';
            }
            if (!empty($condition['Store']['cityid'])&&empty($condition['Store']['areaid'])) {
                $criteria->condition .= ' and t.cityid = "' . $condition['Store']['cityid'] .'" ';
            }
            if (!empty($condition['Store']['areaid'])) {
                $criteria->condition .= ' and t.areaid = "' . $condition['Store']['areaid'] .'" ';
            }
            if (!empty($condition['Store']['telephone'])) {
                $criteria->condition .= ' and t.telephone like "%' . $condition['Store']['telephone'] .'%" ';
            }
            if (!empty($condition['Store']['address'])) {
                $criteria->condition .= ' and t.address like "%' . $condition['Store']['address'] .'%" ';
            }
            if (!empty($condition['Store']['eaddress'])) {
                $criteria->condition .= ' and t.eaddress like "%' . $condition['Store']['eaddress'] .'%" ';
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

    public function getRelaStores($id,$tag=false,$flag = false){
        $html = '';
        if(empty($id)||empty($tag)){
            $model = $this->findAll();
        }else{
            $model = $this->findAll($tag.' = ' . intval($id));
        }
        $stores = '';
        if($flag){
            $stores = "<option value=''>-- 请选择  --</option>";
        }
        if(!empty($model)){
            foreach ($model as $_data){
                $stores .= CHtml::tag('option', array('value'=>$_data['id']),CHtml::encode($_data['name']),true);
            }
        }
        $html = $stores;
        return $html;
    }

    public function getRelaStores1($id,$tag=false){
        $data = array();
        if(empty($id)||empty($tag)){
            $model = $this->findAll();
        }else{
            $model = $this->findAll($tag.' = ' . intval($id));
        }
        if(!empty($model)){
            $stores = CHtml::listData($model,'id','name');
        }
        $data = !empty($stores)?$stores:$data;
        return $data;
    }
}