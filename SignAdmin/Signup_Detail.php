<?php
//检测登录状态
session_start();
require_once("../Include/functions.php");
checklogged();

require_once("../Include/conn.php");
$id=$_GET['id'];
$t=$_GET['signtk'];
$sql="SELECT * FROM sign_studata WHERE id='{$id}'";
$query=mysqli_query($conn,$sql);
$rs=mysqli_fetch_array($query);

$url="Signup_Console.php?signtk=$t";
if(isset($_POST['go'])){Header("Location:".$url);}
?>

<html>
<head>
  <meta charset="utf8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>学生会报名系统后台 :: 详细信息</title>
  <link rel="shortcut icon" href="../res/favicon.ico">
  <link rel="stylesheet" href="../css/signup.css">
  <link rel="stylesheet" href="../css/material.css">
<style>
th{background-color:pink;color:green;}
</style>
</head>

<body>
<table border="1">
<tr>
  <th>ID</th>
  <td><?php echo $rs['id']; ?></td>
</tr>
<tr>
  <th>姓名</th>
  <td><?php echo $rs['stuName']; ?></td>
</tr>
<tr>
  <th>性别</th>
  <td><?php echo $rs['stuSex']; ?></td>
</tr>
<tr>
  <th>班别</th>
  <td>高一（<?php echo $rs['stuClass']; ?>）班</td>
</tr>
<tr>
  <th>手机</th>
  <td><?php echo $rs['stuPhone']; ?></td>
</tr>
<tr>
  <th>邮箱</th>
  <td><?php echo $rs['stuMail']; ?></td>
</tr>
<tr>
  <th>QQ</th>
  <td><?php echo $rs['stuQQ']; ?></td>
</tr>
<tr>
  <th>微信</th>
  <td><?php echo $rs['stuWeChat']; ?></td>
</tr>
<tr>
  <th>报名部门</th>
  <td><?php echo $_SESSION['dep']; ?></td>
</tr>
<tr>
  <th>聊天</th>
  <td><?php echo $rs['Contact']; ?></td>
</tr>
<tr>
  <th>报名时间</th>
  <td><?php echo $rs['SignTime']; ?></td>
</tr>
</table>

<form method="post">
<input class="submit btn raised green" style="margin-top:30px;margin-left:30px" type="submit" name="go" value="返回主页">
</form>