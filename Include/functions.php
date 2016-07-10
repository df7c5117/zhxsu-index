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

?>