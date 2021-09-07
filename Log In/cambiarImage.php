<?php
require_once("session.php");
require_once("database.php");

$msg = "";
  
if (isset($_POST['upload'])) {

  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];  
  $folder = "img/".$filename;
  $user = $_SESSION["user"];

  $sql =    "UPDATE `usuarios`
             SET `foto` = '$filename'
             WHERE `user_name` = '$user'";
             
  global $conexion;
  $conexion->buscar_por_sql($sql);
  
  if (move_uploaded_file($tempname, $folder)){
      echo $msg = "Imagen cargada correctamente";
  }else{
      echo $msg = "Fallo la carga de la imagen";
  }

  //Cuando se crea un usuario lo ponemos en foto default.png y después con $_SESSION hacemos un update en la foto
  //del usuario.

}


?>