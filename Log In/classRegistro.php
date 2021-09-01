<?php
   require_once("database.php");
   
   class Insert{
      public function comprobarPassword($pass,$pass1){
         if ($pass == "" || $pass1 == "") {
           header("Location:index.html");
         }else{
            $pass = trim($pass);
            $pass1 = trim($pass1);
            if ($pass === $pass1) {
               $password = sha1($pass);
               return $password;
            }else{
               die("Las contraseñas ingresadas no coinciden.");
            }
         }
      }

      public function confirmarUsuario(){
         $user = $_POST["user"];
         if ($user == "") {
            return header("Location:index.html");
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
            die("El usuario ingresado ya existe.");
         }else{
            $insert ="INSERT INTO usuarios(`user_name`, `password`) 
                      VALUES('$user', '$password')";
            $resultado = $conexion->buscar_por_sql($insert);
            header("Location:Perfil.html");
         }
      } 
   }
 
?>
