<?php
/*
 * 用户
 */
class User extends ControllerAbstract{
    public function __construct() {
        parent::__construct();
    }
    //列表
    function IndexAction(){
        $this->display('ulist.php');
    }
    //添加
    function AddAction(){
        $this->display('uadd.php');
    }
}