<?php

/**
 * This is the model class for table "{{admin_role}}".
 *
 * The followings are the available columns in table '{{admin_role}}':
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property string $res_ids
 * @property string $privilege
 * @property string $res
 * @property integer $created
 */
class Role extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Role the static model class
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
		return '{{admin_role}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, res_ids, privilege, res, created', 'required'),
			array('status, created', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			array('res_ids', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, status, res_ids, privilege, res, created', 'safe', 'on'=>'search'),
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
			'name' => '角色名',
			'status' => '状态',
			'res_ids' => '权限IDS',
			'privilege' => '权限',
			'res' => '权限描述',
			'created' => '创建时间',
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
		$criteria->compare('status',$this->status);
		$criteria->compare('res_ids',$this->res_ids,true);
		$criteria->compare('privilege',$this->privilege,true);
		$criteria->compare('res',$this->res,true);
		$criteria->compare('created',$this->created);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getCriteriaCondition($criteria,$condition,$search){
        if(isset($condition['Role']) && (count(array_filter($condition['Role'])) > 0 )){
            $search->attributes = $condition['Role'];
            if (!empty($condition['Role']['name'])) {
                $criteria->condition .= ' and t.name like "%' . $condition['Role']['name'] .'%" ';
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

    public function formatData($post,$model,$id){
        $post['Role']['created'] = !empty($id)?$model['created']:time();

        //管理组权限
        $res = !empty($post['Role']['res'])?$post['Role']['res']:'';
        $ids = !empty($post['Role']['res_ids'])?$post['Role']['res_ids']:'';
        $privilieges = array();
        if($res && trim($res) == 'all_allow'){
            $post['Role']['res'] = $res;
        }elseif(!empty($ids)){
            $ids_arr = explode(',',$ids);
            $resource = !empty($post['Role']['res'])?$post['Role']['res']:array();
            foreach($ids_arr as $key=>$val){
                $pri = Privilieges::model()->find('pid="'.$val.'"');
                if(!empty($pri)){
                    if(empty($resource)){
                        $resource[] = $pri['pname'];
                    }
                    $privilieges[$pri['controller']][] = $pri['action'];
                }
            }
            $post['Role']['privilege'] = serialize($privilieges);
        }
        $post['Role']['res'] = is_array($resource)?implode(',',$resource):$resource;
        return $post;
    }

    public function addRole($post){
        if(!empty($_REQUEST['id'])){
            $role = $this->find("id=:id",array(":id"=>$_REQUEST['id']));
            if(!empty($role)){
                $role->attributes = $post["Role"];
                $role->created = time();
                if($role->validate()){
                    if($role->save()){
                        return true;
                    }
                }else{
                    $this->getErrors();
                }
            }
        }else{
            $model = new Role();
            $model->attributes = $post['Role'];
            $model->created = time();
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

    public function getAllRoles(){
        return CHtml::listData($this->findAll(),'id','name');
    }

    public function getAllRoles1(){
        return CHtml::listData($this->findAll('id!=1'),'id','name');
    }
}