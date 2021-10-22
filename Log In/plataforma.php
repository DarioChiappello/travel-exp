<?php
require_once('session.php');
require_once('database.php');



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
                if (isset($_SESSION['user']) && $_SESSION['user'] == "admin") {
                    echo '<li><a href="perfilAdmin.php" class="nav-link active fw-bold fs-4 me-4" aria-current="page">' . $_SESSION['user'] . '</a></li>';
                } elseif (!isset($_SESSION['user'])) {
                    echo '<li><a href="Login.php" class="nav-link active fw-bold fs-4 me-4" aria-current="page">Ingresar</a></li>';
                } else {
                    echo '<li><a href="perfil.php" class="nav-link active fw-bold fs-4 me-4" aria-current="page">' . $_SESSION['user'] . '</a></li>';
                }
                ?>
            </ul>
        </div>
    </nav>
    <h2 class="text-center mt-3 mb-4 text-white "><b>Codigo de conducta</b></h2>
    <div class="container">
        <table class="table mt-3">
            <tbody>
                <tr class="table-primary">
                    <th scope="row" class="text-center">1</th>
                    <td class="text-justify">Se respetuoso con otros usuarios de la plataforma.</td>
                </tr>
                <tr class="table-primary">
                    <th scope="row" class="text-center">2</th>
                    <td class="text-justify">Cualquier tipo de comentario de indole racista, xenofobico, sexual, entre otros queda terminantemente prohibido en el sitio.</td>
                </tr>
                <tr class="table-primary">
                    <th scope="row" class="text-center">3</th>
                    <td class="text-justify">Cualquier usuario que llegue a 3(tres) o mas reportes sera bloqueado de la plataforma. </td>
                </tr>
                <tr class="table-primary">
                    <th scope="row" class="text-center">4</th>
                    <td class="text-justify">Cualquier publicacion que llegue a 3(tres) o mas reportes seran eliminadas de la plataforma.
                    </td>
                </tr>
                <tr class="table-primary">
                    <th scope="row" class="text-center">5</th>
                    <td class="text-justify">Cualquier tipo de actividad ilícita será reportada a las autoridades pertinentes.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <footer class="d-flex flex-wrap justify-content-evenly mt-3" style="background-color:#FFBA5C">
        <a href="#" class="footLinks">Politíca de Privacidad</a>
        <a href="#" class="footLinks">Politíca de Plataforma</a>
    </footer>
</body>

</html>