<?php
/*
 * 管理员
 */
class Manager extends ControllerAbstract{
    public function __construct() {
        parent::__construct();
    }
    //列表
    function indexAction(){
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
    function addAction(){
        $this->display('madd.php');
    }
    //角色
    function roleAction(){
        if(isset($_GET['page'])){
            $model = M('User','RoleModel');
            $page = getInt('page');
            $limit = getInt('limit');
            $data = $model->ajaxPage($model,$page,$limit);
            echo json_encode($data);
            exit;
        }else{
            $this->display('mrole.php');
        }
    }
    //添加角色
    function roleAddAction(){
        $id = getInt('id');
        if(isset($_POST['role_name'])){
            $json = array('code' => 1);
            $role_name = trim($_POST['role_name']);
            $menu_ids = $_POST['menu_ids'];
            $model = M('User','RoleModel');
            $col = array('role_name' => $role_name,'menu_ids' => implode(',',$menu_ids));
            if($id && $role_name){
                $res = $model->update($col,array('id:eq'=>$id));
                if($res){
                    $json['code'] = 0;
                }
            }else if($role_name){
                $res = $model->insert($col);
                if($res){
                    $json['code'] = 0;
                }
            }else{
                $json['msg'] = '参数无效';
            }
            echo json_encode($json);
            exit;
        }else{
            $action = '/User/Manager/roleAdd';
            if($id){
                $form = M('User','RoleModel')->row($id);
                $this->form($form);
                $action .= '?id='.$id;
            }
            $model = M('Index','MenuModel');
            $menu = $model->getMenu();
            $this->assign('menu', $menu);
            $this->assign('action',$action);
            $this->display('mrole_add.php');
        }
    }
    //权限
    function permissionAction(){
        $this->display('mpermission.php');
    }
}