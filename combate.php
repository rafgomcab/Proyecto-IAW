<?php
//Conectamos con  la base de datos
require 'conexion.php';
//Realizamos la consulta de nuestra tabla para poder obtener los datos que hay guardados
$sql = "SELECT *  from combates;";
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
		
		<title>Combates</title>
		
		<script>
			// DataTables
			$(document).ready( function () {
				$('#tabla').DataTable();
			} );
		</script>
		
</head>
<body>
<div class="container">
			<div class="row">
				<h1>Combates</h1>
			</div>
			<br>
			
			<table id="tabla" class="display" style="width:100%">
				<thead>
					<tr>
						<th>Contrincante 1</th>
						<th>Contrincante 2</th>
						<th>Fecha</th>
						<th>Ganador</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($fila = $resultado->fetch_assoc()){
						echo "<tr>";
							echo "<td style='background-color: lightblue;'>",$fila['pokemon1'],"</td>";
							echo "<td style='background-color: lightyellow;'>",$fila['pokemon2'],"</td>";
							echo "<td>",$fila['fecha'],"</td>";
							echo "<td style='background-color: lightgreen;'>",$fila['ganador'],"</td>";
						echo "</tr>";
						}
					?>
				</tbody>
			</table>
			
			<div class="row" style="display:flex; justify-content: space-between";>
                <div class="row">
                    <p><a href="crearCombate.php" class="btn btn-primary">Crear combate</a></p>
					<p><a href= 'actualizaCombate.php' class='btn btn-primary'>Actualiza estadísticas</a></p>
                </div>
				<!-- Registrar -->
                <div class="row">
				
				<p><a href="pokemon.php" class="btn btn-danger">Volver al listado general</a></p>
                </div>
			</div>
			<br>
		</div>
	</div>
</body>
</html>