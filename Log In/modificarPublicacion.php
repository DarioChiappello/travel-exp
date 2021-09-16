<?php
require_once("database.php");
require_once("session.php");
$idPublicacion = $_SESSION["idPublicacion"];

$titulo = $_POST["titulo"];
//$imagen = $_POST["uploadfile"];
$puntuacion = $_POST["calificacion"];
$provincia = $_POST["provincia"];
$contenido = $_POST["texto"];
$actividad = $_POST["actividad"];
$date = date("Y-m-d", time() - 3600*24);
$date_img = date("Y-m-dHms");

if (isset($_POST['upload'])) {

  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];  
  
  $filename = $date_img.$filename;
  

  $folder = "profile/".$filename;
  $user = $_SESSION["user"];
  if(empty($filename)){
     header("Location:editarPublicacion.php");   
  }else{
    move_uploaded_file($tempname, $folder);

  }
  
}

global $conexion;
$sql = "UPDATE `publicaciones`
        SET `titulo` = '$titulo', `calificacion` = '$puntuacion', `foto` = '$filename', `contenido` = '$contenido', `actividad` = '$actividad', `nombre_provincia` = '$provincia'
        WHERE `publicacion_id` = '$idPublicacion'";

$res = $conexion->buscar_por_sql($sql);

header("Location:Perfil.php");


?>