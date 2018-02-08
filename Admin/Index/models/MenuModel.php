<?php
/*
 * 菜单
 */

class MenuModel extends ModelAbstract{
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
    //操作
    public function getTool($col){
        $arr = array(
            'on' => "tool_on(this,'{$col['id']}')",
            'off' => "tool_off(this,'{$col['id']}')",
            'del' => "tool_del(this,'{$col['id']}')",
            'edit' => "tool_edit('编辑','/Index/System/MenuEdit/id/{$col['id']}'",
            'view' => "tool_view('查看','/Index/System/MenuEdit/id/{$col['id']}'",
        );
        if($col['status'] == 0){
            unset($arr['off']);
        }else{
            unset($arr['on']);
        }
        return $arr;
    }
}