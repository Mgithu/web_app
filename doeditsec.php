<?php
include_once("function.php");
$id=intval($_POST['id']);//id为sec_id

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
$task_text=$_POST['task_text'];
$sql_up1="UPDATE `sec_task` SET `task_name` = '".$task_name."' WHERE `sec_id` = '".$id."'";
$sql_up2="UPDATE `sec_task` SET `task_text` = '".$task_text."' WHERE `sec_id` = '".$id."'";
$result1=mysqli_query($con,$sql_up1);
$result2=mysqli_query($con,$sql_up2);
if((!$result1)||(!$result2)){
	exit("sql语句错误：".mysqli_error($con));
}
echo "修改成功！";
mysqli_close($con);
header("location:sec.php");
?>