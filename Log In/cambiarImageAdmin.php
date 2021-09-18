<?php
require_once("session.php");
require_once("database.php");

$msg = "";
  
if (isset($_POST['upload'])) {

  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];  
  $folder = "img/".$filename;
  $user = $_SESSION["user"];
  if(empty($filename)){
     header("Location:perfilAdmin.php");   
  }else{
      $sql ="UPDATE `administradores`
             SET `foto` = '$filename'
             WHERE `nombre` = '$user'";
      global $conexion;
      $conexion->buscar_por_sql($sql);
  }

  if (move_uploaded_file($tempname, $folder)){
    header("Location:perfilAdmin.php");
  }else{
    header("Location:perfilAdmin.php");
  }

}

?>