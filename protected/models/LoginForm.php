<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
    public $username;
    public $password;
    public $code;

    public $_identity;

    /**
     * 声明验证规则
     */
    public function rules() {
        return array(
            // 用户名,验证码和密码 必须填写
            array('username, password, code', 'required', 'message'=>'{attribute}不能为空！'),
            array('password', 'required', 'message'=>'密码不能为空！'),
            // 密码必须是真实的
            array('password', 'authenticate', 'message'=>'密码必须是真实的！'),
            array('code', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'message'=>'验证码错误'),
        );
    }

    /**
     * 页面元素对应的标签
     * @see CModel::attributeLabels()
     */
    public function attributeLabels() {
        return array(
            'username'=>'用户名',
            'password'=>'密　码',
            'code'    =>'验证码',
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate() {
        if(!$this->hasErrors()) {
            $this->_identity=new UserIdentity($this->username,$this->password);
            if(!$this->_identity->authenticate())
                $this->addError('password','用户名或密码错误或账号冻结.');
        }
    }

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login() {
        if($this->_identity===null) {
            $this->_identity=new UserIdentity($this->username,$this->password);
            $this->_identity->authenticate();
        }
        if($this->_identity->errorCode===UserIdentity::ERROR_NONE) {
            Yii::app()->user->login($this->_identity,$duration=0);
            return true;
        } else {
            $this->addError('password','用户名或密码错误或账号冻结.');
            return false;
        }
    }
}
