<?php
   require_once("database.php");
   
   class Insert{
      public function comprobarPassword($pass,$pass1){
         if (empty(trim($pass)) || empty(trim($pass1))) {
            die(header("Location:index.php"));
         }else{
            if ($pass === $pass1) {
               $password = sha1($pass);
               return $password;
            }else{
               die(header("Location:index.php"));
            }
         }
      }

      public function confirmarUsuario(){
         $user = $_POST["user"];
         if (empty($user)) {
            die(header("Location:index.php"));
         }else{
            return $user;
         } 
      }

      public function insertarUsuario(){
         global $conexion;
         $user = $this->confirmarUsuario();
         $password = $this->comprobarPassword($_POST["password"],$_POST["password1"]);
         $sql = "SELECT `user_name` 
                 FROM `usuarios`
                 WHERE `user_name` = '$user'";
         $resultado = $conexion->buscar_por_sql($sql);
         $usuario = mysqli_fetch_array($resultado);
         if (isset($usuario)){
            die(header("Location:index.php"));
         }else{
            $foto = "profile.png";
            $insert ="INSERT INTO usuarios(`user_name`, `password`, `foto`) 
                      VALUES('$user', '$password', '$foto');";
            $resultado = $conexion->buscar_por_sql($insert);
            header("Location:Perfil.php");
         }
      } 
   }
 
?>
