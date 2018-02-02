<?php
/* 
 * 登录
 */
class Login extends ControllerAbstract{
    public function __construct() {
        parent::__construct();
    }
    public function IndexAction(){
        $this->display('login.php');
    }
}
