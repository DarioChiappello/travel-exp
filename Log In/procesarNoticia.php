<?php
require_once("database.php");
require_once("session.php");

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
     header("Location:crearNoticia.php");   
  }else{
    move_uploaded_file($tempname, $folder);

  }
  
}

global $conexion;
$user=$_SESSION["user"];
$sql = "SELECT `admin_id`
        FROM `administradores`
        WHERE `nombre` = '$user'";
$resultado = $conexion->buscar_por_sql($sql);
$resultado = mysqli_fetch_array($resultado);
$idUsuario= $resultado["admin_id"];
$insert ="INSERT INTO noticias(`admin_id`,`titulo`,`contenido`, `foto`)
          VALUES('$idUsuario','$titulo','$contenido','$filename')";
$resultado = $conexion->buscar_por_sql($insert);
header("Location:perfilAdmin.php");

?>
