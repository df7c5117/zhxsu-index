<?php
define("Root",$_SERVER['DOCUMENT_ROOT']);
require_once("Include/functions.php");
require_once(Root."/Captcha/function.Captcha.php");

$ran=mt_rand(0,$TotalQuest);
$question=GetQuestion($ran);

if(isset($_POST) && $_POST){
  require_once("Include/conn.php");
  
  //先判断验证码
  $num=$_POST['num'];
  $code=$_POST['verify_code'];
  CheckCaptcha($num,$code);
  
  //获取用户输入内容
  $name=$_POST['stuName'];
  $sex=$_POST['stuSex'];
  $class=$_POST['stuClass'];
  $phone=$_POST['stuPhone'];
  $mail=$_POST['stuMail'];
  $qq=$_POST['stuQQ'];
  $wechat=$_POST['stuWeChat'];
  $ckdep=@$_POST['dep'];
  $contact=$_POST['contact'];
  array_unshift($ckdep,"");

  //获取选中部门
  foreach($ckdep as $key => $value){
    $ckdep[$key]=urlencode($value);
  }  
  $dep=urldecode(json_encode($ckdep));
  $alert="";
  foreach($ckdep as $a){
    $alert.=urldecode($a).' | ';
  }

  //往数据库添加数据
  $sql="INSERT INTO sign_studata(stuName,stuSex,stuClass,stuPhone,stuMail,stuQQ,stuWeChat,SignDep,Contact) VALUES ('{$name}','{$sex}','{$class}','{$phone}','{$mail}','{$qq}','{$wechat}','{$dep}','{$contact}')";
  $rs=mysqli_query($conn,$sql);
  
  //判断是否添加成功
  if($rs==true){
    $alert='恭喜您成功报名！\n以下为您的报名信息：\n————————————\n姓名：'.$name.'\n班别：高一（'.$class.'）班\n联系电话：'.$phone.'\n报名部门：'.$alert;
    echo todie(1,$alert,"index.html");
  }else{
    echo todie(1,$sql,"#");
  }
}
?>

<!DOCTYPE html>
<html lang="cn">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>New Here？ / ZXSU Signup</title>
  <link rel="stylesheet" href="css/signdata.css">
  <link rel="stylesheet" href="css/material.css">
  <link rel="shortcut icon" href="res/favicon.ico">
</head>

<body>
<div class="wrap">
  <div class="navbox">
    <div class="headblur">
      <div class="wrp">
        <div class="navfix" style="background-image: url('./res/bg_sign.jpg');"></div>
        <div class="navbg"></div>
      </div>
      <div class="linkbox">
        <div class="links">   
          <span class="navlink">执信学生会 / 报名平台 <span style="font-size:5px;background: #4fb4f7;border-radius: 5px;padding:0px 5px 0px 5px">Beta</span></span>
          <a class="navlink" href="index.html" >回主页</a>
            
          <div style="float:right">
            <a class="navlink" href="#about" title="幕后黑历史">关于我们</a><a class="navlink" href="http://weibo.com/zxsu32nd" title="为啥不来关注w">微博</a><span class="navlink"><span style="font-size:5px;background: #27AE60;border-radius: 5px;padding:0px 5px 0px 5px">微信公众号</span>  gzzxsu</span>
          </div>
        </div>
      </div>
    </div>
  </div>
<form method="POST">
<input type="hidden" name="num" value="<?php echo $ran; ?>">
<div class="card-container">
<div class="card infopanel">
<h2>欢迎到来！</h2>
<h3 class="infosubtitle">请填写一些必要信息</h3>
<p style="color:red">带*为必填</p>
<div>
  <input required="required" class="text-input" name="stuName" placeholder="尊姓大名 *" MaxLength="4"/>
  <input type="radio" name="stuSex" value="男">男<input type="radio" name="stuSex" value="女">女
  
  <span class="tip">高一级</span>
  <select name="stuClass">
  <?php
  for($s=1;$s<=17;$s++){
  echo "<option value='$s'>$s</option>";}
  ?>
  </select>班
</div>
</div>


<div class="card infopanel">
<h2>接下来呢……</h2>
<h3 class="infosubtitle">请告诉我们你的联系方式</h3>
<div>
  <input required="required" class="text-input" name="stuPhone" placeholder="手机号 *" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" MaxLength="11"/>
  <input class="text-input" name="stuMail" placeholder="邮箱" style="margin-left: 15px"/>
  <input class="text-input" name="stuQQ" placeholder="QQ" style="margin-left: 15px" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" MaxLength="12"/>
  <input class="text-input" name="stuWeChat" placeholder="微信" style="margin-left: 15px"/>
</div>
</div>
                        

