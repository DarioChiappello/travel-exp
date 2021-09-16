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
    if(!isset($id)){
        return header("Location:Perfil.php");
    }else{
        global $conexion;
        $sql = "SELECT `titulo`, `calificacion`, `foto`, `contenido`, `fecha`, `actividad`, `publicacion_id`, `nombre_provincia`
                FROM `publicaciones`
                WHERE `user_id` = $id ORDER BY `publicacion_id` DESC";
    
        $response = [];
        $res = $conexion->buscar_por_sql($sql);
        $numrows = mysqli_num_rows($res);
        while ($result=mysqli_fetch_array($res)){
    
            //echo $result['titulo']."<br/>";
            array_push($response, $result);
        }
        return $response;
    }



    //return $resultado;
    
}

$user_id = recuperarId($user);
$publicaciones = publicacionesxId($user_id);
$_SESSION['publicaciones'] = $publicaciones;

/*var_dump(publicacionesxId(2));
die();*/

?>