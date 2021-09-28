<?php
   require_once("session.php");
   require_once("database.php");

   $user = $_POST["user"];
   $publicacionID = $_POST["publicacionID"];
   $date = date("Y-m-d", time() - 3600*24);

   function recuperarID($u){
      global $conexion;
      $sql = "SELECT `user_id`
              FROM `usuarios`
              WHERE `user_name` = '$u'";
      $resultado = $conexion->buscar_por_sql($sql);
      $resultado = mysqli_fetch_array($resultado);
      return $resultado;
   }

   $userID = recuperarID($user);

   function insertarComentario($u,$c,$p,$d){
      global $conexion;
      $sql = "INSERT INTO comentarios(`user_id`, `publicacion_id`, `contenido`, `fecha`)
              VALUES ('$u', '$c', '$p', '$d')";
      $resultado = $conexion->buscar_por_sql($sql);
      return true;
   }
   $contenido = $_POST["comentario"];
   
   $nuevoCom = insertarComentario($userID["user_id"], $publicacionID, $contenido, $date);

   header("Location:publicaciones.php");

?>