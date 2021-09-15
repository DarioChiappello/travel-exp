<?php
require_once('session.php');
require_once('database.php');
require_once('userPublicaciones.php');
if (isset($_SESSION['user'])){
  $usuario = $_SESSION['user'];
}else{
  header('Location:LogIn.php');
}
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
      <header id="header">
        <nav>
          <a href="#" class="navLinks"><?php if(isset($_SESSION['user'])){
            echo $_SESSION['user'];
          }else{
            echo "Perfil";
          }  ?>
          </a>
          <a href="#" class="navLinks">Contacto</a>
          <a href="#" class="navLinks">Publicaciones</a>
          <a href="#" class="navLinks">Inicio</a>
          <h2  id="titulo">Travel Exp</h2>
        </nav>
      </header>
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
                echo '<div class="card p-3 col-md-8 mt-2"  id='.$key['publicacion_id'].' >
                <div class="row g-0">
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
                      <form action="editarPublicacion.php" method="POST" >
                      <button class="btn btn-primary">Editar</button>
                      </form>
                      <form action="eliminarPublicacion.php" method="POST" >
                      <button class="btn btn-danger">Eliminar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>';
              }
            }
           

            /*
            <div class="card p-3 col-md-8"  id="ultPost" >
              <div class="row g-0">
                <div class="col-md-2">
                  <img src="https://ichef.bbci.co.uk/news/800/cpsprodpb/D939/production/_103590655_valija-turismo.png" class="img-fluid" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
            */
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
      <footer id="footer">
        <a href="#" class="footLinks">Politíca de Privacidad</a>
        <a href="#" class="footLinks">Politíca de Cookies</a>
        <a href="#" class="footLinks">Politíca de Plataforma</a>
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