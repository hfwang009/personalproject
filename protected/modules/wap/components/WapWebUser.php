<?php
class WapWebUser extends CWebUser {
    public function __get($name) {
        if ($this->hasState ( '__wapInfo' )) {
            $user = $this->getState ( '__wapInfo', array () );
            if (isset ( $user [$name] )) {
                return $user [$name];
            }
        }

        return parent::__get ( $name );
    }

    public function login($identity, $duration=0) {
        $this->setState ( '__wapInfo', $identity->getUser () );
        parent::login ( $identity, $duration );
    }

    public function  logout($destroySession = true) {
        parent::logout(false);
    }
}

?>