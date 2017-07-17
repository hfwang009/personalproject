<?php

/**
 * This is the model class for table "{{config}}".
 *
 * The followings are the available columns in table '{{config}}':
 * @property string $var
 * @property string $datavalue
 */
class Config extends CActiveRecord
{
    static private $_instance = null;
	public $success;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Config the static model class
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
		return '{{config}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('var, datavalue', 'required', 'message'=>'{attribute}必须填写！'),
			array('var', 'length', 'max'=>20000000, 'tooLong' =>'{attribute}长度不能大于30个字节！'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('var, datavalue', 'safe', 'on'=>'search,edit'),
		);
	}

    static public function getInstance()
    {
        if (is_null(self::$_instance) || !isset(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
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
			'var' => '变量名称',
			'datavalue' => '变量值',
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

		$criteria->compare('var',$this->var,true);
		$criteria->compare('datavalue',$this->datavalue,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getData() {
		$rData = array();
		$fData = $this->findAll();
	
		if ($fData) {
			foreach ($fData as $key => $val) {
				$rData[$val['var']] = unserialize($val['datavalue']);
			}
		}
//        print_r($rData);exit;
        if(!empty($rData)){
            foreach($rData as $key=>&$val){
                if($key==='setting'){
                    $tmp = $rData['setting'];
                    $controllers = $tmp['controllers'];
                    $tmp1 = array();
                    foreach($controllers as $a=>$b){
                        $tmp1[$b['econtrol']] = $b['ccontrol'];
                    }
                    $rData['setting']['controller'] = $tmp1;
                    $actions = $tmp['actions'];
                    $tmp2 = array();
                    foreach($actions as $c=>$d){
                        $tmp2[$d['eaction']] = $d['caction'];
                    }
                    $rData['setting']['action'] = $tmp2;
                }
            }
        }
		return $rData;
	}
}