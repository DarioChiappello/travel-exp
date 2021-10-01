<?php
require_once("session.php");
require_once("database.php");
require_once("perfilAjeno.php");

$user = $_GET['id'];



function publicacionesxId($id){
   
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


$publicaciones = publicacionesxId($user);


?>