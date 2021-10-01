<?php
require_once('session.php');
require_once('database.php');
require_once('usuariosPublicaciones.php');

$usuario = $_GET["id"];

if(isset($_SESSION['user'])){
  $sql = 'SELECT `user_id`
  FROM `usuarios`
  WHERE `user_name` = "'.$_SESSION['user'].'"';

  $resultado = $conexion->buscar_por_sql($sql);
  $resultado = mysqli_fetch_array($resultado);

  if($resultado['user_id'] == $usuario){
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
        <nav>
          <a href="Perfil.php" class="navLinks">
            <?php 
                if(isset($_SESSION['user']) && $_SESSION['user'] == "admin"){
                  echo '<a href="perfilAdmin.php" class="navLinks">'.$_SESSION['user'].'</a>';
                }elseif(!isset($_SESSION['user'])){
                  echo '<a href="Login.php" class="navLinks">Ingresar</a>';
                }else{
                  echo '<a href="perfil.php" class="navLinks">'.$_SESSION['user'].'</a>';}
            ?>
          </a>
          <a href="../Contacto/Form.php" class="navLinks">Contacto</a>
          <a href="publicaciones.php" class="navLinks">Publicaciones</a>
          <a href="index.php" class="navLinks">Inicio</a>
          <h2  id="titulo">Travel Exp</h2>
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
      <footer id="footer">
        <a href="#" class="footLinks">Politíca de Privacidad</a>
        <a href="#" class="footLinks">Politíca de Cookies</a>
        <a href="#" class="footLinks">Politíca de Plataforma</a>
     </footer>
    
</body>
</html>