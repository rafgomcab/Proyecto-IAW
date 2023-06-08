<?php
//Conectamos con la base de datos
require 'conexion.php';
//Creamos la consulta que nos devuelve todo los pokemon individuales
$sql = "select * from pokemon";
//Ejecutamos la consulta
$resultado = $mysqli->query($sql);
//Ejecutamos una segunda consulta igual para poder usarla en el select
$resultado2 = $mysqli->query($sql);
?>

<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Creación de un combate</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>Crear combate</h1>
        </div>

        <div class="row">
            <div class="col-md-8">
                <!-- Completar atributos de form -->
                <form id="registro" name="registro" method="post" action="crearCombate2.php" autocomplete="off">

                    <div class="form-group">
                        <!-- Nombre -->
                        <label for="contrincante1">Contrincante 1: </label>
                        <select name="contrincante1" id="contrincante1" class="custom-select" required>
                            <?php
                            while ($fila = $resultado->fetch_assoc()) {
                                echo "<option value=", $fila['id'], ">", $fila['nombre'], "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <!-- Nombre -->
                        <label for="contrincante2">Contrincante 2: </label>
                        <select name="contrincante2" id="contrincante2" class="custom-select" required>
                            <?php
                            while ($fila2 = $resultado2->fetch_assoc()) {
                                echo "<option value=", $fila2['id'], ">", $fila2['nombre'], "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <!-- tipo2 -->
                        <label for="tipo2">Fecha: </label>
                        <input type="date" name="fecha" class="form-control" placeholder="Introduce la fecha">
				    </div>
						
                    <div class="row" style="display:flex; justify-content: space-between";>
                        <input type="submit" value="Crear combate" name="combate" class="btn btn-primary">
                            <a href="combate.php" class="btn btn-warning">Regresar</a>
                    </div>
                </form>


            </div>
        </div>
    </div>
</body>

</html>