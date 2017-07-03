<?php

/**
 * This is the model class for table "{{admin_privilieges}}".
 *
 * The followings are the available columns in table '{{admin_privilieges}}':
 * @property string $pid
 * @property integer $parent
 * @property string $pname
 * @property string $model
 * @property string $controller
 * @property string $action
 * @property integer $ctime
 */
class Privilieges extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Privilieges the static model class
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
		return '{{admin_privilieges}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pname, model, controller, action, ctime', 'required'),
			array('parent, ctime', 'numerical', 'integerOnly'=>true),
			array('pname', 'length', 'max'=>50),
			array('model, controller, action', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pid, parent, pname, model, controller, action, ctime', 'safe', 'on'=>'search'),
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
			'pid' => 'Pid',
			'parent' => '父节点',
			'pname' => '权限名称',
			'model' => '权限模块',
			'controller' => '权限控制器',
			'action' => '权限操作',
			'ctime' => '添加时间',
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

		$criteria->compare('pid',$this->pid,true);
		$criteria->compare('parent',$this->parent);
		$criteria->compare('pname',$this->pname,true);
		$criteria->compare('model',$this->model,true);
		$criteria->compare('controller',$this->controller,true);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('ctime',$this->ctime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function addPrivilieges($post){
        if(!empty($_REQUEST['id'])){
            $privilieges = $this->find("pid=:id",array(":id"=>$_REQUEST['id']));
            if(!empty($privilieges)){
                $privilieges->attributes = $post["Privilieges"];
                $privilieges->ctime = time();
                if($privilieges->validate()){
                    if($privilieges->save()){
                        return true;
                    }
                }else{
                    $this->getErrors();
                }
            }
        }else{
            $model = new Privilieges();
            $model->attributes = $post['Privilieges'];
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

    public function getParents($parent = 0,$level = 1){
        $pmodel = Privilieges::model();
        $res = array();
        $model = $pmodel->findAll('parent = "'.$parent.'"');
        if(!empty($model)){
            foreach($model as $key=>$val){
                $res[] = array(
                    'id'=>$val['pid'],
                    'pId'=>$val['parent'],
                    'name'=>$val['pname']
                );
                $_res = $this->getParents($val['pid'],$level+1);
                $res = array_merge($res,$_res);
            }
        }
        return $res;
    }

    public function getParents1($parent = 0,$level = 1){
        $res = array();
        $model = $this->findAll('parent = "'.$parent.'"');
        if(!empty($model)){
            foreach($model as $key=>$val){
                $res[$val['pid']] = '|'.(str_repeat('---',$level-1)).$val['pname'];
                $_res = $this->getParents1($val['pid'],$level+1);
                if(!empty($_res)){
                    foreach($_res as $k=>$v){
                        $res[$k]=$v;
                    }
                }
            }
        }
        return $res;
    }

    public function getCriteriaCondition($criteria,$condition,$search){
        if(isset($condition['Privilieges']) && (count(array_filter($condition['Privilieges'])) > 0 )){
            $search->attributes = $condition['Privilieges'];
            if (!empty($condition['Privilieges']['pname'])) {
                $criteria->condition .= ' and t.pname like "%' . $condition['Privilieges']['pname'] .'%" ';
            }

            if (!empty($condition['Privilieges']['controller'])) {
                $criteria->condition .= ' and t.controller like "%' . $condition['Privilieges']['controller'] .'%" ';
            }
        }
        if(empty($condition['sortFiled']) || empty($condition['sortValue'])){
            $condition['sortFiled'] = 'pid';
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