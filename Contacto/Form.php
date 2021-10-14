<?php
require_once('../Log In/session.php');
require_once('../Log In/database.php');
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
                <li><a class="nav-link active fw-bold fs-4" aria-current="page" href="../Log In/index.php">Inicio</a></li>
                <li><a class="nav-link active fw-bold fs-4" aria-current="page" href="../Log In/publicaciones.php">Publicaciones</a></li>
                <a class="nav-link active fw-bold fs-4" aria-current="page" href="../Contacto/Form.php">Contacto</a>
                <?php 
                  if(isset($_SESSION['user']) && $_SESSION['user'] == "admin"){
                    echo '<li><a href="../Log In/perfilAdmin.php" class="nav-link active fw-bold fs-4 me-4" aria-current="page">'.$_SESSION['user'].'</a></li>';
                  }elseif(!isset($_SESSION['user'])){
                    echo '<li><a href="../Log In/Login.php" class="nav-link active fw-bold fs-4 me-4" aria-current="page">Ingresar</a></li>';
                  }else{
                    echo '<li><a href="../Log In/perfil.php" class="nav-link active fw-bold fs-4 me-4" aria-current="page">'.$_SESSION['user'].'</a></li>';}
                ?>       
            </ul>
        </div>
      </nav>
      <h2 class="text-white ms-4 mt-3" id="tituloForm">Comunicate con nosotros</h2>
      <form action="mail.php" method="POST">
        <div class="col-md-5 ms-4 mt-4">
          <div class="mb-3">
            <div class="row">
              <div class="col-3">
                <label for="exampleFormControlInput1" class="form-label text-white h2">Nombre</label>
              </div>
              <div class="col-6">
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese su nombre" name="Nombre">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <label for="exampleFormControlInput1" class="form-label text-white h2">Correo</label>
            </div>
            <div class="col-6">
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese su correo" name="Correo">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-3">
              <label for="exampleFormControlInput1" class="form-label text-white h2">Consulta</label>
            </div>
            <div class="col-6">
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Consulta"></textarea>
            </div>
          </div>
          <input type="submit" class="btn btn-primary mt-5 ps-5 pe-5 text-dark" id="botonForm" value="Enviar"></input>
        </div>
      </form>
      <footer class="d-flex flex-wrap justify-content-evenly" style="background-color:#FFBA5C">
        <a href="#" class="footLinks">Politíca de Privacidad</a>
        <a href="#" class="footLinks">Politíca de Plataforma</a>
     </footer>
</body>
</html>