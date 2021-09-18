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
</head>
<body>
      <header id="header">
      <nav>
      <?php 
            if(isset($_SESSION['user']) && $_SESSION['user'] == "admin"){
              echo '<a href="../Log In/perfilAdmin.php" class="navLinks">'.$_SESSION['user'].'</a>';
            }elseif(!isset($_SESSION['user'])){
              echo '<a href="../Log In/Login.php" class="navLinks">Ingresar</a>';
            }else{
              echo '<a href="../Log In/perfil.php" class="navLinks">'.$_SESSION['user'].'</a>';}
          ?>         
          <a href="../Contacto/Form.php" class="navLinks">Contacto</a>
          <a href="../Log In/publicaciones.php" class="navLinks">Publicaciones</a>
          <a href="../Log In/index.php" class="navLinks">Inicio</a>
          <h2  id="titulo">Travel Exp</h2>
        </nav>  
      </header>
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
      <footer id="footer">
        <a href="#" class="footLinks">Politíca de Privacidad</a>
        <a href="#" class="footLinks">Politíca de Cookies</a>
        <a href="#" class="footLinks">Politíca de Plataforma</a>
     </footer>
</body>
</html>