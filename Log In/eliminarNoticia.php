<?php
require_once("database.php");
require_once("session.php");

$id_noticia = $_POST['noticia'];


function eliminarPublicacion($id){
    global $conexion;
    
    $sql = "DELETE
            FROM `noticias`
            WHERE `noticia_id` = '$id'";
    $resultado = $conexion->buscar_por_sql($sql);

    unset($_SESSION['publicaciones']);
    
    return header("Location:perfilAdmin.php") ;
    
    
}

eliminarPublicacion($id_noticia);