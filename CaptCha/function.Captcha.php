<?php
//共有问题数量
$TotalQuest="5";


/* --------------------------------
** GetQuestion 获取验证问题
** --------------------------------
** @param random 问题序号
** --------------------------------
** @return question 问题内容
** --------------------------------
*/
function GetQuestion($num){
  $q=file_get_contents(Root."/Captcha/question.json");
  $q=json_decode($q);
  $question=$q[$num];
  return $question;
}


/* --------------------------------
** CheckCaptCha 比对答案是否正确
** --------------------------------
** @param num 问题序号
** @param code 用户输入的答案
** --------------------------------
*/
function CheckCaptcha($num,$code){
  $a=file_get_contents(Root."/Captcha/answer.json");
  $a=json_decode($a);
  $answer=$a[$num];
  if($answer==$code){die("验证成功");}
  else{exit();}
}

?>