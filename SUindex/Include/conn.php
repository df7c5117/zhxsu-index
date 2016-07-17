<?php
date_default_timezone_set("Asia/Shanghai");	 $conn=@mysqli_connect("localhost","root","","susage");

//PHP内置函数（Errno为错误码）
if(mysqli_connect_errno($conn)){
  die("<h2>:-(</h2><br>十分抱歉，也许是出了些差错。<br>当前的系统状态：<b style='color:red'>[无法连接数据库]</b>，<h3 style='color:#66ccff'>请坐和放宽。</h3>以下的错误代码也许对您有所帮助。<s>其实这行代码没有什么卵用</s><br>您可能需要就此咨询系统管理员（电脑部网页组成员）：".mysqli_connect_errno($conn));
}

//设定为UTF-8
mysqli_set_charset($conn,"utf8");

?>
