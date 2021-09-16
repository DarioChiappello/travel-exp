<?php
   require_once("classRegistro.php");
   require_once("database.php");
   require_once("session.php");

   $prueba = new Insert($_POST["user"], $_POST["password"], $_POST["password1"]);

   echo $prueba->insertarUsuario();

   $_SESSION["user"] = $_POST["user"];
  
?>
