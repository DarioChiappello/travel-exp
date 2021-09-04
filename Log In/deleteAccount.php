<?php
require_once('session.php');
require_once("database.php");

$usuario = $_SESSION["user"];

$delete = deleteAccount($usuario);

if($delete == false){
    header("Location:Perfil.php");
}else{
    session_destroy();
    header("Location:index.php");
}

function deleteAccount($user){
    global $conexion;
    $sql = "SELECT `user_name`
            FROM `usuarios`
            WHERE `user_name` = '$user'";
    $resultado = $conexion->buscar_por_sql($sql);
    $cuenta = mysqli_fetch_array($resultado);
    
    if(!isset($cuenta)){
        return false;
    }else{
        $delete = "DELETE FROM `usuarios`
                   WHERE `user_name` = '$user'";
        $resultado = $conexion->buscar_por_sql($delete);
        return true;
    }
    
}

?>