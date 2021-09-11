<?php

require_once("session.php");
require_once("database.php");

$user = $_SESSION['user'];
function recuperarId($u){
    global $conexion;
    $sql = "SELECT `user_id`
    FROM `usuarios`
    WHERE `user_name` = '$u'";

    $resultado = $conexion->buscar_por_sql($sql);
    $resultado = mysqli_fetch_array($resultado);
    return $resultado["user_id"];
}

function publicacionesxId($id){
    global $conexion;
    $sql = "SELECT `titulo`,`calificacion`,`foto`,`contenido`
    FROM `publicaciones`
    WHERE `user_id` = $id";

    $resultado = $conexion->buscar_por_sql($sql);
    $resultado = mysqli_fetch_array($resultado);
    return $resultado;
}

recuperarId($user);


var_dump(publicacionesxId(2));
die();






?>