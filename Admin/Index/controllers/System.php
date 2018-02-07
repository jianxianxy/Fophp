<?php
/*
 * 系统配置
 */
class System extends ControllerAbstract{
    public function __construct() {
        parent::__construct();
    }
    //菜单
    public function MenuAction(){
        $model = M('Index','Menu');
        if(isset($_GET['page'])){
            $page = getInt('page');
            $limit = getInt('limit');
            $data = $model->ajaxPage($model,$page,$limit);
            echo json_encode($data);
            exit;
        }else{
            $menu = $model->select(array('pid:eq'=>0));
            $this->assign("menu", $menu);
            $this->display('menu.php');
        }
    }
    //修改状态
    public function MenuStatusAction(){
        $id = getInt('id');
        $status = getInt('status');
        $json = array('code' => 1);
        if($id > 0){
            $res = M('Index','Menu')->update(array('status'=>$status),array('id:eq'=>$id));
            if($res){
                $json['code'] = 0;
            }
        }
        echo json_encode($json);
    }
    //创建静态页
    public function MakeMenuAction(){
        $json = array('code' => 1);
        $model = M('Index','Menu');
        $menu = $model->getMenu();
        $this->assign('menu', $menu);
        ob_start();
        $this->display('_menu.php');
        $html = ob_get_contents();
        ob_end_clean();
        $file = M.'/layout/_menu.html';
        $r = file_put_contents($file, $html);
        if($r){
            $json['code'] = 0;
        }
        echo json_encode($json);
        exit;
    }
    //图标
    function IconAction(){
        $this->display('icon.php');
    }
}