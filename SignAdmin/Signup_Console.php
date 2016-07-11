<?php
//检测登录状态
session_start();
require_once("../Include/functions.php");
checklogged();

require_once("../Include/conn.php");
$sql="SELECT * FROM sign_studata";
$query=mysqli_query($conn,$sql);
?>

<html>
<head>
  <meta charset="utf8">
  <title>学生会报名系统后台 :: 操控台</title>
</head>
<body>
<table border="1">
<tr>
  <th>ID</th>
  <th>姓名</th>
  <th>班别</th>
  <th>手机</th>
  <th>报名部门</th>
  <th>详情</th>
</tr>

<?php
while($rs=mysqli_fetch_row($query)){
  $rsdep=json_decode($rs['8']);
  $r=(int)array_search($_SESSION['dep'],$rsdep);
  var_dump($r);
  if($r>0){
    echo "<tr>";
    echo "<td>$rs[0]</td>";
    echo "<td>$rs[1]</td>";
    echo "<td>$rs[3]</td>";
    echo "<td>$rs[4]</td>";
    echo "<td>$_SESSION[dep]</td>";
    echo "<td><a href='Signup_Detail.php?signtk=$_GET[signtk]&id=$rs[0]'>详情</a></td>";
    echo "</tr>";
  }
}
?>