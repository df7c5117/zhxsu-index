<?php
if(isset($_POST) && $_POST){
echo "Indb: ".md5(md5($_POST['signpwd']));
}
?>

<form method="post">
<input name="signpwd">
<input type="submit">
</form>