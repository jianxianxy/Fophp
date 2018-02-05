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
            $data = M('Index','Menu')->ajaxPage($page,$limit);
            echo json_encode($data);
            exit;
        }else{
            $this->display('menu.php');
        }
    }
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