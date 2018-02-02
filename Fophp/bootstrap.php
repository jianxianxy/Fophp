<?php
/**
 * 框架自动加载控制器
 */
session_start();
//PSR0规范 加载框架文件 
function autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if($lastNsPos = strripos($className, '\\')) 
    {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= $className . '.php';
    include $fileName;
}

//自动加载文件
function __autoload($className) 
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if($lastNsPos = strripos($className, '\\')) 
    {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= $className . '.php';
    include $fileName;
}