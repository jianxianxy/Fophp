<?php
/*
 * 用户管理
 */
class User extends ControllerAbstract{
    public function __construct() {
        parent::__construct();
    }
    //列表
    function indexAction(){
        if(isset($_GET['page'])){
            $model = M('User','UserModel');
            $page = getInt('page');
            $limit = getInt('limit');
            $name = getStr('name');
            $conditions = array();
            if($name){
                $conditions['name:eq'] = $name;
            }
            $data = $model->ajaxPage($model,$page,$limit,$conditions);
            echo json_encode($data);
            exit;
        }else{
            $this->display('ulist.php');
        }
    }
    //添加
    function addAction(){
        $this->display('uadd.php');
    }
}