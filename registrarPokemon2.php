<!doctype html>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
		<title>Registro Pokémon</title>
	</head>
	<body>
		<?php
		//Conectamos a la base de datos
		require 'conexion.php';

		//Guardamos las variables de nuestro formulario
		$nombre = $_POST['nombre'];
		$tipo1 = $_POST['tipo1'];
		$tipo2 = $_POST['tipo2'];
		$region = $_POST['region'];

		//Elaboramos la sentencia SQL para insertar los datos en la base de datos
		$sql= "INSERT INTO especie(nombre, tipo1, tipo2, region) values('$nombre', '$tipo1', '$tipo2', '$region')";
		//Llevamos a cabo la consulta
		$res = $mysqli->query($sql);
		//Analizamos el resultado
		if($res>0){
            echo "<p class='alert alert-primary'>Registro correcto</p>";
            echo "<p><a href='pokemon.php' class='btn btn-primary'>Regresar</a></p>";
        }else{
            echo "<p class=' alert alert-primary'>Error al insertar</p>";
            echo "<p><a href='pokemon.php' class='btn btn-primary'>Regresar</a></p>";
        }
			
			
		?>

	</body>
</html>