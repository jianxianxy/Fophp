<?php
/*
 * 文章
 */

class ArticleModel extends ModelAbstract{
    protected $_tableName = 'cms_article';
    protected $_primaryKey = 'id';
    //初始化
    function __construct() {
        $db_config = Config::getDbGman();
        parent::__construct($db_config, $this->_tableName);
    }
    //列表需要过滤的字段
    public function filterCol(){
        $filter = array(
            'status' => array(0 => '待审核',1 => '通过')
        );
        return $filter;
    }
    //操作
    public function getTool($col){
        $arr = array(
            'on' => "tool_on(this,'{$col['id']}')",
            'off' => "tool_off(this,'{$col['id']}')",
            'edit' => "tool_edit('编辑','/User/Manager/roleAdd?id={$col['id']}')",
            'del' => "tool_del(this,'{$col['id']}')"
        );
        //on 与 off 互斥
        if($col['status'] == 0){
            unset($arr['off']);
        }else{
            unset($arr['on']);
        }
        return $arr;
    }
}