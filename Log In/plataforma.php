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
    <h2 class="text-center mt-3 mb-4 text-white "><b>Normas de la comunidad</b></h2>
    <div class="container">
        <table class="table mt-3">
            <tbody>
                <tr class="table-primary">
                    <th scope="row" class="text-center">1</th>
                    <td class="text-justify">Creemos que todas las personas son dignas y tienen los mismos derechos, por lo que esperamos que respeten la dignidad de los demás y no los acosen ni los degraden.</td>
                </tr>
                <tr class="table-primary">
                    <th scope="row" class="text-center">2</th>
                    <td class="text-justify">En Travel Exp, se prohíben la incitación al odio o a la violencia, las conductas predatorias, los ataques maliciosos y el contenido que promueve conductas peligrosas o perjudiciales.</td>
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
                    <td class="text-justify">Las actividades delictivas abarcan un amplio espectro de actos punibles por la ley incluidos el robo, la agresión, la falsificación y otros comportamientos peligrosos. Para evitar que dichos comportamientos se normalicen, imiten o faciliten eliminamos el contenido que promueva o permita cualquier actividad delictiva.
                    </td>
                </tr>
                <tr class="table-primary">
                    <th scope="row" class="text-center">6</th>
                    <td class="text-justify">La comunidad de Travel Exp se basa en la confianza. Por lo tanto, se prohíbe el contenido que pretende engañar, estafar, enviar spam o tender trampas a otros usuarios.
                    </td>
                </tr>
                <tr class="table-primary">
                    <th scope="row" class="text-center">7</th>
                    <td class="text-justify">En Travel Exp, no se pueden vender productos. 
                    </td>
                </tr>
                <tr class="table-primary">
                    <th scope="row" class="text-center">8</th>
                    <td class="text-justify">No permitimos la representación, promoción o comercio de armas de fuego, munición, accesorios de armas de fuego ni armas explosivas. También prohibimos las instrucciones sobre cómo fabricar dichas armas y accesorios.
                    </td>
                </tr>
                <tr class="table-primary">
                    <th scope="row" class="text-center">9</th>
                    <td class="text-justify">No permitimos la representación, promoción ni comercio de drogas u otras sustancias controladas. El comercio de productos de tabaco y alcohol también está prohibido en la plataforma.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <footer class="d-flex flex-wrap justify-content-evenly mt-3" style="background-color:#FFBA5C">
        <a href="privacidad.php" class="footLinks">Politíca de Privacidad</a>
        <a href="#" class="footLinks">Normas de comunidad</a>
    </footer>
</body>

</html>