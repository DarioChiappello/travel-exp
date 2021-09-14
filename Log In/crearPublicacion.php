<?php
require_once("database.php");
require_once("session.php");

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
     header("Location:crearEntrada.php");   
  }else{
    move_uploaded_file($tempname, $folder);

  }
  
}





if (empty($titulo)||empty($puntuacion)||empty($provincia)||empty($contenido)||empty($actividad)){
    echo "no se puede crear campos vacios";
}
else {
    global $conexion;
$user=$_SESSION["user"];

$sql = "SELECT `user_id`
FROM `usuarios`
WHERE `user_name` = '$user'";

$resultado = $conexion->buscar_por_sql($sql);
$resultado = mysqli_fetch_array($resultado);

$idUsuario= $resultado["user_id"];

$insert ="INSERT INTO publicaciones(`user_id`,`fecha`,`titulo`,`contenido`, `calificacion`,`foto`,`id_provincia`,`actividad`)
                      VALUES('$idUsuario','$date','$titulo','$contenido','$puntuacion','$filename','$provincia','$actividad')";
$resultado = $conexion->buscar_por_sql($insert);


header("Location:Perfil.php");


}



?>
