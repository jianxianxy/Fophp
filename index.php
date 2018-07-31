<?php
//统一入口
header("Content-type:text/html;charset=utf-8");
//域名
define('HOST','http://fo.com');
//目录
define('PATH',str_replace('\\','/',dirname(__FILE__)));
//应用
define('APP',PATH.'/Admin');

require(PATH.'/config/config.php');     //配置信息
require(PATH.'/Fophp/Functions.php');   //公共方法
require(PATH.'/Fophp/Fophp.php');       //框架引入
include(PATH.'/Fophp/Loader.php');      //加载器
include(PATH.'/Fophp/Controller.php');  //Controller基础
include(APP.'/common/ModelAbstract.php');     //模块公共抽象类
include(APP.'/common/ControllerAbstract.php');//模块公共抽象类
Fophp::Run();
?>
