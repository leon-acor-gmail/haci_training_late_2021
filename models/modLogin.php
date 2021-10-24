<?php
include('../controllers/bsnsInfoSystem.php');
$objInfoSystem = new InfoSystem();
$result = $objInfoSystem->Login($_POST['strData']);
$result = base64_decode($result);
$result = json_decode($result);
if($result->desc == 1){
  $arrJson = array("code"=>"200", "desc"=>"/haci/home/");
  $strEcho = json_encode($arrJson);
  $strEcho = base64_encode($strEcho);
  echo($strEcho);
}
else{
  $arrJson = array("code"=>"201", "desc"=>"Verifica tus datos");
  $strEcho = json_encode($arrJson);
  $strEcho = base64_encode($strEcho);
  echo($strEcho);
}
?>
