<?php
include APP_PATH.'/Fophp/Db/Table.php';
/* 
 * Model 通用类
 */
class ModelAbstract extends Table{
    public function __construct($db_config, $table) {
        parent::__construct($db_config, $table);
    }
    //分页
    public function ajaxPage($page = 1,$limit = 10,$conditions = array()){
        $count = $this->count($conditions);
        $start = ($page - 1) * $limit;
        $conditions['limit'] = $start.','.$limit;
        $data = $this->select($conditions);
        foreach($data AS $key => $val){
            $data[$key]['manage'] = $this->getTool($val);
        }
        $info = array('code'=>0,'data'=>$data,'count'=>$count,'page'=>$page,'msg'=>'');
        return $info;
    }
    
    public function getTool($data){
        $tool = '';
        $tool .= $this->tooIcon('off','');
        $tool .= $this->tooIcon('on','');
        $tool .= $this->tooIcon('del','');
        $tool .= $this->tooIcon('edit','');
        $tool .= $this->tooIcon('view','');
        return $tool;
    }
    //操作
    public function tooIcon($mod,$func){
        if($mod == 'off'){
            return '<a class="ml-5" onclick="'.$func.'" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6dd;</i></a>';
        }
        if($mod == 'on'){
            return '<a class="ml-5" onclick="'.$func.'" href="javascript:;" title="禁用"><i class="Hui-iconfont">&#xe6e1;</i></a>';
        }
        if($mod == 'del'){
            return '<a class="ml-5" onclick="'.$func.'" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>';
        }
        if($mod == 'edit'){
            return '<a class="ml-5" onclick="'.$func.'" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>';
        }
        if($mod == 'view'){
            return '<a class="ml-5" onclick="'.$func.'" href="javascript:;" title="预览"><i class="Hui-iconfont">&#xe695;</i></a>';
        }
    }
}
