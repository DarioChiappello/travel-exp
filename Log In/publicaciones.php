<?php
require_once('session.php');
require_once('database.php');

//Publicaciones
$response = [];
$articulos = "SELECT `foto`,`titulo`,`contenido`,`actividad`,`nombre_provincia`,`calificacion`
              FROM `publicaciones`";
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
      <header id="header">
      <nav>
          <a href="Perfil.php" class="navLinks"><?php if(isset($_SESSION['user'])){
            echo $_SESSION['user'];
          }else{
            echo '<a href="Login.php" class="navLinks">Ingresar</a>';
          }  ?>
          </a>
          <a href="../Contacto/Form.php" class="navLinks">Contacto</a>
          <a href="publicaciones.php" class="navLinks">Publicaciones</a>
          <a href="index.php" class="navLinks">Inicio</a>
          <h2  id="titulo">Travel Exp</h2>
        </nav>
      </header>
      <?php

          foreach($response as $articulo){
            $estrellas = $articulo['calificacion'];
            $estrellas_str = '';
            for($i = 0; $i < $estrellas; $i++){
              $estrellas_str .= "★";
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
                </div>
                <div class="col-md-2 p-4">
                  <h6>Reportar usuario</h6>
                </div>
                <div class="col-md-3 p-4">
                  <h6>Reportar publicacion</h6>
                </div>
                <div class="col-md-3 p-4 ">
                  <img src="img/profile.png" class="rounded  img-circle" alt="...">
                </div>
              </div>
              <div  class="container text-dark p-4">
              '.$articulo['contenido'].'
              </div>
              <hr>
              <div class="container row" >
                <div class="col-md-1">
                  <img src="img/profile.png" class="rounded  img-circle" height="50%" alt="...">
                </div>
                <div class="col-md-10">
                  <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-10">
                  <input type="text" class="form-control mb-2" value="Comentar publicacion" name="" id="">
                </div>
                <div class="col-md-2">
                  <button class="btn btn-primary">Enviar</button>
                </div>
              </div>     
            
            </div>';
          }



    ?>
      
      
      <footer id="footer">
        <a href="#" class="footLinks">Politíca de Privacidad</a>
        <a href="#" class="footLinks">Politíca de Cookies</a>
        <a href="#" class="footLinks">Politíca de Plataforma</a>
     </footer>
</body>
</html>