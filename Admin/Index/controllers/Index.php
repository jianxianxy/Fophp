<?php
/*
 * 默认控制器
 */
class Index extends ControllerAbstract{
    public function __construct() {
        parent::__construct();
    }
    function indexAction(){
        $this->display('index.php');
    }
}

