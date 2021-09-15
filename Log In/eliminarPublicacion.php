<?php
require_once("database.php");
require_once("session.php");

$id_publicacion = $_POST['publicacion'];
eliminarPublicacion($id_publicacion);

function eliminarPublicacion($id){

    global $conexion;
    
    $sql = "DELETE
            FROM `publicaciones`
            WHERE `publicacion_id` = '$id'";
    $resultado = $conexion->buscar_por_sql($sql);
    
    return header("Location:Perfil.php");
    
}