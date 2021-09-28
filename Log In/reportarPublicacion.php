<?php
   require_once("database.php");
   require_once("session.php");

   $publicacionID = $_POST["publicacionID"];

   $sql="UPDATE `publicaciones`
         SET `contador_reporte` = `contador_reporte` + 1
         WHERE `publicacion_id` = $publicacionID";

   $actualizarContador =  $conexion->buscar_por_sql($sql);
   
   $_SESSION["reporte"] = True;

   header("Location:publicaciones.php");

?>