<?php
require_once('session.php');
require_once('database.php');

//Publicaciones
$response = [];
$articulos = "SELECT publicaciones.`foto`, publicaciones.`titulo`, publicaciones.`contenido`, publicaciones.`actividad`, publicaciones.`nombre_provincia`, publicaciones.`calificacion`, publicaciones.`user_id`, publicaciones.`publicacion_id`, publicaciones.`fecha`, usuarios.`user_name`, usuarios.`foto`      AS            `foto_perfil`
              FROM `publicaciones`
              JOIN `usuarios` ON publicaciones.`user_id` = usuarios.`user_id`
              ORDER BY publicaciones.`fecha` DESC";
$articulos_exec =  $conexion->buscar_por_sql($articulos);
$numrows = mysqli_num_rows($articulos_exec);

while ($result=mysqli_fetch_array($articulos_exec)){
    array_push($response, $result);
}
      
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Travel Exp</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link href="styles.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#FFBA5C">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand fs-4 ms-4 me-5 fw-bold" href="index.php">Travel Exp</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav justify-content-between w-100">
                <li><a class="nav-link active fw-bold fs-4" aria-current="page" href="index.php">Inicio</a></li>
                <li><a class="nav-link active fw-bold fs-4" aria-current="page" href="publicaciones.php">Publicaciones</a></li>
                <a class="nav-link active fw-bold fs-4" aria-current="page" href="../Contacto/Form.php">Contacto</a>
                <?php 
                  if(isset($_SESSION['user']) && $_SESSION['user'] == "admin"){
                    echo '<li><a href="perfilAdmin.php" class="nav-link active fw-bold fs-4 me-4" aria-current="page">'.$_SESSION['user'].'</a></li>';
                  }elseif(!isset($_SESSION['user'])){
                    echo '<li><a href="Login.php" class="nav-link active fw-bold fs-4 me-4" aria-current="page">Ingresar</a></li>';
                  }else{
                    echo '<li><a href="perfil.php" class="nav-link active fw-bold fs-4 me-4" aria-current="page">'.$_SESSION['user'].'</a></li>';}
                ?>       
            </ul>
        </div>
      </nav>
      <div class="container-flex m-4" style="background-color:#FFBA5C;" id="publicacionContainer">
              <form class="p-2" method="post" action="publicaciones.php">
                <div class="row">
                  <div class="col">
                  <select class="form-select" name="provincia" >
                    <option selected value="">Elegir provincia</option>
                        <option value="Buenos Aires">Buenos Aires</option>
                        <option value="Catamarca">Catamarca</option>
                        <option value="Chaco">Chaco</option>
                        <option value="Chubut">Chubut</option>
                        <option value="Córdoba">Córdoba</option>
                        <option value="Corrientes">Corrientes</option>
                        <option value="Entre">Entre Rios</option>
                        <option value="Formosa">Formosa</option>
                        <option value="Jujuy">Jujuy</option>
                        <option value="La Pampa">La Pampa</option>
                        <option value="La Rioja">La Rioja</option>
                        <option value="Mendoza">Mendoza</option>
                        <option value="Misiones">Misiones</option>
                        <option value="Neuquén">Neuquén</option>
                        <option value="Rio Negro">Rio Negro</option>
                        <option value="Salta">Salta</option>
                        <option value="San Juan">San Juan</option>
                        <option value="San Luis">San Luis</option>
                        <option value="Santa Cruz">Santa Cruz</option>
                        <option value="Santa Fe">Santa Fe</option>
                        <option value="Santiago del Estero">Santiago del Estero</option>
                        <option value="Tierra del Fuego">Tierra del Fuego</option>
                        <option value="Tucumán">Tucumán</option>
                    </select>

                  </div>
                  <div class="col">
                    <select class="form-select" name="actividad" id="">
                      <option selected value="">Elegir actividad</option>
                      <option value="Deporte">Deporte</option>
                      <option value="Turismo">Turismo</option>
                    </select>
                  </div>
                  <div class="col">
                    <select class="form-select" name="calificacion" aria-label="Default select example" >
                      <option selected value="">Elegir calificación</option>
                      <option value="1">★</option>
                      <option value="2">★★</option>
                      <option value="3">★★★</option>
                      <option value="4">★★★★</option>
                      <option value="5">★★★★★</option>
                    </select>
                  </div>
                  <div class="col-md-1">
                    <input type="submit" class="btn btn-primary" value="Filtrar">
                  </div>
                </div>
                
              </form>
      </div>
      <?php
        //Filtrado
        if(!empty($_POST['provincia']) || !empty($_POST['actividad']) || !empty($_POST['calificacion'])){
          $response = [];
          $articulos = "SELECT publicaciones.`foto`, publicaciones.`titulo`, publicaciones.`contenido`, publicaciones.`actividad`, publicaciones.`nombre_provincia`, publicaciones.`calificacion`, publicaciones.`user_id`, publicaciones.`publicacion_id`, publicaciones.`fecha`, usuarios.`user_name`, usuarios.`foto`      AS            `foto_perfil`
                        FROM `publicaciones`
                        JOIN `usuarios` ON publicaciones.`user_id` = usuarios.`user_id` WHERE";

          $filtros=array("nombre_provincia" => $_POST["provincia"], "actividad" =>  $_POST["actividad"], "calificacion" =>  $_POST["calificacion"]);

          foreach($filtros as $key => $value){
            if($value == ""){
              unset($filtros[$key]);
            }
          }

          $contador = 0;
          foreach ($filtros as $key => $value) {
          $contador++;
            if ($value != ""){
              if ($contador == count($filtros)) {
                $articulos .= " `$key` LIKE ('%$value%')";
              }else{
                $articulos .= " `$key` LIKE ('%$value%') AND ";
              }     
            }
          }
          $articulos .= " ORDER BY publicaciones.`fecha` DESC";
          $articulos_exec =  $conexion->buscar_por_sql($articulos);
          $numrows = mysqli_num_rows($articulos_exec);

          while ($result=mysqli_fetch_array($articulos_exec)){
          array_push($response, $result);
        }
        }
        
          if(isset($_SESSION["reporte"])){
            echo '<div class="container-flex m-4" id="ultPost">
                      <div class="text-center text-danger">
                        <h2>El reporte se produjo con éxito</h2>
                      </div>
                  </div>';               
          }

          if(count($response) == 0){
            echo '<div class="container-flex m-4" id="ultPost">
                    <div class="text-center">
                    <h2>No hay publicaciones para mostrar</h2>
                    <p>
                      No hay publicaciones creadas hasta el momento.
                    </p>
                  </div>
                </div>';
          }
          

          foreach($response as $articulo){
            $estrellas = $articulo['calificacion'];
            $estrellas_str = '';
            for($i = 0; $i < $estrellas; $i++){
              $estrellas_str .= "★";
            }
            

            //Comentarios
            $comentariostotal = [];
            $comentarios = 'SELECT comentarios.`contenido`, usuarios.`user_name`,usuarios.`user_id`, usuarios.`foto`  FROM `comentarios` 
              INNER JOIN `usuarios` ON usuarios.`user_id` = comentarios.`user_id`
             WHERE comentarios.`publicacion_id` = '.$articulo['publicacion_id'];
              $comentarios_exec =  $conexion->buscar_por_sql($comentarios);
              $numrowscomments = mysqli_num_rows($comentarios_exec);
              
              while ($result=mysqli_fetch_array($comentarios_exec)){
                  array_push($comentariostotal, $result);
              }

            
            echo '<div class="container text-dark mt-4" style="background-color:#FFBA5C;" id="publicacionContainer">
              <div class="row mb-3">
                <div class="col-md-2 p-4" >
                  
                  <img src="profile/'.$articulo['foto'].'" width="100%"  alt="">
                  
                </div>
                <div class="col-md-2 text-dark p-4" >
                  <h2>'.$articulo['titulo'].'</h2>
      
                  <h6>'.$estrellas_str.'</h6>
                  <h6>'.$articulo['actividad'].'</h6>
                  <h6>'.$articulo['nombre_provincia'].'</h6>
                  <h6>'.$articulo['fecha'].'</h6>
                </div>
                ';
                if (isset($_SESSION["user"]) && $_SESSION["user"] != $articulo["user_name"]) {
                  echo ' 
                  <div class="col-md-2 p-4">
                    <form action="reportarUsuario.php" method="post">
                      <input type="hidden" name="user"value="'. $articulo['user_id'] .'">
                      <input class="btn btn-danger" type="submit" value="Reportar Usuario"> 
                    </form>
                  </div>
                  <div class="col-md-3 p-4">
                    <form action="reportarPublicacion.php" method="post">
                    <input type="hidden" name="publicacionID" value="'. $articulo['publicacion_id'] .'">
                      <input class="btn btn-danger" type="submit" value="Reportar Publicación">
                    </form>
                  </div>';
                }else{
                  echo ' 
                  <div class="col-md-2 p-4">
                    <form action="reportarUsuario.php" method="post">
                      <input type="hidden" name="user"value="'. $articulo['user_id'] .'">
                      <input class="btn btn-danger" type="hidden" value="Reportar Usuario"> 
                    </form>
                  </div>
                  <div class="col-md-3 p-4">
                    <form action="reportarPublicacion.php" method="post">
                    <input type="hidden" name="publicacionID" value="'. $articulo['publicacion_id'] .'">
                      <input class="btn btn-danger" type="hidden" value="Reportar Publicación">
                    </form>
                  </div>';
                }
               echo '
                  <div class="col-md-3 p-4 ">
                    <img src="img/'.$articulo['foto_perfil'].'" class="rounded" width="80%" heigth="80%"  img-circle" alt="...">
                    <p><a class="text-decoration-none text-dark" href="perfilAjeno.php?id='.$articulo['user_id'].'">'.
                    $articulo['user_name']
                  .'</a></p>
                  </div>
              </div>
              <div  class="container text-dark p-4">
              '.$articulo['contenido'].'
              </div>
              <hr>';

              foreach($comentariostotal as $comentario){
                if($comentario['foto'] == ''){
                  $comentario['foto'] = 'profile.png';
                }

                echo '<div class="container row" >
                <div class="col-md-1">
                  <img src="img/'.$comentario['foto'].'" class="rounded  img-circle" height="50px" alt="...">
                  <p><a class="text-decoration-none text-dark" href="perfilAjeno.php?id='.$comentario['user_id'].'">'.
                    $comentario['user_name']
                  .'</a></p>
                </div>
                <div class="col-md-10">
                  <p>'.
                    $comentario['contenido']
                  .'</p>
                </div>
              </div>
              ';
              }

              if(isset($_SESSION['user'])){
               echo '
               <form action="publicarComentario.php" method="post">
                 <div class="row">
                   <div class="col-md-10">
                     <input type="text" class="form-control mb-2" placeholder="Comentar publicacion" name="comentario" required>
                   </div>
                   <div class="col-md-2">
                     <input type="hidden" name="publicacionID" value="'. $articulo['publicacion_id'] .'">
                     <input type="hidden" name="user" value="'. $_SESSION['user'] .'">
                     <input type="submit" class="btn btn-primary" value="Enviar"></input>
                   </div>
                   </div>      
                 </div>
               </form>';
              }else{
                echo '</div>';
              }
            
          }
    ?>
         <?php
            if(isset($_SESSION['reporte'])){
              echo "<script> 
                      function myFunction(){
                        setTimeout(function(){ location.reload(); }, 3000);
                      }
                      myFunction();
                    </script>";
              unset($_SESSION['reporte']);
            }
      ?>
      
      <footer class="d-flex flex-wrap justify-content-evenly mt-3" style="background-color:#FFBA5C">
        <a href="privacidad.php" class="footLinks">Politíca de Privacidad</a>
        <a href="plataforma.php" class="footLinks">Normas de comunidad</a>
     </footer>
</body>
</html>