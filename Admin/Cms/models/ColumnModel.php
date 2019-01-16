<?php
/*
 * 栏目
 */

class ColumnModel extends ModelAbstract{
    public $_ICON = 0; //自定义图标模式 0:文字 1:按钮 
    //初始化
    function __construct() {
        $db_config = Config::getDbGman();
        $table = 'cms_column';
        parent::__construct($db_config, $table);
    }
    //菜单列标
    public function getColumn($pid = 0){
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
    //列表显示时需要过滤的字段
    public function filterCol(){
        $cond = array();
        $vArr = M('Cms','ColumnModel')->select($cond, $fields = '`id`,`name`');
        $ret = array(0 => '无');
        foreach($vArr AS $val){
            $ret[$val['id']] = $val['name'];
        }
        $filter = array(
            'pid' => $ret,
            'status' => array(0 => '禁用',1 => '启用')
        );
        return $filter;
    }
    //列表操作按钮
    public function getTool($col){
        $arr = array(
            'on' => "winApp({$col['id']},1)",
            'off' => "winApp({$col['id']},0)",
            'edit' => "winEdit('编辑','/Index/System/MenuAdd?id={$col['id']}')",
            'del' => "winDel(this,{$col['id']})",
        );
        if($col['status'] == 0){
            unset($arr['off']);
        }else{
            unset($arr['on']);
        }
        return $arr;
    }
}