<?php
/* 公用方法库 */
if(get_magic_quotes_gpc() == false)
{
    if($_GET) $_GET = addslashes_loop($_GET);
    if($_POST) $_POST = addslashes_loop($_POST);
    if($_COOKIE) $_COOKIE = addslashes_loop($_COOKIE);
    if($_REQUEST) $_REQUEST = addslashes_loop($_REQUEST);
}
$getfilter="'|(and|or)\\b.+?(>|<|=|in|like)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
$postfilter="\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
$cookiefilter="\\b(and|or)\\b.{1,6}?(=|>|<|\\bin\\b|\\blike\\b)|\\/\\*.+?\\*\\/|<\\s*script\\b|\\bEXEC\\b|UNION.+?SELECT|UPDATE.+?SET|INSERT\\s+INTO.+?VALUES|(SELECT|DELETE).+?FROM|(CREATE|ALTER|DROP|TRUNCATE)\\s+(TABLE|DATABASE)";
function StopAttack($StrFiltKey,$StrFiltValue,$ArrFiltReq)
{  
	if(is_array($StrFiltValue))
	{
		$StrFiltValue=implode($StrFiltValue);
	}  
	if (preg_match("/".$ArrFiltReq."/is",$StrFiltValue)==1)
	{   
			//slog("<br><br>操作IP: ".$_SERVER["REMOTE_ADDR"]."<br>操作时间: ".strftime("%Y-%m-%d %H:%M:%S")."<br>操作页面:".$_SERVER["PHP_SELF"]."<br>提交方式: ".$_SERVER["REQUEST_METHOD"]."<br>提交参数: ".$StrFiltKey."<br>提交数据: ".$StrFiltValue);
			print "Safe notice: $StrFiltKey Illegal operation!";
			exit();
	}      
}
foreach($_GET as $key=>$value)
{ 
	StopAttack($key,$value,$getfilter);
}
foreach($_POST as $key=>$value)
{ 
	StopAttack($key,$value,$postfilter);
}
foreach($_COOKIE as $key=>$value)
{ 
	StopAttack($key,$value,$cookiefilter);
}
//打印Debug消息
function E($arr,$type=0)
{
    echo '<pre>';
    var_export($arr);
    exit;
}
//时间计算
function runtime($intval = 0)
{
    $time = microtime();
    $timeArr = explode(' ', $time);
    $time = $timeArr[1]+$timeArr[0];
    if($intval)
    {
        return sprintf("%.6f",$time-$intval);
    }
    return sprintf("%.6f",$time);
}
//循环转义
function addslashes_loop($arr)
{
    if(is_array($arr))
    {
        foreach($arr AS $key => $val)
        {
            $arr[$key] = addslashes_loop($val);
        }
    }
    else
    {
        $arr = addslashes($arr);
    }
	return $arr;
}
//调用模型(模型，模块)
function M($model,$module=MODULE)
{
    return library\Loader::model($model,$module);
}
//调用服务(服务，模块)
function S($model,$module=MODULE)
{
    return library\Loader::service($model,$module);
}
//获取IP
function getip()
{
    $user_IP = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"]; 
    $IP = ($user_IP) ? $user_IP : $_SERVER["REMOTE_ADDR"];
    return $IP;
}