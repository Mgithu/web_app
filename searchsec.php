<?php
include_once("function.php");
$id=intval($_GET['id']);//此处id为fir_id
session_start();
if(!$id){
	echo "参数错误";
	exit;
}

$con = mysqli_connect($db_host, $db_username, $db_psw, $db_name);

if(!$con){
	echo "数据库链接失败：".mysqli_connect_error();
	exit;
}

mysqli_query($con, "SET NAMES utf8");
$sql = "SELECT * FROM `sec_task` WHERE `fir_id` = '".$id."'";
$res = mysqli_query($con,$sql);
$info = mysqli_fetch_all($res);
$_SESSION['sectask']=$info;
$_SESSION['id']=$id;
mysqli_close($con);
header("location:sec.php");
?>