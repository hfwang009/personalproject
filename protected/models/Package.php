<?php

/**
 * This is the model class for table "{{Package}}".
 *
 * The followings are the available columns in table '{{Package}}':
 * @property string $id
 * @property string $name
 * @property string $intro
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Package extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Package the static model class
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
        return '{{package}}';
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
            array('id, name, intro', 'safe', 'on'=>'search'),
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
            'car'=>array(self::HAS_ONE,'Car','id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => '套餐名称',
            'intro' => '套餐简介'
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
        $criteria->compare('intro',$this->intro,true);;

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public function addPackage($post){
        if(!empty($_REQUEST['id'])){
            $package = $this->find("id=:id",array(":id"=>$_REQUEST['id']));
            if(!empty($package)){
                $package->attributes = $post["Package"];
                if($package->validate()){
                    if($package->save()){
                        return true;
                    }
                }else{
                    $this->getErrors();
                }
            }
        }else{
            $model = new Package();
            $model->attributes = $post['Package'];
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

    public function getPackageData(){
        $packages = $this->findAll();
        return CHtml::listData($packages,'id','name');
    }

    public function getCriteriaCondition($criteria,$condition,$search){
        if(isset($condition['Package']) && (count(array_filter($condition['Package'])) > 0 )){
            $search->attributes = $condition['Package'];
            if (!empty($condition['Package']['name'])) {
                $criteria->condition .= ' and t.name like "%' . $condition['Package']['name'] .'%" ';
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