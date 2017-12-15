<?php
include_once("function.php");
$con=mysqli_connect($db_host,$db_username,$db_psw,$db_name);

if(!$con){
	echo "数据库链接失败：".mysqli_connect_error();
	exit;
}

mysqli_query($con,"SET NAMES utf8");
$sql_1 = "SELECT * FROM `fir_task` WHERE `user_id` = '".$_SESSION['userinfo']['id']."'";
$info_res1 = mysqli_query($con,$sql_1);

if(!$info_res1){
	echo("sql错误：".mysqli_error($con));
	exit;
}

$info_1 = mysqli_fetch_all($info_res1);
//echo count($info_1);
/*foreach($info_1 as $key => $value){
	foreach($value as $keys => $val){
		echo $keys.$val." ";
	}
}*/
include_once("index.html");
?>