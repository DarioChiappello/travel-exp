<?php
   require_once("classLogin.php");
   require_once("database.php");
   require_once('session.php');

   $prueba = new Select($_POST["user"], $_POST["password"]);
   $_SESSION['user'] = $_POST["user"];
   $_SESSION['password'] = $_POST["password"];
   echo $prueba;
?>
