<?php
//检测登录状态
session_start();
require_once("../Include/functions.php");
checklogged();
$tk=@$_GET['signtk'];
$dep=$_SESSION['dep'];

require_once("../Include/conn.php");
$sql="SELECT * FROM sign_studata WHERE SignDep LIKE '%$dep%'";
$query=mysqli_query($conn,$sql);
// 共有记录数量
$total=mysqli_num_rows($query);
// 当前页码
$page=isset($_GET['page'])?intval($_GET['page']):1;
// 目前每页显示数量
$size=isset($_GET['psize'])?intval($_GET['psize']):2;
// 可选择的每页显示数量
$arraysize=array(20,50,100,200);
// 总共页数
$totalpage=ceil($total/$size);
If($page>$totalpage || $page == 0){
echo todie(0,"","Signup_Console.php?page=1&signtk=".$tk);
}

//计算偏移量
$offset=($page-1)*$size;
$info=mysqli_query($conn,"SELECT * FROM sign_studata WHERE SignDep LIKE '%$dep%' LIMIT $offset,$size");

// 切换每页显示数量
if(isset($_POST) && $_POST){
$diysize=$_POST['PageSize'];
echo todie(0,"","Signup_Console.php?psize=".$diysize."&page=".$page."&signtk=".$tk);
}
?>

<html>
<head>
  <meta charset="utf8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>学生会报名系统后台 :: 控制台</title>
  <link rel="shortcut icon" href="../res/favicon.ico">
  <link rel="stylesheet" href="../css/admin.css">
  <style>#rtindex{display: none}</style>
</head>

<body>
<?php include("ShowNavBar.php"); ?>

<center>
<form method="post" id="size">
报名信息共 <?php echo $totalpage." 页，当前第 ".$page." 页"; ?>。
<span>你可以选择每页显示数量：</span>
<select name="PageSize" onchange="changeSize()">
<?php
echo "<option value='$size' selected='selected'>$size</option>";
$w=array_search($size,$arraysize);
array_splice($arraysize,$w,1);
foreach($arraysize as $value){
  echo "<option value='$value'>$value</option>";
}
?>
</select>

</form>
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
while($rs=mysqli_fetch_row($info)){
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
?>
</table>

</center>

<script>
function changeSize(){
$('#size').submit();}
</script>

<script src="https://cdn.bootcss.com/jquery/3.1.0/jquery.js"></script>
</body>