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
        $menu = $model->getMenu();
        $this->assign('menu', $menu);
        ob_start();
        $this->display('menu.php');
        $html = ob_get_contents();
        ob_end_clean();
        $file = M.'/layout/_menu.html';
        file_put_contents($file, $html);
    }
    //屏蔽词
    function LimitWordAction(){
        $this->display('limit_word.php');
    }
}