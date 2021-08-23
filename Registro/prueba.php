<?php
   require_once("classRegistro.php");
   require_once("database.php");

   $prueba = new Insert($_POST["user"], $_POST["password"], $_POST["password1"]);

   echo $prueba->insertarUsuario();
  
?>
