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
                <li><a class="nav-link active fw-bold fs-4 me-4" aria-current="page" href="LogIn.php">Ingresar</a></li>
            </ul>
        </div>
    </nav>
      <h2 id="logInTitulo">Registrarse</h2>
      <?php
            if(isset($_SESSION['error_new_user'])){
              //echo '<div class="alert alert-danger" role="alert">'.$_SESSION['error_password'].'</div>';
              echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>'.$_SESSION['error_new_user'].'</div></div>';
                
            }
            
            
          ?>
      <form class="mb-3" action="prueba1.php" method="POST">
        <div id="formRegistro">
          <h2 class="logInTitulos pt-4">Ingresar Usuario</h2>
          <div class="input-group input-group-lg p-4">
            <input type="text" class="form-control"  placeholder="Ingresar nombre de usuario" aria-label="Usuario" aria-describedby="inputGroup-sizing-lg" name="user" required>
          </div>
          <h2 class="logInTitulos">Ingresar Contraseña</h2>
          <div class="input-group input-group-lg p-4">
            <input type="password" class="form-control"  placeholder="Ingresar contraseña" aria-label="Contraseña" aria-describedby="inputGroup-sizing-lg" name="password" required>
          </div>
          <h2 class="logInTitulos">Confirmar Contraseña</h2>
          <div class="input-group input-group-lg p-4">
            <input type="password" class="form-control"  placeholder="Confirmar contraseña" aria-label="Contraseña" aria-describedby="inputGroup-sizing-lg" name="password1" required>
          </div>
          <div class="row justify-content-md-center">
            <div class="col-md-4 pt-4"> 
              <input type="submit" class="btn btn-primary ps-5 pe-5" value="Registrarse"></input>
            </div>
          </div>
        </div>
      </form>
      <footer class="d-flex flex-wrap justify-content-evenly" style="background-color:#FFBA5C">
        <a href="#" class="footLinks">Politíca de Privacidad</a>
        <a href="#" class="footLinks">Politíca de Plataforma</a>
     </footer>
     <?php
            if(isset($_SESSION['error_new_user'])){
              echo "<script> 
                      function myFunction(){
                        setTimeout(function(){ location.reload(); }, 3000);
                      }
                      myFunction();
                    </script>";
              unset($_SESSION['error_new_user']);
            }
      ?>
</body>
</html>