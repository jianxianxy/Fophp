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
        if(isset($_GET['page'])){
            $page = getInt('page');
            $limit = getInt('limit');
            $model = M('Index','Menu');
            $data = $model->ajaxPage($model,$page,$limit);
            echo json_encode($data);
            exit;
        }else{
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
    public function MakeMenu(){
        $model = M('Index','Menu');
        $menu = $model->getMenu();
        $this->assign('menu', $menu);
        ob_start();
        $this->display('_menu.php');
        $html = ob_get_contents();
        ob_end_clean();
        $file = M.'/layout/_menu.html';
        $r = file_put_contents($file, $html);
        echo $r;
    }
    //屏蔽词
    function LimitWordAction(){
        $this->display('limit_word.php');
    }
}