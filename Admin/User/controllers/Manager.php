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
            $name = getStr('name');
            $conditions = array();
            if($name){
                $conditions['name:eq'] = $name;
            }
            $data = $model->ajaxPage($model,$page,$limit,$conditions);
            echo json_encode($data);
            exit;
        }else{
            $this->display('mlist.php');
        }
    }
    //添加
    function addAction(){
        $id = getInt('id');
        $cond = array('status:eq'=>1);
        $role = M('User','RoleModel')->select($cond, $fields = '`id`,`role_name`');
        $this->assign('role', $role);
        if(isset($_POST['name'])){
            $json = array('code' => 1);
            $col = array('name','number','password','phone','email','role_id','sex','picture','desc');
            $data = formData($col);
            if(isset($data['password'])){
                $data['password'] = md5(md5($data['password']));
            }
            $manage = M('User','ManagerModel');
            $res = false;
            if($id){
                $res = $manage->update($data,array('id:eq'=>$id));
            }else{
                $data['add_time'] = date('Y-m-d H:i:s');
                $res = $manage->insert($data);
            }
            if($res){
                $json['code'] = 0;
            }
            echo json_encode($json);
            exit;
        }
        $action = '/User/Manager/add';
        if($id){
            $form = M('User','ManagerModel')->row($id);
            $this->form($form);
            $action .= '?id='.$id;
        }
        $this->assign('action', $action);
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
    //状态
    public function statusAction(){
        $id = getInt('id');
        $status = getInt('status');
        $json = array('code' => 1);
        if($id > 0){
            $res = M('User','ManagerModel')->update(array('status'=>$status),array('id:eq'=>$id));
            if($res){
                $json['code'] = 0;
            }
        }
        echo json_encode($json);
    }
}