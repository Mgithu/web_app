<?php
include_once("function.php");
$id=intval($_GET['id']);

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
$del_sql1 = "DELETE FROM `fir_task` WHERE `fir_id`='".$id."' ";
$del_sql2 = "DELETE FROM `sec_task` WHERE `fir_id`='".$id."' ";
$del_res1 = mysqli_query($con, $del_sql1);
$del_res2 = mysqli_query($con, $del_sql2);
if((!$del_res1)||(!$del_res2)){
	echo("sql错误: " . mysqli_error($con)); 
	exit;
}

mysqli_close($con);
header("location:index.php");
?>