<?php
require_once('session.php');
require_once('database.php');

//Última publicación
$sql = "SELECT `foto`,`titulo`,`contenido`,`actividad`,`nombre_provincia`,`calificacion`
        FROM `publicaciones`
        ORDER BY publicacion_id DESC
        LIMIT 1";
$res = $conexion->buscar_por_sql($sql);
$result=mysqli_fetch_array($res);

$sliders = [];
$slider = "SELECT `foto`,`titulo`,`contenido`,`noticia_id`
FROM `noticias`
ORDER BY noticia_id DESC
LIMIT 3";

$slider_sql = $conexion->buscar_por_sql($slider);
$numrows = mysqli_num_rows($slider_sql);
//$slider_resultado =mysqli_fetch_array($noticias);





while ($resultado=mysqli_fetch_array($slider_sql)){
    array_push($sliders, $resultado);
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
   <style>
     footer{
        background-color: #FFBA5C;
        position: fixed;
        bottom: 0;
        width: 100%;
        }
   </style>
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
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
        <?php

        foreach($sliders as $key => $slider){
          if($key == 0)
          {
            echo '<div class="carousel-item active">
              <a href="noticia.php?id='.$slider['noticia_id'].'"><img src="profile/'.$slider['foto'].'" class="d-block w-100" alt="..." height="600px"></a>
              <div class="carousel-caption d-none d-md-block">
                <h5>'.$slider['titulo'].'</h5>
                <p>'.$slider['contenido'].'</p>
              </div>
            </div>';
          }else{
            echo '<div class="carousel-item">
            <a href="noticia.php?id='.$slider['noticia_id'].'"><img src="profile/'.$slider['foto'].'" class="d-block w-100" alt="..." height="600px"></a>
            <div class="carousel-caption d-none d-md-block">
              <h5>'.$slider['titulo'].'</h5>
              <p>'.$slider['contenido'].'</p>
            </div>
          </div>';
          }
        }

        ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <div>
        <?php
                if($result == NULL){
                  echo '<div class="container pt-4">
                        <h2 class="p-2 pb-2 text-center text-white">Último Post</h2>
                        <div class="card p-3"  id="ultPost">
                          <div class="row g-0">
                            <div class="col-md-2">
                              <img src="profile/profile.png" class="img-fluid" alt="...">
                            </div>
                              <div class="col-md-8">
                                <div class="card-body">
                                  <h5 class="card-title">No hay post nuevos</h5>
                                  <p class="card-text">No hay calificaciones</p>
                                  <p class="card-text">Ninguna actividad</p>
                                  <p class="card-text">No hay provincia</p>                 
                                  <p class="card-text">Sin contenido</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>';
                }else{
                  
                  $estrellas = $result['calificacion'];

                  $estrellas_str = '';
                  for($i = 0; $i < $estrellas; $i++){
                    $estrellas_str .= "★";
                  }
                  echo '<div class="container pt-4">
                        <h2 class="p-2 pb-2 text-center text-white">Último Post</h2>
                        <div class="card p-3"  id="ultPost">
                          <div class="row g-0">
                            <div class="col-md-2">
                              <img src="profile/'.$result["foto"].'" class="img-fluid" alt="...">
                            </div>
                              <div class="col-md-8">
                                  <div class="card-body">
                                    <h5 class="card-title">'.$result["titulo"].'</h5>
                                    <p class="card-text">'.$estrellas_str.'</p>
                                    <p class="card-text">'.$result["actividad"].'</p>
                                    <p class="card-text">'.$result["nombre_provincia"].'</p>                 
                                    <p class="card-text">'.$result["contenido"].'</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>';
                }
        ?>
      <footer class="d-flex flex-wrap justify-content-evenly" style="background-color:#FFBA5C">
        <a href="#" class="footLinks">Politíca de Privacidad</a>
        <a href="#" class="footLinks">Politíca de Plataforma</a>
     </footer>
</body>
</html>