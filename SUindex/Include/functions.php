<?php
/**
* -----------------------------------
* todie 使用JS结束运行
* -----------------------------------
* @param isAlert 是否JS弹出对话框(0/1)
* @param content JS对话框的内容(isAlert为1的时候启用)
* @param url 需要跳转的URL
* -----------------------------------
* @return JS-script 使用echo执行代码
* -----------------------------------
*/
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


/**
* -----------------------------------
* checklogged 后台检测是否已经登录 
* -----------------------------------
*/
function checklogged(){
  $token=@$_GET['signtk'];
  if($_SESSION['signlogged']!=true || $token!=$_SESSION['signtk'] || !$token || !$_SESSION['signtk']){
    die("对不起，您暂无权限访问！");
  }
}


/**
* -----------------------------------
* gettk 后台登录时获取Token 
* -----------------------------------
* @return Token 用户实时登录Token
* -----------------------------------
*/
function gettk(){
  $str="3D9H5A8V1NKX4Z6B7R2SXFT0BPA";
  $token="";
  for($r=0;$r<12;$r++){
    $token.=$str[mt_rand(0,26)];
  }
  return $token;
}


/**
* -----------------------------------
* md5pw 给密码进行两次MD5加密
* -----------------------------------
* @param pw 需要进行MD5加密的密码
* -----------------------------------
* @return md5pw 已加密的32位串码
* -----------------------------------
*/
function md5pw($pw){
  $md5pw=md5(md5($pw));
  return $md5pw;
}
?>