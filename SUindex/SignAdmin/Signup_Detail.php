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
  <link rel="stylesheet" href="../css/admin.css">
<style>
th{color:green;}
</style>
</head>

<body>
<div>
<h2 style="color:#4fb4f7">执信学生会报名系统<span style="font-size: 14px"> / 控制台 </span><span style="font-size: 14px;background-color:#00c853;color:#fff;border-radius: 5px;padding:0 5px 0 5px">α</span>&#12288;<a class="nav" href="#">重置密码</a>&#12288;<a  class="nav" href="#">导出Excel</a><span class="loginfo">欢迎回来，<?php echo($_SESSION['username']);?>。<br>你现在查看的是<?php echo($_SESSION['dep']);?>的报名数据</span></h2>
</div>
<center>
<table border="0" cellspacing="0" cellpadding="6">
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
  <th>附言</th>
  <td><?php echo $rs['Contact']; ?></td>
</tr>
<tr>
  <th>报名时间</th>
  <td><?php echo $rs['SignTime']; ?></td>
</tr>
</table>

<form method="post">
<input class="btn" style="margin-top:30px;margin-left:30px" type="submit" name="go" value="返回主页">
</form>

</center>
</body>