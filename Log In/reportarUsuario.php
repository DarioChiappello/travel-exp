<?php
   require_once("database.php");
   require_once("session.php");

   $user = $_POST["user"];

   $sql="UPDATE `usuarios`
         SET `contador_reporte` = `contador_reporte` + 1
         WHERE `user_id` = $user";

   $actualizarContador =  $conexion->buscar_por_sql($sql);
   
   $_SESSION["reporte"] = True;

   header("Location:publicaciones.php");

?>