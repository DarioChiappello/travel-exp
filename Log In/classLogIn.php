<?php
   require_once("database.php");
   
   class Select{
      //Función general para buscar en las 3 tablas principales
      public function logIn(){
         if($this->buscarPorCorreo() == true){
            header("Location:perfil.php");
         }elseif($this->buscarAdmin() == true){
            header("Location:perfilAdmin.php");
         }elseif($this->buscarBloqueado() == true){
            header("Location:index.php");
         }else{
            header("Location:registro.php");
         }
      }

      //Encontrar si el usuario está registrado en la BD
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
         if (isset($usuario)){
            return true;
         }
      }
      //Encontrar si el usuario es administrador
      public function buscarAdmin(){
         global $conexion;
         $user = trim($_POST["user"]);
         $password = sha1(trim($_POST["password"]));
         $sql = "SELECT `nombre`, `password`
                 FROM `administradores`
                 WHERE `nombre` = '$user'
                 AND `password` = '$password'";
         $resultado = $conexion->buscar_por_sql($sql);
         $usuario = mysqli_fetch_array($resultado);
         if (isset($usuario)){
            return true;
         }
      }
      
      //Encontrar si el nombre de usuario está bloqueado
      public function buscarBloqueado(){
         global $conexion;
         $user = trim($_POST["user"]);
         $sql = "SELECT `user_name`
                 FROM `bloqueados`
                 WHERE `user_name` = '$user'";
         $resultado = $conexion->buscar_por_sql($sql);
         $usuario = mysqli_fetch_array($resultado);
         if (isset($usuario)){
            return true;
         }
      }

      public function __tostring(){
         return $this->logIn();
      }
   }
      
?>
