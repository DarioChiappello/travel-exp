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
    <h2 class="text-center mt-3 mb-4 text-white "><b>Pol??tica de privacidad</b></h2>
    <div class="container">
        <table class="table mt-3">
            <tbody>
                <tr class="table-primary">
                    <th scope="row" class="text-center">POL??TICA DE PRIVACIDAD</th>
                    <td class="text-justify">El presente Pol??tica de Privacidad establece los t??rminos en que Travel Exp usa y protege la informaci??n que es proporcionada por sus usuarios al momento de utilizar su sitio web. Esta compa????a est?? comprometida con la seguridad de los datos de sus usuarios. Cuando le pedimos llenar los campos de informaci??n personal con la cual usted pueda ser identificado, lo hacemos asegurando que s??lo se emplear?? de acuerdo con los t??rminos de este documento. Sin embargo esta Pol??tica de Privacidad puede cambiar con el tiempo o ser actualizada por lo que le recomendamos y enfatizamos revisar continuamente esta p??gina para asegurarse que est?? de acuerdo con dichos cambios.</td>
                </tr>
                <tr class="table-primary">
                    <th scope="row" class="text-center">Uso de la informaci??n recogida</th>
                    <td class="text-justify">Nuestro sitio web emplea la informaci??n con el fin de proporcionar el mejor servicio posible, particularmente para mantener un registro de usuarios, de pedidos en caso que aplique, y mejorar nuestros productos y servicios. Travel Exp est?? altamente comprometido para cumplir con el compromiso de mantener su informaci??n segura. Usamos los sistemas m??s avanzados y los actualizamos constantemente para asegurarnos que no exista ning??n acceso no autorizado.</td>
                </tr>
                <tr class="table-primary">
                    <th scope="row" class="text-center">Sesiones</th>
                    <td class="text-justify">Las sesiones son una forma sencilla de almacenar datos para usuarios de manera individual usando un ID de sesi??n ??nico. Esto se puede usar para hacer persistente la informaci??n de estado entre peticiones de p??ginas. Las sesiones solo persisten mientras que el usuario tenga iniciada su sesion en la plataforma</td>
                </tr>
                <tr class="table-primary">
                    <th scope="row" class="text-center">Control de informaci??n personal</th>
                    <td class="text-justify">Los usuarios tendran en todo momento control sobre la informacion que cedan a la plataforma, incluso cuando eliminen su cuenta toda la informacion e interacciones que hayan realizado en el sitio seran eliminadas.
                    Esta compa????a no vender??, ceder?? ni distribuir?? la informaci??n personal que es recopilada sin su consentimiento, salvo que sea requerido por un juez con un orden judicial.
                    Se reserva el derecho de cambiar los t??rminos de la presente Pol??tica de Privacidad en cualquier momento.</td>
                </tr>
            </tbody>
        </table>
    </div>
    <footer class="d-flex flex-wrap justify-content-evenly mt-3" style="background-color:#FFBA5C">
        <a href="#" class="footLinks">Polit??ca de Privacidad</a>
        <a href="plataforma.php" class="footLinks">Normas de comunidad</a>
    </footer>
</body>

</html>