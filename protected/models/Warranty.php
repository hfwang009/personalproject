<?php

/**
 * This is the model class for table "{{warranty}}".
 *
 * The followings are the available columns in table '{{warranty}}':
 * @property integer $id
 * @property string $series_number
 * @property string $mid
 * @property string $pid
 * @property string $name
 * @property string $telephone
 * @property string $address
 * @property string $carlicence
 * @property string $engineno
 * @property integer $construct_time
 * @property string $warrantytime
 * @property string $refuse_reason
 * @property string $constructor
 * @property string $guide
 * @property integer $storeid
 * @property integer $ctime
 * @property integer $create_user
 * @property integer $createtime
 * @property integer $is_send
 * @property string $extension
 * @property string $carmodel
 * @property string $pack_name
 */
class Warranty extends CActiveRecord
{
    public $createtime_start;
    public $createtime_end;
    public $ctime_start;
    public $ctime_end;
    public $type;
    public $status_arr=array(
        '0'=>'待审核',
        '1'=>'通过',
        '2'=>'驳回'
    );
    public $provinceid;
    public $cityid;
    public $areaid;
    public $num;

    public $_storeid;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Warranty the static model class
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
		return '{{warranty}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' name, telephone, address, engineno, construct_time,pack_name', 'required', 'message'=>'{attribute}必须填写！'),
			array('is_send, storeid, ctime', 'numerical', 'integerOnly'=>true),
			array('series_number, name, address, carlicence, engineno, warrantytime', 'length', 'max'=>500),
			array('telephone', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, series_number, mid, pid, name, telephone, address, carlicence, engineno, construct_time, warrantytime, storeid, ctime, status, create_user, createtime, refuse_reason, constructor, guide, is_send, extension, carmodel,pack_name', 'safe', 'on'=>'search'),
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
//            'model'=>array(self::BELONGS_TO,'Models','mid'),
//            'product'=>array(self::BELONGS_TO,'Product','pid'),
            'store'=>array(self::BELONGS_TO,'Store','storeid'),
            'admin'=>array(self::BELONGS_TO,'Admin','create_user'),
            'detail'=>array(self::HAS_ONE,'WarrantyDetail','id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'series_number' => '质保证书编号',
			'mid' => '质保产品型号',
			'pid' => '质保产品',
			'name' => '质保用户姓名',
			'telephone' => '质保用户电话',
			'address' => '客户地址',
			'carmodel' => '车型',
			'carlicence' => '车牌号码',
			'engineno' => '发动机编号',
			'construct_time' => '施工时间',
			'warrantytime' => '质保周期',
			'storeid' => '施工门店',
			'ctime' => '添加质保时间',
			'createtime' => '提交质保申请时间',
            'status'=>'质保单状态',
            'create_user'=>'添加质保单管理员',
            'refuse_reason'=>'未通过的理由',
            'provinceid'=>'所在省份',
            'cityid'=>'所在城市',
            'areaid'=>'所在区县',
            'constructor'=>'施工人员',
            'guide'=>'导购',
            'num'=>'质保数量',
            'pack_name'=>'套餐名称',
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
		$criteria->compare('series_number',$this->series_number,true);
		$criteria->compare('mid',$this->mid);
		$criteria->compare('pid',$this->pid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('carlicence',$this->carlicence,true);
		$criteria->compare('carmodel',$this->carmodel,true);
		$criteria->compare('engineno',$this->engineno,true);
		$criteria->compare('construct_time',$this->construct_time);
		$criteria->compare('warrantytime',$this->warrantytime,true);
		$criteria->compare('storeid',$this->storeid);
		$criteria->compare('ctime',$this->ctime);
		$criteria->compare('createtime',$this->createtime);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_user',$this->create_user);
		$criteria->compare('refuse_reason',$this->refuse_reason);
		$criteria->compare('constructor',$this->constructor);
		$criteria->compare('guide',$this->guide);
		$criteria->compare('is_send',$this->is_send);
		$criteria->compare('extension',$this->extension);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function addWarranty($post){
        if(!empty($_REQUEST['id'])){
            $warranty = $this->find("id=:id",array(":id"=>$_REQUEST['id']));
            if(!empty($warranty)){
                $warranty->attributes = $post["Warranty"];
                $warranty->telephone = $post['Warranty']['telephone'];
                $warranty->carmodel = $post['Warranty']['carmodel'];
                $warranty->create_user = $post['Warranty']['create_user'];
                $warranty->ctime = time();
                $warranty->series_number = date('YmdHis',time());
                if($warranty->validate()){
                    if($warranty->save()){
                        return true;
                    }
                }else{
                    $this->getErrors();
                }
            }
        }else{
            $model = new Warranty();
            $model->attributes = $post['Warranty'];
            $model->telephone = $post['Warranty']['telephone'];
            $model->carmodel = $post['Warranty']['carmodel'];
            $model->carlicence = !empty($post['Warranty']['carlicence'])?$post['Warranty']['carlicence']:'';
            $model->createtime = time();
            $model->status = 0;
            $model->mid = 0;
            $model->pid = 0;
            $model->ctime = 0;
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

    public function updateWarranty($post,$id){
        if(!empty($id)){
            return $this->__updateWarranty($post,$id);
        }else{
            return $this->__addWarranty($post);
        }
    }

    private function __addWarranty($post){
        $warranty = new Warranty();
//        $num = $post['Warranty']['num'];
//        unset($post['Warranty']['num']);
        $warranty->attributes = $post["Warranty"];
        $warranty->telephone = $post['Warranty']['telephone'];
        $warranty->create_user = $post['Warranty']['create_user'];
        $warranty->status = $post['Warranty']['status'];
        $warranty->refuse_reason = $post['Warranty']['refuse_reason'];
        $warranty->constructor = $post['Warranty']['constructor'];
        $warranty->carmodel = $post['Warranty']['carmodel'];
        $warranty->guide = $post['Warranty']['guide'];
        $warranty->pid = $post['Warranty']['pid'];
        $warranty->mid = $post['Warranty']['mid'];
        $warranty->extension = $post['Warranty']['extension'];
        $warranty->is_send = $post['Warranty']['is_send'];
        $warranty->ctime = time();
        $warranty->createtime = time();
        $warranty->series_number = $post['Warranty']['status']==1?date('YmdHis',time()):'';
        $products = $post['product'];
        unset($post['product']);
        if($warranty->validate()){
            if($warranty->save()){
                $id = $warranty->getPrimaryKey();
//                return $this->__modifyData($id,$num);
                $_warranty = $this->find("id=:id",array(":id"=>$id));
                if($_warranty['status']==1){
                    $details = WarrantyDetail::model()->findAll('wid = "'.$_warranty['id'].'"');
                    if(!empty($details)){
                        foreach($details as $detail){
                            $_pnum = $detail['num'];
                            $_pid = $detail['pid'];
                            $product = Product::model()->findByPk($_pid);
                            $product->current_num +=$_pnum;
                            $product->save();
                        }
                    }
                    WarrantyDetail::model()->deleteAll('wid = "'.$_warranty['id'].'"');
                    foreach($products as $_product){
                        $num = $_product['num'];
                        $pid = $_product['pid'];
                        $type = $_product['type'];
                        $this->__modifyData($id,$pid,$num,$type);
                    }
                    return $_warranty['id'];
                }else{
                    return $_warranty['id'];
                }
            }
        }else{
            $this->getErrors();
        }
        return false;
    }

    private function __updateWarranty($post,$id){
        $warranty = $this->find("id=:id",array(":id"=>$id));
        if(!empty($warranty)){
//            $num = $post['Warranty']['num'];
//            unset($post['Warranty']['num']);
            $warranty->attributes = $post["Warranty"];
            $warranty->telephone = $post['Warranty']['telephone'];
            $warranty->create_user = $post['Warranty']['create_user'];
            $warranty->status = $post['Warranty']['status'];
            $warranty->refuse_reason = $post['Warranty']['refuse_reason'];
            $warranty->constructor = $post['Warranty']['constructor'];
            $warranty->carmodel = $post['Warranty']['carmodel'];
            $warranty->guide = $post['Warranty']['guide'];
            $warranty->pid = $post['Warranty']['pid'];
            $warranty->mid = $post['Warranty']['mid'];
            $warranty->extension = $post['Warranty']['extension'];
            $warranty->is_send = $post['Warranty']['is_send'];
            $warranty->ctime = time();
            $warranty->series_number = !empty($warranty->series_number)?$warranty->series_number:($post['Warranty']['status']==1?date('YmdHis',time()):'');
            $products = $post['product'];
            unset($post['product']);
            if($warranty->validate()){
                if($warranty->save()){
                    $_warranty = $this->find("id=:id",array(":id"=>$id));
                    if($_warranty['status']==1){
                        $details = WarrantyDetail::model()->findAll('wid = "'.$_warranty['id'].'"');
                        if(!empty($details)){
                            foreach($details as $detail){
                                $_pnum = $detail['num'];
                                $_pid = $detail['pid'];
                                $product = Product::model()->findByPk($_pid);
                                $product->current_num +=$_pnum;
                                $product->save();
                            }
                        }
                        WarrantyDetail::model()->deleteAll('wid = "'.$_warranty['id'].'"');
                        foreach($products as $_product){
                            $num = $_product['num'];
                            $pid = $_product['pid'];
                            $type = $_product['type'];
                            $this->__modifyData($id,$pid,$num,$type);
                        }
                        return $_warranty['id'];
                    }else{
                        return $_warranty['id'];
                    }
                }
            }else{
                $this->getErrors();
            }
        }
        return false;
    }

    private function __modifyData($id,$pid,$num,$type){
        $_warranty = $this->find("id=:id",array(":id"=>$id));
        $product = Product::model()->findByPk($pid);
        $product->current_num -=$num;
        $product->udpatetime = time();
        $product->save();
        $pid1 = $product->getPrimaryKey();
        $__product = Product::model()->findByPk($pid1);
        if(WarrantyDetail::model()->addDetail($_warranty['id'],$pid,$num,$__product['current_num'],$type)){
            return $_warranty['id'];
        }
        return false;
    }

    public function getWarrantyData(){
        $models = $this->findAll();
        return CHtml::listData($models,'id','name');
    }

    public function getWarrantyByParams($param){
        $criteria = new CDbCriteria();
        $criteria->condition = '1';
        if(!empty($param)){
            $_param = (int)$param===0?'':$param;
            $flag = CUtils::judgePhone($_param);
            if($flag){
                $criteria->condition .= ' AND t.telephone = "'.$param.'"';
            }else{
                $criteria->condition .= ' AND ( t.engineno = "'.$param.'" OR t.series_number="'.$param.'")';
//                $criteria->condition .= ' AND (t.carlicence = "'.$param.'" OR t.engineno = "'.$param.'" OR t.series_number="'.$param.'")';
            }
        }
        $criteria->condition .= ' AND t.status=1';
        $criteria->with = array('admin','store');
        $criteria->order = 't.ctime desc';
        $warrantys = $this->findAll($criteria);
        if(!empty($warrantys)){
            foreach($warrantys as &$warranty){
                $warranty = CUtils::formatData($warranty);
            }
        }
        return $warrantys;
    }

    public function getWarrantyDataByPk($id){
        $criteria = new CDbCriteria();
        $criteria->condition = '1';
        $criteria->condition .= ' AND t.id = "'.$id.'"';
        $criteria->condition .= ' AND t.status=1';
        $criteria->with = array('admin','store');
        $warranty = $this->find($criteria);
        $warranty = CUtils::formatData1($warranty);
        return $warranty;
    }

    public function getCriteriaCondition($criteria,$condition,$search){
        if(isset($condition['Warranty']) && (count(array_filter($condition['Warranty'])) > 0 ||$condition['Warranty']['status'] == '0')){
            $search->attributes = $condition['Warranty'];
            if (!empty($condition['Warranty']['telephone'])) {
                $criteria->condition .= ' and t.telephone like "%' . $condition['Warranty']['telephone'] .'%" ';
            }
            if (!empty($condition['Warranty']['carmodel'])) {
                $criteria->condition .= ' and t.carmodel like "%' . $condition['Warranty']['carmodel'] .'%" ';
            }
            if (!empty($condition['Warranty']['carlicence'])) {
                $criteria->condition .= ' and t.carlicence like "%' . $condition['Warranty']['carlicence'] .'%" ';
            }
            if (!empty($condition['Warranty']['engineno'])) {
                $criteria->condition .= ' and t.engineno like "%' . $condition['Warranty']['engineno'] .'%" ';
            }
            if (!empty($condition['Warranty']['series_number'])) {
                $criteria->condition .= ' and t.series_number like "%' . $condition['Warranty']['series_number'] .'%" ';
            }
            if (!empty($condition['Warranty']['mid'])) {
                $criteria->condition .= ' and t.mid like "%' . $condition['Warranty']['mid'] .'%" ';
            }
            if (!empty($condition['Warranty']['pid'])) {
                $criteria->condition .= ' and t.pid like "%' . $condition['Warranty']['pid'] .'%" ';
            }
            if ($condition['Warranty']['status']!=='') {
                $criteria->condition .= ' and t.status = "' . $condition['Warranty']['status'] .'" ';
            }
        }
        $criteria->with = array('store','admin');
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

    public function checkWarranty($name,$telephone,$carmodel,$engineno,$carlicence=null){
        $criteria = new CDbCriteria();
        $criteria->condition=1;
        if(!empty($name)){
            $criteria->condition.=' AND name="'.$name.'"';
        }
        if(!empty($telephone)){
            $criteria->condition.=' AND telephone="'.$telephone.'"';
        }
        if(!empty($carlicence)){
            $criteria->condition.=' AND carlicence="'.$carlicence.'"';
        }
        if(!empty($carmodel)){
            $criteria->condition.=' AND carmodel="'.$carmodel.'"';
        }
        if(!empty($engineno)){
            $criteria->condition.=' AND engineno="'.$engineno.'"';
        }
        $criteria->order = 'createtime desc';
        $warranty = $this->find($criteria);
        if(!empty($warranty)){
            $createtime = !empty($warranty['createtime'])?$warranty['createtime']:'';
            if($createtime){
                $calc = time()-$createtime;
                if($calc<7*24*3600){
                    return false;
                }else{
                    return true;
                }
            }else{
                return true;
            }
        }else{
            return true;
        }
    }
}