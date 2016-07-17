<?php
session_start();
$usr=@$_POST['username'];
$pwd=@$_POST['password'];
include("../Include/functions.php");
require_once("../Include/conn.php");
$sql="SELECT * FROM sign_admin WHERE Username='{$usr}'";
$rs=mysqli_fetch_array(mysqli_query($conn,$sql));

$indb_pwd=$rs['Password'];

if($pwd!=$indb_pwd){
  $_SESSION['signlogged']=false;
  die("1");
}

else if($pwd==$indb_pwd && $indb_pwd){
  $_SESSION['signlogged']=true;
  $_SESSION['signtk']=gettk();
  $_SESSION['dep']=$rs['Dep'];
  $_SESSION['usrn']=$rs['Username'];
  die("6|".$_SESSION['signtk']);
}
else{die(0);}
?>