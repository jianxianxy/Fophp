<?php
namespace Fophp;

class Controller
{
    //获取请求信息
    public function _get()
    {
        return $_GET;
    }
    //传值
    public function assign($key,$val)
    {
        $this->$key = $val;
    }
    //调用模板
    public function display($view)
    {
        $file = M.'/'.MODULE.'/view/'.$view;
        include($file);
    }
}

