<?php
require_once('session.php');
require_once('database.php');
require_once('userPublicaciones.php');

$usuario = $_SESSION["user"];
$consulta = "SELECT `foto`
             FROM `usuarios`
             WHERE `user_name` = '$usuario'";
$resultado = $conexion->buscar_por_sql($consulta);
$resultado = mysqli_fetch_array($resultado);
$_SESSION["imagen"] = $resultado["foto"];
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
                  if(isset($_SESSION['user'])){
                    echo '<li><a href="perfil.php" class="nav-link active fw-bold fs-4 me-4" aria-current="page">'.$_SESSION['user'].'</a></li>';
                  }
                ?>       
            </ul>
        </div>
      </nav>
      <div class="row">
        <div class="col-md-10">
          <h3 class="text-white mt-3 ms-4"> <strong>Bienvenido <?php echo $_SESSION["user"]; ?> </strong></h3>
          <?php
            if(isset($_SESSION['error_password'])){
              //echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error_password'].'</div>';
              echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>'.$_SESSION['error_password'].'</div></div>';
            }
          ?>
          <form action="passChange.php" method="post">
            <div class="col-md-3">
              <div class="md-5 ms-4 mt-4">
                <label for="exampleFormControlInput1" class="form-label h4 mb-4 text-white">Cambiar contraseña</label>
              </div>
              <div class="row">
                <div class="col-md-10 ms-4">
                  <input type="text" name="newpassword" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar nueva contraseña">
                </div>
                <div class="col-md-1">
                  <button type="submit" class="btn btn-primary text-dark ps-4 pe-4" id="botonForm">Enviar</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-2">
          <form action="cambiarImage.php" method="post" enctype="multipart/form-data">
          <?php
            if (isset($_SESSION["imagen"]) && $_SESSION["imagen"] != "") {
              echo "<img src='img/". $_SESSION['imagen']." 'class='rounded img-circle' width='120' height='120'>";
            }else{
              echo '<img src="img/profile.png" class="rounded img-circle">';
            }
          ?>
            <input type="file" name="uploadfile">
            <button type="submit" class="btn btn-warning mb-3 mt-2" name="upload">Cambiar foto de perfil</button>
          </form>
          <form action="cerrarSesion.php" method="post">
            <button class="btn btn-warning">Cerrar Sesión</button>
          </form>
        </div>
      </div>
      <div class="container-fluid">
        <h2 class="p-2 pb-2 text-white">Publicaciones</h2>
        <?php
            if(isset($_SESSION['publicaciones'])){
              //var_dump($_SESSION['publicaciones']);
              foreach($_SESSION['publicaciones'] as $key)
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
                      <div class="row">
                        <div class="col-md-2">
                          <form action="editarPublicacion.php" method="POST" >
                            <input type="hidden" name="publicacion" value="'.$key['publicacion_id'].'">
                            <button class="btn btn-primary">Editar</button>
                          </form>
                        </div>
                      <div class="col-md-2">
                        <form action="eliminarPublicacion.php" method="POST" >
                          <input type="hidden" name="publicacion" value="'.$key['publicacion_id'].'">
                          <button class="btn btn-danger">Eliminar</button>
                        </form>
                      </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>';
              }
            }
            ?>
          </div>
          <div class="row p-3 mt-4">
            <div class="col-md-6 ml-2">
              <form action="deleteAccount.php" method="post">
                <input type="submit" name="" value="Borrar cuenta" class="btn btn-primary text-dark" id="deleteCuenta">
              </form>
            </div>
            <div class="col-md-6">
              <a href="crearEntrada.php" >
                <input type="submit" name="" value="+" class="btn  btn-circle btn-xl float-end " id="deleteCuenta">
              </a>
            </div>
          </div>
      </div>
      <footer class="d-flex flex-wrap justify-content-evenly" style="background-color:#FFBA5C">
        <a href="privacidad.php" class="footLinks">Politíca de Privacidad</a>
        <a href="plataforma.php" class="footLinks">Normas de comunidad</a>
     </footer>
     <?php
            if(isset($_SESSION['error_password'])){
              echo "<script> 
                      function myFunction(){
                        setTimeout(function(){ location.reload(); }, 3000);
                      }
                      myFunction();
                    </script>";
              unset($_SESSION['error_password']);
            }
      ?>
</body>
</html>