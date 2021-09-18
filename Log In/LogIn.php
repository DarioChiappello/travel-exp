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
        <a href="LogIn.php" class="navLinks">Ingresar</a>
          <a href="../Contacto/Form.php" class="navLinks">Contacto</a>
          <a href="publicaciones.php" class="navLinks">Publicaciones</a>
          <a href="index.php" class="navLinks">Inicio</a>
          <h2  id="titulo">Travel Exp</h2>
        </nav>
      </header>
      <h2 id="logInTitulo">Iniciar Sesión</h2>
      <form action="prueba.php" method="POST">
        <div id="formLogin">
          <h2 class="logInTitulos pt-4">Ingresar Usuario</h2>
          <div class="input-group input-group-lg p-4">
            <input type="text" class="form-control"  placeholder="Ingresar nombre de usuario" aria-label="Usuario" aria-describedby="inputGroup-sizing-lg" name="user">
          </div>
          <h2 class="logInTitulos">Ingresar Contraseña</h2>
          <div class="input-group input-group-lg p-4">
            <input type="password" class="form-control"  placeholder="Ingresar contraseña" aria-label="Contraseña" aria-describedby="inputGroup-sizing-lg" name="password">
          </div>
          <div class="row justify-content-md-center">
            <div class="col-md-4 pt-4">
              <input type="submit" class="btn btn-primary ps-5 pe-5" value="Iniciar"></input>
            </div>
            <div class="col-md-4 pt-4"> 
              <a href="Registro.php"><input type="button" class="btn btn-primary ps-5 pe-5" value="Registrarse"></input></a>
            </div>
          </div>
        </div>
      </form>
      <footer id="footer">
        <a href="#" class="footLinks">Politíca de Privacidad</a>
        <a href="#" class="footLinks">Politíca de Cookies</a>
        <a href="#" class="footLinks">Politíca de Plataforma</a>
     </footer>
</body>
</html>