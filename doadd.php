<?php
include_once("function.php");
$id=intval($_POST['id']);//id为user_id
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
$task_name=$_POST['task_name'];
$sql="INSERT INTO `fir_task` (`user_id`,`task_name`) VALUES ('".$id."','".$task_name."')";
$result=mysqli_query($con,$sql);
if(!$result){
	exit("sql语句错误：".mysqli_error($con));
}
echo "添加成功！";
mysqli_close($con);
header("location:index.php");
?>