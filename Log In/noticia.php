<?php
require_once('session.php');
require_once('database.php');

$id_noticia = $_GET['id'];

//Publicaciones
$response = [];
$articulos = "SELECT `foto`,`titulo`,`contenido`,`noticia_id`
              FROM `noticias` WHERE `noticia_id` = $id_noticia";
$articulos_exec =  $conexion->buscar_por_sql($articulos);

$noticia = mysqli_fetch_array($articulos_exec);    
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
      <?php
        echo '<div class="container text-dark mt-4" style="background-color:#FFBA5C;" id="publicacionContainer">
        
          
          <div class="text-center text-dark p-4" >
            <h2>'.$noticia['titulo'].'</h2>
            
          </div>
          <div  class="text-center">
            <img src="profile/'.$noticia['foto'].'" class="img-fluid" height="15%" width="40%" alt="...">
            </div>
          
        
        <div  class="container text-dark p-4">
        '.$noticia['contenido'].'
        </div>
        <hr>

            </div>'
      ?>
         <?php
            if(isset($_SESSION['reporte'])){
              echo "<script> 
                      function myFunction(){
                        setTimeout(function(){ location.reload(); }, 3000);
                      }
                      myFunction();
                    </script>";
              unset($_SESSION['reporte']);
            }
      ?>
      <footer class="d-flex flex-wrap justify-content-evenly" style="background-color:#FFBA5C">
        <a href="privacidad.php" class="footLinks">Politíca de Privacidad</a>
        <a href="plataforma.php" class="footLinks">Normas de comunidad</a>
     </footer>
</body>
</html>