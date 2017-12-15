<?php
include_once 'function.php';
$uname = htmlspecialchars(trim($_POST['username']));

if(empty($uname)){
	exit("请输入用户名");
}

$psw = htmlspecialchars($_POST['psw']);

if(empty($psw)){
	exit("请输入密码");
}

if(strlen($psw)<6 || strlen($psw)>15){
	exit("密码6-15");
}

$con = mysqli_connect($db_host, $db_username, $db_psw, $db_name);

if(!$con){
	echo "数据库链接失败：".mysqli_connect_error();
	exit;
}

mysqli_query($con, "SET NAMES utf8");
$sql = "SELECT `id`,`password`,`username` FROM `user` WHERE `username` = '".$uname."'";
$info_res = mysqli_query($con, $sql);

if(!$info_res){
	echo("sql错误: " . mysqli_error($con)); 
	exit;
}

$info = mysqli_fetch_assoc($info_res);
if(empty($info)){
	exit("用户名不存在");
}

if($info['password'] != $psw){
	exit("密码错误");
}

unset($info['psw']);
$_SESSION['userinfo'] = $info;
header("location:index.php");
?>