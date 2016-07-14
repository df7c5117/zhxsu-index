<?php

function todie($isAlert=0,$content="",$url){
  switch($isAlert){
    case 0:
      $rt="window.location.href='$url'";
      break;
    case 1:
      $rt='alert("'.$content.'");';
      $rt.="window.location.href='$url'";
      break;
    default:
      $rt='alert("'.$content.'");';
      break;
  }

  return "<script>".$rt."</script>";
}


function checklogged(){
  $token=@$_GET['signtk'];
  if($_SESSION['signlogged']!=true || $token!=$_SESSION['signtk'] || !$token || !$_SESSION['signtk']){
    die("403");
  }
}


function gettk(){
  $str="3D9H5A8V1NKX4Z6B7R2S3XFTBPA";
  $token="";
  for($r=0;$r<12;$r++){
    $token.=$str[mt_rand(0,26)];
  }
  return $token;
}
?>