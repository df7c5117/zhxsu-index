<?php
require_once("function.Captcha.php");
$ran=mt_rand(0,$TotalQuest);
$question=GetQuestion($ran);

if(isset($_POST) && $_POST){
  $num=$_POST['num'];
  $code=$_POST['verify_code'];
  CheckCaptcha($num,$code);
}
?>

<meta charset="utf8">
<form method="post">
<input type="hidden" name="num" value="<?php echo $ran; ?>">

<?php echo $question; ?>
<br>
<input type="text" name="verify_code">
<input type="submit">