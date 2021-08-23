<?php
   require_once("database.php");
   
   class Select{
      public function buscarPorCorreo(){
         global $conexion;
         $user = trim($_POST["user"]);
         $password = sha1(trim($_POST["password"]));
         $sql = "SELECT `user_name`, `password`
                 FROM `usuarios`
                 WHERE `user_name` = '$user'
                 AND `password` = '$password'";
         $resultado = $conexion->buscar_por_sql($sql);
         $usuario = mysqli_fetch_array($resultado);
         if (!isset($usuario)){
            header("Location:registro.html");
         }else{
            header("Location:perfil.html");
         }
      }
      public function __tostring(){
         return $this->buscarPorCorreo();
      }
   }
      
?>
