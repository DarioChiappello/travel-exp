<?php
require_once('session.php');
require_once("database.php");

$usuario = $_SESSION["user"];
$passwordActual = sha1(trim($_SESSION['password']));
$new_password = sha1(trim($_POST['newpassword']));

$validate = validarPassword($usuario,$passwordActual, $new_password);


if($validate == false){
    $_SESSION['error_password'] = "La contraseña ingresada no es valida";
    header("Location:Perfil.php");
}else{
    session_destroy();
    header("Location:LogIn.php");
}

function validarPassword($user, $password, $new_password){
    global $conexion;
    $sql = "SELECT `password`
            FROM `usuarios`
            WHERE `user_name` = '$user'
            AND `password` = '$password'";
    $resultado = $conexion->buscar_por_sql($sql);
    $contrasena = mysqli_fetch_array($resultado);
    if($contrasena['password'] == $new_password){
        return false;
    }else{
        $update = "UPDATE `usuarios`
                   SET `password` = '$new_password'
                   WHERE `user_name` = '$user'";
        $resultado = $conexion->buscar_por_sql($update);
        return true;
    }
    

    
}


?>