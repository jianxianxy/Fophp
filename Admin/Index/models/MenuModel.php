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
    //列表需要过滤的字段
    public function filterCol(){
        $cond = array('pid:eq'=>0);
        $vArr = M('Index','MenuModel')->select($cond, $fields = '`id`,`name`');
        $ret = array(0 => '');
        foreach($vArr AS $val){
            $ret[$val['id']] = $val['name'];
        }
        $filter = array(
            'pid' => $ret,
            'status' => array(0 => '停用',1 => '启用')
        );
        return $filter;
    }
    //操作
    public function getTool($col){
        $arr = array(
            'on' => "tool_on(this,'{$col['id']}')",
            'off' => "tool_off(this,'{$col['id']}')",
            'edit' => "tool_edit('编辑菜单','/Index/System/MenuAdd?id={$col['id']}')",
        );
        if($col['status'] == 0){
            unset($arr['off']);
        }else{
            unset($arr['on']);
        }
        return $arr;
    }
}