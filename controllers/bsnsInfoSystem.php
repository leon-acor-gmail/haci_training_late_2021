<?php
include('bsnsDataSystem.php');
class InfoSystem extends DataSystem
{
  private $conn;
  private function OpenDB()
  {
      $conn = new mysqli(DataSystem::dbHost, DataSystem::dbUser, DataSystem::dbPwd, DataSystem::dbName);
      if ($conn->connect_errno)
      {
        $this->conn = false;
      }
      else
      {
        $this->conn = $conn;
      }
  }

  private function CloseDB()
  {
      mysqli_close($this->conn);
  }

  public function NewUser($strJson){
    $dataDecode64 = base64_decode($strJson);
    $dataDecodeJson = json_decode($dataDecode64);
    $username = $dataDecodeJson->{'username'};
    $useremail = $dataDecodeJson->{'useremail'};
    $userpassword = $dataDecodeJson->{'userpassword'};

    $sql = "INSERT INTO schUsuarios (name, email, contrasena) VALUES ('$username', '$useremail', '$userpassword');";
    $this->OpenDB();
    if ($this->conn->query($sql) === TRUE) {
      $arrJson = array("code"=>"200", "desc"=>"OK");
      $strEcho = json_encode($arrJson);
      $strEcho = base64_encode($strEcho);
    } else {
      $arrJson = array("code"=>"500", "desc"=>$sql.", ".$conn->error);
      $strEcho = json_encode($arrJson);
      $strEcho = base64_encode($strEcho);
    }
    $this->CloseDB();
    return $strEcho;
  }

  public function GetUser($strJson){
    $dataDecode64 = base64_decode($strJson);
    $dataDecodeJson = json_decode($dataDecode64);
    $useremail = $dataDecodeJson->{'useremail'};

    $sql = "SELECT COUNT(email) AS L1 FROM schUsuarios WHERE estatus = 1 AND email = '$useremail';";
    $this->OpenDB();
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $arrJson = array("code"=>"200", "desc"=>$row["L1"]);
        $strEcho = json_encode($arrJson);
        $strEcho = base64_encode($strEcho);
      }
    } /*else {
      $arrJson = array("code"=>"204", "desc"=>"No Content");
      $strEcho = json_encode($arrJson);
      $strEcho = base64_encode($strEcho);
    }*/
    $this->CloseDB();
    return $strEcho;
  }

  public function Login($strJson){
    $dataDecode64 = base64_decode($strJson);
    $dataDecodeJson = json_decode($dataDecode64);
    $useremail = $dataDecodeJson->{'useremail'};
    $userpwd = $dataDecodeJson->{'userpassword'};
    $sql = "SELECT COUNT(email) AS L1 FROM schUsuarios WHERE estatus = 1 AND email = '$useremail' AND contrasena ='$userpwd';";
    $this->OpenDB();
    $result = $this->conn->query($sql);
    $row = $result->fetch_assoc();
    $this->CloseDB();
    $arrJson = array("code"=>"200", "desc"=>$row["L1"]);
    $strEcho = json_encode($arrJson);
    $strEcho = base64_encode($strEcho);
    return $strEcho;
  }
}
?>
