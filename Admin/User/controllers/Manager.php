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
        if(isset($_GET['page'])){
            $model = M('User','ManagerModel');
            $page = getInt('page');
            $limit = getInt('limit');
            $data = $model->ajaxPage($model,$page,$limit);
            echo json_encode($data);
            exit;
        }else{
            $this->display('mlist.php');
        }
    }
    //添加
    function AddAction(){
        $this->display('madd.php');
    }
    //角色
    function RoleAction(){
        $this->display('mrole.php');
    }
    //添加角色
    function RoleAddAction(){
        $this->display('mrole_add.php');
    }
    //权限
    function PermissionAction(){
        $this->display('mpermission.php');
    }
}