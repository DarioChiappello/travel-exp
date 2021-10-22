<?php
require_once('session.php');
require_once('database.php');
require_once('usuariosPublicaciones.php');

$usuario = $_GET["id"];

if(isset($_SESSION['user']) && $_SESSION['user'] == "admin"){

  $sql = 'SELECT `admin_id`
  FROM `administradores`
  WHERE `nombre` = "'.$_SESSION['user'].'"';

  $resultado = $conexion->buscar_por_sql($sql);
  $resultado = mysqli_fetch_array($resultado);

  if($resultado['admin_id'] == $usuario ){
    header("Location:perfilAdmin.php");
  }
}else if(isset($_SESSION['user'])){
  $sql = 'SELECT `user_id`
  FROM `usuarios`
  WHERE `user_name` = "'.$_SESSION['user'].'"';

  $resultado = $conexion->buscar_por_sql($sql);
  $resultado = mysqli_fetch_array($resultado);

  if($resultado['user_id'] == $usuario ){
    header("Location:Perfil.php");
  }

  
}



$consulta = "SELECT `foto`,`user_name`
             FROM `usuarios`
             WHERE `user_id` = '$usuario'";
$resultado = $conexion->buscar_por_sql($consulta);
$resultado = mysqli_fetch_array($resultado);
$foto = $resultado["foto"];
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
      </header>
      <div class="row">
        <div >
          <h3 class="text-white text-center mt-3 ms-4"> <strong> <?php echo $resultado["user_name"]; ?> </strong></h3>
          <?php
            if ($foto) {
              echo "<img src='img/". $foto." 'class='rounded img-circle mx-auto d-block' width='120' height='120' >";
            }else{
              echo '<img src="img/profile.png" class="rounded img-circle mx-auto d-block" >';
            }
          ?>
          
        </div>
        
      </div>
      <div class="container-fluid">
        <h2 class="p-2 pb-2 text-white">Publicaciones</h2>
        <?php
            if(isset($publicaciones)){
              //var_dump($_SESSION['publicaciones']);
              foreach($publicaciones as $key)
              {
                //var_dump($key['titulo']);
                $estrellas = $key['calificacion'];
                $estrellas_str = '';
                for($i = 0; $i < $estrellas; $i++){
                  $estrellas_str .= "★";
                }
                echo '<div class="card p-3 col-md-8 mt-2 " style="background-color:#FFBA5C;"  id=" '.$key['publicacion_id'].'" >
                <div class="row g-0" >
                  <div class="col-md-6">
                    <img src="profile/'.$key['foto'].'" class="img-fluid" alt="...">
                  </div>
                  <div class="col-md-6">
                    <div class="card-body">
                      <h5 class="card-title">'.$key['titulo'].'</h5>
                      <p class="card-text">'.$estrellas_str.' </p>
                      <p class="card-text">'.$key['actividad'].' </p>
                      <p class="card-text">'.$key['contenido'].'</p>
                      <p class="card-text"><small class="text-muted">'.$key['fecha'].'</small></p>
                      <p class="card-text"><small class="text-muted">'.$key['nombre_provincia'].'</small></p>
                      

                      </div>
                    </div>
                  </div>
                </div>
              </div>';
              }
            }
            ?>
          </div>
          
      </div>
      <footer class="d-flex flex-wrap justify-content-evenly mt-3" style="background-color:#FFBA5C">
        <a href="privacidad.php" class="footLinks">Politíca de Privacidad</a>
        <a href="plataforma.php" class="footLinks">Normas de comunidad</a>
     </footer>
    
</body>
</html>