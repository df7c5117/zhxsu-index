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
<link rel="stylesheet" href="../css/admin.css">
<style>
  #resetpwd{display: none}
  #rtindex{display: inline-block}
</style>
<body>
<?php include("ShowNavBar.php"); ?>
<center>
<form method="post">
  <p>密码重置 / Password Reset</p>
  <input class="txtbox" type="text" name="UsrName" value=<?php echo $usr; echo"&#12288;(你的用户名，暂不提供更改）";?> disabled><br>
  <input class="txtbox" type="text" name="UsrDep" placeholder="用户所属部门"><br>
  <input class="txtbox" type="password" name="OldPass" placeholder="原密码"><br>
  <input class="txtbox" type="password" name="NewPass" placeholder="新密码"><br>
  <input class="txtbox" type="password" name="Verify" placeholder="再次输入新密码"><br>
  <input type="submit" class="btn" value="确认修改">
</form>
</center>