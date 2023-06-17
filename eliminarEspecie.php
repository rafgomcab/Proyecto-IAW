<!doctype html>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
		<title>Eliminar Pokemon</title>
	</head>
	<body>
		<?php
			require 'conexion.php';

			$id= $_GET['id'];

			//realizamos la sentencia para traernos los datos

			$sql="DELETE from especie where id = $id";
			$sql2="DELETE from pokemon;";

			//Ejecutamos la consulta
			$resultado=$mysqli->query($sql);
			//Mostramos el mensaje segun el resultado de la ejecucion
			if($resultado>0){
				echo "<p class='alert alert-primary'>Registro eliminado</p>";
				echo "<p><a href='pokemon.php' class='btn btn-primary'>Regresar</a></p>";

			}else{
				echo "<p class='alert alert-primary'>Error al eliminar</p>";
				echo "<p><a href='pokemon.php' class='btn btn-primary'>Regresar</a></p>";
			}
			
			
		?>

	</body>
</html>