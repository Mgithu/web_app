<?php
include_once 'function.php';
$uname = htmlspecialchars(trim($_POST['username']));

if(empty($uname)){
	exit("请输入用户名");
}

$psw = htmlspecialchars($_POST['psw_1']);
$repsw = htmlspecialchars($_POST['psw_2']);

if(empty($psw)){
	exit("请输入密码");
}

if(strlen($psw)<6 || strlen($psw)>15){
	exit("密码6-15");
}

if($psw != $repsw){
	exit("两次密码不一致");
}

$con = mysqli_connect($db_host, $db_username, $db_psw, $db_name);

if(!$con){
	echo "数据库链接失败：".mysqli_connect_error();
	exit;
}

mysqli_query($con, "SET NAMES utf8");//绑定客户端编码，显示客户端发送的SQL语句使用什么字符集
$sql = "SELECT `id` FROM `user` WHERE `username` = '".$uname."'";
$info_res = mysqli_query($con, $sql);

if(!$info_res){
	echo("sql错误: " . mysqli_error($con)); 
	exit;
}

$info = mysqli_fetch_assoc($info_res);

if(!empty($info)){
	exit("用户名已存在");
}
$x=1;
$insert_sql = "INSERT INTO `user`(`username`,`password`) VALUES('".$uname."', '".$psw."')";
$insert_res = mysqli_query($con, $insert_sql);

if(!$insert_res){
	echo("sql错误: " . mysqli_error($con)); 
	exit;
}else{
	header("location:login.html");
}
