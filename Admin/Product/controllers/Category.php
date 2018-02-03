<?php
/*
 * 分类
 */
class Category extends ControllerAbstract{
    public function __construct() {
        parent::__construct();
    }
    //列表
    function IndexAction(){
        $this->display('clist.php');
    }
    //添加
    function AddAction(){
        $this->display('cadd.php');
    }
}