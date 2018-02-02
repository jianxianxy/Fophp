<?php
/*
 * 管理员
 */
class Manager extends ControllerAbstract{
    public function __construct() {
        parent::__construct();
    }
    //列表
    function IndexAction(){
        $this->display('mlist.php');
    }
    //添加
    function AddAction(){
        $this->display('madd.php');
    }
}