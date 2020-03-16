<?php
/*
 * 分词
 */

class WordModel extends ModelAbstract{
    public $_ICON = 0; //自定义图标模式 0:文字 1:按钮 
    //初始化
    function __construct() {
        $db_config = Config::getDbGman();
        $table = 'word_dict';
        parent::__construct($db_config, $table);
    }

    //列表显示时需要过滤的字段
    public function filterCol(){
        $cond = array();
        $filter = array(
            'is_pure' => array(0 => '未审核',1 => '确认纯净',2 => '确认非纯净')
        );
        return $filter;
    }
    //列表操作按钮
    public function getTool($col){
        $arr = array(
            'on' => "verify({$col['id']},1)",
            'off' => "verify({$col['id']},2)",
            'edit' => "edit(this)"
        );
        if($col['is_pure'] == 1){
            unset($arr['on']);
        }
        return $arr;
    }
}