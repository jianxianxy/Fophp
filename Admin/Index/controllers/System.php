<?php
/*
 * 系统配置
 */
class System extends ControllerAbstract{
    public function __construct() {
        parent::__construct();
    }
    function LimitWordAction(){
        $this->display('limit_word.php');
    }
}