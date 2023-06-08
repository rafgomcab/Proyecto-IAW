<?php
//Conectamos con  la base de datos
require 'conexion.php';
//Realizamos la consulta de nuestra tabla para poder obtener los datos que hay guardados
$sql = "SELECT *  from especie;";
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
		
		<title>Listado Pokemon</title>
		
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
				<h1>Listado Pokemon</h1>
			</div>
			<br>
			
			<table id="tabla" class="display" style="width:100%">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Tipo 1</th>
						<th>Tipo 2</th>
						<th>Región</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($fila = $resultado->fetch_assoc()){
						echo "<tr>";
							echo "<td>",$fila['nombre'],"</td>";
							echo "<td>",$fila['tipo1'],"</td>";
							echo "<td>",$fila['tipo2'],"</td>";
							echo "<td>",$fila['region'],"</td>";
							echo "<td><a href= 'estadisticas.php?especie=$fila[nombre]' class='btn btn-warning'>Ver individuos</a></td>";
						echo "</tr>";
						}
					?>
				</tbody>
			</table>
			
			<div class="row" style="display:flex; justify-content: space-between";>
				<!-- Registrar -->
				<p><a href="registrarPokemon.php" class="btn btn-primary">Registrar Pokémon</a></p>
				<p><a href="combate.php" class="btn btn-primary">Ver Combates</a></p>
			</div>
			<br>
		</div>
	</div>
</body>
</html>