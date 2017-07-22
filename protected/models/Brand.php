<?php

/**
 * This is the model class for table "{{brand}}".
 *
 * The followings are the available columns in table '{{brand}}':
 * @property string $id
 * @property string $name
 * @property string $intro
 * @property string $ename
 * @property string $eintro
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Brand extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Brand the static model class
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
		return '{{brand}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required', 'message'=>'{attribute}必须填写！'),
			array('intro,name', 'length', 'max'=>20000000, 'tooLong' =>'{attribute}长度不能大于200个字节！'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, intro, ename, eintro', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => '品牌名称',
			'intro' => '品牌简介',
            'ename' => '英文品牌名称',
            'eintro' => '英文品牌简介',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('intro',$this->intro,true);
        $criteria->compare('ename',$this->ename);
        $criteria->compare('eintro',$this->eintro);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function addBrand($post){
        if(!empty($_REQUEST['id'])){
            $brand = $this->find("id=:id",array(":id"=>$_REQUEST['id']));
            if(!empty($brand)){
                $brand->attributes = $post["Brand"];
                $brand->ename = $post['Brand']['ename'];
                $brand->eintro = $post['Brand']['eintro'];
                if($brand->validate()){
                    if($brand->save()){
                        return true;
                    }
                }else{
                    $this->getErrors();
                }
            }
        }else{
            $model = new Brand();
            $model->attributes = $post['Brand'];
            $model->ename = $post['Brand']['ename'];
            $model->eintro = $post['Brand']['eintro'];
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

    public function getBrandData(){
        $brands = $this->findAll();
        return CHtml::listData($brands,'id','name');
    }

    public function getCriteriaCondition($criteria,$condition,$search){
        if(isset($condition['Brand']) && (count(array_filter($condition['Brand'])) > 0 )){
            $search->attributes = $condition['Brand'];
            if (!empty($condition['Brand']['name'])) {
                $criteria->condition .= ' and t.name like "%' . $condition['Brand']['name'] .'%" ';
            }
            if (!empty($condition['Brand']['ename'])) {
                $criteria->condition .= ' and t.ename like "%' . $condition['Brand']['ename'] .'%" ';
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