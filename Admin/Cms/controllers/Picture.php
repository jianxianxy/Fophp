<?php
/*
 * 图片
 */
class Picture extends ControllerAbstract{
    public function __construct() {
        parent::__construct();
    }
    //列表
    function indexAction(){
        $this->display('plist.php');
    }
    //添加
    function addAction(){
        $this->display('padd.php');
    }
    //详情
    function showAction(){
        $this->display('pshow.php');
    }
}