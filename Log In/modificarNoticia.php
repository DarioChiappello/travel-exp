<?php
require_once("database.php");
require_once("session.php");
$idPublicacion = $_SESSION["idPublicacion"];

$titulo = $_POST["titulo"];

$contenido = $_POST["texto"];

$date = date("Y-m-d", time() - 3600*24);
$date_img = date("Y-m-dHms");

if (isset($_POST['upload'])) {

  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];  
  
  $filename = $date_img.$filename;
  

  $folder = "profile/".$filename;
  $user = $_SESSION["user"];
  if(empty($filename)){
     header("Location:editarNoticia.php");   
  }else{
    move_uploaded_file($tempname, $folder);

  }
  
}

global $conexion;
$sql = "UPDATE `noticias`
        SET `titulo` = '$titulo', `foto` = '$filename', `contenido` = '$contenido'
        WHERE `noticia_id` = '$idPublicacion'";

$res = $conexion->buscar_por_sql($sql);

header("Location:perfilAdmin.php");


?>