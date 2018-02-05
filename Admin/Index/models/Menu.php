<?php
/*
 * 菜单
 */

class Menu extends \Fophp\Db\Table{
    //初始化
    function __construct() {
        $db_config = Config::getDbGman();
        $table = 'admin_menu';
        parent::__construct($db_config, $table);
    }
    //菜单列标
    public function getMenu($pid = 0){
        $conditions = array(
            'order' => '`sort` ASC',
            'pid:eq' => $pid
        );
        $menu = $this->select($conditions);
        foreach($menu AS $key => $val){
            $menu[$key]['child'] = $this->getMenu($val['id']);
        }
        return $menu;
    }
}