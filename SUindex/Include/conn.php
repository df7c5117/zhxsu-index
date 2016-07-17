<?php
date_default_timezone_set("Asia/Shanghai");	 $conn=@mysqli_connect("localhost","root","","susage");

//PHP内置函数（Errno为错误码）
if(mysqli_connect_errno($conn)){
  die("无法连接数据库，错误代码:".mysqli_connect_errno($conn));
}

//设定为UTF-8
mysqli_set_charset($conn,"utf8");

?>
