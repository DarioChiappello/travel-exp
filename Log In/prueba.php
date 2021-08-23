<?php
   require_once("classLogin.php");
   require_once("database.php");

   $prueba = new Select($_POST["user"], $_POST["password"]);
  
   echo $prueba;
?>
