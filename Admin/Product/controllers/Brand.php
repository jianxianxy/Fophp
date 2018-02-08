<?php
/*
 * 品牌
 */
class Brand extends ControllerAbstract{
    public function __construct() {
        parent::__construct();
    }
    //列表
    function indexAction(){
        $this->display('blist.php');
    }
}