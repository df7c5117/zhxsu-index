<?php
//检测登录状态
session_start();
require_once("../Include/functions.php");
require_once("../Include/conn.php");
checklogged();
$usr=@$_GET['u'];
$tk=@$_GET['signtk'];

if(isset($_POST) && $_POST){
  $Dep=$_POST['UsrDep'];
  $Old=md5pw($_POST['OldPass']);
  $New=md5pw($_POST['NewPass']);
  $vfy=md5pw($_POST['Verify']);  
  $sql="SELECT * FROM sign_admin WHERE Username='{$usr}'";
  $query=mysqli_query($conn,$sql);
  $rs=mysqli_fetch_array($query);
  if($Dep != $rs['Dep']){}
  else if($New != $vfy){}
  else if($Old != $rs['Password']){}
  else{
    $upsql="UPDATE sign_admin SET Password='{$New}' WHERE Username='{$usr}'";
    $uprs=mysqli_query($conn,$upsql);
    echo todie(1,"修改成功！","Signup_Console.php?signtk=$tk");
  }
}
?>

<html>
<head>
<meta charset="utf8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>学生会报名系统后台 :: 修改密码</title>
  <link rel="shortcut icon" href="../res/favicon.ico">
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<form method="post">
  用户名：<input type="text" name="UsrName" value=<?php echo $usr; ?> disabled><br>
  用户所属部门：<input type="text" name="UsrDep"><br>
  原密码：<input type="password" name="OldPass"><br>
  新密码：<input type="password" name="NewPass"><br>
  再次输入新密码：<input type="password" name="Verify"><br>
  <input type="submit" value="确认修改">
</form>