<div class="card infopanel">
<h2>想必你已经跃跃欲试了！</h2>
<h3 class="infosubtitle">还记得你刚浏览过的感兴趣的部门吗？</h3>
<p style="color:#27ae60">如果忘了，点击名称可以再次查看哦~</p>
<div style="z-index:999999">
  <div class="checkbox" style="margin:15px 15% 0 15%;display:inline-block;">
    <input type="checkbox" id="checkNWB" name="dep[]" value="内务部">
    <label for="checkNWB" style="display:inline-block"></label>
    <span><a href="#" target="_blank" class="lablink">内务部</a></span>
  </div>
  <div class="checkbox" style="margin:15px 15% 0 15%;display:inline-block;float: right">
    <input type="checkbox" id="checkGGB" name="dep[]" value="公关部">
    <label for="checkGGB" style="display:inline-block"></label>
    <span><a href="#" target="_blank" class="lablink">公关部</a></span>
  </div>
  
  <div class="checkbox" style="margin:15px 15% 0 15%;display:inline-block;">
    <input type="checkbox" id="checkDNB" name="dep[]" value="电脑部">
    <label for="checkDNB" style="display:inline-block"></label>
    <span><a href="#" target="_blank" class="lablink">电脑部</a></span>
  </div>
  
  <div class="checkbox" style="margin:15px 15% 0 15%;display:inline-block;float: right">
    <input type="checkbox" id="checkDST" name="dep[]" value="电视台">
    <label for="checkDST" style="display:inline-block"></label>
    <span><a href="#" target="_blank" class="lablink">电视台</a></span>
  </div>

  <div class="checkbox" style="margin:15px 15% 0 15%;display:inline-block;">
    <input type="checkbox" id="checkGBZ" name="dep[]" value="广播站">
    <label for="checkGBZ" style="display:inline-block"></label>
    <span><a href="#" target="_blank" class="lablink">广播站</a></span>
  </div>
  
  <div class="checkbox" style="margin:15px 15% 0 15%;display:inline-block;float: right">
    <input type="checkbox" id="checkAU" name="dep[]" value="社联">
    <label for="checkAU" style="display:inline-block"></label>
    <span><a href="#" target="_blank" class="lablink">社&#12288;联</a></span>
  </div>
  
  <div class="checkbox" style="margin:15px 15% 0 15%;display:inline-block;">
    <input type="checkbox" id="checkWYB" name="dep[]" value="文娱部">
    <label for="checkWYB" style="display:inline-block"></label>
    <span><a href="#" target="_blank" class="lablink">文娱部</a></span>
  </div>
  
  <div class="checkbox" style="margin:15px 15% 0 15%;display:inline-block;float: right">
    <input type="checkbox" id="checkXCB" name="dep[]" value="宣传部">
    <label for="checkXCB" style="display:inline-block"></label>
    <span><a href="#" target="_blank" class="lablink">宣传部</a></span>
  </div>
  
  <div class="checkbox" style="margin:15px 15% 0 15%;display:inline-block;">
    <input type="checkbox" id="checkXSB" name="dep[]" value="学术部">
    <label for="checkXSB" style="display:inline-block"></label>
    <span><a href="#" target="_blank" class="lablink">学术部</a></span>
  </div>
  
  <div class="checkbox" style="margin:15px 15% 0 15%;display:inline-block;float: right">
    <input type="checkbox" id="checkTYB" name="dep[]" value="体育部">
    <label for="checkTYB" style="display:inline-block"></label>
    <span><a href="#" target="_blank" class="lablink">体育部</a></span>
  </div>
</div>
</div>

<div class="card infopanel">
  <h2>说点什么吧！</h2>
  <h3 class="infosubtitle">介绍一下你自己</h3>
  <p>你可以写下你的特长、爱好、专业技术、之前的工作经验，<br>为了更好地了解你，你可以留下你的社交网站地址，包括微博、豆瓣、知乎、lofter、<s>bilibili、GitHub</s>等等等等</p>
  
  <div>
    <textarea class="text-input" name="contact" placeholder="写点什么……" style="width:100%;resize: none;height:200px"></textarea>
  </div>
  
  <center>
  <div class="checkbox" style="margin-top: 15px">
    <input type="checkbox" id="checkbox" name="read[]" required="required">
    <label for="checkbox" style="display:inline-block"></label>
    <span>我已阅读并同意<a href="" target="_blank">报名须知</a></span>
  </div>
  <div style="margin-top: 15px">
    <?php echo $question; ?>
    <input type="text" class="text-input" placeholder="请输入验证码" name="verify_code" autocomplete="off">
  </div>
  <input type="submit" class="submit btn raised green" style="margin-top: 30px" value="确认报名">
  </center>
  
</div>
</div></form>
</div>

<!-- js -->
<script type="text/javascript" src="./res/jquery.min.js"></script>
<!--<script type="text/javascript" src="./res/index.js"></script>-->
</body></html>
