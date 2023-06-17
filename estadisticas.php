<?php
//Conectamos con  la base de datos
require 'conexion.php';
//Nos traemos la especie de nuestro Pokemon individual
$especie=$_GET['especie'];
//Realizamos la consulta de nuestra tabla para poder obtener los datos que hay guardados
$sql = "SELECT *  from pokemon where especie like '$especie';";
//Ejecutamos la consulta
$resultado = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/jquery.dataTables.min.css">
		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="js/jquery-3.4.1.min.js" ></script>
		<script src="js/bootstrap.min.js" ></script>
		<script src="js/jquery.dataTables.min.js" ></script>
		
		<title>Estadísticas</title>
		
		<script>
			// DataTables
			$(document).ready( function () {
				$('#tabla').DataTable();
			} );
		</script>
</head>
<body>
    <div class="container">
        <div class=row>
            <h1><?php 
                echo $especie 
            ?></h1>
        </div>
        <br>

        <table id="tabla" class="display" style="width:100%">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Ataque</th>
						<th>Defensa</th>
						<th>Velocidad</th>
                        <th>Nivel</th>
                        <th>Combates ganados</th>
                        <th>Combates perdidos</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($fila = $resultado->fetch_assoc()){
						echo "<tr>";
							echo "<td>",$fila['nombre'],"</td>";
							echo "<td>",$fila['ataque'],"</td>";
							echo "<td>",$fila['defensa'],"</td>";
							echo "<td>",$fila['velocidad'],"</td>";
                            echo "<td>",$fila['Nivel'],"</td>";
                            echo "<td>",$fila['combates_ganados'],"</td>";
                            echo "<td>",$fila['combates_perdidos'],"</td>";
							echo "<td><a href= 'eliminarIndividual.php?id=$fila[id]&especie=$fila[especie]' class='btn btn-danger'>Eliminar Pokémon</a></td>";
							echo "<td><a href= 'historial.php?id=$fila[id]' class='btn btn-primary'>Ver Combates</a></td>";
							echo "<td><a href= 'editarEstadisticas.php?id=$fila[id]&especie=$fila[especie]&nombre=$fila[nombre]&ataque=$fila[ataque]&defensa=$fila[defensa]&velocidad=$fila[velocidad]&Nivel=$fila[Nivel]' class='btn btn-secondary'>Editar estadísticas</a></td>";
						echo "</tr>";
						}
					?>
				</tbody>
			</table>

            <div class="container" style="display:flex; justify-content: space-between; margin-top:10px;";>
                <div class="row">
                    <p><a href="pokemon.php" class="btn btn-outline-danger">Volver al listado general</a> <a href="anadirPokemon.php?especie=<?php echo $especie ?>" class="btn btn-primary">Añadir Pokémon</a></p> 
                    <!-- Añadimos a este enlace la información de la especie para poder añadirla en el formulario -->
                </div>
                
                <div class="row">
                    <p><a href="combate.php" class="btn btn-outline-primary">Ir a Combates</a></p>
                </div> 
            </div>
    </div>
</body>
</html>