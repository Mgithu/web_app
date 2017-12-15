<?php
include_once("function.php");
$id = intval($_GET['id']);//id为fir_id

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
$sql="SELECT * FROM `sec_task` WHERE `sec_id`='".$id."'";
$result = mysqli_query($con, $sql);

if(!$result){
	echo("sql错误: " . mysqli_error($con)); 
	exit;
}

$info = mysqli_fetch_all($result);
$_SESSION['aid']=$id;
include_once("addsec.html");
?>