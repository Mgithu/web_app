<?php
	header("content-type:text/html;charset=utf-8");
	date_default_timezone_set("PRC");
	error_reporting(E_ALL&~(E_NOTICE|E_WARNING));//报告除了E_NOTICE和E_WARING之外的所有错误
	include_once("config.php");  //系統配置文件
	session_start();
?>