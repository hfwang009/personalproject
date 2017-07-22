<?php

/**
 * This is the model class for table "{{models}}".
 *
 * The followings are the available columns in table '{{models}}':
 * @property integer $id
 * @property string $name
 * @property integer $cid
 * @property integer $type
 * @property string $ename
 */
class Models extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Models the static model class
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
		return '{{models}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required','message'=>'{attribute}参数必须填写！'),
			array('name', 'length', 'max'=>20000000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, ename', 'safe', 'on'=>'search'),
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
//            'warranty'=>array(self::HAS_ONE,'Warranty','id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => '型号名称',
            'ename' => '英文型号名称',
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
        $criteria->compare('ename',$this->ename);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function addModels($post){
        if(!empty($_REQUEST['id'])){
            $model = $this->find("id=:id",array(":id"=>$_REQUEST['id']));
            if(!empty($model)){
                $model->attributes = $post["Models"];
                $model->ename = $post["Models"]['ename'];
                if($model->validate()){
                    if($model->save()){
                        return true;
                    }
                }else{
                    $this->getErrors();
                }
            }
        }else{
            $model = new Models();
            $model->attributes = $post['Models'];
            $model->ename = $post["Models"]['ename'];
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

    public function getModelData(){
        $models = $this->findAll();
        return CHtml::listData($models,'id','name');
    }

    public function getModelOption($model,$type=null){
        $message = '';
        if(!empty($model)){
            $ftype = Models::model()->findAll('cid = "'.$model.'" AND type = 1');
            $btype = Models::model()->findAll('cid = "'.$model.'" AND type = 2');
            if(!empty($type)){
                if($type==1){
                    return CHtml::listData($ftype,'id','name');
                }else{
                    return CHtml::listData($btype,'id','name');
                }
            }
            if(!empty($ftype)||!empty($btype)){
                $ftype_html = '';
                $btype_html = '';
                if(!empty($ftype)){
                    foreach ($ftype as $f){
                        $ftype_html .= CHtml::tag('option', array('value'=>$f['id']),CHtml::encode($f['name']),true);
                    }
                }
                if(!empty($btype)){
                    foreach ($btype as $b){
                        $btype_html .= CHtml::tag('option', array('value'=>$b['id']),CHtml::encode($b['name']),true);
                    }
                }
                $message = json_encode(array('ftype'=>$ftype_html,'btype'=>$btype_html));
            }
        }
        return $message;
    }

    public function getCriteriaCondition($criteria,$condition,$search){
        if(isset($condition['Models']) && (count(array_filter($condition['Models'])) > 0 )){
            $search->attributes = $condition['Models'];
            if (!empty($condition['Models']['name'])) {
                $criteria->condition .= ' and t.name like "%' . $condition['Models']['name'] .'%" ';
            }
            if (!empty($condition['Models']['ename'])) {
                $criteria->condition .= ' and t.ename like "%' . $condition['Models']['ename'] .'%" ';
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