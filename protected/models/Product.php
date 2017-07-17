<?php

/**
 * This is the model class for table "{{product}}".
 *
 * The followings are the available columns in table '{{product}}':
 * @property integer $id
 * @property integer $mid
 * @property integer $bid
 * @property string $name
 * @property string $series_number
 * @property integer $total
 * @property integer $current_num
 * @property integer $province
 * @property integer $city
 * @property integer $type
 * @property integer $area
 * @property string $costtime
 * @property string $create_user
 * @property string $intro
 * @property integer $ctime
 * @property integer $customer
 * @property integer $spec
 * @property integer $udpatetime
 * @property integer $company
 * @property integer $remarks
 * @property integer $storeid
 */
class Product extends CActiveRecord
{
    public $ctime_start;
    public $ctime_end;
    public $province1;
    public $city1;
    public $area1;
    public $storeid1;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Product the static model class
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
		return '{{product}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mid, name,series_number,total,bid,create_user,ctime,storeid', 'required', 'message'=>'{attribute}必须填写！'),
			array('mid, total, bid,ctime,udpatetime', 'numerical', 'message'=>'{attribute}请填写数字！'),
			array('name, intro', 'length', 'max'=>20000000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, mid, name, series_number, total, current_num, bid, province, city, area, intro, create_user, ctime, type, customer, spec, udpatetime, company, remarks,storeid', 'safe', 'on'=>'search'),
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
            'model'=>array(self::BELONGS_TO,'Models','mid'),
            'brand'=>array(self::BELONGS_TO,'Brand','bid'),
            'store'=>array(self::BELONGS_TO,'Store','storeid'),
            'admin'=>array(self::BELONGS_TO,'Admin','create_user'),
//            'warranty'=>array(self::HAS_ONE,'Warranty','id'),
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
			'mid' => '型号ID',
			'name' => '产品名称',
			'series_number' => '序列号',
			'total' => '总数量',
			'current_num' => '当前数量',
			'bid' => '品牌编号',
			'province' => '所属省份',
			'city' => '所属城市',
			'area' => '所属区县',
			'intro' => '产品简介',
			'create_user' => '创建批次管理员',
			'ctime' => '上架时间',
			'type' => '产品位置',
			'customer' => '客户',
			'spec' => '规格',
			'udpatetime' => '出库时间',
			'company' => '单位',
			'remarks' => '备注',
			'storeid' => '门店名称',
			'province1' => '所属省份',
			'city1' => '所属城市',
			'area1' => '所属区县',
			'storeid1' => '门店名称',
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
		$criteria->compare('mid',$this->mid);
		$criteria->compare('name',$this->name);
		$criteria->compare('series_number',$this->series_number,true);
		$criteria->compare('total',$this->total);
		$criteria->compare('current_num',$this->current_num);
		$criteria->compare('bid',$this->bid,true);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('intro',$this->intro,true);
		$criteria->compare('create_user',$this->create_user,true);
		$criteria->compare('ctime',$this->ctime,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('customer',$this->customer,true);
		$criteria->compare('spec',$this->spec,true);
		$criteria->compare('udpatetime',$this->udpatetime,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('storeid',$this->remarks,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function addProduct($post){
        if(!empty($_REQUEST['id'])){
            $product = $this->find("id=:id",array(":id"=>$_REQUEST['id']));
            if(!empty($product)){
                $product->attributes = $post["Product"];
                $product->ctime = time();
                $product->province = $post['Product']['province'];
                $product->city = $post['Product']['city'];
                $product->area = $post['Product']['area'];
//                $product->type = $post['Product']['type'];
                $product->customer = $post['Product']['customer'];
                $product->spec = $post['Product']['spec'];
                $product->company = $post['Product']['company'];
                $product->current_num = $post['Product']['current_num'];
                if($product->validate()){
                    if($product->save()){
                        return true;
                    }
                }else{
                    $this->getErrors();
                }
            }
        }else{
            $model = new Product();
            $model->attributes = $post['Product'];
            $model->ctime = time();
            $model->current_num = $post['Product']['current_num'];
            $model->province = $post['Product']['province'];
            $model->city = $post['Product']['city'];
            $model->area = $post['Product']['area'];
//            $model->type = $post['Product']['type'];
            $model->customer = $post['Product']['customer'];
            $model->spec = $post['Product']['spec'];
            $model->company = $post['Product']['company'];
            $model->current_num = $post['Product']['current_num'];
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

    public function getProductData(){
        $models = $this->findAll();
        return CHtml::listData($models,'id','name');
    }

    public function getProductData1(){
        $criteria = new CDbCriteria();
        $criteria->with = 'model';
        $models = $this->findAll($criteria);
        $data = array();
        foreach($models as $model){
            $data[$model['id']] = $model['name'].'---['.$model->model->name.']';
        }
        return $data;
    }

    public function getProductData2($id){
        $criteria = new CDbCriteria();
        $criteria->condition = 't.id = "'.intval($id).'"';
        $criteria->with = array('brand','model');
        $model = Product::model()->find($criteria);
        return $model;
    }

    public function getProductData3(){
        $criteria = new CDbCriteria();
        $criteria->with = 'model';
        $models = $this->findAll($criteria);
        $data = array();
        foreach($models as $model){
            $data[$model['id']] = $model['series_number'].'---['.$model->name.']';
        }
        return $data;
    }

    public function getProductData4($id){
        $criteria = new CDbCriteria();
        $criteria->condition = 't.series_number = "'.$id.'"';
        $criteria->with = array('brand','model');
        $model = Product::model()->find($criteria);
        return $model;
    }

    public function getAllProducts(){
        $products = RedisInit::getInstance()->get('carproject:products',true);
        if(!$products){
            $products = array();
            $products = CJSON::decode(CJSON::encode($this->findAll()),true);
            $second = CRedisUtils::getIntervalSecond();
            RedisInit::getInstance()->set('carproject:products',$products,$second,true);
        }
        return $products;
    }

    public function getProduct($current_pageNo,$pagesize,$order){
        $product_model = RedisInit::getInstance()->get('carproject:product:index:'.($current_pageNo-1))?json_decode(RedisInit::getInstance()->get('carproject:product:index:'.($current_pageNo-1)),true):false;
        if(!$product_model){
            $criteria = new CDbCriteria();
            $criteria->order = 'ctime '.$order;
            $model = new CActiveDataProvider('Product',array(
                'criteria'=>$criteria,
                'pagination'=>array(
                    'pageSize'=>$pagesize
                )
            ));
            $_model = $model->getData();
            $_model = json_decode(CJSON::encode($_model),true);
            $pager = $model->getPagination();
            $product_model['history'] = $_model;
            $product_model['pager'] = $pager;
            $product_model['pageSize'] = array($pager->pageSize);
            $product_model['itemCount'] = array($pager->itemCount);
            $product_model['currentPage'] = array($pager->currentPage);
            $second = CRedisUtils::getIntervalSecond();
            RedisInit::getInstance()->set('carproject:product:index:'.($current_pageNo-1),$product_model,$second,true);
        }else{
            $pager = new CPagination();
            $pager->pageVar = $product_model['pager']['pageVar'];
            $pager->pageSize = $product_model['pageSize'][0];
            $pager->itemCount = $product_model['itemCount'][0];
            $pager->currentPage = $current_pageNo-1;
            $product_model['pager'] = $pager;
        }
        return $product_model;
    }

    public function getProductsByParams($bid,$mid,$ftype,$btype,$sprice,$eprice){
        $brand = Brand::model()->findByPk($bid);
        $car = Car::model()->findByPk($mid);
        $criteria = new CDbCriteria();
        $criteria->condition = '1';
        $ftype_name = '--';
        $btype_name = '--';
        if(!empty($ftype) &&!empty($btype)){
            $criteria->condition .= ' AND t.mid in ('.$ftype.','.$btype.')';
            $_ftype = Models::model()->findByPk($ftype);
            $_btype = Models::model()->findByPk($btype);
            $ftype_name = !empty($_ftype)?$_ftype->name:'--';
            $btype_name = !empty($_btype)?$_btype->name:'--';
        }elseif(!empty($ftype) &&empty($btype)){
            $criteria->condition .= ' AND t.mid = '.$ftype;
            $_ftype = Models::model()->findByPk($ftype);
            $ftype_name = !empty($_ftype)?$_ftype->name:'--';
        }elseif(empty($ftype) &&!empty($btype)){
            $criteria->condition .= ' AND t.mid = '.$btype;
            $_btype = Models::model()->findByPk($btype);
            $btype_name = !empty($_btype)?$_btype->name:'--';
        }else{
            $models = Models::model()->findAll('cid = '.$mid);
            if(!empty($models)){
                $mids = implode(',',CHtml::listData($models,'id','id'));
                $criteria->condition .= ' AND t.mid in ('.$mids.')';
            }else{
                $criteria->condition .= ' AND 1>2';
            }
        }
        if(!empty($sprice)){
            $criteria->condition .= ' AND t.price>='.$sprice;
        }
        if(!empty($eprice)){
            $criteria->condition .= ' AND t.1price<='.$eprice;
        }
        $criteria->with = 'model';
        $products = $this->findAll($criteria);
//        print_r($products);exit;
        list($products,$sum,$name) = $this->__formatData($products);
        return array(
            $brand,
            $car,
            $products,
            $name,
            $sum,
            $ftype_name,
            $btype_name,
        );
    }

    public function formatData($model){
        $mname = !empty($model->model->name)?$model->model->name:'--';
        $brand = !empty($model->brand->name)?$model->brand->name:'--';
        $product = CJSON::decode(CJSON::encode($model),true);
        $ptype = Yii::app()->params['conf']['setting']['ptype'];
        $product['type'] = !empty($product['type'])?$ptype[$product['type']]:'--';
        return array(
            $mname,
            $brand,
            $product
        );
    }

    private function __formatData($products){
        $sum = 0;
        $name = '';
        if(!empty($products)){
            $ptype = Yii::app()->params['conf']['setting']['ptype'];
            $level = Yii::app()->params['conf']['setting']['level'];
            foreach($products as $key=>&$product){
                $name = $product['name'];
                $product['type'] = !empty($product->model->type)?$ptype[$product->model->type]:'--';
                $product['name'] = !empty($product->model->name)?$product->model->name:'--';
                $product['vast'] = '<span class="STYLE1">'.str_repeat('☆',$product['vast']).'</span>';
                $product['level'] = $level[$product['level']];
                $sum += $product['price'];
            }
        }
        return array(
            $products,
            $sum,
            $name
        );
    }

    public function getProductBrand($id){
        $criteria = new CDbCriteria();
        $criteria->condition = 1;
        $criteria->condition .= ' AND t.id = "'.$id.'"';
        $criteria->with = array('brand');
        $product = $this->find($criteria);
        return $product;
    }

    public function getCriteriaCondition($criteria,$condition,$search){
        if(isset($condition['Product']) && (count(array_filter($condition['Product'])) > 0 )){
            $search->attributes = $condition['Product'];
            if (!empty($condition['Product']['province1'])&&empty($condition['Product']['storeid1'])) {
                $criteria->condition .= ' and t.province = "' . $condition['Product']['province1'] .'" ';
            }
            if (!empty($condition['Product']['city1'])&&empty($condition['Product']['storeid1'])) {
                $criteria->condition .= ' and t.city = "' . $condition['Product']['city1'] .'" ';
            }
            if (!empty($condition['Product']['area1'])&&empty($condition['Product']['storeid1'])) {
                $criteria->condition .= ' and t.area = "' . $condition['Product']['area1'] .'" ';
            }
            if (!empty($condition['Product']['storeid1'])) {
                $criteria->condition .= ' and t.storeid = "' . $condition['Product']['storeid1'] .'" ';
            }

            if (!empty($condition['Product']['name'])) {
                $criteria->condition .= ' and t.name like "%' . $condition['Product']['name'] .'%" ';
            }
            if (!empty($condition['Product']['series_number'])) {
                $criteria->condition .= ' and t.series_number like "%' . $condition['Product']['series_number'] .'%" ';
            }
            if (!empty($condition['Product']['mid'])) {
                $criteria->condition .= ' and t.mid = "' . $condition['Product']['mid'] .'" ';
            }
            if (!empty($condition['Product']['bid'])) {
                $criteria->condition .= ' and t.bid = "' . $condition['Product']['bid'] .'" ';
            }
            if (!empty($condition['Product']['type'])) {
                $criteria->condition .= ' and t.type = "' . $condition['Product']['type'] .'" ';
            }
            if (!empty($condition['Product']['ctime_start'])) {
                $criteria->condition .= ' and t.ctime >= ' . strtotime($condition['Product']['ctime_start'] .' 00:00:00');
                $search->ctime_start = $condition['Product']['ctime_start'];
            }
            if (!empty($condition['Product']['ctime_end'])) {
                $criteria->condition .= ' and t.ctime <= ' . strtotime($condition['Product']['ctime_end'] .' 23:59:59');
                $search->ctime_end = $condition['Product']['ctime_end'];
            }
        }
        $criteria->with = array('brand','store');
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