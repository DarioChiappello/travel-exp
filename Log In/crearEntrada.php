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
          <?php if(isset($_SESSION['user'])){
            echo '<a href="Perfil.php" class="navLinks">'.$_SESSION['user'].'</a>';
          }else{
            echo '<a href="Login.php" class="navLinks">Ingresar</a>';
          }  ?>
          
          <a href="../Contacto/Form.php" class="navLinks">Contacto</a>
          <a href="publicaciones.php" class="navLinks">Publicaciones</a>
          <a href="index.php" class="navLinks">Inicio</a>
          <h2  id="titulo">Travel Exp</h2>
        </nav>  
      </header>
      <div class="container text-white mt-4" id="publicacionContainer">
        <div class="row mb-3">
          <div class="col md-1 p-4">
            <form action="crearPublicacion.php" method="POST" enctype="multipart/form-data">
          
            <img src="https://www.entornoturistico.com/wp-content/uploads/2016/01/turismo-600x400.jpg" width="80%" alt="">
            <div class="mb-3">
              <input class="form-control mt-2 " name="uploadfile" type="file" id="formFile" required>
            </div>
          </div>
          <div class="col md-4 p-4 me-5">
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label text-dark">Título</label>
                <div class="col-sm-10">
                  <input type="text" name="titulo" class="form-control-plaintext bg-white" id="staticEmail" required>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label text-dark">Calificación</label>
                <div class="col-sm-10">
                  <select class="form-select" name="calificacion" aria-label="Default select example" required>
                    <option selected value="">Elegir calificación</option>
                    <option value="1">★</option>
                    <option value="2">★★</option>
                    <option value="3">★★★</option>
                    <option value="4">★★★★</option>
                    <option value="5">★★★★★</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label text-dark">Actividad</label>
                <div class="col-sm-10">
                  <select class="form-select" name="actividad" aria-label="Default select example" required>
                    <option selected value="">Elegir actividad</option>
                    <option value="Deporte">Deporte</option>
                    <option value="Turismo">Turismo</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label text-dark">Provincia</label>
                <div class="col-sm-10">
                  <select class="form-select" name="provincia" aria-label="Default select example" required>
                    <option selected value="">Elegir provincia</option>
                    <option value="Buenos Aires">Buenos Aires</option>
                    <option value="Catamarca">Catamarca</option>
                    <option value="Chaco">Chaco</option>
                    <option value="Chubut">Chubut</option>
                    <option value="Córdoba">Córdoba</option>
                    <option value="Corrientes">Corrientes</option>
                    <option value="Entre">Entre Rios</option>
                    <option value="Formosa">Formosa</option>
                    <option value="Jujuy">Jujuy</option>
                    <option value="La Pampa">La Pampa</option>
                    <option value="La Rioja">La Rioja</option>
                    <option value="Mendoza">Mendoza</option>
                    <option value="Misiones">Misiones</option>
                    <option value="Neuquén">Neuquén</option>
                    <option value="Rio Negro">Rio Negro</option>
                    <option value="Salta">Salta</option>
                    <option value="San Juan">San Juan</option>
                    <option value="San Luis">San Luis</option>
                    <option value="Santa Cruz">Santa Cruz</option>
                    <option value="Santa Fe">Santa Fe</option>
                    <option value="Santiago del Estero">Santiago del Estero</option>
                    <option value="Tierra del Fuego">Tierra del Fuego</option>
                    <option value="Tucumán">Tucumán</option>
                  </select>
                </div>
              </div>
          </div> 
        </div>
        <div class="input-group">
          <div>
            <textarea class="form-control" name="texto" cols="100" rows="8" aria-label="With textarea" id="cuerpoPublicacion" required></textarea>
          </div>
        </div>
        <input type="submit" name="upload" class="btn btn-primary mt-4 float-right ps-4 pe-4 mb-3" id="botonPublicar" value="Publicar"></input>
      </form>
      </div>     
      <footer id="footer">
        <a href="#" class="footLinks">Politíca de Privacidad</a>
        <a href="#" class="footLinks">Politíca de Cookies</a>
        <a href="#" class="footLinks">Politíca de Plataforma</a>
     </footer>
</body>
</html>