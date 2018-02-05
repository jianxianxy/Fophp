<?php
//统一入口
header("Content-type:text/html;charset=utf-8");
//定义常量
define('Host','http://fo.com');
define('PROD','Admin');
define('APP_PATH',str_replace('\\','/',dirname(__FILE__)));
define('M',APP_PATH.'/Admin');
define('LIB','/lib');
define('STA','/static');
define('LAY','/Admin/layout');

require(APP_PATH.'/config/config.php');     //配置信息
require(APP_PATH.'/Fophp/Functions.php');   //公共方法
require(APP_PATH.'/Fophp/Fophp.php');       //框架引入
include(APP_PATH.'/Fophp/Loader.php');      //加载器
include(APP_PATH.'/Fophp/Controller.php');  //Controller基础
include(M.'/common/ModelAbstract.php');     //模块公共抽象类
include(M.'/common/ControllerAbstract.php');//模块公共抽象类
Fophp::Run();
?>
