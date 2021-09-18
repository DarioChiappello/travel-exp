<?php
require_once("session.php");
require_once("database.php");

$user = $_SESSION['user'];

function recuperarId($u){
    global $conexion;
    $sql = "SELECT `admin_id`
            FROM `administradores`
            WHERE `nombre` = '$u'";

    $resultado = $conexion->buscar_por_sql($sql);
    $resultado = mysqli_fetch_array($resultado);
    return $resultado["admin_id"];
}

function publicacionesxId($id){
    if(!isset($id)){
        return header("Location:perfilAdmin.php");
    }else{
        global $conexion;
        $sql = "SELECT `titulo`, `foto`, `contenido`, `noticia_id`
                FROM `noticias`
                WHERE `admin_id` = $id ORDER BY `noticia_id` DESC";
    
        $response = [];
        $res = $conexion->buscar_por_sql($sql);
        $numrows = mysqli_num_rows($res);
        while ($result=mysqli_fetch_array($res)){
            array_push($response, $result);
        }
        return $response;
    }
}
$user_id = recuperarId($user);
$publicaciones = publicacionesxId($user_id);
if($publicaciones != NULL){
    $_SESSION['publicaciones'] = $publicaciones;
}else{}

?>