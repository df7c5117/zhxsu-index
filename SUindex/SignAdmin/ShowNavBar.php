<?php
$token=$_GET['signtk'];
$u=$_SESSION['usrn'];
?>

<div>
<h2 style="color:#4fb4f7">执信学生会报名系统<span style="font-size:14px"> / 控制台 </span>
  <span class="version">α</span>
  &#12288;<a id="resetpwd" class="nav" href="SignAdmin_Profile.php?signtk=<?php echo $token."&u=".$u; ?>">重置密码</a>
	<a id="rtindex" class="nav" onclick="history.back()" href="">返回上页</a>
  <span class="loginfo"><span class="perinfo"><?php echo($_SESSION['usrn']);?></span>，欢迎回来。
  <br>
  你现在查看的是<span class="perinfo"><?php echo($_SESSION['dep']);?></span>的报名数据
</span>
</h2>
</div>