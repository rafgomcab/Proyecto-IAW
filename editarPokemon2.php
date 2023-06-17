<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Editar Pokemon</title>
</head>

<body>
    <?php
    //Conectamos a la base de datos
    require 'conexion.php';
    //realizamos una consulta que nos permita ver si el nombre ya está en la base de datos.

    //Guardamos las variables de nuestro formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $tipo1 = $_POST['tipo1'];
    $tipo2 = $_POST['tipo2'];
    $region = $_POST['region'];

    //Ejecutamos la sentencia de actualización
    $sql = "UPDATE especie set nombre = '$nombre', tipo1 = '$tipo1', tipo2 = '$tipo2', region = '$region' where id=$id";
    //Llevamos a cabo la consulta
    $res = $mysqli->query($sql);

    //Analizamos el resultado
    if ($res > 0) {
        echo "<p class='alert alert-primary'>Registro correcto</p>";
        echo "<p><a href='pokemon.php' class='btn btn-primary'>Regresar</a></p>";
    } else {
        echo "<p class=' alert alert-primary'>Error al insertar</p>";
        echo "<p><a href='pokemon.php' class='btn btn-primary'>Regresar</a></p>";
    }

    ?>

</body>

</html>