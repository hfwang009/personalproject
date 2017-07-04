<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public $_id;
	public $user;
	
	public function __construct($username, $password)
	{
		$this->username=$username;
		$this->password=$password;
	}
	
	public function authenticate() {
		//验证用户名密码真实性、
		//查看用户是否存在
		$model = Admin::model()->find("username=:user_name",array(":user_name"=>$this->username));
		if($model===null){
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		}else if(!($model ['password'] === md5($this->password))){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else if($model['status']!=2){
            $this->errorCode=self::ERROR_UNKNOWN_IDENTITY;
        }else{
			$this->_id=$model->id;
			$this->setState('name', $model['username']);
			$this->setState('role', $model['role_id']);
			$this->setState('status', $model['status']);
			$this->errorCode=self::ERROR_NONE;
            //将后台登陆用户的权限写入redis中，方便判断后台的相关权限
            $privilieges = RedisInit::getInstance()->get('carprojectadmin:privilieges:'.$model->id,true);
            if($privilieges===false||$privilieges===null){
                CUtils::updatePrivilieges($model->role_id,$model->id);
            }
		}
		return !$this->errorCode;
	}
	
	public function getId() {
		//Yii默认的代码，Yii::app()->user->id返回的不是我们想要的用户ID，而是用户名。
		//因此在useridentity类中要用一个变量来存储登录用户的ID,然后重载getID()方法，返回正确的用户ID
        return $this->_id;
    }
    
	public function getUser() {
		return $this->user;
	}
	
	public function setUser(CActiveRecord $userModel) {
		$this->user=$userModel->attributes;
	}
	
	private function getUserByCookie(){
		$cookie =Yii::app()->request->getCookies();
		
		if(!isset($cookie['user'])){
			return NULL;
		}
		$user  = $cookie['user']->value;
		if(empty($user)){
			return NULL;
		}
		$user = unserialize($user);
		$accessInfo = Admin::model()->find('username = ' . $user['name']);
		if (empty($accessInfo)) {
			return NULL;
		}
		return $user;
	}
	
	public function cookieLogin() {
		 
		$user = $this->getUserByCookie();
		if($user===NULL){
			return false;
		}
		$this->username = $user['username'];
		$this->password = $user['password'];
		return $this->authenticate();
	}
	
}