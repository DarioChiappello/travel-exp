<?php
require_once('session.php');
require_once('database.php');

//Última publicación
$sql = "SELECT `foto`,`titulo`,`contenido`,`actividad`,`nombre_provincia`,`calificacion`
        FROM `publicaciones`
        ORDER BY publicacion_id DESC
        LIMIT 1";
$res = $conexion->buscar_por_sql($sql);
$result=mysqli_fetch_array($res);
$estrellas = $result['calificacion'];
$estrellas_str = '';
for($i = 0; $i < $estrellas; $i++){
  $estrellas_str .= "★";
}

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
            if($_SESSION['user'] == "admin"){
              echo '<a href="perfilAdmin.php" class="navLinks">'.$_SESSION['user'].'</a>';
            }elseif(!isset($_SESSION['user'])){
              echo '<a href="Login.php" class="navLinks">Ingresar</a>';
            }else{
              echo '<a href="perfil.php" class="navLinks">'.$_SESSION['user'].'</a>';}
        ?>
          <a href="../Contacto/Form.php" class="navLinks">Contacto</a>
          <a href="publicaciones.php" class="navLinks">Publicaciones</a>
          <a href="index.php" class="navLinks">Inicio</a>
          <h2  id="titulo">Travel Exp</h2>
        </nav>  
      </header>
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://www.entornoturistico.com/wp-content/uploads/2016/01/turismo-600x400.jpg" class="d-block w-100" alt="..." height="600px">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://ichef.bbci.co.uk/news/800/cpsprodpb/D939/production/_103590655_valija-turismo.png" class="d-block w-100" alt="..." height="600px">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://www.entornoturistico.com/wp-content/uploads/2016/03/turismo-768x260.jpg" class="d-block w-100" alt="..." height="600px">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <div>
        <?php
                if($result == NULL){
                  echo '<div class="container pt-4">
                        <h2 class="p-2 pb-2 text-center text-white">Último Post</h2>
                        <div class="card p-3"  id="ultPost">
                          <div class="row g-0">
                            <div class="col-md-2">
                              <img src="profile/profile.png" class="img-fluid" alt="...">
                            </div>
                              <div class="col-md-8">
                                <div class="card-body">
                                  <h5 class="card-title">No hay post nuevos</h5>
                                  <p class="card-text">No hay calificaciones</p>
                                  <p class="card-text">Ninguna actividad</p>
                                  <p class="card-text">No hay provincia</p>                 
                                  <p class="card-text">Sin contenido</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>';
                }else{
                  echo '<div class="container pt-4">
                        <h2 class="p-2 pb-2 text-center text-white">Último Post</h2>
                        <div class="card p-3"  id="ultPost">
                          <div class="row g-0">
                            <div class="col-md-2">
                              <img src="<?php echo "profile/".$result["foto"];?>" class="img-fluid" alt="...">
                            </div>
                              <div class="col-md-8">
                                  <div class="card-body">
                                    <h5 class="card-title"><?php echo $result["titulo"];?></h5>
                                    <p class="card-text"><?php echo $estrellas_str;?></p>
                                    <p class="card-text"><?php echo $result["actividad"];?></p>
                                    <p class="card-text"><?php echo $result["nombre_provincia"];?></p>                 
                                    <p class="card-text"><?php echo $result["contenido"];?></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>';
                }
        ?>
      <footer id="footer">
        <a href="#" class="footLinks">Politíca de Privacidad</a>
        <a href="#" class="footLinks">Politíca de Cookies</a>
        <a href="#" class="footLinks">Politíca de Plataforma</a>
     </footer>
</body>
</html>