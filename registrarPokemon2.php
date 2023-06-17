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
	//realizamos una consulta que nos permita ver si el nombre ya está en la base de datos.
	$comparaN = "SELECT * from especie;";
	$resN = $mysqli->query($comparaN);

	//Guardamos las variables de nuestro formulario
	$nombre = $_POST['nombre'];
	$tipo1 = $_POST['tipo1'];
	$tipo2 = $_POST['tipo2'];
	$region = $_POST['region'];

	$encontrado = 0;

	while ($fila = $resN->fetch_assoc()) {
		if ($nombre == $fila['nombre']) {
			$encontrado = 1;
		}
	}

	//Elaboramos la sentencia SQL para insertar los datos en la base de datos
	if ($encontrado == 1) {
		echo "<p class='alert alert-warning'>El Pokémon introducido ya existe en la base de datos.</p>";
		echo "<p><a href='registrarPokemon.php' class='btn btn-warning'>Regresar</a></p>";
	} else {
		$sql = "INSERT INTO especie(nombre, tipo1, tipo2, region) values('$nombre', '$tipo1', '$tipo2', '$region')";
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
		
	}
	?>

</body>

</html>