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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>学生会报名系统后台 :: 控制台</title>
  <link rel="shortcut icon" href="../res/favicon.ico">
  <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
<div>
<h2 style="color:#4fb4f7">执信学生会报名系统<span style="font-size: 14px"> / 控制台 </span><span style="font-size: 14px;background-color:#00c853;color:#fff;border-radius: 5px;padding:0 5px 0 5px">α</span>&#12288;<a class="nav" href="#">重置密码</a>&#12288;<a  class="nav" href="#">导出Excel</a><span class="loginfo">欢迎回来，<?php echo($_SESSION['username']);?>。<br>你现在查看的是<?php echo($_SESSION['dep']);?>的报名数据</span></h2>
</div>
<center>
<table border="0" cellspacing="0" cellpadding="6" style="width:80%;text-align: left">
<tr>
  <th>ID</th>
  <th>姓名</th>
  <th>性别</th>
  <th>班别</th>
  <th>手机</th>
  <th>报名部门</th>
  <th>详情</th>
</tr>
<?php
while($rs=mysqli_fetch_row($query)){
  $rsdep=json_decode($rs['8']);
  $r=(int)array_search($_SESSION['dep'],$rsdep);
  if($r>0){
    echo "<tr>";
    echo "<td>$rs[0]</td>";
    echo "<td>$rs[1]</td>";
    echo "<td>$rs[3]</td>";
    echo "<td>高一（$rs[2]）班</td>";
    echo "<td>$rs[4]</td>";
    echo "<td>$_SESSION[dep]</td>";
    echo "<td><a href='Signup_Detail.php?signtk=$_GET[signtk]&id=$rs[0]'>查看</a></td>";
    echo "</tr>";
  }
}
?>
</table>
</center>
</body>