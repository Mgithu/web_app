<?php
include_once("function.php");
$id=$_SESSION['id'];
$con=mysqli_connect($db_host,$db_username,$db_psw,$db_name);

if(!$con){
	echo "数据库链接失败：".mysqli_connect_error();
	exit;
}

mysqli_query($con,"SET NAMES utf8");
$sql = "SELECT * FROM `sec_task` WHERE `fir_id` = '".$id."'";
$info_res = mysqli_query($con,$sql);

if(!$info_res){
	echo("sql错误：".mysqli_error($con));
	exit;
}

$info = mysqli_fetch_all($info_res);
include_once("sec.html");
?>