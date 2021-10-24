<?php
include('../controllers/bsnsInfoSystem.php');
$objInfoSystem = new InfoSystem();
$result = $objInfoSystem->GetUser($_POST['strData']);
$result = base64_decode($result);
$result = json_decode($result);
if($result->desc > 0){
  $arrJson = array("code"=>"200", "desc"=>"El correo ya existe");
  $strEcho = json_encode($arrJson);
  $strEcho = base64_encode($strEcho);
  echo($strEcho);
}
else{
  $objInfoSystem->NewUser($_POST['strData']);
  $arrJson = array("code"=>"201", "desc"=>"../haci/home/");
  $strEcho = json_encode($arrJson);
  $strEcho = base64_encode($strEcho);
  echo($strEcho);
}
?>
