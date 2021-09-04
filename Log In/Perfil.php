<?php
require_once('session.php');
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
          <a href="#" class="navLinks">Ingresar</a>
          <a href="#" class="navLinks">Contacto</a>
          <a href="#" class="navLinks">Publicaciones</a>
          <a href="#" class="navLinks">Inicio</a>
          <h2  id="titulo">Travel Exp</h2>
        </nav>
      </header>
      <div class="row">
        <div class="col-md-10">
          <h3 class="text-white mt-3 ms-4"> <strong>Bienvenido Usuario </strong></h3>
          <form action="passChange.php" method="post">
            <div class="col-md-3">
              <div class="md-5 ms-4 mt-4">
                <label for="exampleFormControlInput1" class="form-label h4 mb-4 text-white">Cambiar contraseña</label>
              </div>
              <div class="row">
                <div class="col-md-10 ms-4">
                  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar nueva contraseña">
                </div>
                <div class="col-md-1">
                  <button type="submit" class="btn btn-primary text-dark ps-4 pe-4" id="botonForm">Enviar</button>
                </div>
    
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-2">
          <img src="img/profile.png" class="rounded  img-circle" alt="...">
          <p class=" text-white pr-2">Cambiar foto de perfil</p>
        </div>
      </div>
      <div class="container-fluid">
        <h2 class="p-2 pb-2 text-white">Publicaciones</h2>
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
          </div>
          <div class="row p-3 mt-4">
            <div class="col-md-6 ml-2">
              <form action="">
                <input type="submit" name="" value="Borrar cuenta" class="btn btn-primary text-dark" id="deleteCuenta">
              </form>
            </div>
            <div class="col-md-6">
              <form action="">
                <input type="submit" name="" value="+" class="btn  btn-circle btn-xl float-end " id="deleteCuenta">
              </form>
            </div>
          </div>
      </div>
      


      <footer id="footer">
        <a href="#" class="footLinks">Politíca de Privacidad</a>
        <a href="#" class="footLinks">Politíca de Cookies</a>
        <a href="#" class="footLinks">Politíca de Plataforma</a>
     </footer>
</body>
</html>