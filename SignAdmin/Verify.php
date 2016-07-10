<?php
$usr=$_POST['username'];
$pwd=$_POST['password'];
include("../Include/conn.php");
$sql="SELECT * FROM sign_admin WHERE Username='{$usr}'";
$rs=mysqli_fetch_array(mysqli_query($conn,$sql));

$indb_pwd=$rs['Password'];

if($pwd!=$indb_pwd){die($indb_pwd);}
else if($pwd==$indb_pwd){die("6");}
else{die(0);}
?>