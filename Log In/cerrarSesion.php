<?php
require_once("session.php");

session_unset($_SESSION["user"]);
session_unset($_SESSION["password"]);

session_destroy();

header("Location:LogIn.php");


?>