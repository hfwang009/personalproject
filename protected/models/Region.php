<?php

/**
 * This is the model class for table "{{region}}".
 *
 * The followings are the available columns in table '{{region}}':
 * @property integer $id
 * @property string $name
 * @property integer $parent
 * @property string $code
 */
class Region extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Region the static model class
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
		return '{{region}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, parent, code', 'required'),
			array('parent', 'numerical', 'integerOnly'=>true),
			array('name, code', 'length', 'max'=>20000000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, parent, code', 'safe', 'on'=>'search'),
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
			'name' => '地区名称',
			'parent' => '父级ID',
			'code' => '地区编码',
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
		$criteria->compare('parent',$this->parent);
		$criteria->compare('code',$this->code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getData(){
        $provinces = $this->findAll();
        return CHtml::listData($provinces,'id','name');
    }

    public function getRegions($id=0){
        $provinces = $this->findAll('parent="'.$id.'"');
        return CHtml::listData($provinces,'id','name');
    }

    public function getRelaCitys($id,$flag=false){
        $html = '';
        $model = Region::model()->findAll('parent = ' . intval($id));
        $citys = '';
        $areas = '';
        if($flag){
            $citys = "<option value=''>-- 请选择  --</option>";
            $areas = "<option value=''>-- 请选择  --</option>";
        }
        if(!empty($model)){
            foreach ($model as $_data){
                $citys .= CHtml::tag('option', array('value'=>$_data['id']),CHtml::encode($_data['name']),true);
            }
        }
        $html = array('citys'=>$citys,'areas'=>$areas);
        return $html;
    }

    public function getRelaCityJson($id){
        $data = '';
        $model = Region::model()->findAll('parent = ' . intval($id));
        $citys = array();
        $areas = array();
        if(!empty($model)){
            $citys = CHtml::listData($model,'id','name');
        }
        $data = json_encode(array('citys'=>$citys,'areas'=>$areas));
        return $data;
    }

    public function getRelaAreas($id,$flag = false){
        $html = '';
        $model = Region::model()->findAll('parent = ' . intval($id));
        $areas = '';
        if($flag){
            $areas = "<option value=''>-- 请选择  --</option>";
        }
        if(!empty($model)){
            foreach ($model as $_data){
                $areas .= CHtml::tag('option', array('value'=>$_data['id']),CHtml::encode($_data['name']),true);
            }
        }
        $html = array('areas'=>$areas);
        return $html;
    }

    public function getRelaAreaJson($id){
        $data = '';
        $model = Region::model()->findAll('parent = ' . intval($id));
        $areas = array();
        if(!empty($model)){
            $areas = CHtml::listData($model,'id','name');
        }
        $data = json_encode(array('areas'=>$areas));
        return $data;
    }
}