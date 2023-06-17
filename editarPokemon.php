<?php
require 'conexion.php';
//traemos las variables del pokemon seleccionado a través del link
$id = $_GET['id'];
$nombre = $_GET['nombre'];
$tipo1 = $_GET['tipo1'];
$tipo2 = $_GET['tipo2'];
$region = $_GET['region'];
?>
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Edición de especie</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>Edición de especie</h1>
        </div>

        <div class="row">
            <div class="col-md-8">
                <!-- Completar atributos de form -->
                <form id="registro" name="registro" method="post" action="editarPokemon2.php" autocomplete="off">

                    <input type="hidden" name="id" value=<?php echo $id ?>>
                    <input type="hidden" name="nombre">

                    <div class="form-group">
                        <!-- Nombre -->
                        <label for="nombre">Nombre: </label>
                        <input type="text" name="nombre" class="form-control" id="formGroupExampleInput" value=<?php echo $nombre ?> required>
                    </div>

                    <div class="form-group">
                        <!-- tipo1 -->
                        <label for="tipo1">Tipo 1: </label>
                        <select name="tipo1" id="tipo1" class="custom-select" required>
                            <!-- Imprime la opcion seleccionada de lo que nos traemos desde el enlace -->
                            <?php if ($tipo1 == " ") echo "<option selected='true' value=' '> Ninguno </option>";
                            else echo "<option value=' '> Ninguno </option>"; ?>
                            <?php if ($tipo1 == "Agua") echo "<option selected='true'> Agua </option>";
                            else echo "<option> Agua </option>"; ?>
                            <?php if ($tipo1 == "Hielo") echo "<option selected='true'> Hielo </option>";
                            else echo "<option> Hielo </option>"; ?>
                            <?php if ($tipo1 == "Tierra") echo "<option selected='true'> Tierra </option>";
                            else echo "<option> Tierra </option>"; ?>
                            <?php if ($tipo1 == "Fuego") echo "<option selected='true'> Fuego </option>";
                            else echo "<option> Fuego </option>"; ?>
                            <?php if ($tipo1 == "Eléctrico") echo "<option selected='true'> Eléctrico </option>";
                            else echo "<option> Eléctrico </option>"; ?>

                        </select>


                    </div>

                    <div class="form-group">
                        <!-- tipo2 -->
                        <label for="tipo2">Tipo 2: </label>
                        <select name="tipo2" id="tipo2" class="custom-select" required>
                            <?php if ($tipo2 == " ") echo "<option selected='true' value=' '> Ninguno </option>";
                            else echo "<option value=' '> Ninguno </option>"; ?>
                            <?php if ($tipo2 == "Agua") echo "<option selected='true'> Agua </option>";
                            else echo "<option> Agua </option>"; ?>
                            <?php if ($tipo2 == "Hielo") echo "<option selected='true'> Hielo </option>";
                            else echo "<option> Hielo </option>"; ?>
                            <?php if ($tipo2 == "Tierra") echo "<option selected='true'> Tierra </option>";
                            else echo "<option> Tierra </option>"; ?>
                            <?php if ($tipo2 == "Fuego") echo "<option selected='true'> Fuego </option>";
                            else echo "<option> Fuego </option>"; ?>
                            <?php if ($tipo2 == "Eléctrico") echo "<option selected='true'> Eléctrico </option>";
                            else echo "<option> Eléctrico </option>"; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <!-- region -->
                        <label for="region">Región: </label>
                        <select name="region" id="region" class="custom-select" value=<?php echo $region ?> required>
                            <?php if ($region == "Kanto") echo "<option selected='true'> Kanto </option>";
                            else echo "<option> Kanto </option>"; ?>
                            <?php if ($region == "Johto") echo "<option selected='true'> Johto </option>";
                            else echo "<option> Johto </option>"; ?>
                            <?php if ($region == "Hoenn") echo "<option selected='true'> Hoenn </option>";
                            else echo "<option> Hoenn </option>"; ?>

                        </select>
                    </div>



                    <div class="row" style="display:flex; justify-content: space-between" ;>
                        <div class="form-group">
                            <!-- Registrar -->
                            <input type="submit" value="Editar Especie" name="editar" class="btn btn-primary">
                        </div>
                        <div class="row">

                            <p><a href="pokemon.php" class="btn btn-warning">Regresar</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>